<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paws - Premium Petshop & Grooming</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-20px)'
                            },
                        },
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            },
                        }
                    }
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

        h1 {
            font-family: 'Super Malibu';
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .grooming-card {
            transition: all 0.3s ease;
        }

        .grooming-card:hover {
            transform: scale(1.03);
        }

        .btn-glow:hover {
            box-shadow: 0 0 15px rgba(251, 149, 41, 0.7);
        }

        .hero-pattern {
            background-image: radial-gradient(circle at 10% 20%, rgba(251, 149, 41, 0.1) 0%, rgba(251, 149, 41, 0.05) 90%);
        }

        /* Modal styles */
        .modal {
            transition: opacity 0.3s ease;
        }

        .modal-overlay {
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body class="font-sans bg-gray-50">
    <!-- Ini Hero Section -->
    <section id="home"
        class="h-screen flex flex-col items-center justify-center bg-gradient-to-br from-primary to-secondary hero-pattern">
        <div class="container mx-auto px-4 flex flex-col-reverse md:flex-row items-center justify-center">
            <div class="md:w-1/2 mb-12 md:mb-0 animation-fade-in text-center md:text-left">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-3 tracking-wide">
                    Solusi Lengkap untuk Hewan Peliharaan
                </h1>
                <p class="text-white text-lg md:text-xl mb-4 opacity-90 max-w-lg mx-auto md:mx-0">
                    Temukan produk berkualitas dan layanan grooming mewah khusus untuk teman berbulu kesayangan Anda.
                </p>
                <div
                    class="flex flex-col sm:flex-row justify-center md:justify-start space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('login') }}"
                        class="bg-white text-primary px-8 py-4 rounded-full font-medium hover:bg-gray-100 transition btn-glow flex items-center justify-center text-lg">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login Sekarang
                    </a>
                    <a href="{{ route('register') }}"
                        class="border-2 border-white text-white px-8 py-4 rounded-full font-medium hover:bg-white hover:text-primary transition flex items-center justify-center text-lg">
                        <i class="fas fa-user-plus mr-2"></i> Buat Akun
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center items-center relative animate-fade-in mt-12 md:mt-0">
                <div class="relative animate-float transition-transform hover:scale-105">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Paws" class="max-w-full h-auto">
                </div>
            </div>
        </div>
    </section>
</body>

</html>
