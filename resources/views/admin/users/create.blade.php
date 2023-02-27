<x-admin-layout pagetitle="Tambah User">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah User
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('admin.users.store') }}" x-data="{role_id: 3}">
                    @csrf
                    <div class="grid grid-cols-2 shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Nama</label>
                            <input required type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', '') }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input required type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('email', '') }}" />
                            @error('email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="username" class="block font-medium text-sm text-gray-700">Username</label>
                            <input required type="text" name="username" id="username" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('username', '') }}" />
                            @error('username')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                            <input required type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('password')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Konfirmasi Password</label>
                            <input required type="password" name="password_confirmation" id="password_confirmation" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('password_confirmation')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="role_id" class="block font-medium text-sm text-gray-700">Tambahkan Sebagai:</label>
                            <select name="role_id" id="role_id" x-model="role_id" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                <option value="3">Murid</option>
                                <option value="2">Penjual</option>
                            </select>
                            @error('role_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- Siswa --}}
                        <div class="px-4 py-5 bg-white sm:p-6" x-show="role_id == 3">
                            <label for="kelas" class="block font-medium text-sm text-gray-700">Kelas:</label>
                            <select name="kelas" id="kelas" x-model="kelas" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                <option value="X">10</option>
                                <option value="XI">11</option>
                                <option value="XII">12</option>
                                <option value="XIII">13</option>
                            </select>
                            @error('kelas')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6" x-show="role_id == 3">
                            <label for="jurusan" class="block font-medium text-sm text-gray-700">Jurusan</label>
                            <input required type="text" name="jurusan" id="jurusan" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('jurusan', '') }}" />
                            @error('jurusan')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Penjual --}}
                        <div class="px-4 py-5 bg-white sm:p-6" x-show="role_id == 2">
                            <label for="lokasi" class="block font-medium text-sm text-gray-700">Lokasi Kantin:</label>
                            <select name="lokasi" id="lokasi" x-model="lokasi" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                <option value="Kantin Utama">Kantin Utama</option>
                                <option value="Kantin Utara">Kantin Utara</option>
                            </select>
                            @error('lokasi')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6" x-show="role_id == 2">
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Buat
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>