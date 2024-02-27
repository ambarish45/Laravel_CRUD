<!DOCTYPE html>
<html lang="en">

<head>
   @include('include/head')
</head>

<body>
    @include('include/navbar')

    <div class="container">
        <h1>Create Product</h1>
        <form action="/products/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    @include('include/footer')
</body>

</html>