@extends('layout.base')

@section('content')
    <div class="flex justify-center">
        <div class= "w-8/12 bg-white p-6 rounded-lg">
            Posts
            @if(auth()->user() && auth()->user()->admin)
                <div>
                    you are admin
                </div>
            @endif
        </div>
    </div>
    <div>
        <div class="flex justify-center">
            <div class= "w-8/12 bg-white p-6 rounded-lg">
                @foreach ( $posts as $post)
                    <div>
                        <div class="flex justify-between">
                            <div>
                                <h1>{{$post->title}}</h1>
                                <p>{{$post->body}}</p>
                            </div>
                            <div>
                                <a href="" class="bg-blue-500 text-white px-1 py-1 rounded font-medium w-full">Edit</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
