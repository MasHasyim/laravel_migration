<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Edit Blog</title>
</head>

<body>
    <div class="container">
        <div class="mt-3">
            <h2 class="text-center">Edit Blog : {{ $blog->title }}</h2>

            @if ($errors->any())
                <div class="alert alert-danger col-md-6 mx-auto">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/blog/' . $blog->id . '/update') }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="col-md-6 mt-3 mx-auto">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ $blog->title }}">
                </div>
                <div class="col-md-6 mt-3 mx-auto">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="desc-textarea" cols="10" rows="5"> {{ $blog->description }}</textarea>
                </div>
                <div class="col-md-3 mt-3 mx-auto">
                    <button class="btn btn-success form-control">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
