<x-admin-layout pagetitle="Daftar User">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kategori') }}
        </h2>
    </x-slot>


    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mb-8 flex justify-between items-center lg:px-0 px-6 mb-3 align-middle">
            <div class="flex-1 pr-4">
                <a href="{{ route('admin.categories.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded whitespace-nowrap">Tambah
                    Kategori</a>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 w-full whitespace-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col" width="50"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        #
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama
                                    </th>
                                    <th scope="col" width="200"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $category->name }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                            <form class="inline-block"
                                                action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah anda yakin ingin menghapus kategori tersebut?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2"
                                                    value="Hapus">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="py-4 mx-6">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-admin-layout>
