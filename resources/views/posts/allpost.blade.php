@extends('layout.base')
@section('style')
<script src="https://cdn.tiny.cloud/1/g65o16facumsrood8wd4dlvfosezmcjhzbpjze1sq3i248gy/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>    tinymce.init({
  selector: 'textarea',
  plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
  toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
  toolbar_mode: 'floating',
  tinycomments_mode: 'embedded',
  tinycomments_author: 'Author name',
});</script>
@endsection
@section('content')
    <div>
        @if(auth()->user() && auth()->user()->admin)
                <div class="flex justify-center">
                    <div class=" bg-white p-6 rounded-lg flex justify-center">
                        <form action="{{ route('posts') }}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="title" class="sr-only">Title</label>
                                <input type="text" name="title" id="title" placeholder="Title" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror" value="{{ old('title') }}">

                                @error('title')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="body" class="sr-only">Body</label>
                                <textarea  name="body" id="body" placeholder="Body" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" value="">
                                    {!! old('body') !!}
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
        @endif
    </div>
    <div class="container my-12 mx-auto px-4 md:px-12">
        <div class="flex flex-wrap -mx-1 lg:-mx-4 rounded-lg">
            @foreach ( $posts as $post)
                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3 ">
                    <article class="overflow-hidden rounded-lg bg-white shadow-lg">
                        <img alt="Placeholder" class="block h-auto w-full " src="https://picsum.photos/600/400/?random">
                            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                <h1 class="text-lg">
                                    <a class="no-underline hover:underline text-black" href="{{route('show',$post)}}">
                                        {{$post->title}}
                                    </a>
                                </h1>
                                <p class="text-grey-darker text-sm">
                                    {{$post->created_at->diffForHumans()}}
                                </p>
                            </header>
                            <div class="flex items-center justify-between leading-none p-2 md:p-4">
                                <div class="flex items-center no-underline hover:underline text-black">
                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($post->body), 35, "...") }}</p>
                                </div>
                            </div>
                            <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                <div class="flex items-center no-underline hover:underline text-black" href="">
                                    <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                                    <p class="ml-2 text-sm">
                                        {{$post->user->name}}
                                    </p>
                                </div>
                                <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                    <span class="hidden">Like</span>
                                    <i class="fa fa-heart"></i>
                                </a>
                            </footer>
                    </article>
                </div>
            @endforeach
        </div>
        {{$posts->links()}}
    </div>
@endsection
