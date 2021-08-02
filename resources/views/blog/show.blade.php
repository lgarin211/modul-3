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
                @if (@isset($blog))
                <div class="py-4">
                    <div class="py-2 border-b-2 text-xl text-gray-600 font-bold">{{ $blog->title }}</div>
                    <div class="py-2"></div>
                    <div class="bg-gray-200">
                        <img class="object-scale-down h-auto w-full" src="{{ $blog->image_path }}">
                    </div>
                    <div class="py-2"></div> 
                    <div class="py-4 text-gray-600 text-xl">{{ $blog->body }}</div>
                    <div class="py-2"></div>
                </div>
                @else
                <div class="">
                    <h1>No post yet</h1>
                </div>
                @endif
            </div>
            <!-- end og Blogs -->
            <div class="py-6"></div>
            <div class="py-6">
                <a class="bg-red-300 text-white font-bold px-4 py-2" href="{{ route('blog-home') }}">{{ __('Back') }}</a>
            </div>
        </div>
        <!-- end of -->
    </div>
    <!-- end of Container -->
</body>
</html>
