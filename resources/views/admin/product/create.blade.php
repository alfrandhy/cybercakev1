@extends('layouts.admin')

@section('title','CyberCake')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Product</li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-pencil-ruler"></i>
                                Tambah Product
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="small mb-1" for="name">Product Name</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name"
                                        autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="description">Product Description</label>
                                    <textarea id="description"
                                        class="form-control @error('description') is-invalid @enderror"
                                        name="description" value="{{ old('description') }}" required
                                        autocomplete="description" autofocus></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-pencil-ruler"></i>
                                Tambah Product
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="status" class="small mb-1">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="0" {{ old('status') == '0' ? 'selected':'' }}>Draft</option>
                                        <option value="1" {{ old('status') == '1' ? 'selected':'' }}>Publish</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category_id" class="small mb-1">Category</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="">Pilih salah Satu</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected':'' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="price">Harga Product</label>
                                    <input id="price" type="number"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        value="{{ old('price') }}" required autocomplete="price"
                                        autofocus>

                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="weight">Berat Product</label>
                                    <input id="weight" type="number"
                                        class="form-control @error('weight') is-invalid @enderror" name="weight"
                                        value="{{ old('weight') }}" required autocomplete="weight"
                                        autofocus>

                                    @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="image">Berat Product</label>
                                    <input id="image" type="file"
                                        class="form-control @error('image') is-invalid @enderror" name="image"
                                        value="{{ old('image') }}" required autocomplete="image"
                                        autofocus>

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">SAVE</button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection
@section('js')
<script>
    CKEDITOR.replace('description')
</script>
@endsection
