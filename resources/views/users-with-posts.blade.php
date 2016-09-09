<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slim-min.css') }}">
    <style type="text/css" media="screen">
        .list-group {
            max-width: 500px;
            margin:20px auto;
        }


        .pagination li {
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <ul class="list-group">
            @foreach($users as $user)
            <li class="list-group-item">
                {{ $user->name }}
                <h5>Posts</h5>
                <ul>
                    @foreach($user->posts as $post)
                    <li>{{ str_limit($post->content, 25) }}</li>
                    @endforeach
                </ul>

                <h5>Videos</h5>
                <ul>
                    @foreach($user->videos as $video)
                    <li>{{ $video->title }}</li>
                    @endforeach
                </ul>
            </li>
            @endforeach
            <li class="list-group-item">{{ $users->render() }}</li>
        </ul>

    </div>
</body>
</html>