<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('admin.users.update', $user->id) }}" x-data="{role_id: 4}">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-2 shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Nama</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', $user->name) }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('email', $user->email) }}" />
                            @error('email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="username" class="block font-medium text-sm text-gray-700">Username</label>
                            <input type="text" name="username" id="username" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('username', $user->username) }}" />
                            @error('username')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="role_id" class="block font-medium text-sm text-gray-700">Tambahkan Sebagai:</label>
                            <select name="role_id" id="role_id" x-model="role_id" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                <option value="4" {{ $user->role_id == "4" ? 'selected' : '' }}>Murid</option>
                                <option value="2" {{ $user->role_id == "2" ? 'selected' : '' }}>Penjual</option>
                                <option value="3" {{ $user->role_id == "3" ? 'selected' : '' }}>Partner</option>
                            </select>
                            @error('role_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- Siswa --}}
                        <div class="px-4 py-5 bg-white sm:p-6" x-show="role_id == 4">
                            <label for="kelas" class="block font-medium text-sm text-gray-700">Kelas:</label>
                            <select name="kelas" id="kelas" x-model="kelas" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                <option value="X" {{ $user->kelas == "X" ? 'selected' : '' }}>10</option>
                                <option value="XI" {{ $user->kelas == "XI" ? 'selected' : '' }}>11</option>
                                <option value="XII" {{ $user->kelas == "XII" ? 'selected' : '' }}>12</option>
                                <option value="XIII" {{ $user->kelas == "XIII" ? 'selected' : '' }}>13</option>
                            </select>
                            @error('kelas')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6" x-show="role_id == 4">
                            <label for="jurusan" class="block font-medium text-sm text-gray-700">Jurusan</label>
                            <input type="text" name="jurusan" id="jurusan" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('jurusan', $user->jurusan) }}" />
                            @error('jurusan')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Penjual --}}
                        <div class="px-4 py-5 bg-white sm:p-6" x-show="role_id == 2">
                            <label for="lokasi" class="block font-medium text-sm text-gray-700">Lokasi Kantin:</label>
                            <select name="lokasi" id="lokasi" x-model="lokasi" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                <option value="Lokasi A" {{ $user->lokasi == "Lokasi A" ? 'selected' : '' }}>Lokasi A</option>
                                <option value="Lokasi B"  {{ $user->lokasi == "Lokasi B" ? 'selected' : '' }}>Lokasi B</option>
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
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>