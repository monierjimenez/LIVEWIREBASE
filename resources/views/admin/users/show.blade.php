@extends('admin.layout')

@section('header')

	@if( !checkrights('PUV', auth()->user()->permissions) )
		<script type="text/javascript">
			window.location="/admin/users";
	  	</script>
	@endif

	<section class="content-header">
    <h1>USER:<small>{{ $user->name }}</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i> Home</a></li>
	  <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i>List Users</a></li>
	  <li><i class='fa fa-user'></i> User Perfil</li>
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
					@if ( $user->avatar != null )
						<img src="/images/{{ $user->avatar }}" class="profile-user-img img-responsive img-circle"  alt="{{ $user->name }}">
                    @else
						<img src="/images/unname.jpg" class="profile-user-img img-responsive img-circle"  alt="{{ $user->name }}">
                    @endif

					<h3 class="profile-username text-center">{{ $user->name }}</h3>
					<p class="text-muted text-center">{{ $user->cargo }}</p>
					<ul class="list-group list-group-unbordered">
						<li class="list-group-item">
							<b>E-mail</b> <a class="pull-right">{{ $user->email }}</a>
						</li>

						<li class="list-group-item">
							<b>Role</b>
							<a class="pull-right">
                                {{$user->rol->name }}
							</a>
						</li>

						<li class="list-group-item">
							<b>Creation date</b> <a class="pull-right">{{ $user->created_at->format('M d, Y, G:i:s') }}</a>
						</li>
					</ul>
					@if( checkrights('PUE', auth()->user()->permissions) )
						<a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-block">
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

							@if ( $user->avatar != null )
								<img src="/images/{{ $user->avatar }}" class="img-circle img-bordered-sm"  alt="{{ $user->name }}">
							@else
								<img src="/images/unname.jpg" class="img-circle img-bordered-sm"  alt="">
							@endif

							<span class="username">
								<a >Permissions</a>

								<!-- <a href="#" class="pull-right btn-box-tool">
									<i class="fa fa-times"></i>-->
								</a>
							</span>

							<span class="description">
								Date updated - {{ $user->updated_at->format('M d, Y, G:i:s') }}
							</span>
						</div>

						<p>
							<div class="row">
								<div class="col-md-3">
								  <div class="box box-solid">
									<div class="box-header with-border">
									  List Users
									</div>
									<!-- /.box-header -->
									<div class="box-body">
										<p>
											{!! checkrights('PUV', $user->permissions) ? '<i class="fa fa-check margin-r-5"></i>'
											 : '<i class="fa fa-times margin-r-5"></i>' !!}View User<br>

											{!! checkrights('PUE', $user->permissions) ? '<i class="fa fa-check margin-r-5"></i>'
											 : '<i class="fa fa-times margin-r-5"></i>' !!}Edit User<br>

											{!! checkrights('PUD', $user->permissions) ? '<i class="fa fa-check margin-r-5"></i>'
											 : '<i class="fa fa-times margin-r-5">' !!}</i>Delete User<br>
										</p>

										{{--  <input type="checkbox" name="encargado" class="minimal flat-red" disabled value="1" checked>
										&nbsp;<i class="fa fa-street-view margin-r-5"></i>View User &nbsp;<br>  --}}

									</div>
								  </div>
								</div>

								<div class="col-md-3">
									<div class="box box-solid">
									  <div class="box-header with-border">
										Role and Permissions
									  </div>
									  <!-- /.box-header -->
									  <div class="box-body">
                                          <p>
                                              {!! checkrights('PRV', $user->permissions) ? '<i class="fa fa-check margin-r-5"></i>'
                                               : '<i class="fa fa-times margin-r-5"></i>' !!}View Role<br>

                                              {!! checkrights('PRE', $user->permissions) ? '<i class="fa fa-check margin-r-5"></i>'
                                               : '<i class="fa fa-times margin-r-5"></i>' !!}Edit Role<br>

                                              {!! checkrights('PRD', $user->permissions) ? '<i class="fa fa-check margin-r-5"></i>'
                                               : '<i class="fa fa-times margin-r-5">' !!}</i>Delete Role<br>
                                          </p>
									  </div>
									</div>
								  </div>

								<div class="col-md-3">
								  <div class="box box-solid">
									<div class="box-header with-border">
									  <h3 class="box-title">List Users</h3>
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
										<h3 class="box-title">List Users</h3>
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
