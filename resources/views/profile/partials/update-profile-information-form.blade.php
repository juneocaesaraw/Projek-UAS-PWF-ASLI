
<section>

    <form id="send-verification"
          method="post"
          action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post"
          action="{{ route('profile.update') }}">

        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">

            {{-- Name --}}
            <div>
                <label for="name"
                       class="block text-sm font-semibold text-slate-700 mb-2">
                    Full Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    required
                    autofocus
                    autocomplete="name"
                    class="w-full h-11 px-3 border border-slate-300
                           rounded-lg text-sm text-slate-700
                           focus:outline-none focus:ring-2
                           focus:ring-blue-500 focus:border-blue-500
                           transition"
                >

                @error('name')
                    <p class="text-sm text-red-600 mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            {{-- Email --}}
            <div>
                <label for="email"
                       class="block text-sm font-semibold text-slate-700 mb-2">
                    Email / Username
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    required
                    autocomplete="username"
                    class="w-full h-11 px-3 border border-slate-300
                           rounded-lg text-sm text-slate-700
                           focus:outline-none focus:ring-2
                           focus:ring-blue-500 focus:border-blue-500
                           transition"
                >

                @error('email')
                    <p class="text-sm text-red-600 mt-2">
                        {{ $message }}
                    </p>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail
                    && ! $user->hasVerifiedEmail())

                    <div class="mt-2">
                        <p class="text-xs text-amber-600">
                            Email belum diverifikasi.

                            <button form="send-verification"
                                    class="underline text-blue-600">
                                Kirim ulang verifikasi
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="text-xs text-green-600 mt-2">
                                Link verifikasi berhasil dikirim.
                            </p>
                        @endif
                    </div>

                @endif
            </div>

        </div>


        {{-- Update Button --}}
        <div class="mt-8 flex items-center gap-4">

            <button type="submit"
                    class="px-7 py-3 bg-slate-800 text-white
                           text-xs font-bold tracking-wide
                           rounded-lg hover:bg-slate-900
                           transition duration-200 shadow-sm">

                UPDATE INFO

            </button>

            @if (session('status') === 'profile-updated')
                <span class="text-sm text-green-600 font-medium">
                    Profil berhasil diperbarui.
                </span>
            @endif

        </div>

    </form>

</section>
