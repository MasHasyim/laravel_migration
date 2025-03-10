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

                <div>
                    Tags: @if ($blog->tags->count() < 1)
                        -
                    @endif
                    @foreach ($blog->tags as $tag)
                        <span class="p-2 bg-info text-white rounded mt-1">{{ $tag->name }}</span>
                    @endforeach
                </div>
                <div class="d-flex flex-column align-items-end text-end mt-3">
                    <div>{{ $blog->created_at }}</div>
                    <div>by admin</div>
                </div>
            </div>
        </div>


        <div class="mt-5">
            @if ($errors->any())
                <div class="alert alert-danger col-md-6 form-control">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('message'))
                <p class="alert {{ Session::get('alert-class') }} mt-2 mb-2">{{ Session::get('message') }}</p>
            @endif
            <h4>Commets</h4>
            <form action="{{ url('comment/' . $blog->id) }}" method="POST">
                @csrf
                <textarea class="form-control" style="resize:none" name="comment_text" rows="4"></textarea>
                <button class="btn btn-primary mt-3" type="submit">Submit</button>
            </form>
        </div>
        <hr class="mt-3">

        <div class="mt-2">

            {{ $blog->comments->count() == 0 ? 'no comments yet' : '' }}
            @foreach ($blog->comments as $comment)
                <div class="p-3 mb-3" style="background-color: aliceblue">{{ $comment->comment_text }}</div>
            @endforeach
        </div>

        <div class="mt-4">
            <a href="{{ url('/blog') }}" class="btn btn-secondary mb-1">Back</a>

        </div>
    </div>

</body>

</html>
