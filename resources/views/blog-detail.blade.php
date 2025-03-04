<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>blog</title>
</head>

<body>
    <div class="container">
        <div class="mt-5">
            <h3 class="text-center">{{ $blog->title }}</h3>
            <div class="blog-body">
                <p>
                    {{ $blog->description }}
                </p>
                <div class="d-flex flex-column align-items-end text-end mt-3">
                    <div>{{ $blog->created_at }}</div>
                    <div>by admin</div>
                </div>
                <div>
                    <a href="{{ url('/blog') }}" class="btn btn-secondary mb-1">Back</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
