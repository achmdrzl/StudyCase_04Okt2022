@extends('layouts.partial')

@section('content')
    <a href="{{ route('category.create') }}" class="btn btn-primary mt-5">Tambah Data</a>
    @if (session()->has('message'))
        <div class="alert alert-{{ session()->get('type') }} alert-dismissible fade show">
            {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card mt-2">
        <div class="card-body">
            <table class="table" id="table-id">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->title }}</td>
                            <td>
                                <a href="{{ route('category.edit', $item->id) }}" class="btn btn-secondary">Edit</a>

                                <form action="{{ route('category.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete this data?')">
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
@endsection
