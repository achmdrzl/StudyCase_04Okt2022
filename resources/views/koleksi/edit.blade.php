@extends('layouts.partial')


@section('content')
    <div class="card mt-2">
        <div class="card-body">
            <h4>Tambah Data</h4>
            <form action="{{ route('koleksi.update', $koleksi->id) }}" method="post">
                @csrf
                @method('put')
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Nama Koleksi</span>
                    <input type="text" class="form-control" placeholder="Nama Koleksi" name="name"
                        value="{{ $koleksi->name }}">
                </div>
                <div class="input-group mb-3">
                    <select type="text" class="form-control" name="category_id" id="parent"
                        placeholder="Name product">
                        <option value="">-- Choose Parent --</option>
                        @foreach ($categories as $id => $categoryName)
                            <option {{ $id === $koleksi->category_id ? 'selected' : null }} value="{{ $id }}">
                                {{ $categoryName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Harga</span>
                    <input type="number" class="form-control" placeholder="Rp. 15.000.000" name="price"
                        value="{{ $koleksi->price }}">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Quantity</span>
                    <input type="number" class="form-control" placeholder="3" name="qty"
                        value="{{ $koleksi->qty }}">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Tanggal di Terima</span>
                    <input type="date" class="form-control" placeholder="Nama Kategori" name="date_receive"
                        value="{{ $koleksi->date_receive }}">
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-primary" style="margin-right:10px;">Submit</button>
            </form>
            <a href="{{ route('collection.index') }}" class="btn btn-primary">Cancel</a>
        </div>
    </div>
    </div>
@endsection
