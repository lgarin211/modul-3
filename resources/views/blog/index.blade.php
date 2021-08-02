<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Font Awesome for enable icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-sans antialiased">
    <!-- Container -->
    <div class="container mx-auto">
        <!-- Navigation --> 
        <div class="navigation">
        </div>
        <!-- logo -->
        <div class="p-6 text-3xl text-blue-400 font-bold">
            <a href="{{ route('blog-home') }}"><i class="fas fa-cloud"></i> Blog - SMK Cloud Provider</a>
        </div>
        <!-- end of logo -->
 
        <!-- end of Navigation -->

        <!-- Body (list of blogs) -->
        <div class="blog-body p-6"> 
            <!-- Blogs -->
            <div class="">
                @if (count($blog) > 0)
                @foreach ($blog as $b) 
                <div class="py-4">
                    <div class="py-2 border-b-2 text-2xl text-gray-600 font-bold">{{ $b->title }}</div>
                    <div class="py-2"></div>
                    <div class="bg-gray-200">
                        <img class="object-none h-48 w-full" src="{{ $b->image_path }}">
                    </div>
                    <div class="py-2"></div>  
                    <div class="py-4 text-gray-600">{{ $b->body }}</div>
                    <div class="py-2">
                        <a class="border-2 border-gray-400 px-4 py-2 rounded text-gray-500 font-bold" href="/blog/view/{{$b->id}}">
                            Read ...
                        </a>
                    </div>
                </div>
                @endforeach
                @else
                <div class="py-6"></div>
                <div class="p-6 font-bold text-xl bg-gray-100 text-center text-gray-500">
                    <h1>No post yet</h1>
                </div>
                @endif
            </div>
            <!-- end og Blogs -->
        </div>
        <!-- end of -->
    </div>
    <!-- end of Container -->
</body>
</html>
