<!DOCTYPE html>
<html lang="en">

<head>
    @include('include/head')
</head>

<body>
    @include('include/navbar')

    <div class="container">
        <h1>Home Page</h1>

        <div class="container">
            <h2>Basic Table</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->image }}</td>
                        <td><a href="/products/{{ $product->id }}/edit" class="btn btn-primary">Edit</a>
                            <a href="/products/{{ $product->id }}/delete" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    @include('include/footer')
</body>

</html>