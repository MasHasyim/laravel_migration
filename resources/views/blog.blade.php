<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="mt-5">
            <h1 class="text-center">Blog list </h1>
            <div class="table-responsive mt-5">
                <form method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="title" value={{ $title }} class="form-control"
                            placeholder="Search Title" aria-label="Search Title" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
                    </div>
                </form>
                <table class="table">
                    <thead class="table-dark">
                        <th>#</th>
                        <th>Title</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="table-group-divider">
                        @if ($blogs->count() == 0)
                            <tr>
                                <td colspan="3" class="text-center">No Data Found With
                                    <strong>{{ $title }}</strong> keyword
                                </td>
                            </tr>
                        @endif
                        @foreach ($blogs as $blog)
                            <tr></tr>
                            <td>{{ ($blogs->currentpage() - 1) * $blogs->perpage() + $loop->index + 1 }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>edit | delete</td>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <ol>

            </ol>
            {{ $blogs->links() }}

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>


</html>
