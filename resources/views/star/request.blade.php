<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>request auth</title>
</head>
<body>
    <div><a href="/">main</a></div>
    <form action="/star/requestAuth" method="post" enctype="multipart/form-data">
        @csrf
        <div>contents : <input type="text" name="content"></div>
        <div>agency_id : <input type="text" name="agency_id"></div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>