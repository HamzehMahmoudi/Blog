@extends('layout.base')

@section('content')
    <div class="flex justify-center">
        <div class= "w-8/12 bg-white p-6 rounded-lg">
            <div class = "mb-8">
                Dashboard
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Title</th>
                        <th scope="col" class="px-6 py-3">Body</th>
                        <th scope="col" class="px-6 py-3">Options</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <a href="{{route('show',$post->slug)}}">{{$post->title}}</a>
                                </th>
                                <td class="px-6 py-4">
                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($post->body), 35, "...") }}</p>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @can('change', $post)
                                        <a href="{{route('edit',$post->slug)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-2 ">edit</a>
                                        <a href="{{route('delete',$post->slug)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-2">delete</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-8">
                {{$posts->links()}}
            </div>

        </div>

    </div>
@endsection
