<x-guest-layout>
    <x-jet-authentication-card class="py-18">
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" x-data="{role_id: 4}">
            @csrf

            <div class="grid grid-cols-2 gap-2">
                <div class="mt-2">
                    <x-jet-label for="name" value="{{ __('Nama') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-2">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <div class="mt-2">
                    <x-jet-label for="username" value="{{ __('Username') }}" />
                    <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                </div>

                <div class="mt-2">
                    <x-jet-label for="role_id" value="{{ __('Daftar sebagai') }}" />
                    <select name="role_id" x-model="role_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="4">Murid</option>
                        <option value="2">Penjual</option>
                        <option value="3">Partner</option>
                    </select>
                </div>

                <div class="mt-2">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-2">
                    <x-jet-label for="password_confirmation" value="{{ __('Konfirmasi Password') }}" />
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                {{-- Siswa --}}
                <div class="mt-2" x-show="role_id == 4">
                    <x-jet-label for="kelas" value="{{ __('Kelas') }}" />
                    <select name="kelas" x-model="kelas" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="X">10</option>
                        <option value="XI">11</option>
                        <option value="XII">12</option>
                        <option value="XIII">13</option>
                    </select>
                </div>

                <div class="mt-2" x-show="role_id == 4">
                    <x-jet-label for="jurusan" value="{{ __('Jurusan') }}" />
                    <x-jet-input id="jurusan" class="block mt-1 w-full" type="text" :value="old('jurusan')" name="jurusan" />
                </div>

                {{-- Penjual --}}
                <div class="mt-2" x-show="role_id == 2">
                    <x-jet-label for="lokasi" value="{{ __('Lokasi Kantin') }}" />
                    <select name="lokasi" x-model="lokasi" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="Lokasi A">Lokasi A</option>
                        <option value="Lokasi B">Lokasi B</option>
                    </select>
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-center mt-4">
                <x-jet-button>
                    {{ __('Daftar') }}
                </x-jet-button>
            </div>

            <div class="relative py-4">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-b border-gray-300"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-white px-4 text-sm text-gray-500">Atau</span>
                </div>
            </div>

            <div class="flex items-center justify-center">
                @if (Route::has('login'))
                    <p><span class="text-sm text-gray-600">Sudah punya akun <strong>Canteen Co.</strong>?</span>
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 hover:text-gray-900 underline">Masuk</a></p>
                @endif
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
