@extends('admin.layout')

@section('header')

	@if( !checkrights('PUV', auth()->user()->permissions) )
		<script type="text/javascript">
			window.location="/admin/users";
	  	</script>
	@endif

	<section class="content-header">
    <h1>ROLE:<small>{{ $role->name }}</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i> Home</a></li>
	  <li><a href="{{ route('admin.roles.index') }}"><i class="fa fa-legal"></i>List Roles</a></li>
	  <li><i class='fa fa-eye'></i> Role Perfil</li>
	   {{--  Update user fa-refresh --}}
    </ol>
  </section>
@stop

@section('content')
	<div class="row">
		<div class="col-md-4">
			<!-- Profile Image -->
          	<div class="box box-primary">
				<div class="box-body box-profile">
					<h3 class="profile-username text-center">{{ $role->name }}</h3>
					<ul class="list-group list-group-unbordered">
						<li class="list-group-item">
							<b>Creation date</b> <a class="pull-right">{{ $role->created_at->format('M d, Y, G:i:s') }}</a>
						</li>
					</ul>
					@if( checkrights('PRE', auth()->user()->permissions) )
						<a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-primary btn-block">
							<b>Edit</b>
						</a><br>
					@endif
				</div>
          	</div>
		</div>

		<div class="col-md-8">

			<div class="box box-primary">
		    	<div class="box-body">
					<div class="active tab-pane" id="activity">
					  <!-- Post -->
					  <div class="post">
						<div class="user-block">
							<span class="username" style="margin-left: 8px;">
								<a >Permissions</a>
							</span>

							<span class="description" style="margin-left: 8px;">
								Date updated - {{ $role->updated_at->format('M d, Y, G:i:s') }}
							</span>
						</div>

						<p>
							<div class="row">
								<div class="col-md-3">
								  <div class="box box-solid">
									<div class="box-header with-border">
									  Permissions Users
									</div>
									<!-- /.box-header -->
									<div class="box-body">
										<p>
											{!! checkrights('PUV', $role->permissions) ? '<i class="fa fa-check margin-r-5"></i>'
											 : '<i class="fa fa-times margin-r-5"></i>' !!} View User<br>

											{!! checkrights('PUE', $role->permissions) ? '<i class="fa fa-check margin-r-5"></i>'
											 : '<i class="fa fa-times margin-r-5"></i>' !!} Edit User<br>

											{!! checkrights('PUD', $role->permissions) ? '<i class="fa fa-check margin-r-5"></i>'
											 : '<i class="fa fa-times margin-r-5">' !!}</i> Delete User<br>
										</p>

										{{--  <input type="checkbox" name="encargado" class="minimal flat-red" disabled value="1" checked>
										&nbsp;<i class="fa fa-street-view margin-r-5"></i>View User &nbsp;<br>  --}}

									</div>
								  </div>
								</div>

								<div class="col-md-3">
									<div class="box box-solid">
									  <div class="box-header with-border">
                                          Permissions Roles
									  </div>
									  <!-- /.box-header -->
									  <div class="box-body">
                                          <p>
                                              {!! checkrights('PRV', $role->permissions) ? '<i class="fa fa-check margin-r-5"></i>'
                                               : '<i class="fa fa-times margin-r-5"></i>' !!} View Role<br>

                                              {!! checkrights('PRE', $role->permissions) ? '<i class="fa fa-check margin-r-5"></i>'
                                               : '<i class="fa fa-times margin-r-5"></i>' !!} Edit Role<br>

                                              {!! checkrights('PRD', $role->permissions) ? '<i class="fa fa-check margin-r-5"></i>'
                                               : '<i class="fa fa-times margin-r-5">' !!}</i> Delete Role<br>
                                          </p>
									  </div>
									</div>
								  </div>

								<div class="col-md-3">
								  <div class="box box-solid">
									<div class="box-header with-border">
                                        Permissions ???
									</div>
									<!-- /.box-header -->
									<div class="box-body">
										<p>
										  	<i class="fa fa-check margin-r-5"></i>View User<br>
										  	<i class="fa fa-times margin-r-5"></i>Edit User<br>
											<i class="fa fa-times margin-r-5"></i>Delete User <br>
										</p>
									</div>
								  </div>
								</div>

								<div class="col-md-3">
									<div class="box box-solid">
									  <div class="box-header with-border">
                                          Permissions ???
									  </div>
									  <!-- /.box-header -->
									  <div class="box-body">
										  <p>
												<i class="fa fa-check margin-r-5"></i>View User<br>
												<i class="fa fa-times margin-r-5"></i>Edit User<br>
											  	<i class="fa fa-times margin-r-5"></i>Delete User <br>
										  </p>
									  </div>
									</div>
								  </div>
							</div>
						</p>
						 <!--<ul class="list-inline">
						 <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
						  <li><a href="#" class="link-black text-sm"><i class="far fa-thumbs-up"></i> Like</a>
						  </li>
						  <li class="pull-right">
							<a href="#" class="link-black text-sm"><i class="far fa-comments"></i> Comments
							  (0)</a></li>
						</ul>-->
					  </div>
					</div>

					<!-- /.tab-pane -->
				  </div>
				  <!-- /.tab-content -->
				</div>
				<!-- /.nav-tabs-custom -->
		</div>
	</div>
@stop

@push('styles')
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="/adminlte/plugins/iCheck/all.css">
@endpush

@push('script')
	<!-- iCheck 1.0.1 -->
	<script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
	<!-- CK Editor -->
	<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

	<script>
		//iCheck for checkbox and radio inputs
		$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
			checkboxClass: 'icheckbox_minimal-blue',
			radioClass: 'iradio_minimal-blue'
		  });
	</script>
@endpush
