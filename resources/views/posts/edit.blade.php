@extends('layout.base')

@section('content')
<div class="flex justify-center">
    <div class=" bg-white p-6 rounded-lg flex justify-center">
        <form action="{{ route('edit',$post->slug) }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="title" class="sr-only">Title</label>
                <input type="text" name="title" id="title" placeholder="Title" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror" value="{{$post->title}}">

                @error('title')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea  name="body" id="body" placeholder="Body" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" value="{{ $post->body }}">
                </textarea>
                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Post</button>
            </div>
        </form>
    </div>
</div>



@endsection
