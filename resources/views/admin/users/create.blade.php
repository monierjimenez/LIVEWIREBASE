@extends('admin.layout')

@section('header')
	<section class="content-header">
    <h1>USER<small>New User</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i>Home</a></li>
      <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i>List Users</a></li>
      <li><i class="fa fa-user-plus"></i> Create</li>
    </ol>
  </section>
@stop

@section('content')
	<div class="row">
		<form method="POST" enctype="multipart/form-data" action="{{ route('admin.users.store') }}">
			@csrf
		<div class="col-md-8">
			<div class="box box-primary">
		    	<div class="box-body">
		    		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		    			<label>Name User</label>
		    			<input name='name' placeholder="Name User" class="form-control" value="{{ old('name') }}">
		    			{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
		    		</div>

		    		<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
		    			<label for="password">Password</label>
						<input type='password' name='password' id="password" class="form-control">
						{!! $errors->first('password', '<span class="help-block">:message</span>') !!}
		    		</div>

		    		<div class="form-group">
		    			<label for="password_confirmation">Repeat Password</label>
						<input type='password' name='password_confirmation' id="password_confirmation" class="form-control">
		    		</div>

	    			<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
	    				<label>Phone</label>
	    				<input name='phone' placeholder="User's Phone" class="form-control" value="{{ old('phone') }}">
	    				{!! $errors->first('phone', '<span class="help-block">:message</span>') !!}
	    			</div>
				</div>

	    	</div>
   		</div>


    	<div class="col-md-4">
    		<div class="box box-primary">

				<div class="box-body">
					<div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
						<label>Role</label>
						<select name='role' class="form-control">
							<option value="">Select a role</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" {{ old('role') == $role->id  ? 'selected' : ''}}>{{$role->name}}</option>
                            @endforeach
						</select>
						{!! $errors->first('role', '<span class="help-block">:message</span>') !!}
					</div>

	    			<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
	    				<label>E-Mail</label>
	    				<input name='email' placeholder="User E-mail" class="form-control" value="{{ old('email') }}">
	    				{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
	    			</div>

	    			<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
	    				<label>Avatar</label>
	    				<input type="file" name="avatar" id="avatar">
	    				{!! $errors->first('avatar', '<span class="help-block">:message</span>') !!}
	    			</div>
				</div>

	   			<div class="box-body">
			    	<div class="form-group">
			    		<button type="submit" class='btn btn-primary btn-block'>Save User</button>
			    	</div>
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

		//Flat red color scheme for iCheck
		$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
			checkboxClass: 'icheckbox_flat-green',
			radioClass: 'iradio_flat-green'
		});
	</script>
@endpush
