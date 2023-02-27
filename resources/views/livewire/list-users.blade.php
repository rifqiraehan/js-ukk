<div>
    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mb-4 flex justify-between items-center lg:px-0 px-6 mb-3 align-middle">
            <div class="flex-1 pr-4">
                <a href="{{ route('admin.users.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded whitespace-nowrap">Tambah User</a>
            </div>
            {{-- <button id="generate-pdf" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Print</button> --}}

            <!-- Filter By Role -->
            <div class="hidden md:block relative text-gray-700 focus-within:text-gray-600 m-2">
                <select wire:model="roleFilter" id="roleFilter" class="py-2 px-4 text-sm text-gray bg-gray-100 rounded-md focus:outline-none focus:bg-gray-200 focus:text-gray-700">
                    <option value="">All</option>
                    <option value="Penjual">Penjual</option>
                    <option value="Murid">Murid</option>
                </select>
            </div>

            <div>
                <!-- Searching -->
                <div class="relative text-gray-700 focus-within:text-gray-600">
                    <div class="relative md:w-1/3">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </span>

                        <input wire:model="search" type="search"
                        class="py-2 text-sm text-gray
                        bg-gray-100 rounded-md pl-10 focus:outline-none
                        focus:bg-gray-200 focus:text-gray-700 lg:w-auto search"
                        placeholder="{{ __('Search...') }}"
                        autocomplete="off">
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 w-full whitespace-nowrap">
                            <thead>
                            <tr>
                                <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Username
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Roles
                                </th>
                                <th scope="col" width="200" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $loop->iteration + $users->firstItem() - 1 }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $user->name }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $user->email }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $user->username }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        @if ($user->role->name == 'Administrator')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                {{ $user->role->name }}
                                            </span>
                                        @endif
                                        @if ($user->role->name == 'Murid')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            {{ $user->role->name }}
                                        </span>
                                        @endif
                                        @if ($user->role->name == 'Penjual')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $user->role->name }}
                                        </span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Detail</a>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                        <form class="inline-block" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin menghapus user tersebut?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Hapus">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="py-4 mx-6">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
