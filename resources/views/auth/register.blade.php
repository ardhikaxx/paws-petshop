<x-guest-layout>
    <div class="text-center mb-3">
        <h2 class="text-3xl font-bold text-primary tracking-wide">Buat Akun Baru!</h2>
        <p class="text-gray-600">Silakan daftar untuk mengelola sistem</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-3">
        @csrf

        <!-- Name -->
        <div class="space-y-2">
            <div class="flex items-center justify-between">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <i class="fas fa-user text-gray-400"></i>
            </div>
            <div class="relative">
                <input id="name"
                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:border-primary focus:ring-primary transition duration-200"
                    type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                    placeholder="Nama Lengkap">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-user text-gray-400"></i>
                </div>
            </div>
            @error('name')
                <p class="mt-1 text-sm text-red-600 flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                </p>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="space-y-2">
            <div class="flex items-center justify-between">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <i class="fas fa-envelope text-gray-400"></i>
            </div>
            <div class="relative">
                <input id="email"
                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:border-primary focus:ring-primary transition duration-200"
                    type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                    placeholder="your@email.com">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-gray-400"></i>
                </div>
            </div>
            @error('email')
                <p class="mt-1 text-sm text-red-600 flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                </p>
            @enderror
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <i class="fas fa-lock text-gray-400"></i>
            </div>
            <div class="relative">
                <input id="password"
                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:border-primary focus:ring-primary transition duration-200"
                    type="password" name="password" required autocomplete="new-password" placeholder="••••••••">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-key text-gray-400"></i>
                </div>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <button type="button" class="text-gray-400 hover:text-gray-600 focus:outline-none"
                        onclick="togglePassword('password', this)">
                        <i class="far fa-eye"></i>
                    </button>
                </div>
            </div>
            @error('password')
                <p class="mt-1 text-sm text-red-600 flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                </p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="space-y-2">
            <div class="flex items-center justify-between">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <i class="fas fa-lock text-gray-400"></i>
            </div>
            <div class="relative">
                <input id="password_confirmation"
                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:border-primary focus:ring-primary transition duration-200"
                    type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-key text-gray-400"></i>
                </div>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <button type="button" class="text-gray-400 hover:text-gray-600 focus:outline-none"
                        onclick="togglePassword('password_confirmation', this)">
                        <i class="far fa-eye"></i>
                    </button>
                </div>
            </div>
            @error('password_confirmation')
                <p class="mt-1 text-sm text-red-600 flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                </p>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-gradient-to-r from-primary to-secondary hover:from-orange-600 hover:to-orange-500 text-white py-3 px-4 rounded-xl font-medium transition duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center">
            <i class="fas fa-user-plus mr-2"></i> Daftar
        </button>

        <div class="text-center text-sm text-gray-600">
            Sudah Punya Akun? 
            <a href="{{ route('login') }}" class="text-primary hover:text-orange-700 font-medium underline transition">Login Sekarang</a>
        </div>
    </form>

    <script>
        function togglePassword(id, btn) {
            const input = document.getElementById(id);
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</x-guest-layout>