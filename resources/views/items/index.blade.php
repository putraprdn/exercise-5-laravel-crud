<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Inventaris | Putra</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center my-4">Data Inventaris</h1>
        <div class="col-1 ms-auto p-0 mb-3">
            <a href="{{ route('create') }}" class="btn btn-custom add w-100 ms-auto rounded-full">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>

        <table class="table table-hover rounded-full">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Quantity</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $index => $item)
                    <tr class="text-center align-middle">
                        <td style="width: 8%">{{ $index + 1 }}</td>
                        <td class="text-start" style="width: 20%">{{ $item->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp. {{ $item->price }}</td>
                        <td>
                            {{-- {{ ucwords($item->status) }} --}}
                            @if ($item->quantity > 0 && strtolower($item->status) == "available")
                                <span class="badge rounded-pill bg-success">Available</span>
                            @else
                                <span class="badge rounded-pill bg-danger">Not Available</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center mb-0">
                                <a href="{{ route('edit', $item->id) }}" class="btn btn-custom edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-custom delete ms-2" type="submit">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
