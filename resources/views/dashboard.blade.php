<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <i class="fas fa-paw text-primary mr-2"></i> Manajemen Produk Paws Petshop
            </h2>
            <a href="{{ route('products.create') }}"
                class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-accent transition btn-glow flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Produk
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-primary transition-smooth card-hover">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500">Total Produk</p>
                            <h3 class="text-2xl font-bold text-dark">{{ $products->total() }}</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded-full">
                            <i class="fas fa-box-open text-primary text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-secondary transition-smooth card-hover">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500">Stok Tersedia</p>
                            <h3 class="text-2xl font-bold text-dark">{{ $products->sum('stock') }}</h3>
                        </div>
                        <div class="bg-secondary bg-opacity-10 p-3 rounded-full">
                            <i class="fas fa-warehouse text-secondary text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-accent transition-smooth card-hover">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500">Total Nilai Stok</p>
                            <h3 class="text-2xl font-bold text-dark">Rp
                                {{ number_format($products->sum(function ($product) {return $product->price * $product->stock;}),0,',','.') }}
                            </h3>
                        </div>
                        <div class="bg-accent bg-opacity-10 p-3 rounded-full">
                            <i class="fas fa-coins text-accent text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Table -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl transition-smooth">
                @if (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 flex items-center animate-fade-in"
                        role="alert">
                        <i class="fas fa-check-circle mr-2 text-lg"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Gambar</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Produk</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Deskripsi</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Stok</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Harga</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($products as $product)
                                    <tr class="hover:bg-gray-50 transition-smooth">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                    alt="{{ $product->name }}"
                                                    class="h-12 w-12 rounded-lg object-cover shadow-sm">
                                            @else
                                                <div
                                                    class="h-12 w-12 rounded-lg bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white">
                                                    <i class="fas fa-paw text-xl"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-500 max-w-40 truncate">
                                                {{ $product->description }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $product->stock }} pcs
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex flex-col sm:flex-row items-center justify-center gap-2">
                                                <!-- Tombol Edit -->
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-700 hover:bg-blue-200 hover:text-blue-800 rounded-md shadow-sm transition">
                                                    <i class="fas fa-edit mr-2"></i> Edit
                                                </a>

                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('products.destroy', $product->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex items-center px-4 py-2 bg-red-100 text-red-700 hover:bg-red-200 hover:text-red-800 rounded-md shadow-sm transition">
                                                        <i class="fas fa-trash-alt mr-2"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-8 text-center">
                                            <div class="flex flex-col items-center justify-center text-gray-400">
                                                <i class="fas fa-box-open text-5xl mb-4"></i>
                                                <p class="text-lg">Tidak ada produk ditemukan</p>
                                                <p class="text-sm mt-2">Tambahkan produk pertama Anda!</p>
                                                <a href="{{ route('products.create') }}"
                                                    class="mt-4 bg-primary text-white px-4 py-2 rounded-lg hover:bg-accent transition btn-glow flex items-center text-sm">
                                                    <i class="fas fa-plus mr-2"></i> Tambah Produk
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if ($products->hasPages())
                        <div class="mt-6 px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                            <div class="flex-1 flex justify-between sm:hidden">
                                @if ($products->onFirstPage())
                                    <span
                                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-300 bg-white cursor-not-allowed">
                                        Sebelumnya
                                    </span>
                                @else
                                    <a href="{{ $products->previousPageUrl() }}"
                                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        Sebelumnya
                                    </a>
                                @endif

                                @if ($products->hasMorePages())
                                    <a href="{{ $products->nextPageUrl() }}"
                                        class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        Selanjutnya
                                    </a>
                                @else
                                    <span
                                        class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-300 bg-white cursor-not-allowed">
                                        Selanjutnya
                                    </span>
                                @endif
                            </div>
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-700">
                                        Menampilkan
                                        <span class="font-medium">{{ $products->firstItem() }}</span>
                                        sampai
                                        <span class="font-medium">{{ $products->lastItem() }}</span>
                                        dari
                                        <span class="font-medium">{{ $products->total() }}</span>
                                        hasil
                                    </p>
                                </div>
                                <div>
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
