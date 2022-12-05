<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>createChannel</title>
</head>
<body>
    <div><a href="/">main</a></div>
    <form action="/channel/create" method="post" enctype="multipart/form-data">
        @csrf
        <div>channel name : <input type="text" name="channel_name"></div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>