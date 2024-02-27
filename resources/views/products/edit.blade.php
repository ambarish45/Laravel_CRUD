<!DOCTYPE html>
<html lang="en">

<head>
    @include('include/head')
</head>

<body>
    @include('include/navbar')

    @if($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>    
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <h1>Edit Product</h1>
        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH') <!-- Add this line for PATCH method -->

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $product->name }}" required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ $product->description }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                    <label class="custom-file-label" for="image" id="imageNameLabel">Choose file</label>
                </div>
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <script>
                // Update the file input label when a file is chosen
                document.getElementById('image').addEventListener('change', function() {
                    var fileName = this.files[0].name;
                    document.getElementById('imageNameLabel').innerText = fileName;
                });
            </script>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>

    @include('include/footer')
</body>

</html>
