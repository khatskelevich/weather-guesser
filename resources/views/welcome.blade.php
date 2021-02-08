<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased h-screen">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="h-screen grid grid-cols-1 md:grid-cols-2 flex justify-items-center items-center">
                <div>
                    <h1 class="text-center text-3xl">Weather Guesser</h1>
                    <p class="text-center">Welcome to Weather Guesser game!<br>The rules are simple: choose the hottest place.</p>
                </div>
                <div>
                    <a href="/login" class="border border-blue-500 bg-blue-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline">
                        Sign in
                    </a>
                    <a href="/register" class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                        Sign up
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
