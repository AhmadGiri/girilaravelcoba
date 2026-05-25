@extends('layout.app')

@section('title', 'Edit Produk')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-dark text-white py-3 border-0">
                <h5 class="fw-bold mb-0">Edit Product: {{ $produk->nama_barang }}</h5>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('produk.update', $produk->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_barang" class="form-label small fw-bold">Product Name</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $produk->nama_barang }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label small fw-bold">Price (Rp)</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="{{ $produk->harga }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="stok" class="form-label small fw-bold">Stock</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="{{ $produk->stok }}" required>
                    </div>

                    <div class="d-flex justify-content-between pt-2">
                        <a href="{{ route('produk.index') }}" class="btn btn-light px-4 border">
                            Back
                        </a>
                        <button type="submit" class="btn btn-dark px-4">
                            Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection