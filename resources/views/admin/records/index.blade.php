@extends('admin.layout')

@section('header')
	<section class="content-header">
		<h1>RECORDS<small>Records</small></h1>
		<ol class="breadcrumb">
		<li><a href="{{ route('admin') }}"><i class="fa fa-tachometer-alt"></i> Home</a></li>
		<li class="active"><i class="fa fa-paperclip"></i> Records general</li>
		</ol>
  	</section>
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary"><br>
				<div class="col-md-12">
					<div class="nav-tabs-custom">
						<table id="post-table85" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Accion</th>
                                    <th>User</th>
									<th>Descripcion</th>
                                    <th>Date</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@push('styles')
	<link rel="stylesheet" href="/adminlte/plugins/datatables/dataTables.bootstrap.css">
@endpush

@push('script')
	<!-- DataTables -->
	<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>

	<script>
		$(function () {
			$('#post-table85').DataTable({
                "order": [[ 3, "desc" ]],
				"processing": true,
				"serverSide": true,
				"ajax": "{{ url('admin/record/generales') }}",
				"columns":[
				  {data: 'accion', name: 'accion'},
                  {data: 'user.name', name: 'user.name'},
                  {data: 'descripcion', name: 'descripcion'},
                  {
                    name: 'updated_at',
                    data: {
                        _: 'updated_at.display',
                        sort: 'updated_at.timestamp'
                        }
                  },
				]
			});
		});
	</script>
@endpush
