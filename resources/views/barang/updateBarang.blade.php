@extends('layout.template')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Barang</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <!-- Main row -->
        <div class="row">

          <section class="col-lg-12 ">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Update Data</h3>

              </div><!-- /.card-header -->

              <div class="card-body">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    Upload Validation Error
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="post" action="{{ url('/barang_update_store/' . $dataBarang->id_bar) }}" autocomplete="off" enctype="multipart/form-data">
                @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="id_bar" id="id_bar" placeholder="Masukan Nama Barang" value="{{ $dataBarang->id_bar }}" hidden>
                        </div>
                        <div class="form-group">
                            <label>Nama Ruangan</label>
                            <select class="form-control" id="id_rua" name="id_rua">
                                <option value="" hidden> -- Pilih Ruangan -- </option>
                                @foreach($dataRuangan as $rua)
                                    <option value="{{ $rua->id_rua }}" {{ ($dataBarang->id_rua == $rua->id_rua) ? 'selected' : ''}} >{{ $rua->jurusan->nama_jur .' - '. $rua->nama_rua }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" name="nama_bar" id="nama_bar" placeholder="Masukan Nama Barang" value="{{ $dataBarang->nama_bar }}" required>
                        </div>
                        <div class="form-group">
                            <label>Total Barang</label>
                            <input type="number" class="form-control" name="total_bar" id="total_bar" placeholder="Masukan Jumlah Barang" value="{{ $dataBarang->total_bar }}" required>
                        </div>
                        <div class="form-group">
                            <label>Barang Rusak</label>
                            <input type="number" class="form-control" name="rusak_bar" id="rusak_bar" placeholder="Masukan Jumlah Barang Rusak" value="{{ $dataBarang->rusak_bar }}" required>
                        </div>
                        <div class="form-group">
                            <label>Foto</label><br>
                            <img src="{{ url('img/'.$dataBarang->foto) }}" alt="{{ $dataBarang->foto }}" width="300px" class="figure-img img-fluid rounded"/>
                            <figcaption class="figure-caption">{{ $dataBarang->foto }}</figcaption><br>
                            <input type="file" name="foto" accept=".jpg, .png, .jpeg">
                        </div><br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="created_by" id="created_by" value="{{ $dataBarang->created_by }}" hidden>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="updated_by" id="updated_by" value="{{ auth()->user()->id }}" hidden>
                        </div>
                        <button type="submit" id="button1" class="btn btn-primary"><i class="fas fa-plus-circle"></i> INSERT</button>
                    </div>

                </form>




              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>


        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@stop
