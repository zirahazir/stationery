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
                <h3 class="text-center mb-4">Purchase Stationery</h3>

                {!! Form::open([
                    'route' => 'stationery.store',
                    'method' => 'POST',
                ]) !!}

                <div class="button-container">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name') }}" placeholder="Enter your name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ old('email') }}" placeholder="Enter your email" required>
                    </div>

                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" id="tel_no" name="tel_no"
                            value="{{ old('tel_no') }}" placeholder="Enter your telephone number" required>
                    </div>

                    <div class="mb-3">
                        <label for="item" class="form-label">Items</label>
                        @foreach ($item as $i)
                            <div class="input-group mb-2">
                                <span class="input-group-text">{{ $i->name }}</span>
                                <input type="number" class="form-control" name="items[{{ $i->id }}]"
                                    placeholder="Enter quantity" min="0" value="{{ old('items.' . $i->id) }}"
                                    required>
                            </div>
                        @endforeach
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
