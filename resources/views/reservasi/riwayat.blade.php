@extends('layouts.master')
@section('content')

  

@if(session('sukses'))
<div class="alert alert-success" role="alert">
      {{session('sukses')}}
</div>
@endif

<!-- Content Header (Page header) -->  
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Riwayat Layanan Klinik</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/riwayatreservasi">Riwayat</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<!-- /.content-header -->

  <!-- Main content -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">

        <div class="row">
          <div class="col-md-12">
          <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Reservasi Belum Disetujui</h3>
</div>   
                <div class="card-body">
                    <table class='table table-hover'>
                        <tr>
                            <th>Waktu Reservasi</th>
                            <th>Tanggal Reservasi</th>
                            <th>Nama Pasien</th>
                            <th>Nama Layanan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            
                        </tr>
                        @foreach($belumdisetujui as $reservasi)
                        <tr>
                            <td>{{$reservasi->waktu_reservasi->waktu_mulai}}</td>
                            <td>{{$reservasi->tanggal_reservasi}}</td>
                            <td>{{$reservasi->pasien->user->nama_user}}</td>
                            <td>{{$reservasi->waktu_reservasi->layanan->nama_layanan}}</td>
                            <td>{{$reservasi->status}}</td>
                            <td>
                            <button type="submit" class="btn btn-warning btn-sm " onclick="showModal('{{$reservasi->id_reservasi}}')">Ubah Tanggal</button>
                            <a href="/riwayat/{{$reservasi->id_reservasi}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('anda yakin?')">Batalkan</a>
                            </td>
                            </tr>
                        @endforeach
                        </table>              
                </div>   
                
</div>   

                <div class="card-footer">
                <div class="row mb-2">
                   <div class="col-12">
                    </div>
                    
                </div>
                
                <!-- /.row -->
                </div>


                
                
                              <!-- /.card-body -->

                              <!-- /.        
                              
                              <div class="card-footer">
                                
                              </div>
                              
                              card-footer-->

  </div><!-- /.container-fluid -->
</section><!-- Main content -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">

        <div class="row">
          <div class="col-md-12">
          <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Riwayat Reservasi</h3>
</div>   
                <div class="card-body">
                <table class="display" id="tbriw">
  <thead>
                        <tr>
                            <th>Waktu Reservasi</th>
                            <th>Tanggal Reservasi</th>
                            <th>Nama Pasien</th>
                            <th>Nama Layanan</th>
                            <th>Status</th>
                          
                            
                        </tr>
                        </thead>
  <tbody>
                        @foreach($data_reservasi as $reservasi)
                        <tr>
                            <td>{{$reservasi->waktu_reservasi->waktu_mulai}}</td>
                            <td>{{$reservasi->tanggal_reservasi}}</td>
                            <td>{{$reservasi->pasien->user->nama_user}}</td>
                            <td>{{$reservasi->waktu_reservasi->layanan->nama_layanan}}</td>
                            <td>{{$reservasi->status}}</td>
                            
                            </tr>
                        @endforeach
                        </tbody>
</table>              
                </div>   
                
</div>   

                <div class="card-footer">
                <div class="row mb-2">
                   <div class="col-12">
                    </div>
                    
                </div>
                
                <!-- /.row -->
                </div>


                
                
                              <!-- /.card-body -->

                              <!-- /.        
                              
                              <div class="card-footer">
                                
                              </div>
                              
                              card-footer-->

  </div><!-- /.container-fluid -->
</section><!-- Main content -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
                    <div class="modal-body">
                    <!-- FORM -->
                    <form action="#" id="actionModal" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                            <label >ID Reservasi </label>
                            <input name="id_reservasi" type="text" class="form-control" id="id_reservasi" placeholder="ID Waktu" value="" readonly >
                        </div>
                        <div class="form-group">
                            <label @error('tanggal_reservasi')
                            class="text-danger"
                            @enderror>Tanggal Reservasi @error('tanggal_reservasi')
                            | {{$message}}
                            @enderror</label>
                            <div class="form-group">
                
                        <input name="tanggal_reservasi" type="date" class="form-control" placeholder="tanggal">
                    </div>
                       </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
  </div>
        </div>
    </div>

@stop           

      
@section('mscript')

<script>
  function showModal(idData){
    $('#actionModal').attr('action','/riwayat/'+idData+'/update');
    $('#id_reservasi').val(idData);
    $('#exampleModal').modal('show')
  }
  $(document).ready(function() {
    $('#tbriw').DataTable();
} );
</script>

@endsection
