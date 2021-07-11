@extends('admin.layout')

@section('header')
	<section class="content-header">
    <h1>ROLE<small>New Role</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i>Home</a></li>
      <li><a href="{{ route('admin.roles.index') }}"><i class="fa fa-legal"></i>List Roles</a></li>
      <li><i class="fa fa-plus-square"></i> Create</li>
    </ol>
  </section>
@stop

@section('content')
	<div class="row">
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.roles.store') }}">
            @csrf
		<div class="col-md-4">
			<div class="box box-primary">
		    	<div class="box-body">
		    		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		    			<label>Name Role</label>
		    			<input name='name' placeholder="Name Role" class="form-control" value="{{ old('name') }}">
		    			{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
		    		</div>
				</div>
	    	</div>
   		</div>

            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">List Permissions</h3>
                    </div>
                    <p>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    Permissions Users
                                </div>
                                <div class="box-body">
                                    <p>
                                        <input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUV" > View User<br>
                                        <input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUE" > Edit User<br>
                                        <input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUD" > Delete User
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
                                <div class="box-body">
                                    <p>
                                        <input type="checkbox" name="permissions[]" class="minimal flat-red" value="PRV" >
                                        View Role<br>
                                        <input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUE" >
                                        Edit Role<br>
                                        <input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUD" >
                                        Delete Role
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
                                        <input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUV" >
                                        View User<br>
                                        <input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUE" >
                                        Edit User<br>
                                        <input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUD" >
                                        Delete User
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
                                        <input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUV" >
                                        View User<br>
                                        <input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUE" >
                                        Edit User<br>
                                        <input type="checkbox" name="permissions[]" class="minimal flat-red" value="PUD" >
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
                            <button type="submit" class='btn btn-primary btn-block'>Save Role</button>
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

		//Flat red color scheme for iCheck
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
	</script>
@endpush
