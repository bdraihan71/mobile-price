  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/" class="brand-link">
          <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Mobile Price</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ auth()->user()->name }}</a>
              </div>
          </div>
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item {{ request()->routeIs('mobile_brand*') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-building"></i>
                          <p>
                              Mobile Brand
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('mobile.brand.index') }}"
                                  class="nav-link {{ request()->routeIs('mobile.brand.index') ? 'active' : '' }}">
                                  <i class="fas fa-list nav-icon"></i>
                                  <p>Brand List/Create</p>
                              </a>
                          </li>
                          {{-- <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Brand View/Edit</p>
                                    </a>
                                </li> --}}
                      </ul>
                  </li>

                  <li class="nav-item {{ request()->routeIs('mobile_model*') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-mobile"></i>
                          <p>
                              Mobile Model
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('mobile.model.index') }}"
                                  class="nav-link {{ request()->routeIs('mobile.model.index') ? 'active' : '' }}">
                                  <i class="fas fa-list nav-icon"></i>
                                  <p>Model List</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('mobile.model.create') }}"
                                  class="nav-link {{ request()->routeIs('mobile.model.create') ? 'active' : '' }}">
                                  <i class="fas fa-plus-square nav-icon"></i>
                                  <p>Model Create</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('mobile.model.create_by_json') }}"
                                  class="nav-link {{ request()->routeIs('mobile.model.create_by_json') ? 'active' : '' }}">
                                  <i class="fas fa-file-upload nav-icon"></i>
                                  <p>Model Create By Json</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('admin') }}"
                          class="nav-link {{ request()->routeIs('admin') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-users"></i>
                          <p>
                              Admin
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('message') }}"
                        class="nav-link {{ request()->routeIs('message') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Message
                        </p>
                    </a>
                </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
