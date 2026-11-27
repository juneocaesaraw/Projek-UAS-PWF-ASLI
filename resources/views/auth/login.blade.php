
<x-guest-layout>

    {{-- Bagian header untuk menampilkan judul dan deskripsi halaman login --}}
    <div class="mb-8 text-center">
        <div class="mt-6">
            <h2 class="text-xl font-bold text-slate-900">
                Welcome Back
            </h2>

            <p class="text-sm text-slate-500 mt-2">
                Please sign in to your account to continue.
            </p>
        </div>
    </div>

    {{-- Menampilkan pesan status dari session, misalnya notifikasi setelah proses tertentu --}}
    <x-auth-session-status
        class="mb-4"
        :status="session('status')"
    />

    {{-- Form login yang mengirimkan data menggunakan metode POST ke route login --}}
    <form method="POST" action="{{ route('login') }}">
        {{-- Token CSRF untuk melindungi form dari Cross-Site Request Forgery --}}
        @csrf

        {{-- Bagian input email untuk memasukkan alamat email pengguna --}}
        <div>
            <x-input-label
                for="email"
                :value="__('Email Address')"
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
                placeholder="Enter your email address"
            />

            {{-- Menampilkan pesan kesalahan jika input email tidak valid --}}
            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />
        </div>

        {{-- Bagian input password untuk memasukkan kata sandi akun --}}
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
                placeholder="Enter your password"
            />

            {{-- Menampilkan pesan kesalahan jika input password tidak valid --}}
            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />
        </div>

        {{-- Opsi Remember Me untuk mengingat sesi login pengguna --}}
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
                    {{ __('Remember Me') }}
                </span>
            </label>
        </div>

        {{-- Tombol untuk mengirimkan email dan password ke proses autentikasi --}}
        <div class="mt-6">
            <x-primary-button
                class="w-full justify-center rounded-lg bg-blue-600
                       py-3 text-sm font-semibold text-white
                       hover:bg-blue-700 focus:bg-blue-700
                       active:bg-blue-800"
            >
                {{ __('Sign In') }}
            </x-primary-button>
        </div>

        {{-- Menampilkan tautan pemulihan password jika fitur tersebut tersedia --}}
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
                    {{ __('Forgot Password?') }}
                </a>
            </div>
        @endif

    </form>

</x-guest-layout>
