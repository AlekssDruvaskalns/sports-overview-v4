<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-black py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-gray-800 p-10 rounded-lg shadow-lg">
            <h2 class="text-center text-3xl font-extrabold text-white">
                Register
            </h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-white" />
                    <x-text-input id="name" class="mt-1 block w-full bg-gray-700 text-white border border-gray-600"
                        type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
                </div>

                <!-- Username -->
                <div class="mt-4">
                    <x-input-label for="username" :value="__('Username')" class="text-white" />
                    <x-text-input id="username" class="mt-1 block w-full bg-gray-700 text-white border border-gray-600"
                        type="text" name="username" :value="old('username')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2 text-red-500" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="text-white" />
                    <x-text-input id="email" class="mt-1 block w-full bg-gray-700 text-white border border-gray-600"
                        type="email" name="email" :value="old('email')" required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-white" />
                    <x-text-input id="password" class="mt-1 block w-full bg-gray-700 text-white border border-gray-600"
                        type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-white" />
                    <x-text-input id="password_confirmation"
                        class="mt-1 block w-full bg-gray-700 text-white border border-gray-600"
                        type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
                </div>

                <div class="flex items-center justify-between mt-6">
                    <a class="text-sm text-gray-400 hover:text-red-500 underline"
                        href="{{ route('login') }}">
                        Already registered?
                    </a>

                    <button type="submit"
                        class="relative inline-block text-white font-bold py-2 px-4 transition duration-200 group">
                        Register
                        <span class="block h-0.5 w-full bg-red-500 absolute left-0 bottom-0 scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
