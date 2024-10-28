<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas pe-lg-2" id="sidebar">
    <ul class="nav">

      <!-- Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard')}}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <!-- tables de produits -->
      <li class="nav-item nav-category">Search</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="menu-icon mdi mdi-magnify"></i>
          <span class="menu-title">Search</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse mt-1" id="tables">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.produit.listing')}}"> Search by Category</a></li>
          </ul>
        </div>
      </li>
      
      <!-- formulaire -->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">Forms</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse mt-1" id="form-elements">
          <ul class="nav flex-column sub-menu">
            @if (Route::currentRouteName() === 'admin.produit.edit')
              
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.produit.create')}}"> modifier produit </a></li>
              
              @else

              <li class="nav-item"><a class="nav-link" href="{{ route('admin.produit.create')}}"> Enregistrer produit  </a></li>
            @endif
          </ul>
        </div>
      </li>

      <!-- tables de produits -->
      <li class="nav-item nav-category">Table</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="menu-icon mdi mdi-table"></i>
          <span class="menu-title">Tables</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse mt-1" id="tables">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.produit.index')}}"> Tableau produits</a></li>
          </ul>
        </div>
      </li>

      <!-- connexion -->
      <li class="nav-item nav-category">Connexion</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="menu-icon mdi mdi-account-circle-outline"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse mt-1" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('login')}}"> Login </a></li>
          </ul>
        </div>
      </li>

      <!-- documentation -->
      <li class="nav-item nav-category">help</li>
      <li class="nav-item">
        <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>