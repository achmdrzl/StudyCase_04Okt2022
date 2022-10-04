@extends('layouts.partial')

@section('content')
    <div class="card mt-2">
        <div class="card-body">
            <h4>Tambah Data</h4>
            <form action="{{ route('category.store') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nama Kategori</span>
                <input type="text" class="form-control" placeholder="Nama Kategori" name="title"
                    aria-describedby="basic-addon1">
            </div> 
            <div class="input-group mb-3">
                <button class="btn btn-primary" style="margin-right:10px;">Submit</button>
            </form>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">Cancel</a>
            </div> 
        </div>
    </div>

@endsection
