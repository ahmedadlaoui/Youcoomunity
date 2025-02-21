<x-guest-layout>
    <div class="h-90vh flex items-center justify-center p-4">
    <div class="max-w-md w-full space-y-8">
            <!-- Logo -->
            <div class="flex items-center justify-center space-x-2">
                <div class="bg-gradient-to-r from-[#7C3AED] to-[#EC4899] p-2 rounded-md">
                    <i class="fas fa-star text-white"></i>
                </div>
                <span class="font-bold text-xl bg-gradient-to-r from-[#7C3AED] to-[#EC4899] bg-clip-text text-transparent">
                    Youcommunity
                </span>
            </div>

            <!-- Header -->
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900">Welcome back</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="font-medium text-[#7C3AED] hover:text-[#EC4899] transition-colors">
                        Sign up for free
                    </a>
                </p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}"
                           required 
                           class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-[#7C3AED]/20 focus:border-[#7C3AED] transition-colors">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           required 
                           class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-[#7C3AED]/20 focus:border-[#7C3AED] transition-colors">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" 
                               id="remember_me" 
                               name="remember" 
                               class="h-4 w-4 text-[#7C3AED] focus:ring-[#7C3AED] border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" 
                           class="text-sm font-medium text-[#7C3AED] hover:text-[#EC4899] transition-colors">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <button type="submit" 
                        class="w-full py-2.5 px-4 bg-gradient-to-r from-[#7C3AED] to-[#EC4899] text-white rounded-md hover:shadow-md hover:scale-[1.02] transition-all duration-200 font-medium">
                    Sign in
                </button>
            </form>

            <!-- Divider -->
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">Or continue with</span>
                </div>
            </div>

            <!-- Social Sign In -->
            <button class="w-full flex items-center justify-center gap-2 px-4 py-2.5 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors duration-200">
                <img src="https://www.google.com/favicon.ico" alt="Google" class="w-5 h-5">
                <span class="text-sm font-medium text-gray-700">Sign in with Google</span>
            </button>
        </div>
    </div>
</x-guest-layout>