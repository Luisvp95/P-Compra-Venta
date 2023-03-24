<nav class="sidebar sidebar-offcanvas sticky-top" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                {{-- <div class="profile-image">
          <img src="melody/images/faces/face5.jpg" alt="image"/>
        </div>
        <div class="profile-name">
          <p class="name">
            Welcome Jane
          </p>
          <p class="designation">
            Super Admin
          </p>
        </div> --}}
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-home menu-icon"></i>
                <span class="menu-title">Inicio</span>
            </a>
        </li>
        @if (Gate::check('ver-compra') && Gate::check('ver-venta'))
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                    aria-controls="page-layouts">
                    <i class="fas fa-shopping-cart menu-icon"></i>
                    <span class="menu-title">Ventas y Compras</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="page-layouts">
                    <ul class="nav flex-column sub-menu">
                        @can('ver-compra')
                            <li class="nav-item"> <a class="nav-link" href="{{ route('purchases.index') }}">Compras</a></li>
                        @endcan
                        @can('ver-venta')
                            <li class="nav-item"> <a class="nav-link" href="{{ route('sales.index') }}">Ventas</a></li>
                        @endcan
                    </ul>
                </div>
            </li>
        @elseif (Gate::check('ver-compra') || Gate::check('ver-venta'))
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                    aria-controls="page-layouts">
                    <i class="fas fa-shopping-cart menu-icon"></i>
                    <span class="menu-title">Ventas y Compras</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="page-layouts">
                    <ul class="nav flex-column sub-menu">
                        @can('ver-compra')
                            <li class="nav-item"> <a class="nav-link" href="{{ route('purchases.index') }}">Compras</a></li>
                        @endcan
                        @can('ver-venta')
                            <li class="nav-item"> <a class="nav-link" href="{{ route('sales.index') }}">Ventas</a></li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endif
        @if (Gate::check('ver-categoria') && Gate::check('ver-producto'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false"
                aria-controls="sidebar-layouts">
                <i class="fas fa-warehouse menu-icon"></i>
                <span class="menu-title">Inventario</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sidebar-layouts">
                <ul class="nav flex-column sub-menu">
                    @can('ver-categoria')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('categories.index') }}">Categorias</a></li>
                    @endcan
                    @can('ver-producto')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('products.index') }}">Productos</a></li>
                    @endcan
                </ul>
            </div>
        </li>
        @elseif (Gate::check('ver-categoria') || Gate::check('ver-producto'))
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false"
              aria-controls="sidebar-layouts">
              <i class="fas fa-warehouse menu-icon"></i>
              <span class="menu-title">Inventario</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="sidebar-layouts">
              <ul class="nav flex-column sub-menu">
                  @can('ver-categoria')
                      <li class="nav-item"> <a class="nav-link" href="{{ route('categories.index') }}">Categorias</a></li>
                  @endcan
                  @can('ver-producto')
                      <li class="nav-item"> <a class="nav-link" href="{{ route('products.index') }}">Productos</a></li>
                  @endcan
              </ul>
          </div>
      </li>
        @endif

        @if (Gate::check('ver-proveedor') && Gate::check('ver-cliente'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="fas fa-users menu-icon"></i>
                <span class="menu-title">Proveedores y Clientes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    @can('ver-proveedor')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('providers.index') }}">Proveedores</a></li>
                    @endcan
                    @can('ver-cliente')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('clients.index') }}">Clientes</a></li>
                    @endcan
                </ul>
            </div>
        </li>
        @elseif (Gate::check('ver-proveedor') || Gate::check('ver-cliente'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="fas fa-users menu-icon"></i>
                <span class="menu-title">Proveedores y Clientes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    @can('ver-proveedor')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('providers.index') }}">Proveedores</a></li>
                    @endcan
                    @can('ver-cliente')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('clients.index') }}">Clientes</a></li>
                    @endcan
                </ul>
            </div>
        </li>
        @endif

        @if (Gate::check('ver-reporte-dia') && Gate::check('ver-cliente'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
                <i class="far fa-chart-bar menu-icon"></i>
                <span class="menu-title">Reportes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                    @can('ver-reporte-dia')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('reports.day') }}">Por día</a></li>
                    @endcan
                    @can('ver-reporte-por-fecha')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('reports.date') }}">Por fecha</a></li>
                    @endcan
                </ul>
            </div>
        </li>
        @elseif (Gate::check('ver-reporte-dia') || Gate::check('ver-reporte-por-fecha'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
                <i class="far fa-chart-bar menu-icon"></i>
                <span class="menu-title">Reportes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                    @can('ver-reporte-dia')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('reports.day') }}">Por día</a></li>
                    @endcan
                    @can('ver-reporte-por-fecha')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('reports.date') }}">Por fecha</a></li>
                    @endcan
                </ul>
            </div>
        </li>
        @endif

        @if (Gate::check('ver-usuario') && Gate::check('ver-rol') && Gate::check('ver-empresa') && Gate::check('ver-impresora'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="fas fa-cog menu-icon"></i>
                <span class="menu-title">Configuración</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                    @can('ver-usuario')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a></li>
                    @endcan
                    @can('ver-rol')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('roles.index') }}">Roles</a></li>
                    @endcan
                    @can('ver-empresa')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('busines.index') }}">Empresa</a></li>
                    @endcan
                    @can('ver-impresora')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('printers.index') }}">Impresora</a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>
        @elseif (Gate::check('ver-usuario') || Gate::check('ver-rol') || Gate::check('ver-empresa') || Gate::check('ver-impresora'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="fas fa-cog menu-icon"></i>
                <span class="menu-title">Configuración</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                    @can('ver-usuario')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a></li>
                    @endcan
                    @can('ver-rol')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('roles.index') }}">Roles</a></li>
                    @endcan
                    @can('ver-empresa')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('busines.index') }}">Empresa</a></li>
                    @endcan
                    @can('ver-impresora')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('printers.index') }}">Impresora</a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>
        @endif
    </ul>
</nav>