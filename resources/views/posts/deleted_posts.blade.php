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
                    <th class="px-3 py-2 whitespace">Title</th>
                    <th class="px-3 py-2 whitespace">Body</th>
                    <th class="px-3 py-2 whitespace">Restore</th>
                    <th class="px-3 py-2 whitespace">Delete Permanently</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($posts as $post)
                    <tr class="*:text-gray-900 *:first:font-medium">
                        <td class="px-3 py-2 whitespace">{{$post['id']}}</td>
                        <td class="px-3 py-2 whitespace">{{$post['title']}}</td>
                        <td class="px-3 py-2 whitespace">{{$post['body']}}</td>
                        <td><a class="inline-block rounded-sm border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:ring-3 focus:outline-hidden" href="{{ route('posts.restore_post', $post->id) }}">Restore</a></td>
                        <td><a class="inline-block rounded-sm border border-red-600 bg-red-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:ring-3 focus:outline-hidden" href="{{ route('posts.perm_delete', $post->id) }}">Delete Permanently</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>