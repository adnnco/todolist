<x-guest-layout>
    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            {{ __('Sign up to your account') }}
        </h1>

        <form method="POST" action="{{ route('register') }}" class="space-y-4 md:space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')"/>
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <div class=" mt-4">
                <a class="underline text-sm font-light text-gray-500 dark:text-gray-400" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="mt-4">{{ __('Sign up') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
