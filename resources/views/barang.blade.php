@extends('master_layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Barang</h1>
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
              
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
                  <div class="col-sm-12 col-md-6"><div class="dt-buttons btn-group flex-wrap">               
                    <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Copy</span></button> <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>CSV</span></button> 
                    <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Excel</span></button> 
                    <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button"><span>Print</span></button> <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="example1" type="button" aria-haspopup="true"><span>Column visibility</span><span class="dt-down-arrow"></span></button>
                    
                    </div> </div></div><div class="col-sm-12 col-md-6">
                      <!--buat pencarian 
                    <form action="/barang/cari" method="GET">  
                      <div  id="cari" class="dataTables_filter"><label>Search:
                      <input value="{{request('cari')}}" name="cari" type="search" class="form-control form-control-sm" placeholder="cari data" aria-controls="example1"></label>
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                    </form>  
                       /buat pencarian-->
                       <!--tombol tambah data -->
                      
                       <button data-target="#modal-default" data-toggle="modal" class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Tambah Data</span></button>
                <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary"> 
                  Tambah Data
                </button>-->
                    </div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                    
                    <table id="data-barang" class="display" style="width:100%">
                  <thead>
                  <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Status Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Harga Beli</th>
                    <th>Tanggal Beli</th>
                    <th>action</th>
                  </tr>
        </thead>
        <tbody>
                    @foreach($barang as $barang)
                    <td>{{$barang->id_barang}}</td>
                    <td>{{$barang->nama_barang}}</td>
                    <td>{{$barang->jenis_barang}}</td>
                    <td>{{$barang->status_barang}}</td>
                    <td>{{$barang->jumlah_barang}}</td>
                    <td>{{$barang->harga_beli}}</td>
                    <td>{{$barang->tanggal_beli}}</td>
                    <td>
                      <div class="btn-group">
                        
                      <button data-target="#modal-Update{{$barang->id_barang}}" data-toggle="modal" tabindex="-1" type="button" class="btn btn-info btn-flat">
                        <i class="fas fa-edit"></i>
                        </button>
                        <button> <a href="/barang/hapus/{{$barang->id_barang}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </button>
                        
                      </div>
                    </td>
                  </tr>
<!-- pop up untuk tampil edit data -->
 <div class="modal fade" id="modal-Update{{$barang->id_barang}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">EDIT DATA BARANG</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!--isi form-->
              <form action="barang/storeupdate" class="" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Barang</label>
                    <input type="text" name="id_barang" readonly value="{{ $barang->id_barang}}" class="form-control" id="exampleInputEmail1" placeholder="Masukan ID Barang">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Barang</label>
                    <input type="text" name="nama_barang" value="{{ $barang->nama_barang}}" class="form-control" id="exampleInputPassword1" placeholder="Masukan Nama Barang">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jenis Barang Bagus</label>
                    <input type="text" name="jenis_barang" value="{{ $barang->jenis_barang}}" class="form-control" id="exampleInputPassword1">  
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Status Barang</label>
                    <input type="text" name="status_barang" value="{{ $barang->status_barang}}" class="form-control" id="exampleInputPassword1" placeholder="Masukan Status Barang rusak ringan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah Barang</label>
                    <input type="number" name="jumlah_barang" value="{{ $barang->jumlah_barang}}" class="form-control" id="exampleInputPassword1" placeholder="Masukan jumlah barang rusak berat">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga Beli</label>
                    <input type="number" name="harga_beli" value="{{ $barang->harga_beli}}" class="form-control" id="exampleInputPassword1" placeholder="Masukan Harga Beli">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Beli</label>
                    <input type="date" name="tanggal_beli" value="{{ $barang->tanggal_beli}}" class="form-control" id="exampleInputPassword1" placeholder="Masukan Tanggal Beli">
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
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Status Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Harga Beli</th>
                    <th>Tanggal Beli</th>
                    <th>action</th> 
                  </tr>

<!-- pop up untuk menambah data -->
            
        <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">MASUKAN DATA BARANG</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!--isi form-->
              <form action="/barang" class="" method="post">
                @csrf
              <div class="form-group">
                    <label for="exampleInputEmail1">ID Barang</label>
                    <input type="text" name="id_barang" class="form-control" id="exampleInputEmail1" placeholder="Masukan ID Barang">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" id="exampleInputPassword1" placeholder="Masukan Nama Barang">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jenis Barang Bagus</label>
                    <select class="form-control" name="jenis_barang">
                          <option value="" hidden>--Masukan Jenis Barang bagus--</option>
                          <option value="sarana">Sarana</option>
                          <option value="prasarana">Prasarana</option>
                        </select>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Status Barang</label>
                    <input type="text" name="status_barang" class="form-control" id="exampleInputPassword1" placeholder="Masukan Status Barang rusak ringan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah Barang</label>
                    <input type="number" name="jumlah_barang" class="form-control" id="exampleInputPassword1" placeholder="Masukan jumlah barang rusak berat">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga Beli</label>
                    <input type="number" name="harga_beli" class="form-control" id="exampleInputPassword1" placeholder="Masukan Harga Beli">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Beli</label>
                    <input type="date" name="tanggal_beli" class="form-control" id="exampleInputPassword1" placeholder="Masukan Tanggal Beli">
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
