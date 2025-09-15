<x-app-layout>
    @if(session('success'))
        <div role="alert" class="rounded-md border border-gray-300 bg-white p-4 shadow-sm">
            <p class="mt-0.5 text-sm text-gray-700">{{ session('success') }}</p>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y-2 divide-gray-200">
            <thead class="ltr:text-left rtl:text-right">
                <tr class="*:font-medium *:text-gray-900">
                    <th class="px-3 py-2 whitespace">Id</th>
                    <th class="px-3 py-2 whitespace">Author</th>
                    <th class="px-3 py-2 whitespace">Title</th>
                    <th class="px-3 py-2 whitespace">Slug</th>
                    <th class="px-3 py-2 whitespace">Body</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($posts as $post)
                    <tr class="*:text-gray-900 *:first:font-medium">
                        <td class="px-3 py-2 whitespace">{{$post['id']}}</td>
                        <td class="px-3 py-2 whitespace">{{$post->user->name}}</td>
                        <td class="px-3 py-2 whitespace"><a href="{{route('posts.show', $post->slug)}}">{{$post['title']}}</a></td>
                        <td class="px-3 py-2 whitespace">{{$post->slug}}</td>
                        <td class="px-3 py-2 whitespace">{{$post['body']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
</x-app-layout>