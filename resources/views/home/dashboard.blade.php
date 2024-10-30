@extends('layouts.master')
@section('tittle', 'Dashboard')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalBarang }}</h3>

                <p>Jumlah Barang</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/barang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $totalBarangMasuk }}<sup style="font-size: 20px"></sup></h3>

                <p>Jumlah Barang Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/barang_masuk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $totalBarangKeluar }}</h3>

                <p>Jumlah Barang Keluar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/barang_keluar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $totalSupplier }}</h3>

                <p>Jumlah Supplier</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/supplier" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
    </section>


    <section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>History Terakhir Data Barang Masuk</h3>
                </div>
                <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Nama Barang</th>
                      <th scope="col">Nama Supplier</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($barang_masuk as $item)
                    <tr>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->supplier->nama_supplier }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                        <td><a class="btn btn-info" target="_blank" href="/barang_masuk/struk/{{ $item->id }}">Detail</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>History Terakhir Data Barang Keluar</h3>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Nama Barang</th>
                          <th scope="col">Nama Customer</th>
                          <th scope="col">Jumlah</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($barang_keluar as $item)
                        <tr>
                            <td>{{ $item->barang->nama_barang }}</td>
                            <td>{{ $item->nama_customer }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                            <td><a class="btn btn-info" target="_blank" href="/barang_keluar/struk/{{ $item->id }}">Detail</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        </section>

  </div>

  @endsection
