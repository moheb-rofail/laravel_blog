<x-app-layout>
    <div class="overflow-x-auto">

        <a href="{{route('posts.show', $post->slug)}}">
            <h1>{{$post['title']}}</h1>
        </a>
        <p>{{$post['body']}}</p>

        @if($post->image)
<img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-48 h-auto">
@endif

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
                    <td>{{$post->user->name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$post->user->email}}</td>
                </tr>
                <tr>
                    <th>Member Since</th>
                    <td>{{ $post->user->created_at->toDayDateTimeString() }}</td>
                </tr>
            </table>
        </div>
    </div>
</x-app-layout>