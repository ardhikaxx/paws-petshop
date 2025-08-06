<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#F2662B',
                            secondary: '#FB9529',
                            accent: '#FF7E33',
                        },
                        animation: {
                            'float': 'float 6s ease-in-out infinite',
                            'fade-in': 'fadeIn 0.5s ease-in',
                        },
                    }
                }
            }
        </script>
        <style>
            @font-face {
                font-family: 'Super Malibu';
                src: url('/assets/font/Super-Malibu.ttf') format('truetype');
                font-weight: normal;
                font-style: normal;
            }

            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

            h2 {
                font-family: 'Super Malibu';
            }

            .bg-pattern {
                background-image: radial-gradient(circle at 10% 20%, rgba(251, 149, 41, 0.1) 0%, rgba(251, 149, 41, 0.05) 90%);
            }

            .btn-glow:hover {
                box-shadow: 0 0 15px rgba(251, 149, 41, 0.7);
            }
        </style>
    </head>
    <body class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-primary to-secondary bg-pattern">
        <div class="w-full sm:max-w-md px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex justify-center mb-8">
                <img src="{{ asset('assets/img/logo-orange.png') }}" alt="Logo Paws" class="h-32">
            </div>
            {{ $slot }}
        </div>
    </body>
</html>