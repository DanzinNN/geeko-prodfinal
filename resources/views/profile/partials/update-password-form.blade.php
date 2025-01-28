<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="current_password" class="block text-sm font-medium text-gray-300 mb-2 font-poppins">{{ __('Current Password') }}</label>
            <input type="password" id="current_password" name="current_password"
                class="p-2 w-full rounded-xl border-2 border-rosa bg-transparent text-white font-poppins placeholder:font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200"
                autocomplete="current-password">
            @error('current_password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="update_password_password" class="block text-sm font-medium text-gray-300 mb-2 font-poppins">{{ __('New Password') }}</label>
            <input type="password" id="update_password_password" name="password"
                class="p-2 w-full rounded-xl border-2 border-rosa bg-transparent text-white font-poppins placeholder:font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200"
                autocomplete="new-password">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-300 mb-2 font-poppins">{{ __('Confirm Password') }}</label>
            <input type="password" id="update_password_password_confirmation" name="password_confirmation"
                class="p-2 w-full rounded-xl border-2 border-rosa bg-transparent text-white font-poppins placeholder:font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200"
                autocomplete="new-password">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                class="px-4 py-2 bg-rosa text-white rounded-xl font-poppins hover:bg-rosa/80 transition duration-200 focus:outline-none focus:ring-2 focus:ring-rosa focus:ring-offset-2">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
