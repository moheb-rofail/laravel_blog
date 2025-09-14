<x-app-layout>
    <div class="overflow-x-auto">
        <form method="post" action="/posts/{{$post->id}}" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div><input type="file" name="image"></div>

            <label for="title">
                <span class="text-sm font-medium text-gray-700"> Title </span>
                <input type="text" name="title" value="{{$post['title']}}" id="title"
                    class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm" />
            </label>

            <label for="body">
                <span class="text-sm font-medium text-gray-700"> Body </span>
                <textarea id="body" name="body"
                    class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm">{{$post->body}}</textarea>
            </label>

            <input type="submit" value="Update Post">
        </form>
        @if($errors->any())
            <div role="alert" class="rounded-md border border-gray-300 bg-white p-4 shadow-sm">
                @foreach ($errors->all() as $error)
                    <p class="mt-0.5 text-sm text-gray-700">{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>