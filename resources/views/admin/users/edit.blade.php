@extends('admin.layout')

@section('header')

	@if( !checkrights('PUE', auth()->user()->permissions) )
		<script type="text/javascript">
			window.location="/admin/users";
		</script>
	@endif

	<section class="content-header">
    <h1>USUARIO<small>Update User</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i>Home</a></li>
      <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i>List Users</a></li>
      <li><i class="fa fa-refresh"></i> Update</li>
    </ol>
  </section>
@stop

@section('content')
	<div class="row">
	<form method="POST" enctype="multipart/form-data" action="{{ route('admin.users.update', $user) }}">
			@csrf  {{ method_field('PUT') }}
		<div class="col-md-3">
			<div class="box box-primary">
		    	<div class="box-body">
		    		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		    			<label>Name User</label>
		    			<input name='name' placeholder="Name User" class="form-control" value="{{ old('name', $user->name) }}">
		    			{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
		    		</div>

		    		<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
		    			<label for="password">Password</label>
						<input type='password' name='password' id="password" class="form-control">
						{!! $errors->first('password', '<span class="help-block">:message</span>') !!}
		    		</div>

		    		<div class="form-group {{ $errors->has('password_confirmed') ? 'has-error' : '' }}">
		    			<label for="password_confirmed">Repeat Password</label>
						<input type='password' name='password_confirmation' id="password_confirmation" class="form-control">
						{!! $errors->first('password_confirmed', '<span class="help-block">:message</span>') !!}
		    		</div>

	    			<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
	    				<label>Phone</label>
	    				<input name='phone' maxlength="10" placeholder="User's Phone" class="form-control" value="{{ old('phone', $user->phone) }}">
	    				{!! $errors->first('phone', '<span class="help-block">:message</span>') !!}
	    			</div>
				</div>

	    	</div>
   		</div>


    	<div class="col-md-3">
    		<div class="box box-primary">
				<div class="box-body">
					<div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
						<label>Role</label>
						<select name='role' class="form-control">
                            <option value="">Select a role</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" {{ $user->role == $role->id  ? 'selected' : ''}}>{{$role->name}}</option>
                            @endforeach
						</select>
						{!! $errors->first('role', '<span class="help-block">:message</span>') !!}
					</div>

					<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
						<label>E-mail</label>
						<input name='email' placeholder="E-mail del usuario" class="form-control" value="{{ old('email', $user->email) }}">
						{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
					</div>

	    			<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
						<label>Avatar</label><br>

						@if ( $user->avatar != null )
							<img src="/images/{{ $user->avatar }}" class="profile-user-img img-responsive img-circle"  alt="{{ $user->name }}">
						@else
							<img src="/images/unname.jpg" class="profile-user-img img-responsive img-circle"  alt="{{ $user->name }}">
						@endif
						<br>
						<input type="file" name="avatar" id="avatar">
	    				{!! $errors->first('avatar', '<span class="help-block">:message</span>') !!}
	    			</div>
				</div>
    		</div>
    	</div>

		<div class="col-md-6">
    		<div class="box box-primary">
                <div class="box-body">
                    <p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        Permissions Users
                                    </div>

                                    <div class="box-body">
                                        <p>
                                            {!! checkrights('PUV', $user->permissions) ?
                                            '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUV" checked> '
                                                 :
                                            '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUV" > ' !!}View User<br>

                                            {!! checkrights('PUE', $user->permissions) ?
                                            '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUE" checked> '
                                                 :
                                            '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUE" > ' !!}Edit User<br>

                                            {!! checkrights('PUD', $user->permissions) ?
                                            '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUD" checked> '
                                                 :
                                            '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUD" > ' !!}Delete User
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        Permissions Roles
                                    </div>

                                    <div class="box-body">
                                        <p>
                                            {!! checkrights('PRV', $user->permissions) ?
                                            '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PRV" checked> '
                                                 :
                                            '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PRV" > ' !!}View Role<br>

                                            {!! checkrights('PRE', $user->permissions) ?
                                            '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PRE" checked> '
                                                 :
                                            '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PRE" > ' !!}Edit Role<br>

                                            {!! checkrights('PRD', $user->permissions) ?
                                            '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PRD" checked> '
                                                 :
                                            '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PRD" > ' !!}Delete Role
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        List Recors
                                    </div>

                                    <div class="box-body">
                                        <p>
                                            {!! checkrights('PRRV', $user->permissions) ?
                                            '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PRRV" checked> '
                                                 :
                                            '<input type="checkbox" name="permissions[]" class="minimal flat-red" value="PRRV" > ' !!}View Record<br>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        Permissions Users
                                    </div>

                                    <div class="box-body">
                                        <p>
                                            {!! checkrights('PUV', $user->permissions) ?
                                            '<input type="checkbox" name="" class="minimal flat-red" value="PUV" checked> '
                                                 :
                                            '<input type="checkbox" name="" class="minimal flat-red" value="PUV" > ' !!}View User<br>

                                            {!! checkrights('PUE', $user->permissions) ?
                                            '<input type="checkbox" name="" class="minimal flat-red" value="PUE" checked> '
                                                 :
                                            '<input type="checkbox" name="" class="minimal flat-red" value="PUE" > ' !!}Edit User<br>

                                            {!! checkrights('PUD', $user->permissions) ?
                                            '<input type="checkbox" name="" class="minimal flat-red" value="PUD" checked> '
                                                 :
                                            '<input type="checkbox" name="" class="minimal flat-red" value="PUD" > ' !!}Delete User
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        Permissions Roles
                                    </div>

                                    <div class="box-body">
                                        <p>
                                            {!! checkrights('PRV', $user->permissions) ?
                                            '<input type="checkbox" name="" class="minimal flat-red" value="PRV" checked> '
                                                 :
                                            '<input type="checkbox" name="" class="minimal flat-red" value="PRV" > ' !!}View Role<br>

                                            {!! checkrights('PRE', $user->permissions) ?
                                            '<input type="checkbox" name="" class="minimal flat-red" value="PRE" checked> '
                                                 :
                                            '<input type="checkbox" name="" class="minimal flat-red" value="PRE" > ' !!}Edit Role<br>

                                            {!! checkrights('PRD', $user->permissions) ?
                                            '<input type="checkbox" name="" class="minimal flat-red" value="PRD" checked> '
                                                 :
                                            '<input type="checkbox" name="" class="minimal flat-red" value="PRD" > ' !!}Delete Role
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        List Recors
                                    </div>

                                    <div class="box-body">
                                        <p>
                                            {!! checkrights('PRRV', $user->permissions) ?
                                            '<input type="checkbox" name="" class="minimal flat-red" value="PRRV" checked> '
                                                 :
                                            '<input type="checkbox" name="" class="minimal flat-red" value="PRRV" > ' !!}View Record<br>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </p>
				    {{--  @if ( auth()->user()->role == 103 || auth()->user()->role == 102 )  --}}
					<div class="box-body">
						<div class="form-group">
							<button type="submit" class='btn btn-primary btn-block'>Update User</button>
						</div>
					</div>
				    {{--  @endif  --}}
    		    </div>
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
