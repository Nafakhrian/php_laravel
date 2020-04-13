@extends('layout.template')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ruangan</h1>
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
            <div class="card">
              <div class="card-header">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <form class="form-inline" method="GET" action="{{ url('/ruangan') }}">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="search">
                                <div class="input-group-append">
                                    <a class="btn btn-danger" href="{{ route('ruangan.ruangan') }}" style="color: #fff;">SHOW ALL</a>
                                </div>
                            </div>
                            <div style="position: absolute; right: 10px; ">
                                <a class="btn btn-primary" href="{{ url('/ruangan_create') }}" style="color: #fff"><i class="fas fa-plus-circle"></i>&nbsp; ADD</a>
                            </div>
                        </form>
                    </div>
                </div>

              </div><!-- /.card-header -->

              <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Jurusan</th>
                            <th scope="col">Nama Ruangan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dataRuangan as $r => $ruangan )
                            <tr>
                                <td>{{ $dataRuangan->firstItem()+$r }}</td>
                                <td>
                                    {{ $ruangan->jurusan->nama_jur }}
                                </td>
                                <td>{{ $ruangan->nama_rua }}</td>
                                <td>
                                    <a class="btn btn-info" name="btn-update" href="{{ url('/ruangan_update'. $ruangan->id_rua) }}"> <i class="fas fa-pen"></i></a>
                                    <a class="btn btn-danger" name="btn-delete" href="{{ url('/ruangan_delete'. $ruangan->id_rua) }}" onclick="return confirm('Yakin ingin menghapus data Ruangan {{ $ruangan->nama_rua}}?')"> <i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="4"><center>Data kosong</center></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <br>
                {{ $dataRuangan->links() }}
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
