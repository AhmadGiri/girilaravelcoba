@extends('layout.app')

@section('title', 'Product List')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-semibold mb-1">Products</h3>
        <p class="text-secondary small mb-0">
            Manage your thrift product inventory
        </p>
    </div>
    <a href="{{ route('produk.create') }}"
       class="btn btn-dark rounded-pill px-4">
        <i class="bi bi-plus-lg"></i>
        Add Product
    </a>
</div>
@if(session('success'))
    <div class="alert alert-success border-0 rounded-3">
        {{ session('success') }}
    </div>
@endif
<div class="card border-0 shadow-sm rounded-4">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="border-bottom">
                <tr class="text-secondary small text-uppercase">
                    <th class="ps-4 py-3 fw-semibold">Product</th>
                    <th class="py-3 fw-semibold text-end">Price</th>
                    <th class="py-3 fw-semibold text-center">Stock</th>
                    <th class="pe-4 py-3 fw-semibold text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($semuaProduk as $p)
                <tr>
                    <td class="ps-4 py-3">
                        <div class="fw-semibold text-dark">
                            {{ $p->nama_barang }}
                        </div>
                    </td>
                    <td class="text-end fw-semibold py-3">
                        Rp {{ number_format($p->harga, 0, ',', '.') }}
                    </td>
                    <td class="text-center py-3">
                        @if($p->stok <= 5)
                            <span class="badge text-bg-danger px-3">
                                {{ $p->stok }} Left
                            </span>
                        @else
                            <span class="badge text-bg-light border text-dark px-3">
                                {{ $p->stok }}
                            </span>
                        @endif
                    </td>
                    <td class="text-center pe-4 py-3">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('produk.edit', $p->id) }}" class="btn btn-light border btn-sm rounded-circle">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('produk.destroy', $p->id) }}" method="POST" class="m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-light border btn-sm rounded-circle" onclick="return confirm('Delete this product?')">
                                    <i class="bi bi-trash text-danger"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-5 text-secondary">
                        <i class="bi bi-box fs-1 d-block mb-3"></i>
                        No products available
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection