@extends('layouts.partial')

@section('content')
    <div class="card mt-2">
        <div class="card-body">
            <h4>Tambah Data</h4>
            <form action="{{ route('koleksi.store') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Nama Koleksi</span>
                    <input type="text" class="form-control" placeholder="Nama Koleksi" name="name"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Choose Category</span>
                    <select class="js-example-basic-single form-control" type="text" name="category_id" id="parent"
                        placeholder="Name Category">
                        @foreach ($data as $categories)
                            <optgroup label="{{ $categories->title }}">
                                @foreach ($categories->children as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Harga</span>
                    <input type="number" class="form-control" placeholder="Rp. 15.000.000" name="price"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Quantity</span>
                    <input type="number" class="form-control" placeholder="3" name="qty"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Tanggal di Terima</span>
                    <input type="date" class="form-control" placeholder="Nama Kategori" name="date_receive"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-primary" style="margin-right:10px;">Submit</button>
            </form>
            <a href="{{ route('collection.index') }}" class="btn btn-primary">Cancel</a>
        </div>
    </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
