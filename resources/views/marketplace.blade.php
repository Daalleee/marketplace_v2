@extends('layouts.app')

@section('title', 'Marketplace - Barang Bekas')

@section('content')
    <div class="container">
        <!-- My Products Section (hanya untuk user yang login) -->
        @auth
            @if($myProducts && $myProducts->count() > 0)
            <div class="row mt-4 mb-5">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-primary-blue">
                            <i class="fas fa-store me-2"></i>Produk Saya
                        </h3>
                        <a href="{{ route('sell.create') }}" class="btn btn-primary-blue btn-sm">
                            <i class="fas fa-plus me-1"></i>Jual Barang Baru
                        </a>
                    </div>
                    
                    <div class="row">
                        @foreach($myProducts as $myProduct)
                        <div class="col-md-2 col-sm-4 col-6 mb-3">
                            <div class="card card-product h-100 position-relative">
                                <!-- Badge Status -->
                                @if($myProduct->status === 'sold')
                                    <span class="badge bg-danger position-absolute" style="top: 10px; right: 10px; z-index: 10;">
                                        <i class="fas fa-times-circle"></i> Terjual
                                    </span>
                                @elseif($myProduct->stock === 0)
                                    <span class="badge bg-warning position-absolute" style="top: 10px; right: 10px; z-index: 10;">
                                        <i class="fas fa-exclamation-triangle"></i> Stok Habis
                                    </span>
                                @else
                                    <span class="badge bg-success position-absolute" style="top: 10px; right: 10px; z-index: 10;">
                                        <i class="fas fa-check-circle"></i> Aktif
                                    </span>
                                @endif

                                @if ($myProduct->image)
                                    <img src="{{ Storage::url($myProduct->image) }}" 
                                        class="card-img-top" alt="{{ $myProduct->name }}" 
                                        style="height: 180px; object-fit: cover;">
                                @else
                                    <img src="https://via.placeholder.com/300x180/000090/FFFFFF?text={{ urlencode($myProduct->name) }}"
                                        class="card-img-top" alt="{{ $myProduct->name }}"
                                        style="height: 180px; object-fit: cover;">
                                @endif

                                <div class="card-body p-2">
                                    <h6 class="card-title" style="font-size: 0.9rem;">
                                        {{ Str::limit($myProduct->name, 25) }}
                                    </h6>
                                    <p class="card-text product-price" style="font-size: 0.85rem;">
                                        Rp {{ number_format($myProduct->price, 0, ',', '.') }}
                                    </p>
                                    <p class="card-text text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-box me-1"></i>Stok: {{ $myProduct->stock }}
                                    </p>
                                    
                                    <div class="d-grid gap-1 mt-2">
                                        <a href="{{ route('product.edit', $myProduct->id) }}" 
                                            class="btn btn-outline-primary btn-sm" style="font-size: 0.75rem;">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form method="POST" action="{{ route('product.destroy', $myProduct->id) }}" 
                                            class="delete-product-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm w-100" 
                                                style="font-size: 0.75rem;"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Divider -->
            <hr class="my-5">
            @endif
        @endauth

        <!-- Products Grid -->
        <div class="row mt-3">
            <div class="col-12">
                <h2 class="text-primary-blue mb-4 text-center">Produk Tersedia</h2>

                <div class="row">
                    @forelse($products as $product)
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="card card-product h-100 p-0">
                                @if ($product->image)
                                    <img src="{{ Storage::url($product->image) }}" class="card-img-top"
                                        alt="{{ $product->name }}" style="height: 280px; object-fit: cover;" loading="lazy">
                                @else
                                    <img src="https://via.placeholder.com/300x280/000090/FFFFFF?text={{ urlencode($product->name) }}"
                                        class="card-img-top" alt="{{ $product->name }}"
                                        style="height: 280px; object-fit: cover;" loading="lazy">
                                @endif

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                                    @if($product->location)
                                    <div class="mb-2">
                                        <small class="text-muted"><i class="fas fa-map-marker-alt me-1"></i>{{ $product->location }}</small>
                                    </div>
                                    @else
                                    <div class="mb-2">
                                        <small class="text-muted"><i class="fas fa-map-marker-alt me-1"></i>Lokasi tidak disebutkan</small>
                                    </div>
                                    @endif

                                    <div class="mt-auto">
                                        @auth
                                            @if (Auth::id() != $product->user_id)
                                                <div class="d-grid gap-2">
                                                    <form method="POST" action="{{ route('cart.add', $product->id) }}"
                                                        class="add-to-cart-form">
                                                        @csrf
                                                        <input type="hidden" name="quantity" value="1">
                                                        <button type="submit" class="btn btn-add-to-cart btn-sm w-100 mb-2">
                                                            <i class="fas fa-shopping-cart me-1"></i>Tambah ke Keranjang
                                                        </button>
                                                    </form>
                                                    <a href="{{ route('product.show', $product->id) }}"
                                                        class="btn btn-buy btn-sm w-100">Beli Sekarang</a>
                                                </div>
                                            @else
                                                <a href="{{ route('product.show', $product->id) }}"
                                                    class="btn btn-primary-blue btn-sm w-100">Lihat Detail</a>
                                            @endif
                                        @else
                                            <div class="d-grid gap-2">
                                                <a href="{{ route('login') }}" class="btn btn-add-to-cart btn-sm w-100 mb-2">
                                                    <i class="fas fa-shopping-cart me-1"></i>Tambah ke Keranjang
                                                </a>
                                                <a href="{{ route('login') }}" class="btn btn-buy btn-sm w-100">Beli
                                                    Sekarang</a>
                                            </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="text-center py-5">
                                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                                <h4>Produk tidak ditemukan</h4>
                                <p class="text-muted">Belum ada produk yang tersedia saat ini</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Alert messages -->
    <div id="alert-container" class="position-fixed bottom-0 end-0 p-3" style="z-index: 1000;">
        <div id="toast-alert" class="toast align-items-center text-white bg-success border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body" id="toast-message">Action completed successfully!</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script>
        // Tambahkan event listener untuk form submission
        document.addEventListener('DOMContentLoaded', function() {
            const cartForms = document.querySelectorAll('.add-to-cart-form');
            const deleteForms = document.querySelectorAll('.delete-product-form');

            cartForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const submitButton = this.querySelector('button[type="submit"]');
                    const originalText = submitButton.innerHTML;

                    // Show loading state
                    submitButton.innerHTML =
                        '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Memproses...';
                    submitButton.disabled = true;

                    // Biarkan form tetap submit secara normal untuk menampilkan pesan flash
                    // Tapi enable kembali button setelah submit
                    setTimeout(function() {
                        submitButton.innerHTML = originalText;
                        submitButton.disabled = false;
                    }, 1000); // Hanya 1 detik karena ini seharusnya cepat
                });
            });

            // Handle delete form with confirmation
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    if (!confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
                        e.preventDefault();
                        return;
                    }
                    
                    const submitButton = this.querySelector('button[type="submit"]');
                    const originalText = submitButton.innerHTML;
                    
                    // Show deleting state
                    submitButton.innerHTML = 
                        '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Menghapus...';
                    submitButton.disabled = true;
                    
                    // Form will submit normally, this is just for visual feedback
                    setTimeout(function() {
                        submitButton.innerHTML = originalText;
                        submitButton.disabled = false;
                    }, 2000);
                });
            });
        });
    </script>
@endsection
