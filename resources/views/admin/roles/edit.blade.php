@extends('admin.layout')

@section('header')

	@if( !checkrights('PUE', auth()->user()->permissions) )
		<script type="text/javascript">
			window.location="/admin/users";
		</script>
	@endif

	<section class="content-header">
    <h1>ROLE<small>Update Role</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i>Home</a></li>
      <li><a href="{{ route('admin.roles.index') }}"><i class="fa fa-legal"></i>List Role</a></li>
      <li><i class="fa fa-refresh"></i> Update</li>
    </ol>
  </section>
@stop

@section('content')
	<div class="row">
	<form method="POST" enctype="multipart/form-data" action="{{ route('admin.roles.update', $role) }}">
			@csrf  {{ method_field('PUT') }}
		<div class="col-md-4">
			<div class="box box-primary">
		    	<div class="box-body">
		    		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		    			<label>Name Role</label>
		    			<input name='name' placeholder="Name Role" class="form-control" value="{{ old('name', $role->name) }}">
		    			{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
		    		</div>
				</div>

	    	</div>
   		</div>

		<div class="col-md-8">
    		<div class="box box-primary">
				<p>
					<div class="row">
						<div class="col-md-3">
						  	<div class="box box-solid">
								<div class="box-header with-border">
									Permissions Users
								</div>

								<div class="box-body">
									<p>
										{!! checkrights('PUV', $role->permissions) ?
										'<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUV" checked> '
											 :
										'<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUV" > ' !!}View User<br>

										{!! checkrights('PUE', $role->permissions) ?
										'<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUE" checked> '
											 :
										'<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUE" > ' !!}Edit User<br>

										{!! checkrights('PUD', $role->permissions) ?
										'<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUD" checked> '
											 :
										'<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUD" > ' !!}Delete User
									</p>

									{{--  <input type="checkbox" name="encargado" class="minimal flat-red" disabled value="1" checked>
									&nbsp;<i class="fa fa-street-view margin-r-5"></i>View User &nbsp;<br>  --}}

								</div>
						  	</div>
						</div>

						<div class="col-md-3">
							<div class="box box-solid">
								<div class="box-header with-border">
                                    Permissions Role
								</div>

								<div class="box-body">
									<p>
                                        {!! checkrights('PRV', $role->permissions) ?
                                        '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PRV" checked> '
                                             :
                                        '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PRV" > ' !!}View Role<br>

                                        {!! checkrights('PRE', $role->permissions) ?
                                        '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PRE" checked> '
                                             :
                                        '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PRE" > ' !!}Edit Role<br>

                                        {!! checkrights('PRD', $role->permissions) ?
                                        '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PRD" checked> '
                                             :
                                        '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PRD" > ' !!}
										Delete Role
									</p>
								</div>
							</div>
						</div>

						<div class="col-md-3">
						  	<div class="box box-solid">
								<div class="box-header with-border">
                                    Permissions Record
								</div>

								<div class="box-body">
									<p>
                                        {!! checkrights('PRRV', $role->permissions) ?
                                        '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PRRV" checked> '
                                             :
                                        '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PRRV" > ' !!}View Record<br>
                                    </p>
								</div>
							</div>
						</div>

                    <div class="col-md-3">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                Permissions ???
                            </div>

                            <div class="box-body">
                                <p>
                                    <input type="checkbox" name="encargado" class="minimal flat-red" value="1" >
                                    View User<br>

                                    <input type="checkbox" name="encargado" class="minimal flat-red" value="1" >
                                    Edit User<br>

                                    <input type="checkbox" name="encargado" class="minimal flat-red" value="1" >
                                    Delete User
                                </p>
                            </div>
                        </div>
                    </div>
					</div>
				</p>


				{{--  @if ( auth()->user()->role == 103 || auth()->user()->role == 102 )  --}}
					<div class="box-body">
						<div class="form-group">
							<button type="submit" class='btn btn-primary btn-block'>Update Role</button>
						</div>
					</div>
				{{--  @endif  --}}
    		</div>
    	</div>
    </form>
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
		CKEDITOR.replace('extracto');
		//iCheck for checkbox and radio inputs
		$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
			checkboxClass: 'icheckbox_minimal-blue',
			radioClass: 'iradio_minimal-blue'
		  });
	</script>
@endpush
