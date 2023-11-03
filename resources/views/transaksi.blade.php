@extends('master_layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Transaksi</h1>
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
              </div>
              <!-- /.card-header -->
              <<div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
                  <div class="col-sm-12 col-md-6"><div class="dt-buttons btn-group flex-wrap">               
                    <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Copy</span></button> <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>CSV</span></button> 
                    <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Excel</span></button> 
                    <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button"><span>Print</span></button> <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="example1" type="button" aria-haspopup="true"><span>Column visibility</span><span class="dt-down-arrow"></span></button>
                    
                    </div> </div></div><div class="col-sm-12 col-md-6">
                           <!--buat pencarian -->
                    <!--<form action="/transaksi/cari" method="GET">  
                      <div  id="cari" class="dataTables_filter"><label>Search:
                      <input value="{{request('cari')}}" name="cari" type="search" class="form-control form-control-sm" placeholder="cari data" aria-controls="example1"></label>
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                    </form>  -->
                      <!-- /buat pencarian-->      
                       <!--tombol tambah data -->
                      
                       <button data-target="#modal-default" data-toggle="modal" class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Tambah Data</span></button>
                <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary"> 
                  Tambah Data
                </button>-->
                </div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                <table id="data-barang" class="display" style="width:100%">
                  <thead>
                  <tr>
                    <th>ID Transaksi</th>
                    <th>Tanggal Transaksi </th>
                    <th>Jenis_Transaksi</th>
                    <th>ID Barang</th>
                    <th>Jumlah</th>
                    <th>ID Karyawan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                
                  @foreach($transaksi as $transaksi)
                    <td>{{$transaksi->id_transaksi}}</td>
                    <td>{{$transaksi->tanggal_transaksi}}</td>
                    <td>{{$transaksi->jenis_transaksi}}</td>
                    <td>{{$transaksi->id_barang}}</td>
                    <td>{{$transaksi->jumlah}}</td>
                    <td>{{$transaksi->id_karyawan}}</td>
                    <td>
                      <div class="btn-group">
                        
                      <button data-target="#modal-UpdateTransaksi{{$transaksi->id_transaksi}}" data-toggle="modal" tabindex="-1" type="button" class="btn btn-info btn-flat">
                        <i class="fas fa-edit"></i>
                        </button>
                        
                        <button> <a href="/transaksi/hapus/{{$transaksi->id_transaksi}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </button>
                        
                      </div>
                    </td>

                  </tr>

 <!-- pop up untuk tampil edit data -->
 <div class="modal fade" id="modal-UpdateTransaksi{{$transaksi->id_transaksi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">EDIT DATA TRANSAKSI</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!--isi form-->
              <form action="transaksi/storeupdate" class="" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Transaksi</label>
                    <input type="text" name="id_transaksi" value="{{ $transaksi->id_transaksi}}" readonly class="form-control" id="exampleInputEmail1" placeholder="Masukan ID Transaksi">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Transaksi</label>
                    <input type="date" name="tanggal_transaksi" value="{{ $transaksi->tanggal_transaksi}}" class="form-control" id="exampleInputPassword1" placeholder="Masukan tanggal transaksi">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jenis Transaksi</label>
                    <input type="text" name="jenis_transaksi" value="{{ $transaksi->jenis_transaksi}}" class="form-control" id="exampleInputPassword1">
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">ID Barang</label>
                    <input type="text" name="id_barang" value="{{ $transaksi->id_barang}}" class="form-control" id="exampleInputPassword1" placeholder="Masukan ID Barang">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah</label>
                    <input type="number" name="jumlah" value="{{ $transaksi->jumlah}}" class="form-control" id="exampleInputPassword1" placeholder="Masukan jumlah">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">ID Karyawan</label>
                    <input type="text" name="id_karyawan" value="{{ $transaksi->id_karyawan}}" class="form-control" id="exampleInputPassword1" placeholder="Masukan ID Karyawan">
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

  
        <!-- Ini tampil form delete produk -->
        <div class="modal fade" id="Modal-Delete{{$transaksi->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Transaksi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/transaksi/hapus/{{$transaksi->id}}" method="get" class="form-floating">
                            @csrf
                            <div>
                                <h3>Yakin mau menghapus data <b>{{$transaksi->id_transaksi}}</b> ?</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID Transaksi</th>
                    <th>Tanggal Transaksi </th>
                    <th>Jenis_Transaksi</th>
                    <th>ID Barang</th>
                    <th>Jumlah</th>
                    <th>ID Karyawan</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
         
              </div>
              <!-- /.card-body -->
            </div>

                        <!-- pop up untuk menambah data -->
            
                        <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">MASUKAN DATA TRANSAKSI</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!--isi form-->
              <form action="/transaksi" class="" method="post">
                @csrf
              <div class="form-group">
                    <label for="exampleInputEmail1">ID Transaksi</label>
                    <input type="text" name="id_transaksi" class="form-control" id="exampleInputEmail1" placeholder="Masukan ID Transaksi">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Transaksi</label>
                    <input type="date" name="tanggal_transaksi" class="form-control" id="exampleInputPassword1" placeholder="Masukan tanggal transaksi">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jenis Transaksi</label>
                    <select class="form-control" name="jenis_transaksi">
                          <option value="" hidden>--Masukan Jenis Transaksi--</option>
                          <option value="baru">Baru</option>
                          <option value="pinjam">Pinjam</option>
                          <option value="servis">Servis</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">ID Barang</label>
                    <input type="text" name="id_barang" class="form-control" id="exampleInputPassword1" placeholder="Masukan ID Barang">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" id="exampleInputPassword1" placeholder="Masukan jumlah">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">ID Karyawan</label>
                    <input type="text" name="id_karyawan" class="form-control" id="exampleInputPassword1" placeholder="Masukan ID Karyawan">
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