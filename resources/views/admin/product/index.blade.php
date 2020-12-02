@extends('layouts.admin')

@section('title','CyberCake')

@section('content')
<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Product</li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-list"></i>
                                List Product
                            </div>
                            <div class="card-body">
                                {{-- Alert --}}
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                {{-- /.Alert --}}
                                <a href="{{ route('product.create') }}" class="btn btn-success mb-2"><i class="fas fa-cart-plus"></i> Tambah Product</a>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product</th>
                                                <th>Deskripsi</th>
                                                <th>Created At</th>
                                                <th>Status</th>
                                                <th>Image</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Product</th>
                                                <th>Deskripsi</th>
                                                <th>Created At</th>
                                                <th>Status</th>
                                                <th>Image</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @php
                                                $no=1
                                            @endphp
                                            @forelse ($product as $item)
                                            <tr>
                                                <td>
                                                    {{ $no++ }}
                                                </td>
                                                <td>
                                                    <strong>{{  $item->name }}</strong>
                                                    <br><label for="category"><span class="badge badge-info">{{ $item->category->name }}</span></label>
                                                    <br><label for="weight">Berat: <span class="badge badge-success">{{ $item->weight }} gr</span></label>
                                                    <br><label for="price">Harga: <span class="badge badge-primary">Rp. {{ number_format($item->price) }}</span></label>
                                                </td>
                                                <td>{!! $item->description !!}</td>
                                                <td>{{  $item->created_at->format('d-m-Y') }}</td>
                                                <td>{!!  $item->status_label !!}</td>
                                                <td><img src="{{ asset('storage/image/product/' . $item->image) }}" width="100px" height="100px" alt="{{ $item->name }}"></td>
                                                <td>
                                                    <form action="{{ route('product.destroy',$item->id) }}"  method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a title="Edit" href="{{ route('category.edit',$item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                        <a title="View" href="#" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                                        <button title="Delete" type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                                
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection