
  @extends('admin.layouts.index')

{{-- @push('cssScript')
    @include('layouts.css-form')
@endpush --}}

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Teknisi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Edit Teknisi</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">

                    <!-- Horizontal Form -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit</h3>
                        </div>
                    <form id="myForm" class="form-horizontal" method="post" action="{{route ('update_teknisi',$data->id)}}"
                              enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                            {{-- <input type="hidden" name="id" value=""> --}}
 <div class="form-group">
    <label for="nama">Nama Teknisi</label>
    <input type="Text" class="form-control" name="nama_teknisi"  placeholder="Masukkan Nama Teknisi" required value="{{ isset($data->nama_teknisi) ? $data->nama_teknisi : null  }}">
  </div>
   <div class="form-group">
    <label for="username">Username</label>
    <input type="Text" class="form-control" name="username"  placeholder="Masukkan Username Teknisi" required value="{{ isset($data->username) ? $data->username : null  }}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password"  placeholder="Masukkan Password" required value="{{ isset($data->password) ? $data->password : null  }}">
  </div>
    <div class="form-group">
    <label for="nohp">No Hp</label>
    <input type="Text" class="form-control" name="no_hp"  placeholder="Masukkan No HP" required value="{{ isset($data->no_hp) ? $data->no_hp : null  }}">
  </div>
   <div class="form-group">
    <label for="notenan">No Tenan </label>
    <input type="Text" class="form-control" name="no_tenan"  placeholder="Masukka No Tenan" required value="{{ isset($data->no_tenan) ? $data->no_tenan : null  }}">
  </div>
  
                         

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Update</button>
                                <a href="{{route('admin')}}" class="btn btn-danger float-right"
                                   style="margin-right: 10px">Cancel</a>
                            </div>

                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


{{-- @push('jsScript')
    @include('layouts.js.js-form')
@endpush --}}
