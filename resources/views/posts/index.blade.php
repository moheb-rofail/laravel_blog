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
                    <th class="px-3 py-2 whitespace-nowrap">Id</th>
                    <th class="px-3 py-2 whitespace-nowrap">Title</th>
                    <th class="px-3 py-2 whitespace-nowrap">Description</th>
                    <th class="px-3 py-2 whitespace-nowrap">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($posts as $post)
                    <tr class="*:text-gray-900 *:first:font-medium">
                        <td class="px-3 py-2 whitespace-nowrap">{{$post['id']}}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{$post['title']}}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{$post['description']}}</td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <a class="inline-block rounded-sm border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:ring-3 focus:outline-hidden"
                                href="/posts/{{$post['id']}}">View</a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>