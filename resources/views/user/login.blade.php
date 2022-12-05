<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <div><a href="/">main</a></div>
    @if ($message = Session::get('failed'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
    @endif
    <form action="/user/login" method="post" enctype="multipart/form-data">
        @csrf
        <div>id : <input type="text" name="id"></div>
        <div>password : <input type="text" name="password"></div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>