<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>signUp</title>
</head>
<body>
    <div><a href="/">main</a></div>
    <form action="/user/signup" method="post" enctype="multipart/form-data">
        @csrf
        <div>name : <input type="text" name="name"></div>
        <div>nickname : <input type="text" name="nickname"></div>
        <div>email : <input type="text" name="email"></div>
        <div>password : <input type="text" name="password"></div>
        <div>tel : <input type="text" name="tel"></div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>