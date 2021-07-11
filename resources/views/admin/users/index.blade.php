@extends('admin.layout')

@section('header')
	<section class="content-header">
    <h1>USERS<small>User the systen </small></h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i>Home</a></li>
      <li><i class="fa fa-users"></i> List Users</li>
    </ol>
  </section>
@stop

@section('content')
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">List the users</h3>
      @if( checkrights('PUE', auth()->user()->permissions) )
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary pull-right">
          <i class="fa fa-plus"></i> Create User
        </a>
      @endif
    </div>

    <!-- /.box-header -->
    <div class="box-body">
      <table id="post-table" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Avatar</th>
            <th>Accion</th>
          </tr>
        </thead>

        <tbody>
          @php $i = 1; @endphp
          @foreach ($users as $user)
            <tr>
              <td>{{ $i }}</td>
              <td> {{ $user->name }} </td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->phone }}</td>
              <td style="text-align: center">{{ $user->rol->name }}</td>
              <td>
                <div class="user-block">
                    @if ( $user->avatar != null )
                        <img src="/images/{{ $user->avatar }}" class="img-circle img-bordered-sm"  alt="{{ $user->name }}">
                    @else
                        <img src="/images/unname.jpg" class="img-circle img-bordered-sm"  alt="">
                    @endif
                </div>
              </td>
              <td>
                @if( checkrights('PUV', auth()->user()->permissions) )
										<a href="{{ route('admin.users.show', $user) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
                @endif

                @if( checkrights('PUE', auth()->user()->permissions) )
                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                @endif


                @if ( auth()->user()->level == 103 && $user->id != 1 )
                  <form method="POST" action="{{ route('admin.users.destroy', $user) }}" style="display: inline">
                    @csrf {{ method_field('DELETE') }}
                    <button class="btn btn-xs btn-danger" onclick="return confirm('Estas seguro de eliminar este usuario.')">
                    <i class="fa fa-trash"></i>
                    </button>
                  </form>
                @endif
              </td>
            </tr>
            @php $i = $i+1; @endphp
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
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
       /* $("#example1").DataTable();*/

        $('#post-table').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
@endpush

