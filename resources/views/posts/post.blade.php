@extends('layout.base')

@section('content')
<div class="bg-white rounded-lg p-6 mx-60">
    @can('change', $post)
        <a href="{{route('edit',$post->slug)}}">edit</a>
        <a href="{{route('delete',$post->slug)}}">delete</a>
    @endcan
    <article class="prose prose-lg">
            <h1>{{$post->title}}</h1>
            {!! $post->body !!}
    </article>
</div>
@endsection
