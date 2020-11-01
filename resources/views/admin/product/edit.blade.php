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
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                                        value="{{ $product->name }}" required autocomplete="name"
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
                                        class="form-control"
                                        name="description"
                                        autocomplete="description" autofocus>
                                        {{ $product->description }}
                                    </textarea>
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
                                    <select name="status" id="status" class="form-control">
                                        <option value="0" {{ $product->status == '0' ? 'selected':'' }}>Draft</option>
                                        <option value="1" {{ $product->status == '1' ? 'selected':'' }}>Publish</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category_id" class="small mb-1">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Pilih salah Satu</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected':'' }}>{{ $item->name }}</option>
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
                                        value="{{ $product->price }}" required autocomplete="price"
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
                                        value="{{ $product->weight }}" required autocomplete="weight"
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
                                        autocomplete="image"
                                        autofocus>
                                    <img src="{{ asset('storage/image/product/' .$product->image) }}" width="100px" height="100px" alt="Product Image" id="popimg">

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

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#popimg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image").change(function(){
        readURL(this);
    });
</script>
@endsection
