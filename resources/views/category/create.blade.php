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
                    <span class="input-group-text" id="basic-addon1">Parent</span>
                    <select type="text" class="form-control" name="category_id" id="parent"
                        placeholder="Name Category">
                        <option value="">-- Choose Parent --</option>
                        {{-- @foreach ($categories as $id => $categoryName)
                            <option value="{{ $id }}">{{ $categoryName }}
                            </option>
                        @endforeach --}}
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-primary" style="margin-right:10px;">Submit</button>
            </form>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">Cancel</a>
        </div>
    </div>
    </div>
@endsection
