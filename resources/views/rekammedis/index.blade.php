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
          <h1 class="m-0 text-dark">Rekam Medis</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/rekammedis">Rekam Medis</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<!-- /.content-header -->

@if(Auth::user()->id_role == 2)
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">    
        <div class="row">
          <div class="col-md-12">
          <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Pemeriksaan hari Ini</h3>
</div>       
                <div class="card-body">
                    <table class='table table-hover'>
                        <tr>
                            <th>Waktu Reservasi</th>
                            <th>Tanggal Reservasi</th>
                            <th>Nama Pasien</th>
                            <th>Nama Layanan</th>
                            <th>Rekam Medis</th>
                            
                        </tr>
                        @foreach($disetujui as $reservasi)
                        <tr>
                            <td>{{$reservasi->waktu_reservasi->waktu_mulai}}</td>
                            <td>{{$reservasi->tanggal_reservasi}}</td>
                            <td>{{$reservasi->pasien->user->nama_user}}</td>
                            <td>{{$reservasi->waktu_reservasi->layanan->nama_layanan}}</td>
                            <td>
                            <button type="submit" class="btn btn-primary btn-sm " onclick="showModal('{{$reservasi->id_reservasi}}','{{$reservasi->pasien->user->nama_user}}', '{{$reservasi->pasien->user->id_users}}')">Tambah Rekam Medis</button>
                           
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
@endif

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">    
        <div class="row">
        
          <div class="col-md-12">
          <div class="card"> 
          <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
               
      
              </nav>
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Data Rekam Medis</h3>
</div>
                <div class="card-body">
                <table class="display" id="tbpasien">
  <thead>
    <tr>
      <th scope="col">No Rekam Medis</th>
      <th scope="col">Nama</th>
      <th scope="col">Umur</th>
      <th scope="col">Nomor Telepon</th>
      <th scope="col">Alamat</th>
      <th scope="col">Alergi Obat</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($data_pasien as $pasien)
  <tr>
                            <td>{{$pasien->no_rekammedis}}</td>
                            <td><a href="/rekammedis/{{$pasien->id_pasien}}/rekampribadi">{{$pasien->user->nama_user}}</td>
                            <td>{{$pasien->umur}}</td>
                            <td>{{$pasien->nomor_telp}}</td>
                            <td>{{$pasien->alamat}}</td>
                            <td>{{$pasien->note}}</td>
                           
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



       



 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Rekam Medis</h5>
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
                            <input name="id_reservasi" type="text" class="form-control" id="id_reservasi"  readonly >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamaBelakang1">ID Pemeriksaan</label>
                            <input name="id_pemeriksaan" type="text" class="form-control"  value="<?php echo "INV".Rand(10,10000) ?>" readonly >
                        </div>
                        <div class="form-group">
                            <label >Nama </label>
                            <input name="nama_user" type="text" class="form-control" id="nama_user"   readonly >
                        </div>
                        <div class="form-group">
                            <label @error('keluhan')
                            class="text-danger"
                            @enderror>Anamnesa @error('Keluhan')
                            | {{$message}}
                            @enderror</label>
                            <input name="keluhan" type="text" class="form-control" id="keluhan" placeholder="Anamnesa" >
                        </div>
                        <div class="form-group">
                            <label @error('tekanan_darah')
                            class="text-danger"
                            @enderror>Tekanan Darah @error('detail_penyakit')
                            | {{$message}}
                            @enderror</label>
                            <input name="tekanan_darah" type="text" class="form-control" id="tekanan_darah" placeholder="Tekanan Darah" >
                        </div>
                        <div class="form-group">
                            <label @error('id_penyakit')
                            class="text-danger"
                            @enderror>Diagnosa @error('id_penyakit')
                            | {{$message}}
                            @enderror</label>
                            @foreach($data_penyakit as $penyakit)
                            <br>
                            <div class="form-check form-check-inline">
                            <input name="id_penyakit[]" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$penyakit->id_penyakit}}">
                            <label class="form-check-label" for="inlineCheckbox1">{{$penyakit->nama_penyakit}}</label>
                          </div>
                         @endforeach
                        </div>

                        <div class="form-group">
                            <label @error('id_obat')
                            class="text-danger"
                            @enderror>Obat @error('id_obat')
                            | {{$message}}
                            @enderror</label>
                            
                         @foreach($db_obat as $obat)
                            <br>
                            <div class="form-check form-check-inline">
                            <input name="id_obat[]" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="{{$obat->id_obat}}">
                            <label class="form-check-label" for="inlineCheckbox2">{{$obat->nama_obat}}</label>
                          </div>
                         @endforeach
                        </div>
                        <div class="form-group">
                            <label @error('jumlah_obat')
                            class="text-danger"
                            @enderror>Jumlah @error('jumlah_obat')
                            | {{$message}}
                            @enderror</label>
                            <input name="jumlah_obat" type="text" class="form-control" id="jumlah_obat" placeholder="Jumlah" >
                        </div>
                        <div class="form-group">
                            <label @error('petunjuk')
                            class="text-danger"
                            @enderror>Petunjuk @error('petunjuk')
                            | {{$message}}
                            @enderror</label>
                            <input name="petunjuk" type="text" class="form-control" id="petunjuk" placeholder="Petunjuk Obat" >
                        </div>
                        <div class="form-group">
                            <label @error('id_layanan_tambahan')
                            class="text-danger"
                            @enderror>Layanan Tambahan @error('id_layanan_tambahan')
                            | {{$message}}
                            @enderror</label>
                                 
                         @foreach($db_layanan as $layanan)
                            <br>
                            <div class="form-check form-check-inline">
                            <input name="id_layanan_tambahan[]" class="form-check-input" type="checkbox" id="inlineCheckbox3" value="{{$layanan->id_layanan_tambahan}}">
                            <label class="form-check-label" for="inlineCheckbox3">{{$layanan->nama_layanan_tambahan}}</label>
                          </div>
                         @endforeach

                        </div>
                        <div class="form-group">
                            <label @error('nilai')
                            class="text-danger"
                            @enderror>Nilai Layanan Tambahan @error('nilai')
                            | {{$message}}
                            @enderror</label>
                            <input name="nilai" type="text" class="form-control" id="nilai" placeholder="Nilai" >
                        </div>
                        <div class="form-group">
                            <label>Tambahan</label>
                            <input name="tambahan" type="text" class="form-control" id="tambahan" placeholder="tambahan" >
                        </div>
                        <div class="form-group">
                            <label @error('total_biaya')
                            class="text-danger"
                            @enderror>Total Biaya @error('total_biaya')
                            | {{$message}}
                            @enderror</label>
                            <input name="total_biaya" type="number" class="form-control" id="total_biaya" placeholder="Total Biaya" >
                        </div>
                        <div class="form-group">
                            <label @error('status')
                            class="text-danger"
                            @enderror>status @error('status')
                            | {{$message}}
                            @enderror</label>
                            <select name="status" class="form-control" placeholder="status" >
                                <option selected disabled readonly>-Status-</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Lanjutan">Lanjutan</option>
                                <option value="Rujukan">Rujukan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label @error('tanggal_pemeriksaan')
                            class="text-danger"
                            @enderror>Tanggal Pemeriksaan @error('tanggal_pemeriksaan')
                            | {{$message}}
                            @enderror</label>
                            <input name="tanggal_pemeriksaan" type="date" class="form-control" id="tanggal_pemeriksaan" placeholder="Tanggal Pemeriksaan" >
                        </div>
                       
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                            </form>
</div>
        </div>
    </div>

@stop           

@section('mscript')

<script>
  function showModal(idData, namaData, id_pasien){
    $('#actionModal').attr('action','/rekammedis/'+id_pasien+'/create');
    $('#id_reservasi').val(idData);
    $('#nama_user').val(namaData);
    $('#exampleModal').modal('show')
  }
  $(document).ready(function() {
    $('#tbpasien').DataTable();
} );
</script>

@endsection