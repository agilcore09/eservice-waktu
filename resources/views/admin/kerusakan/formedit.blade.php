
  @extends('admin.layouts.index')

{{-- @push('cssScript')
    @include('layouts.css-form')
@endpush --}}

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data jasa Servis</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Edit biaya</li>
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
                    <form id="myForm" class="form-horizontal" method="post" action="{{route ('update_kerusakan',$data->id)}}"
                              enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                            {{-- <input type="hidden" name="id" value=""> --}}
 <div class="form-group">
    <label for="nama">Kerusakan</label>
    <input type="Text" class="form-control" name="kerusakan"  placeholder="Masukkan Kerusakan" value="{{$data->kerusakan}}">
  </div>
   <div class="form-group">
    <label for="username">Biaya</label>
    <input type="Text" class="form-control" name="biaya"  placeholder="Masukkan biaya kerusakan "  value="{{$data->biaya}}">
  </div>
 
                         

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Update</button>
                                <a href="{{route('kerusakan')}}" class="btn btn-danger float-right"
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
