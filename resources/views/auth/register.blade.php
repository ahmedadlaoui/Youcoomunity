<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - EventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#7C3AED',    // Purple
                        secondary: '#EC4899',   // Pink
                        accent: '#F472B6'       // Light Pink
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-white via-purple-50 to-pink-50">
    <div class="min-h-screen flex items-center justify-center p-4">
        <!-- Sign Up Container -->
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-2xl shadow-lg">
            <!-- Logo -->
            <div class="flex items-center justify-center space-x-2">
                <div class="bg-gradient-to-r from-primary to-secondary p-2 rounded-md">
                    <i class="fas fa-sparkles text-lg text-white"></i>
                </div>
                <span class="font-bold text-xl bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
                    Youcommunity
                </span>
            </div>

            <!-- Header -->
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900">Create your account</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="font-medium text-primary hover:text-secondary transition-colors">
                        Sign in
                    </a>
                </p>
            </div>

            <!-- Sign Up Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name" :value="old('name')" required autofocus autocomplete="name" 
                           class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                           placeholder="Your name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input type="email" id="email" name="email" :value="old('email')" required autocomplete="username" 
                           class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                           placeholder="you@example.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required autocomplete="new-password" 
                           class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                           placeholder="••••••••">
                    <p class="mt-1 text-xs text-gray-500">Must be at least 8 characters long</p>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" 
                           class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                           placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Sign Up Button -->
                <button type="submit" 
                        class="w-full py-2.5 px-4 bg-gradient-to-r from-primary to-secondary text-white rounded-md hover:shadow-md hover:scale-[1.02] transition-all duration-200 font-medium">
                    Create Account
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

            <!-- Social Sign Up -->
            <button class="w-full flex items-center justify-center gap-2 px-4 py-2.5 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors duration-200">
                <img src="https://www.google.com/favicon.ico" alt="Google" class="w-5 h-5">
                <span class="text-sm font-medium text-gray-700">Sign up with Google</span>
            </button>
        </div>
    </div>
</body>
</html>