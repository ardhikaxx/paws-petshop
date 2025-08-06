<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-edit text-primary mr-2"></i> Edit Produk
            </h2>
            <a href="{{ route('dashboard') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 hover:bg-primary hover:text-white transition-all duration-200 rounded-md shadow-sm text-sm font-medium">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-1">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl">
                <div class="p-8">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900">Form Edit Produk</h3>
                        <p class="mt-1 text-sm text-gray-600">Perbarui informasi produk berikut.</p>
                    </div>

                    <form action="{{ route('products.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-4">
                            <!-- Product Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-tag text-gray-400"></i>
                                    </div>
                                    <input type="text" name="name" id="name" value="{{ $product->name }}"
                                        required
                                        class="focus:ring-primary focus:border-primary block w-full pl-10 sm:text-sm border-gray-300 rounded-md py-3">
                                </div>
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-1">
                                    <textarea id="description" name="description" rows="4" required
                                        class="shadow-sm focus:ring-primary focus:border-primary mt-1 block w-full sm:text-sm border border-gray-300 rounded-md py-3 px-4">{{ $product->description }}</textarea>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Stock -->
                                <div>
                                    <label for="stock" class="block text-sm font-medium text-gray-700">Stok <span
                                            class="text-red-500">*</span></label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-boxes text-gray-400"></i>
                                        </div>
                                        <input type="number" name="stock" id="stock" min="0"
                                            value="{{ $product->stock }}" required
                                            class="focus:ring-primary focus:border-primary block w-full pl-10 sm:text-sm border-gray-300 rounded-md py-3">
                                    </div>
                                </div>

                                <!-- Price -->
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700">Harga (Rp)
                                        <span class="text-red-500">*</span></label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-400">Rp</span>
                                        </div>
                                        <input type="number" name="price" id="price" min="0"
                                            value="{{ $product->price }}" required
                                            class="focus:ring-primary focus:border-primary block w-full pl-12 sm:text-sm border-gray-300 rounded-md py-3">
                                    </div>
                                </div>
                            </div>

                            <!-- Image -->
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700">Gambar
                                    Produk</label>

                                @if ($product->image)
                                    <div class="mt-1 flex items-center">
                                        <div class="mt-2 mb-4 text-center">
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                alt="{{ $product->name }}" class="h-32 rounded-md shadow-sm">
                                            <p class="text-xs text-gray-500 mt-1"><i class="fas fa-exclamation-circle mr-1"></i>Gambar saat ini</p>
                                        </div>
                                        <div id="image-preview" class="mt-2 hidden mb-4 text-center">
                                            <img id="preview-image" class="h-32 rounded-md shadow-sm">
                                            <p class="text-xs text-gray-500 mt-1">Pratinjau gambar baru</p>
                                        </div>
                                    </div>
                                @endif

                                <div class="mt-1 flex items-center">
                                    <div class="relative w-full">
                                        <input type="file" name="image" id="image" accept="image/*"
                                            class="opacity-0 absolute inset-0 w-full h-full cursor-pointer">
                                        <div
                                            class="flex flex-col items-center justify-center py-8 border-2 border-dashed border-gray-300 rounded-md bg-gray-50 hover:border-primary transition-smooth">
                                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                            <p class="text-sm text-gray-600">Klik untuk mengubah gambar</p>
                                            <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG (Maks. 2MB)</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end pt-6 space-x-4">
                                <a href="{{ route('dashboard') }}"
                                    class="inline-flex items-center px-6 py-3 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-smooth">
                                    <i class="fas fa-times mr-2"></i> Batal
                                </a>
                                <button type="submit"
                                    class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-accent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-smooth btn-glow">
                                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Image preview
        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                const preview = document.getElementById('preview-image');
                const previewContainer = document.getElementById('image-preview');

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }

                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>
