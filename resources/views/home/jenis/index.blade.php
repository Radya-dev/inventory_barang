@extends('layouts.master');
@section('title', 'barang');
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @if (session('succes'))
                                <div class="alert alert-info">
                                    {{ session('succes')}}
                                </div>
                            @endif
                            <h3>Halaman Data Jenis</h3>
                            <a href="/jenis/tambah" class="btn btn-primary">Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No </th>
                                            <th scope="col">Nama Jenis</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jenis as $jenis)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{ $jenis->nama_jenis}}</td>
                                                <td><a href="/jenis/{{$jenis->id}}/show" class="btn btn-warning">Edit</a>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

