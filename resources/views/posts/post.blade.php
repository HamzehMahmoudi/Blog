@extends('layout.base')

@section('content')
<div>{{$post->title}}</div>
    <div>
        {{-- {{Illuminate\Mail\Markdown::parse(e($post->body))}} --}}
        {!! $post->body !!}
    </div>
@endsection
