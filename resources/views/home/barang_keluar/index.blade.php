@extends('layouts.master')
@section('title', 'barang_keluar')
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
                        @elseif (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error')}}
                            </div>
                        @endif
                        <h3>Halaman Data Barang Keluar</h3>
                        <a class="btn btn-primary" href="/barang_keluar/tambah">Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Nama Customer</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang_keluar as $barang_keluar)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $barang_keluar->Barang->nama_barang }}</td>
                                        <td>{{ $barang_keluar->nama_customer }}</td>
                                        <td>{{ $barang_keluar->jumlah }}</td>
                                        <td><a class="btn btn-info" target="_blank" href="/barang_keluar/struk/{{ $barang_keluar->id }}">Detail</a></td>
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
