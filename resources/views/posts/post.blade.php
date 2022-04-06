@extends('layout.base')

@section('content')
<div class="bg-white rounded-lg p-6 mx-60">
    @can('change', $post)
        <a href="{{route('edit',$post)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-2 ">edit</a>
        <a href="{{route('delete',$post)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-2 ">delete</a>
    @endcan
    <article class="prose md:prose-lg lg:prose-xl prose-a:text-blue-600 hover:prose-a:underline" style="max-width:100%">
            <h1>{{$post->title}}</h1>
            {!! $post->body !!}
    </article>
</div>
@endsection
