@extends('layout.template')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Fakultas</h1>
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
                        <form class="form-inline" method="GET" action="{{ url('/fakultas') }}">
                            <div class="input-group input-group">
                                <span class="input-group-prepend">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </span>
                                <input type="text" class="form-control" placeholder="Search here..." name="search">
                                <span class="input-group-append">
                                  <a class="btn btn-danger" href="{{ route('fakultas.fakultas') }}" style="color: #fff">SHOW ALL</a>
                                </span>
                              </div>
                            <div style="position: absolute; right: 10px; ">
                                <a class="btn btn-success" href="#" style="color: #fff"><i class="fas fa-file-excel"></i>&nbsp; EXPORT</a>
                                <a class="btn btn-primary" href="{{ url('/fakultasCreate') }}" style="color: #fff"><i class="fas fa-plus-circle"></i>&nbsp; ADD</a>
                            </div>
                        </form>
                    </div>
                </div>

              </div><!-- /.card-header -->

              <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($dataFakultas as $fakultas)
                            <tr>
                                <td>{{ $fakultas->id_fak }}</td>
                                <td>{{ $fakultas->nama_fak }}</td>
                                <td>
                                    <a class="btn btn-info" name="btn-update" href="{{ url('/fakultasUpdate'. $fakultas->id_fak) }}"> <i class="fas fa-pen"></i></a>
                                    <a class="btn btn-danger" name="btn-delete" href="{{ url('/fakultasDelete'. $fakultas->id_fak) }}" onclick="return confirm('Yakin ingin menghapus data Fakultas {{ $fakultas->nama_fak}}?')"> <i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="3"><center>Data kosong</center></td>
                            </tr>
                        @endforelse
                    </tbody>
                  </table>
                  <br>
                  {{ $dataFakultas->links() }}
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
