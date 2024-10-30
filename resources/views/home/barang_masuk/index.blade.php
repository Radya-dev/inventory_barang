@extends('layouts.master')
@section('title', 'barang_masuk')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if(session('success'))
                        <div class="alert alert-info">
                            {{ session ('success')}}
                        </div>
                        @endif
                        <h3>Halaman Data Barang Masuk</h3>
                        <a class="btn btn-primary" href="/barang_masuk/tambah">Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Nama Supplier</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang_masuk as $barang_masuk)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $barang_masuk->Barang->nama_barang }}</td>
                                        <td>{{ $barang_masuk->Supplier->nama_supplier }}</td>
                                        <td>{{ $barang_masuk->jumlah }}</td>
                                        <td><a class="btn btn-info" target="_blank" href="/barang_masuk/struk/{{ $barang_masuk->id }}">Detail</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
