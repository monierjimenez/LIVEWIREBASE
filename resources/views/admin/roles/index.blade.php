@extends('admin.layout')

@section('header')
	<section class="content-header">
    <h1>ROLES<small>Role the system </small></h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i>Home</a></li>
      <li><i class="fa fa-legal"></i> List Roles</li>
    </ol>
  </section>
@stop

@section('content')
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">List the roles</h3>
      @if( checkrights('PRE', auth()->user()->permissions) )
        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary pull-right">
          <i class="fa fa-plus"></i> Create Role
        </a>
      @endif
    </div>

    <!-- /.box-header -->
    <div class="box-body">
      <table id="post-table" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name Role</th>
            <th>Number of permits</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          @php $i = 1; @endphp
          @foreach ($roles as $role)
            <tr>
              <td>{{ $i }}</td>
              <td> {{ $role->name }} </td>
              <td> {{ checkrightscant($role->permissions) }} </td>
              <td>
                @if( checkrights('PRV', auth()->user()->permissions) )
                      <a href="{{ route('admin.roles.show', $role) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
                @endif

                @if( checkrights('PRE', auth()->user()->permissions) )
                    <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                @endif

                @if( checkrights('PRD', auth()->user()->permissions) )
                    <form method="POST" action="{{ route('admin.roles.destroy', $role) }}" style="display: inline">
                        @csrf {{ method_field('DELETE') }}
                        <button class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this role?')">
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

