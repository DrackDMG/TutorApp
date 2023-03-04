<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
      <!-- Brand -->
      <div class="flex-shrink-0 flex items-center">
          <a href="{{ route('dashboard') }}">
              <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
          </a>
      </div>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link" href="{{route('dashboard')}}">Home</a>
              </li>               
              <!-- Dropdown -->
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                  Catalogos
                  </a>
                  <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{route('alumnos_index')}}">Alumnos</a>
                      <a class="dropdown-item" href="#">Profesores</a>
                      <a class="dropdown-item" href="#">Materias</a>          
                      <a class="dropdown-item" href="#">Calificaciones</a>
                  </div>         
          </ul >
          <ul class="navbar-nav ml-auto">
          </li>

          {{--Nombre de usuario y salir--}}
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              {{Auth::user()->name}}
              </a>
          <div class="dropdown-menu">
          <!-- Authentication -->
          <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
          this.closest('form').submit();">Salir</a>               
          </form>
  </div>
</li>
          </ul>
      </div>  
  </div> 
</nav>