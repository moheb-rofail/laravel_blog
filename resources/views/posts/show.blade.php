<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <a href="/posts"
        class="inline-block rounded-sm border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:ring-3 focus:outline-hidden"
        href="#">All posts</a>
    <a href="/posts/create"
        class="inline-block rounded-sm border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:ring-3 focus:outline-hidden"
        href="#">+ post</a>

    <div class="overflow-x-auto">

        <a href="{{route('posts.show', $post->id)}}">
            <h1>{{$post['title']}}</h1>
        </a>
        <p>{{$post['body']}}</p>

        <a href="/posts/{{$post['id']}}/edit"
            class="inline-block rounded-sm border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:ring-3 focus:outline-hidden"
            href="#">
            Edit
        </a>
        <form method="post" action="{{route('posts.destroy', $post['id'])}}">
            @csrf
            @method('delete')
            <button
                class="inline-block rounded-sm border border-red-600 bg-red-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:ring-3 focus:outline-hidden"
                type="submit">Delete</button>
        </form>


        <div class="author-info">
            <h2>Author Info</h2>
            <table class="min-w-full divide-y-2 divide-gray-200">
                <tr>
                    <th>Name</th>
                    <td>{{$author->name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$author->email}}</td>
                </tr>
                <tr>
                    <th>Member Since</th>
                    <td>{{ $author->created_at->toDayDateTimeString() }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>