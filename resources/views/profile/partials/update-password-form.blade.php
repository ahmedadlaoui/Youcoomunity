<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
            <i class="fas fa-shield-alt text-warning"></i>
            {{ __('Update Password') }}
        </h2>
        <p class="text-sm text-gray-500 mt-1">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </div>
    
    <div class="p-6">
        <form method="post" action="{{ route('password.update') }}" class="space-y-6">
            @csrf
            @method('put')

            <!-- Current Password -->
            <div>
                <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-lock text-rose mr-2"></i>
                    {{ __('Current Password') }}
                </label>
                <input type="password" 
                       id="current_password"
                       name="current_password"
                       autocomplete="current-password"
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-rose/20 focus:border-rose">
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <!-- New Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-key text-warning mr-2"></i>
                    {{ __('New Password') }}
                </label>
                <input type="password" 
                       id="password"
                       name="password"
                       autocomplete="new-password"
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-warning/20 focus:border-warning">
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-check-circle text-success mr-2"></i>
                    {{ __('Confirm Password') }}
                </label>
                <input type="password" 
                       id="password_confirmation"
                       name="password_confirmation"
                       autocomplete="new-password"
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-success/20 focus:border-success">
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Update Button -->
            <div class="flex items-center gap-4">
                <button type="submit" 
                        class="px-6 py-2.5 bg-warning text-white rounded-lg hover:bg-warning/90 transition-all duration-300 flex items-center justify-center gap-2">
                    <i class="fas fa-shield-alt"></i>
                    {{ __('Update Password') }}
                </button>

                @if (session('status') === 'password-updated')
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
