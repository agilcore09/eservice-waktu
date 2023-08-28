@extends('admin.layouts.index')

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
            <li class="breadcrumb-item active">Teknisi</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<section class="content">
        <div class="container-fluid">
  
            <div class="row">
                <div class="col-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Teknisi</h3>
                            <div class="float-right">
                               
                                    <button class="btn btn-primary btn-sm" id="add" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i>
                                        
                                    </button>
                               
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- Button trigger modal -->


<!-- start add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Data Teknisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <form method="POST" action="{{ route('store-teknisi')}}">
            {{csrf_field()}}
      <div class="modal-body">
        
        @include('admin.teknisi.form')
                {{-- <input type="hidden" name="id"  id="idtrx"> --}}
            
 


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- END add Modal -->



                        <div class="card-body">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>Nama Teknisi</th>
                                    <th>User Name</th>
                                    <th>No Hp</th>
                                    <th>Password</th>
                                    <th>No tenant</th>
                                    

                                    <th width="50px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $no => $v)
                                    <tr>
                                    <td widtd="10px">{{++$no}}</td>
                                    <td widtd="10px">{{ $v->nama_teknisi}}</td>
                                    <td>{{ $v->username}}</td>
                                    <td>{{ $v->no_hp}}</td>
                                    <td>{{ $v->password}}</td>
                                    <td>{{ $v->no_tenan}}</td>

                                    <td width="13%">

                                     <a href="{{ route('edit_teknisi',$v->id)}}">
                                    <button class="btn btn-info btn-xs" id="add">
                                        <i class="fa fa-edit"></i>

                                </button></a> <a onclick="return confirm('anda yakin ingin menghpus {{$v->nama_teknisi}}?')" href="{{ route('delete_teknisi',$v->id)}}" class="delete-confirm">
                                    <button class="btn btn-danger btn-xs" id="add">
                                        <i class="fa fa-trash"></i>

                                    </button>
                                </a>
                                        </td>

                                    </tr>
                                    @endforeach
                                    

                                </tbody>
                            </table>


                        </div>
                     

                        <!-- /.card-body -->
                    </div>

                    <!-- /.card -->
                </div>
                <!-- /.col -->
                
            </div>
        </div>
        <!-- /.row -->
    </section>
       {{-- {{ $data->render() }} --}}
    @endsection
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script>
    
        function tes(id){
            $('#id').val(id);
            
            $('#id').val(id);

        }

        //  $('#edit').on('show.bs.modal', function (event){
          
        //  console.log("hello");
        // var button = $(event.relatedTarget)
        //   // // var id = button.data('myid')
        //   // var nama_teknisi = button.data('mynama_teknisi')
        //   // var username = button.data('myusername')
        //   // var password = button.data('mypassword')
        //   // var no_hp = button.data('myno_hp')
        //   // var no_tenan = button.data('myno_tenan')
          
          
        //   // var modal =$(this) 
        //   // // modal.find('.modal-body #idedit').val(id);
        //   // modal.find('.modal-body #nama_teknisiq').val(nama_teknisi);
        //   // modal.find('.modal-body #usernameq').val(username);
        //   // modal.find('.modal-body #passwordq').val(password);
        //   // modal.find('.modal-body #no_hpq').val(no_hp);
        //   // modal.find('.modal-body #no_tenanq').val(no_tenan);
        //  })
          
          
        

        
</script>



