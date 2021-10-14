<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main id="app">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

<script>
    function confirmDelete(e){
        myform = document.getElementById('form');
        //form이 서버로 전달되는 것을 막아준다.
        flag = confirm('정말 삭제하시겠습니까?');

        if (flag){
            myform.submit();
        }
    }

    function deleteImage(id){
        editForm = document.getElementById('editForm');
        // editForm.delete('_method');
        editForm._method.value = 'delete';
        editForm.action = '/posts/images/'+id;
        editForm.submit();
        return false;
    }

</script>
