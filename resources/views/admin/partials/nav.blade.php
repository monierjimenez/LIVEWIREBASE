<ul class="sidebar-menu">
  <li class="header">
      <i class="fa fa-dashboard">&nbsp;</i>
      <span>
          <strong><b>DASHBOARD</b></strong>
      </span>
  </li>

  <!-- Optionally, you can add icons to the links -->
  <li class="{{ request()->is('admin') ? 'active' : '' }}">
      <a href="{{ route('admin') }}">
          <i class="fa fa-home"></i> <span>HOME</span>
      </a>
  </li>

  @if( checkrights('PUV', auth()->user()->permissions) )
    <li class="treeview {{ request()->is('admin/users*') ? 'active' : '' }} {{ request()->is('admin/roles*') ? 'active' : '' }}">
        <a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i> <span>USERS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ request()->is('admin/users') ? 'active' : '' }}"> <a href="{{ route('admin.users.index') }}">List Users</a></li>
            @if( checkrights('PRV', auth()->user()->permissions) )
                <li class="{{ request()->is('admin/roles') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">List Roles</a></li>
            @endif
{{--            <div class="container">--}}
{{--                <!----> <button type="button" class="btn btn-default btn-sm">Cadastrar Monitorias</button>--}}
{{--            </div>--}}
            <!--Teste modal-->
        </ul>
    </li>
  @endif

  <li class="treeview">
      <a href="#"><i class="fa fa-book"></i> <span>MONITORIAS</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
          <li><a href="#">Minhas Monitorias</a></li>

          <div class="container">
              <!-- <button type="button" class="btn btn-default btn-sm">Cadastrar Monitorias</button> -->
          </div>
          <!--Teste modal-->

          <!--Teste modal-->
          <li><a href="#">Meus Ratings</a></li>
      </ul>
  </li>

  {{--  <li>
      <a href="#"><i class="fa fa-close"></i> <span>SAIR</span></a>
  </li>  --}}
</ul>
