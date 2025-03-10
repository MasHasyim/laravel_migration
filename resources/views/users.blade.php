    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Halaman User</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <div class="mt-5">
                <h1 class="text-center">User list </h1>
                <h6 class="text-center"><a href="/phones">Belongs to</a></h6>


                <table class="table">
                    <thead class="table-dark">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>

                    </thead>
                    <tbody class="table-group-divider">
                        @if ($users->count() == 0)
                            <tr>
                                <td colspan="3" class="text-center">No Data Found With
                                    <strong>{{ $title }}</strong> keyword
                                </td>
                            </tr>
                        @endif
                        @foreach ($users as $user)
                            <tr></tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone->phone_number ?? '-' }}</td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

    </body>


    </html>
