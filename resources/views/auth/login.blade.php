<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-6 p-4 bg-green-50 text-green-700 rounded-lg border border-green-200">
            {{ session('status') }}
        </div>
    @endif

    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold text-primary tracking-wide">Selamat Datang Kembali!</h2>
        <p class="text-gray-600">Silakan masuk untuk mengelola sistem</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div class="space-y-2">
            <div class="flex items-center justify-between">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <i class="fas fa-envelope text-gray-400"></i>
            </div>
            <div class="relative">
                <input id="email"
                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:border-primary focus:ring-primary transition duration-200"
                    type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                    placeholder="your@email.com">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-user-circle text-gray-400"></i>
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
                    type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
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

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember_me" type="checkbox"
                    class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary transition" name="remember">
                <label for="remember_me" class="ml-2 text-md text-gray-600">Ingat Saya</label>
            </div>

            @if (Route::has('password.request'))
                <a class="text-md text-primary font-semibold hover:text-orange-700 underline transition"
                    href="{{ route('password.request') }}">
                    Lupa Password?
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-gradient-to-r from-primary to-secondary hover:from-orange-600 hover:to-orange-500 text-white py-3 px-4 rounded-xl font-medium transition duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center">
            <i class="fas fa-sign-in-alt mr-2"></i> Masuk
        </button>

        <div class="text-center text-sm text-gray-600">
            Belum Punya Akun? 
            <a href="{{ route('register') }}" class="text-primary hover:text-orange-700 font-medium underline transition">Register Dulu</a>
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
