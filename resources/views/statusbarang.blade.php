@extends('master_layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Status Barang</h1>
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
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
                  <div class="col-sm-12 col-md-6"><div class="dt-buttons btn-group flex-wrap">               
                    <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Copy</span></button> <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>CSV</span></button> 
                    <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Excel</span></button> 
                    <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button"><span>Print</span></button> <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="example1" type="button" aria-haspopup="true"><span>Column visibility</span><span class="dt-down-arrow"></span></button>
                    
                    </div> </div></div><div class="col-sm-12 col-md-6">
                        <!--buat pencarian -->
                    <form action="/statusbarang/cari" method="GET">  
                      <div  id="cari" class="dataTables_filter"><label>Search:
                      <input value="{{request('cari')}}" name="cari" type="search" class="form-control form-control-sm" placeholder="cari data" aria-controls="example1"></label>
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                    </form>  
                      <!-- /buat pencarian-->                      
                       <!--tombol tambah data -->
                      
                       <button data-target="#modal-default" data-toggle="modal" class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Tambah Data</span></button>
                <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary"> 
                  Tambah Data
                </button>-->
                    </div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  
                <thead>
                  <tr>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID Status</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">ID Barang</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Jumlah Bagus</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Jumlah Rusak Ringan</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Jumlah Rusak Berat</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <tr class="odd">
                  @foreach($statusbarang as $statusbarang)
                    <td>{{$statusbarang->id_status}}</td>
                    <td>{{$statusbarang->id_barang}}</td>
                    <td>{{$statusbarang->jml_bagus}}</td>
                    <td>{{$statusbarang->jml_rusak_ringan}}</td>
                    <td>{{$statusbarang->jml_rusak_berat}}</td>
                 
                    <td>
                      <div class="btn-group">
                        
                      <button data-target="#modal-Update{{$statusbarang->id_status}}" data-toggle="modal" tabindex="-1" type="button" class="btn btn-info btn-flat">
                        <i class="fas fa-edit"></i>
                        </button>
                        
                        <button> <a href="/statusbarang/hapus/{{$statusbarang->id_status}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </button>
                        
                      </div>
                    </td>
                  </tr>
                   <!-- pop up untuk tampil edit data -->
                   <div class="modal fade" id="modal-Update{{$statusbarang->id_status}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">EDIT DATA STATUS BARANG</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!--isi form-->
              <form action="statusbarang/storeupdate" class="" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Status</label>
                    <input type="text" name="id_status" readonly value="{{ $statusbarang->id_status}}" class="form-control" id="exampleInputEmail1" placeholder="Masukan ID Status">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">ID Barang</label>
                    <input type="text" name="id_barang" value="{{ $statusbarang->id_barang}}" class="form-control" id="exampleInputPassword1" placeholder="Masukan ID Barang">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah Barang Bagus</label>
                    <input type="number" name="jml_bagus" value="{{ $statusbarang->jml_bagus}}" class="form-control" id="exampleInputPassword1" placeholder="Masukan jumlah barang bagus">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah Barang Rusak Ringan</label>
                    <input type="number" name="jml_rusak_ringan" value="{{ $statusbarang->jml_rusak_ringan}}" class="form-control" id="exampleInputPassword1" placeholder="Masukan jumlah barang rusak ringan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah Barang Rusak Berat</label>
                    <input type="number" name="jml_rusak_berat" value="{{ $statusbarang->jml_rusak_berat}}" class="form-control" id="exampleInputPassword1" placeholder="Masukan jumlah barang rusak berat">
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
                  <tfoot>
                  <tr>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID Status</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">ID Barang</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Jumlah Bagus</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Jumlah Rusak Ringan</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Jumlah Rusak Berat</th>
                  </tr>
                  </tfoot>
                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
              </div>
              <!-- /.card-body -->
            </div>

            <!-- pop up untuk menambah data -->
            
            <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">MASUKAN DATA STATUS BARANG</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!--isi form-->
              <form action="/statusbarang" class="" method="post">
                @csrf

              <div class="form-group">
                    <label for="exampleInputEmail1">ID Status</label>
                    <input type="text" name="id_status" class="form-control" id="exampleInputEmail1" placeholder="Masukan ID Status">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">ID Barang</label>
                    <input type="text" name="id_barang" class="form-control" id="exampleInputPassword1" placeholder="Masukan ID Barang">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah Barang Bagus</label>
                    <input type="number" name="jml_bagus" class="form-control" id="exampleInputPassword1" placeholder="Masukan jumlah barang bagus">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah Barang Rusak Ringan</label>
                    <input type="number" name="jml_rusak_ringan" class="form-control" id="exampleInputPassword1" placeholder="Masukan jumlah barang rusak ringan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah Barang Rusak Berat</label>
                    <input type="number" name="jml_rusak_berat" class="form-control" id="exampleInputPassword1" placeholder="Masukan jumlah barang rusak berat">
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