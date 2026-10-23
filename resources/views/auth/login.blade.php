<x-guest-layout>

    <div class="mb-8 text-center">
        <div class="mt-6">
            <h2 class="text-xl font-bold text-slate-900">
                Selamat Datang
            </h2>

            <p class="text-sm text-slate-500 mt-2">
                Silakan masuk ke akun kamu untuk melanjutkan.
            </p>
        </div>
    </div>

    <!-- Session Status -->
    <x-auth-session-status
        class="mb-4"
        :status="session('status')"
    />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label
                for="email"
                :value="__('Email')"
                class="text-sm font-medium text-slate-700"
            />

            <x-text-input
                id="email"
                class="block mt-2 w-full rounded-lg border-slate-300
                       shadow-sm focus:border-blue-500 focus:ring-blue-500"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                placeholder="Masukkan email kamu"
            />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />
        </div>

        <!-- Password -->
        <div class="mt-5">
            <x-input-label
                for="password"
                :value="__('Password')"
                class="text-sm font-medium text-slate-700"
            />

            <x-text-input
                id="password"
                class="block mt-2 w-full rounded-lg border-slate-300
                       shadow-sm focus:border-blue-500 focus:ring-blue-500"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Masukkan password kamu"
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />
        </div>

        <!-- Remember Me -->
        <div class="block mt-5">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-slate-300 text-blue-600
                           shadow-sm focus:ring-blue-500"
                    name="remember"
                >

                <span class="ms-2 text-sm text-slate-600">
                    {{ __('Remember me') }}
                </span>
            </label>
        </div>

        <!-- Actions -->
        <div class="mt-6">
            <x-primary-button
                class="w-full justify-center rounded-lg bg-blue-600
                       py-3 text-sm font-semibold text-white
                       hover:bg-blue-700 focus:bg-blue-700
                       active:bg-blue-800"
            >
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Forgot Password -->
        @if (Route::has('password.request'))
            <div class="mt-5 text-center">
                <a
                    class="text-sm font-medium text-blue-600
                           hover:text-blue-800 hover:underline
                           focus:outline-none focus:ring-2
                           focus:ring-blue-500 focus:ring-offset-2
                           rounded"
                    href="{{ route('password.request') }}"
                >
                    {{ __('Forgot your password?') }}
                </a>
            </div>
        @endif

    </form>

</x-guest-layout>
