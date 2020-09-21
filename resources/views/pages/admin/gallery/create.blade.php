@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Gallery</h1>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="gallery_categories_id">Kategori | </label>
                    <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kategori
                    </a>
                    <select name="gallery_categories_id" required class="form-control">
                        <option value="">Pilih Kategori</option>
                        @foreach ($gallery_categories as $gallery_category)
                        <option value="{{ $gallery_category->id }}">
                            {{ $gallery_category->category }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control" name="title" placeholder="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" placeholder="Image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan Data
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection