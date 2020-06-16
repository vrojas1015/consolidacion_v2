<li class="{{ Request::is('gerentes*') ? 'active' : '' }}">
    <a href="{{ route('gerentes.index') }}"><i class="fa fa-edit"></i><span>Gerentes</span></a>
</li>

<li class="{{ Request::is('operacions*') ? 'active' : '' }}">
    <a href="{{ route('operacions.index') }}"><i class="fa fa-edit"></i><span>Operaciones</span></a>
</li>

<li class="{{ Request::is('proyectos*') ? 'active' : '' }}">
    <a href="{{ route('proyectos.index') }}"><i class="fa fa-edit"></i><span>Proyectos</span></a>
</li>

<li class="{{ Request::is('regions*') ? 'active' : '' }}">
    <a href="{{ route('regions.index') }}"><i class="fa fa-edit"></i><span>Regiones</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
</li>

