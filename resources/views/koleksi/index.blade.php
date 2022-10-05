@extends('layouts.partial')

@section('content')
    <a href="{{ route('koleksi.create') }}" class="btn btn-primary mt-5">Tambah Data</a>
    @if (session()->has('message'))
        <div class="alert alert-{{ session()->get('type') }} alert-dismissible fade show">
            {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-body">
                    <table class="table" id="table-id">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Tgl Terima</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($koleksi as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ strtoupper($item->kode) }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td align='right'>Rp. {{ number_format($item->price) }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ date('d F Y', strtotime($item->date_receive)) }}</td>
                                    <td>{{ $item->category->title }}</td>
                                    <td>
                                        <a href="{{ route('koleksi.edit', $item->id) }}" class="btn btn-secondary">Edit</a>
                                        <form action="{{ route('koleksi.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Do you want to delete this data?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection