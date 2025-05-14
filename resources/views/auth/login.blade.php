<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-black py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-gray-800 p-10 rounded-lg shadow-lg">
            <h2 class="text-center text-3xl font-extrabold text-white">
                Log in
            </h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-green-500" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-white" />
                    <x-text-input id="email"
                                  class="mt-1 block w-full bg-gray-700 text-white border border-gray-600"
                                  type="email"
                                  name="email"
                                  :value="old('email')"
                                  required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-white" />
                    <x-text-input id="password"
                                  class="mt-1 block w-full bg-gray-700 text-white border border-gray-600"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me"
                               type="checkbox"
                               class="rounded bg-gray-800 border-gray-600 text-red-500 shadow-sm focus:ring-red-500"
                               name="remember">
                        <span class="ms-2 text-sm text-gray-300">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-400 hover:text-red-500 underline"
                           href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button type="submit"
                            class="relative inline-block text-white font-bold py-2 px-4 transition duration-200 group">
                        Log in
                        <span class="block h-0.5 w-full bg-red-500 absolute left-0 bottom-0 scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
