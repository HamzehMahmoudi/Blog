<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Hamzeh's Blog</title>
        <script src="https://cdn.tiny.cloud/1/g65o16facumsrood8wd4dlvfosezmcjhzbpjze1sq3i248gy/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>    tinymce.init({
          selector: 'textarea',
          plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
          toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
          toolbar_mode: 'floating',
          tinycomments_mode: 'embedded',
          tinycomments_author: 'Author name',
        });</script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('styles')
    </head>
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="/" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{route('dashboard')}}" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="{{route('posts')}}" class="p-3">Posts</a>
            </li>
        </ul>
        <ul class="flex items-center">
            @auth
            <li>
                <a href="" class="p-3">{{auth()->user()->name}}</a>
            </li>
            <li>
                <a href="{{route('logout')}}" class="p-3">Logout</a>
            </li>
            @endauth
            @guest
            <li>
                <a href="{{route('login')}}" class="p-3">Login</a>
            </li>
            <li>
                <a href="{{route('register')}}" class="p-3">Register</a>
            </li>
            @endguest
    </nav>
    <body class="bg-gray-200">
        @yield('content')
    </body>
</html>
