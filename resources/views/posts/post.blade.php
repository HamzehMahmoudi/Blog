@extends('layout.base')

@section('content')
@auth
    @if (auth()->user() == $post->user)
        <a href="{{route('edit',$post->slug)}}">edit</a>
        <a href="{{route('delete',$post->slug)}}">delete</a>
    @endif
@endauth
<h1 class="h1"">{{$post->title}}</h1>
<div class=" bg-white p-6 rounded-lg flex justify-center">
        {!! $post->body !!}
</div>
@endsection
