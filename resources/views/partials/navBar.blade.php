<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <div class="me-3">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      </div>
      <div>
        <a class="navbar-brand brand-logo" href="index.html">
          <img src="{{ url('images/logo.svg')}}" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="{{ url('images/logo-mini.svg')}}" alt="logo" />
        </a>
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top"> 
      <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
          <h1 class="welcome-text">Good Morning,
            <span class="text-black fw-bold">
            @auth
              {{ \Illuminate\Support\Facades\Auth::user()->name }}
            @endauth
            @guest
              vous n'est pas connecté
            @endguest
            </span>
          </h1>
          @if (session('success'))
            <h3 class="welcome-sub-text">{{session('success')}}</h3>
          @endif
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        @if (Route::currentRouteName() == 'dashboard')
        <form class="search-form d-flex justify-content-around" action="" method="Get">
          @csrf
          <div class="nav-item dropdown d-none d-lg-block">     
            <select name="category" id="" class="nav-link dropdown-bordered dropdown-toggle dropdown-toggle-split">
              <option >Select Category</option>
              <option  value="Légumineuses">Légumineuses</option>
              <option value="Fruits">Fruits</option>
              <option  value="Légumes">Légumes</option>
              <option  value="Viandes">Viandes</option>
              <option  value="Céréales">Céréales</option>
            </select>
          </div>
          <div class="search-form">
            <button type="submit" class="btn text-center p-2" style="border: none">
            <i class="icon-search"></i>
            </button>
          </div>
        </form>
        @endif
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
            <i class="icon-mail icon-lg"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
            <a class="dropdown-item py-3 border-bottom">
              <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
              <span class="badge badge-pill badge-primary float-right">View all</span>
            </a>
            <a class="dropdown-item preview-item py-3">
              <div class="preview-thumbnail">
                <i class="mdi mdi-alert m-auto text-primary"></i>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                <p class="fw-light small-text mb-0"> Just now </p>
              </div>
            </a>
            <a class="dropdown-item preview-item py-3">
              <div class="preview-thumbnail">
                <i class="mdi mdi-settings m-auto text-primary"></i>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                <p class="fw-light small-text mb-0"> Private message </p>
              </div>
            </a>
            <a class="dropdown-item preview-item py-3">
              <div class="preview-thumbnail">
                <i class="mdi mdi-airballoon m-auto text-primary"></i>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                <p class="fw-light small-text mb-0"> 2 days ago </p>
              </div>
            </a>
          </div>
        </li>
        <li class="nav-item dropdown"> 
          <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="icon-bell"></i>
            <span class="count"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
            <a class="dropdown-item py-3">
              <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
              <span class="badge badge-pill badge-primary float-right">View all</span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
              </div>
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
              </div>
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
              </div>
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
              </div>
            </a>
          </div>
        </li>
        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
          <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            @auth
              <img class="img-xs rounded-circle" src="/storage/{{ \Illuminate\Support\Facades\Auth::user()->image }}" alt="Profile image">
            @endauth
            @guest
              <img class="img-xs rounded-circle" src="{{ url('#')}}" alt="Profile image">
            @endguest
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
              @auth
              <img class="img-xs rounded-circle" src="/storage/{{ \Illuminate\Support\Facades\Auth::user()->image }}" alt="Profile image">
              <p class="mb-1 mt-3 font-weight-semibold"> {{\Illuminate\Support\Facades\Auth::user()->name}} </p>
              <p class="fw-light text-muted mb-0"> {{\Illuminate\Support\Facades\Auth::user()->email}} </p>
              @endauth
              
            </div>
            <a class="dropdown-item" href="{{ route('profil.edit')}}"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
            @auth
              @csrf
              <form action="{{ route('logout')}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="dropdown-item">
                  <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Deconnexion
                </button>
              </form>
            @endauth
          </div>
        </li>
      </ul>
    </div>
  </nav>