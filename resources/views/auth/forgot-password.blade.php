<x-guest-layout>
    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            {{ __('Forgot your password?') }}
        </h1>

        <div class="text-sm font-light text-gray-500 dark:text-gray-400">
            {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4 md:space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                              required autofocus/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
