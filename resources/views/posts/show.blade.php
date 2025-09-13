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
        <table class="min-w-full divide-y-2 divide-gray-200">
            <thead class="ltr:text-left rtl:text-right">
                <tr class="*:font-medium *:text-gray-900">
                    <th class="px-3 py-2 whitespace">Id</th>
                    <th class="px-3 py-2 whitespace">Title</th>
                    <th class="px-3 py-2 whitespace">Body</th>
                    <th class="px-3 py-2 whitespace">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                <tr class="*:text-gray-900 *:first:font-medium">
                    <td class="px-3 py-2 whitespace">{{$post['id']}}</td>
                    <td class="px-3 py-2 whitespace">{{$post['title']}}</td>
                    <td class="px-3 py-2 whitespace">{{$post['body']}}</td>
                    <td class="px-3 py-2 whitespace">
                        <a href="/posts/{{$post['id']}}/edit"
                            class="inline-block rounded-sm border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:ring-3 focus:outline-hidden"
                            href="#">
                            Edit
                        </a>
                        <form method="post" action="{{route ('posts.destroy', $post['id'])}}">
                            @csrf
                            @method('delete')
                            <button class="inline-block rounded-sm border border-red-600 bg-red-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:ring-3 focus:outline-hidden" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>