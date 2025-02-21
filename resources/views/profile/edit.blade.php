<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Youcommunity</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#7C3AED', // Purple
                        secondary: '#EC4899', // Pink
                        accent: '#F472B6' 
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50">
    @include('dashboard/header_side')

    <!-- Main Content Area -->
    <main class="flex-1 ml-64 p-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Account Settings</h1>
            <p class="text-gray-600">Manage your profile and security preferences</p>
        </div>

        <!-- Settings Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column: Profile & Password -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Profile Card -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-gray-800">Profile Information</h2>
                        <p class="text-sm text-gray-500 mt-1">Update your personal information and profile picture</p>
                    </div>
                    
                    <div class="p-6">
                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="post" action="{{ route('profile.update') }}" class="space-y-6" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            
                            <!-- Profile Picture -->
                            <div class="flex flex-col items-center p-6 bg-purple-50 rounded-xl">
                                <div class="relative mb-4">
                                    <img id="profilePreview"
                                         src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&color=7C3AED&background=EDE9FE' }}" 
                                         alt="{{ Auth::user()->name }}" 
                                         class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg">
                                    <button type="button"
                                            onclick="document.getElementById('profilePicture').click()"
                                            class="absolute bottom-0 right-0 p-2 bg-primary text-white rounded-full hover:bg-primary/90 transition-colors shadow-md">
                                        <i class="fas fa-camera"></i>
                                    </button>
                                </div>
                                <input type="file" 
                                       id="profilePicture" 
                                       name="profile_photo"
                                       accept="image/*"
                                       class="hidden"
                                       onchange="previewImage(event)">
                            </div>

                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-user text-primary mr-2"></i>
                                    {{ __('Name') }}
                                </label>
                                <input type="text" 
                                       id="name"
                                       name="name"
                                       value="{{ old('name', $user->name) }}"
                                       required
                                       autofocus
                                       autocomplete="name"
                                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-envelope text-primary mr-2"></i>
                                    {{ __('Email') }}
                                </label>
                                <input type="email" 
                                       id="email"
                                       name="email"
                                       value="{{ old('email', $user->email) }}"
                                       required
                                       autocomplete="username"
                                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-800">
                                            {{ __('Your email address is unverified.') }}

                                            <button form="send-verification" class="underline text-sm text-primary hover:text-primary/80">
                                                {{ __('Click here to re-send the verification email.') }}
                                            </button>
                                        </p>

                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-primary">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <!-- Save Button -->
                            <div class="flex items-center gap-4">
                                <button type="submit" 
                                        class="px-6 py-2.5 bg-primary text-white rounded-lg hover:bg-primary/90 transition-all duration-300 flex items-center justify-center gap-2">
                                    <i class="fas fa-save"></i>
                                    {{ __('Save Changes') }}
                                </button>

                                @if (session('status') === 'profile-updated')
                                    <p id="profile-status" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Password Update Form -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-gray-800">Security</h2>
                        <p class="text-sm text-gray-500 mt-1">Update your password</p>
                    </div>
                    
                    <div class="p-6">
                        <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                            @csrf
                            @method('put')

                            <!-- Current Password -->
                            <div>
                                <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-lock text-primary mr-2"></i>
                                    {{ __('Current Password') }}
                                </label>
                                <input type="password" 
                                       id="current_password"
                                       name="current_password"
                                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>

                            <!-- New Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-key text-primary mr-2"></i>
                                    {{ __('New Password') }}
                                </label>
                                <input type="password" 
                                       id="password"
                                       name="password"
                                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-check-circle text-primary mr-2"></i>
                                    {{ __('Confirm Password') }}
                                </label>
                                <input type="password" 
                                       id="password_confirmation"
                                       name="password_confirmation"
                                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                            </div>

                            <!-- Save Button -->
                            <div class="flex items-center gap-4">
                                <button type="submit" 
                                        class="px-6 py-2.5 bg-primary text-white rounded-lg hover:bg-primary/90 transition-all duration-300 flex items-center justify-center gap-2">
                                    <i class="fas fa-save"></i>
                                    {{ __('Save Changes') }}
                                </button>

                                @if (session('status') === 'password-updated')
                                    <p id="password-status" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="lg:col-span-1">
                <!-- Delete Account -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-gray-800">Delete Account</h2>
                        <p class="text-sm text-gray-500 mt-1">Permanently delete your account</p>
                    </div>
                    
                    <div class="p-6">
                        <button type="button"
                                onclick="showDeleteModal()"
                                class="px-6 py-2.5 bg-primary text-white rounded-lg hover:bg-primary/90 transition-all duration-300 flex items-center justify-center gap-2">
                            <i class="fas fa-trash"></i>
                            {{ __('Delete Account') }}
                        </button>
                    </div>
                </div>

                <!-- Delete Account Modal -->
                <div id="deleteModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <div class="mt-3">
                            <h3 class="text-lg font-medium text-gray-900">
                                {{ __('Are you sure you want to delete your account?') }}
                            </h3>
                            <form method="post" action="{{ route('profile.destroy') }}" class="mt-6">
                                @csrf
                                @method('delete')

                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
                                    </p>

                                    <div class="mt-4">
                                        <input type="password"
                                               name="password"
                                               placeholder="Password"
                                               class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                    </div>
                                </div>

                                <div class="mt-4 flex justify-end gap-4">
                                    <button type="button"
                                            onclick="hideDeleteModal()"
                                            class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                                        {{ __('Cancel') }}
                                    </button>
                                    <button type="submit"
                                            class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                                        {{ __('Delete Account') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Image preview function
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profilePreview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }

        // Status message timeout
        window.onload = function() {
            const statusMessages = document.querySelectorAll('[id$="-status"]');
            statusMessages.forEach(message => {
                setTimeout(() => {
                    message.style.display = 'none';
                }, 2000);
            });
        }

        // Modal functions
        function showDeleteModal() {
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function hideDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
</body>
</html>
