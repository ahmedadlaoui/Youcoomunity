<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
            <i class="fas fa-user-circle text-info"></i>
            {{ __('Profile Information') }}
        </h2>
        <p class="text-sm text-gray-500 mt-1">
            {{ __("Update your account's profile information and email address.") }}
        </p>
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
                            class="absolute bottom-0 right-0 p-2 bg-secondary text-white rounded-full hover:bg-secondary/90 transition-colors shadow-md">
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
                    <i class="fas fa-user text-info mr-2"></i>
                    {{ __('Name') }}
                </label>
                <input type="text" 
                       id="name"
                       name="name"
                       value="{{ old('name', $user->name) }}"
                       required
                       autofocus
                       autocomplete="name"
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-info/20 focus:border-info">
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-envelope text-secondary mr-2"></i>
                    {{ __('Email') }}
                </label>
                <input type="email" 
                       id="email"
                       name="email"
                       value="{{ old('email', $user->email) }}"
                       required
                       autocomplete="username"
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary/20 focus:border-secondary">
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-2">
                        <p class="text-sm text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="underline text-sm text-info hover:text-info/80">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-success">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Save Button -->
            <div class="flex items-center gap-4">
                <button type="submit" 
                        class="px-6 py-2.5 bg-success text-white rounded-lg hover:bg-success/90 transition-all duration-300 flex items-center justify-center gap-2">
                    <i class="fas fa-save"></i>
                    {{ __('Save Changes') }}
                </button>

                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }"
                       x-show="show"
                       x-transition
                       x-init="setTimeout(() => show = false, 2000)"
                       class="text-sm text-success">
                        {{ __('Saved.') }}
                    </p>
                @endif
            </div>
        </form>
    </div>
</div>
