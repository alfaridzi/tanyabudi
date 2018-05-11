@extends('admin.layout.app')
@section('title', 'Data Karyawan')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Data Karyawan
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-user"></i> Karyawan</a></li>
	    <li class="active">Data Karyawan</li>
	  </ol>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
		            <div class="box-header">
		            	@if(Session::has('success'))
		            	<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  	<strong>{{ Session::get('success') }}</strong>
						</div>
		            	@endif
		            	@can('tambah karyawan')
		            	<a href="{{ url('index/admin/karyawan/tambah') }}" class="btn btn-primary btn-flat">Tambah Karyawan</a>
		            	@endcan
		            </div>
		            <div class="box-body">
						<table class="table table-responsive">
							<thead>
								<tr>
									<th>No</th>
									<th>NIK</th>
									<th>Nama</th>
									<th>Kode Divisi</th>
									<th>Kode Jabatan</th>
									<th>No HP</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($karyawan as $dataKaryawan)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $dataKaryawan->nik }}</td>
									<td>{{ $dataKaryawan->nama }}</td>
									<td>{{ $dataKaryawan->kode_divisi }}</td>
									<td>{{ $dataKaryawan->kode_jabatan }}</td>
									<td>{{ $dataKaryawan->no_hp }}</td>
									<td>{{ $dataKaryawan->status == 0 ? 'Tidak Aktif' : 'Aktif' }}</td>
									<td>
										@can('edit karyawan')
										<a href="{{ url('index/admin/karyawan/edit', $dataKaryawan->id_karyawan) }}" class="btn btn-warning btn-flat">Edit</a> 
										@endcan
										@can('delete karyawan')
										<a href="javascript:;" id="btn-delete-karyawan" class="btn btn-danger btn-flat" data-id-karyawan="{{ $dataKaryawan->id_karyawan }}">Delete</a> 
										@endcan
										<a href="javascript:;" id="btn-detail-karyawan" data-id-karyawan="{{ $dataKaryawan->id_karyawan }}" class="btn btn-info btn-flat">Detail</a>
										@if(is_null($dataKaryawan->id_admin))
										@can('tambah admin')
										<a href="{{ url('index/admin/user/'.$dataKaryawan->id_karyawan.'/tambah') }}" class="btn btn-success btn-flat">Buat User</a>
										@endif
										@endcan
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="pull-right">
							{!! $karyawan->links() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-detail-karyawan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail Karyawan</h4>
      </div>
      <div class="modal-body">
        <ol>
        	<li>Nama: <span id="mdl-nama"></span></li>
        	<li>NIK: <span id="mdl-nik"></span></li>
        	<li>Jenis Kelamin: <span id="mdl-jenis_kelamin"></span></li>
        	<li>Divisi: <span id="mdl-kode_divisi"></span>, <span id="mdl-nama_divisi"></span></li>
        	<li>Jabatan: <span id="mdl-kode_jabatan"></span>, <span id="mdl-nama_jabatan"></span></li>
        	<li>Nomor HP: <span id="mdl-no_hp"></span></li>
        	<li>Nomor Telepon Rumah: <span id="mdl-no_telp_rumah"></span></li>
        	<li>Tempat Tanggal Lahir: <span id="mdl-tempat_lahir"></span>, <span id="mdl-tanggal_lahir"></span></li>
        	<li>Tanggal Bergabung: <span id="mdl-tanggal_bergabung"></span></li>
        	<li>Email: <span id="mdl-email"></span></li>
        	<br>
        	<li>Provinsi: <span id="mdl-nama_provinsi"></span></li>
        	<li>Kabupaten/Kota: <span id="mdl-nama_kota"></span></li>
        	<li>Kecamatan: <span id="mdl-nama_kecamatan"></span></li>
        	<li>Desa/Kelurahan: <span id="mdl-nama_kelurahan"></span></li>
        	<li>Alamat: <span id="mdl-alamat"></span></li>
        	<li>Kode POS: <span id="mdl-kode_pos"></span></li>
        </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<form id="frm-delete-karyawan" action="" method="post">
	@csrf
	{!! method_field('delete') !!}
</form>
@endsection
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#btn-delete-karyawan', function(e){
            e.preventDefault();
            var jawaban = confirm('Apakah anda yakin ingin menghapus data ini?');

            if (jawaban) {
                var id_karyawan = $(this).data('id-karyawan');
                $('#frm-delete-karyawan').attr('action', '{{ url('index/admin/karyawan/delete') }}/'+id_karyawan);
                $('#frm-delete-karyawan').submit();
            }
        });

        $(document).on('click', '#btn-detail-karyawan', function(){
        	$('#modal-detail-karyawan').modal('show');
        	var link = "{{ url('/') }}";
			var id_karyawan = $(this).data('id-karyawan');
			var link = link + '/index/admin/ajax/detail_karyawan/'+id_karyawan;
			$.ajax({
				url: link,
				method: 'GET',
				data: '',
				success: function(data) {
					var hasil = data.options;
					$.each( hasil, function(key, value) {
						if (key == 'jenis_kelamin') {
							if (value == '0') {
								value = 'Perempuan';
							} else {
								value = 'Laki-Laki';
							}
						}
						$('span#mdl-'+key).text(value);
						console.log(key);
					});
				}
		    });
        });
	});
</script>
@endpush