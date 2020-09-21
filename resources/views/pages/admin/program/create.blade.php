@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Donasi</h1>
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
            <form action="{{ route('program.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="categories_id">Kategori | </label>
                    <a href="{{ route('categoryprogram.create') }}" class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kategori
                    </a>
                    <select name="categories_id" required class="form-control">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->category_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" placeholder="Image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="brief_explanation">Kalimat Ajakan</label>
                    <input type="text" class="form-control" name="brief_explanation" placeholder="Ajakan" value="{{ old('brief_explanation') }}">
                </div>
                <div class="form-group">
                    <label for="donation_target">Target Donasi (Rp)</label>
                    <input type="number" class="form-control" name="donation_target" placeholder="Target Donasi" value="{{ old('donation_target') }}">
                </div>

                <div class="form-group">
                    <label for="time_is_up">Tanggal Tutup Donasi</label>
                    <input type="date" class="form-control" name="time_is_up" placeholder="Tanggal" value="{{ old('time_is_up') }}">
                </div>

                <!-- <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <input type="textarea" class="form-control" name="description" placeholder="deskripsi" value="{{ old('description') }}">
                </div> -->


                <div class="form-group">
                    <label for="" class="label">Deskripsi</label>
                    <textarea name="description" id="editor" cols="30" rows="10" class="ckeditor form-control"></textarea>
                </div>



                <br><br>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan Data
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor', options);
</script>

<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
</script>

@endpush