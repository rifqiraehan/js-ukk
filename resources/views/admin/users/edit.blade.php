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

                        {{-- <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="role_id" class="block font-medium text-sm text-gray-700">Tambahkan Sebagai:</label>
                            <select name="role_id" id="role_id" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                @foreach($roles as $role)
                                    @if ($role->id != 1)
                                        <option value="{{ $role->id }}" {{ $role->id == $selectedRoleId ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('role_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div> --}}


                        {{-- For Siswa --}}
                        @if ($user->role_id == 4)
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="kelas" class="block font-medium text-sm text-gray-700">Kelas:</label>
                                <select name="kelas" id="kelas" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                    @foreach($classes as $kelas)
                                        <option value="{{ $kelas }}" {{ $kelas == $selectedKelas ? 'selected' : '' }}>{{ $kelas }}</option>
                                    @endforeach
                                </select>
                                @error('kelas')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="jurusan" class="block font-medium text-sm text-gray-700">Jurusan</label>
                                <input type="text" name="jurusan" id="jurusan" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('jurusan', $user->jurusan) }}" />
                                @error('jurusan')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-3 bg-white sm:p-6"></div>
                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            </div>
                        @endif

                        {{-- Penjual --}}
                        @if ($user->role_id == 2)
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="lokasi" class="block font-medium text-sm text-gray-700">Lokasi Kantin:</label>
                                <select name="lokasi" id="lokasi" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                    @foreach($locates as $lokasi)
                                        <option value="{{ $lokasi }}" {{ $lokasi == $selectedLokasi ? 'selected' : '' }}>{{ $lokasi }}</option>
                                    @endforeach
                                </select>
                                @error('lokasi')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- <div class="px-4 py-5 bg-white sm:p-6">
                            </div> --}}

                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            </div>
                        @endif

                        @if ($user->role_id == 3)
                            <div class="px-4 py-5 bg-white sm:p-6"></div>
                            <div class="px-4 py-5 bg-white sm:p-6"></div>

                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                        @endif

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