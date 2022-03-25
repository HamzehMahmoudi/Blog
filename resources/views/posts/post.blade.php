@extends('layout.base')

@section('content')
    <div>
        {{Illuminate\Mail\Markdown::parse(e($post->body))}}
    </div>
@endsection
