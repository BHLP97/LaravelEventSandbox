<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body class="antialiased">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Number of Views</th>
                <th>Action</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->num_views}}</td>
                    <td><a href="{{route('post.show', $post->id)}}"><button >Show</button></a></td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
