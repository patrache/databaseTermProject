<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>searchChannel</title>
</head>
<body>
    <div><a href="/">main</a></div>
    <form action="/channel/search" method="post" enctype="multipart/form-data">
        @csrf
        <div>channel name : <input type="text" name="channel_name"></div>
        <button type="submit">Submit</button>
    </form>

    @if ($message = Session::get('success'))
        <table>
            <thead>
                <th>star</th>
                <th>channel_name</th>
            </thead>
            <tbody>
            @foreach ( $channel_list as $channel )
                <tr>
                    <td>{{ $channel->name }}</td>
                    <td>{{ $channel->channel_name }}</td>
                </tr>
            @endforeach
            </tbody>            
        </table>    
    @endif
</body>
</html>