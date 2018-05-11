@extends('admin.layout.app')
@section('title', 'Data User')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Data User
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-group"></i> Data User</a></li>
	    <li class="active">Data User</li>
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
		            	<div class="pull-right">
			            	<form class="form-inline" method="get" action="{{ url('index/admin/data-user/user/search') }}">
			            		<div class="form-group">
			            			<select class="form-control" name="status">
			            				<option>--Pilih Status--</option>
			            				<option value="0">Tidak Aktif</option>
			            				<option value="1">Aktif</option>
			            			</select>
			            		</div>
			            		<div class="form-group">
			            			<input type="search" name="search" class="form-control" placeholder="Cari...">
			            		</div>
			            		<div class="form-group">
			            			<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
			            		</div>
			            	</form>
			            </div>
		            </div>
		            <div class="box-body">
						<table class="table table-responsive">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>No HP</th>
									<th>E-Mail</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($user as $dataUser)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $dataUser->name }}</td>
									<td>{{ $dataUser->nohp }}</td>
									<td>{{ $dataUser->email }}</td>
									<td>
										@if($dataUser->status == 0)
										Tidak Aktif
										@elseif($dataUser->status == 1)
										Aktif
										@endif
									</td>
									<td>
										@can('ubah status user')
										<a href="javascript:;" id="btn-ubah-status" data-id-user="{{ $dataUser->id }}" class="btn btn-warning btn-flat">Ubah Status</a>
										@endcan
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="pull-right">
							{{ $user->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<form id="frm-ubah-status" action="" method="post">
	@csrf
</form>
@endsection
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#btn-ubah-status', function(e){
            e.preventDefault();
            var jawaban = confirm('Apakah anda yakin ingin mengubah status user ini?');

            if (jawaban) {
                var id_user = $(this).data('id-user');
                $('#frm-ubah-status').attr('action', '{{ url('index/admin/data-user/user/ubah-status') }}/'+id_user);
                $('#frm-ubah-status').submit();
            }
        });
	});
</script>
@endpush