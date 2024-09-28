<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center mb-4">Details of Purchase</h3>

                <div class="button-container">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $data->name }}" readonly disabled>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ $data->email }}" readonly disabled>
                    </div>

                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" id="tel_no" name="tel_no"
                            value="{{ $data->tel_no }}" readonly disabled>
                    </div>

                    <div class="mb-3">
                        <label for="item" class="form-label">Items</label>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total_quantity = $grand_total = 0 @endphp
                                @foreach ($purchase as $p)
                                    <tr>
                                        <td>{{ $p->items->name }}</td>
                                        <td>{{ $p->quantity }}</td>
                                        <td>RM {{ number_format($p->quantity * $p->items->price, 2) }}</td>
                                    </tr>
                                    @php
                                        $total_quantity += $p->quantity;
                                        $grand_total += $p->quantity * $p->items->price;
                                    @endphp
                                @endforeach
                                <tr style="font-weight: bold;">
                                    <td>Grand Total</td>
                                    <td>{{ $total_quantity }}</td>
                                    <td>RM {{ number_format($grand_total, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <span style="font-style: italic;"><b>Items Price:</b>
                            @foreach ($items as $i)
                                {{ $i->name }} - RM {{ $i->price }}
                            @endforeach
                        </span>
                    </div>
                </div>
                <a href="/" class="btn btn-primary mt-4 mb-2">Home</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
