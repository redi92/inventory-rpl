@extends('master_layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Karyawan</h1>
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

    <!-- Main content -->
    <div class="card">
              <div class="card-header">
             
                <h3 class="card-title">DataTable with default features</h3>
                @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
              @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
                  <div class="col-sm-12 col-md-6"><div class="dt-buttons btn-group flex-wrap">               
                    <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Copy</span></button> <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>CSV</span></button> 
                    <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Excel</span></button> 
                    <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button"><span>Print</span></button> <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="example1" type="button" aria-haspopup="true"><span>Column visibility</span><span class="dt-down-arrow"></span></button>
                    
                    </div> </div></div><div class="col-sm-12 col-md-6">
                             <!--buat pencarian --
                    <form action="/karyawan/cari" method="GET">  
                      <div  id="cari" class="dataTables_filter"><label>Search:
                      <input value="{{request('cari')}}" name="cari" type="search" class="form-control form-control-sm" placeholder="cari data" aria-controls="example1"></label>
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                    </form>  
                      /buat pencarian--> 
                      <!--cek tombol alert-->

                       <!--tombol tambah data -->
                       <button data-target="#modal-tambahdata" data-toggle="modal" class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Tambah Data</span></button>
                <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary"> 
                  Tambah Data
                </button>-->
                    </div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">

                    <table id="data-barang" class="display" style="width:100%">  
                  <!--<table id="data-batas" class="display" style="width:100%">-->
                  <thead>
                  <tr>
                    <th>ID Karyawan</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No Handphone</th>
                    <th>action</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($karyawan as $karyawan)
                    <td>{{$karyawan->id_karyawan}}</td>
                    <td>{{$karyawan->nama}}</td>
                    <td>{{$karyawan->jns_kelamin}}</td>
                    <td>{{$karyawan->alamat}}</td>
                    <td>{{$karyawan->no_hp}}</td>
                    <td>
                      <div class="btn-group">
                        
                        <button data-target="#modal-UpdateKaryawan{{$karyawan->id_karyawan}}" data-toggle="modal" tabindex="-1" type="button" class="btn btn-info btn-flat">
                        <i class="fas fa-edit"></i>
                        </button>
                        <button> <a href="/karyawan/hapus/{{$karyawan->id_karyawan}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </button>
                        
                      </div> 
                    </td>
                  </tr>
 <!-- pop up untuk tampil edit data -->
 <div class="modal fade" id="modal-UpdateKaryawan{{$karyawan->id_karyawan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">EDIT DATA KARYAWAN</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!--isi form-->
              <form action="karyawan/storeupdate" class="" method="post">
                @csrf
              <div class="form-group">
                    <label for="exampleInputEmail1">ID Karyawan</label>
                    <input type="text" name="id_karyawan" class="form-control" id="id" readonly value="{{ $karyawan->id_karyawan }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" name="nama" value="{{ $karyawan->nama }}" class="form-control" id="id">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jenis Kelamin</label>
                    <input type="text" name="jns_kelamin" value="{{ $karyawan->jns_kelamin}}" class="form-control" id="id">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat </label>
                    <input type="text" name="alamat" value="{{ $karyawan->alamat }}" class="form-control" id="id" placeholder="Masukan alamat karyawan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nomor Handphone</label>
                    <input type="number" name="no_hp" value="{{ $karyawan->no_hp }}" class="form-control" id="id" placeholder="Masukan no hp">
                  </div>
                  <div class="form-group mb-0">
                    
                  </div>
                
                <!--/isi form-->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan Update</button>
              
            </div>
          </div>
          </form>
  <!-- /pop up untuk tampil edit data -->

                  @endforeach
                  </tbody>
                  
                  <tr>
                  <th>ID Karyawan</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No Handphone</th>
                    <th>action</th>
                  </tr>
                  
              
<!-- pop up untuk menambah data -->
            
<div class="modal fade" id="modal-tambahdata">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">MASUKAN DATA KARYAWAN</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!--isi form-->
              <form action="/karyawan" class="" method="post">
                @csrf
              <div class="form-group">
                    <label for="exampleInputEmail1">ID Karyawan</label>
                    <input type="text" name="id_karyawan" class="form-control" id="exampleInputEmail1" placeholder="Masukan ID Karyawan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Masukan Nama Karyawan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jenis Kelamin</label>
                    <select class="form-control" name="jns_kelamin">
                          <option value="" hidden>--Masukan Jenis Kelamin--</option>
                          <option value="Laki-laki">Laki-Laki</option>
                          <option value="Perempuan">Perempun</option>
                          
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat </label>
                    <input type="text" name="alamat" class="form-control" id="exampleInputPassword1" placeholder="Masukan alamat karyawan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nomor Handphone</label>
                    <input type="number" name="no_hp" class="form-control" id="exampleInputPassword1" placeholder="Masukan no hp">
                  </div>
                  <div class="form-group mb-0">
                    
                  </div>
                
                <!--/isi form-->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">S i m p a n</button>
              
            </div>
          </div>
          </form>
      
<!-- /pop up untuk menambah data -->
@endsection