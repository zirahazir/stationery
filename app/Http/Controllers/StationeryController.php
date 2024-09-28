<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Detail;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StationeryController extends Controller
{
    public function form()
    {
        $item = Item::all();
        return view('form', compact('item'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
            'name'    => 'required|max:255',
            'email'   => 'required|email|max:255',
            'tel_no'  => 'required|digits_between:10,11',
            'items'   => 'required|array',
            'items.*' => 'required|integer',
        ],
            [
            'tel_no.required'       => 'Telephone number is required',
            'tel_no.digits_between' => 'Telephone number must be between 10 and 11 digits only',
            'items.required'        => 'You must provide quantities for the items.',
            'items.*.required'      => 'The quantity for each item is required.',
        ]
        );

        $detail = Detail::create([
            'name'   => $request->name,
            'email'  => $request->email,
            'tel_no' => $request->tel_no,
        ]);

        if (isset($request->items)) {
            foreach ($request->items as $key => $value) {
                if ($value > 0) {
                    Purchase::create([
                        'details_id' => $detail->id,
                        'items_id'   => $key,
                        'quantity'   => $value
                    ]);
                }
            }
        }

        return redirect('purchase/'.$detail->id);
    }

    public function detail($id)
    {
        $data     = Detail::with('purchase')->where('id', $id)->first();
        $purchase = Purchase::with('items')->where('details_id', $id)->get();
        $items    = Item::all();
        return view('detail', compact('data', 'purchase', 'items'));
    }

    public function list()
    {
        return view('list');
    }

    public function getData()
    {
        $data = Detail::select(['id','name', 'email', 'tel_no', 'created_at']);
        return DataTables::of($data)
            ->addColumn('created_at', function ($data) {
                return ($data->created_at)->format('d M Y');
            })
            ->addColumn('action', function ($data) {
                return '<a href="/purchase/'.$data->id.'" class="btn btn-sm btn-primary">View</a>';
            })

            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
