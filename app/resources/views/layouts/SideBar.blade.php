<aside class="main-sidebar sidebar-dark-info elevation-4 position-fixed">
    <!-- Logo de la marque -->
    <a href="" class="brand-link">
      <img src="{{ asset('img/logo.png') }}" class="brand-image img-circle elevation-3" alt="Image de groupe">
      <span class="brand-text font-weight-light text-center">Gestion de Projets</span>
    </a>
  
    <!-- Barre latérale -->
    <div class="sidebar">
      <!-- Menu latéral -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="{{ route('questions.index')}}" class="nav-link  {{ request()->routeIs(['questions.index', 'questions.show', 'examens.questions' ]) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tasks"></i>
                  <p>
                      Questions
                  </p>
              </a>
          </li>
          
            
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>