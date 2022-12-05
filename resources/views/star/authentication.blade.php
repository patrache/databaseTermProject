<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentication</title>
</head>
<body>
    <div><a href="/">main</a></div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table>
            <thead>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>tel</th>
                <th>contents</th>
                <th>authenticated</th>
            </thead>
            <tbody>
            @foreach ( $starlist as $star )
                <tr>
                    <td>{{ $star->id }}</td>
                    <td>{{ $star->name }}</td>
                    <td>{{ $star->email }}</td>
                    <td>{{ $star->tel }}</td>
                    <td>{{ $star->contents }}</td>
                    <td>{{ $star->authenticated }}</td>
                </tr>
            @endforeach
            </tbody>            
        </table>    
        <br><br><br>
        <form action="/star/authenticate" method="post" enctype="multipart/form-data">
            @csrf
            star_id : <input type="text" name="user_id"><button type="submit">Submit</button>
        </form>
</body>
</html>