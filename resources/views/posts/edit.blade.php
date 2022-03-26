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
                <textarea  name="body" id="body" placeholder="Body" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror">
                    {!! $post->body !!}
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
