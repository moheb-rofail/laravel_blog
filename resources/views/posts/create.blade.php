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
        <form method="post" action="/posts">
            @csrf
            <label for="title">
                <span class="text-sm font-medium text-gray-700"> Title </span>
                <input type="text" name="title" value="{{old('title')}}" id="title"
                    class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm" />
            </label>

            <label for="body">
                <span class="text-sm font-medium text-gray-700"> Body </span>
                <textarea id="body" name="body"
                    class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm">{{old('body')}}</textarea>
            </label>

            <label for="author_id">
                <span class="text-sm font-medium text-gray-700"> Author </span>
            </label>
            <select name="author_id" id="author_id" class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm">
                <option value="0"></option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>


            <input type="submit" value="Add Post">
        </form>
        @if($errors->any())
            <div role="alert" class="rounded-md border border-gray-300 bg-white p-4 shadow-sm">
                @foreach ($errors->all() as $error)
                    <p class="mt-0.5 text-sm text-gray-700">{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
</body>

</html>