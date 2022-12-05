<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
</head>
<body>
    @if ($name = Session::get('user_name'))
        <div>사용자 : {{ $name }}</div>
    @endif

    <div><a href="/user/signup">signup</a></div>
    <div><a href="/user/login">login</a></div>
    <div><a href="/user/list">userlist</a></div>
    <div><a href="/authentication">authentication</a></div>
    <div><a href="/searchChannel">searchChannel</a></div>
    <div><a href="/createChannel">createChannel</a></div>
    <div><a href="/channel">channel</a></div>
    <div><a href="/createPost">createPost</a></div>
    <div><a href="/post">post</a></div>
    <div><a href="/searchToken">searchToken</a></div>
</body>
</html>