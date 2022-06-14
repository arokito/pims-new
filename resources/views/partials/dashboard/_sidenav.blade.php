<?php 
    $urlPath = request()->path();
    $urls = explode('/', $urlPath);
    $currentUrl = end($urls);

    function isActiveUrl($path, $url)
    {
      return strtoupper($path) == strtoupper($url);
    }
    
    function isActiveGroup($path, $urls)
    {
      return in_array(strtolower($path), $urls);
    }
?>
<div class="spinner-grow text-primary" role="status">
  <span class="visually-hidden">Loading...</span>
</div>

<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
  <div class="sidebar-inner px-4 pt-3">
    <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
      <div class="d-flex align-items-center">
        <div class="avatar-lg me-4">
          <img src="{{ asset('assets/img/favicon/favicon-16x16.png') }}" class="card-img-top rounded-circle border-white"
            alt="Yakobo mkuu">
        </div>
        <div class="d-block">
          <h2 class="h5 mb-3">Hi, {{ auth()->user()->name }}</h2>
          <a href="{{ route('logout') }}" class="btn btn-secondary btn-sm d-inline-flex align-items-center"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();"
          >
            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>            
            Sign Out
          </a>

        

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
      </div>
      <div class="collapse-close d-md-none">
        <a href="#sidebarMenu" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
            aria-label="Toggle navigation">
            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </a>
      </div>
    </div>
    
    <ul class="nav flex-column pt-3 pt-md-0">
      <li class="nav-item">
        <a href="{{ route('dashboard.index') }}" class="nav-link d-flex align-items-center">
          <span class="sidebar-icon">
            <img src="{{ asset('assets\img\brand\yakobo mkuu.jpeg') }}" class="card-img-top rounded-circle border-white avatar avatar-lg mx-auto mb-3"
            alt="Yakobo mkuu">
          </span>
          {{-- <span class="mt-1 ms-1 sidebar-text">PIMS</span> --}}
        </a>
      </li>
      <li class="nav-item @if(isActiveUrl($urlPath, "overview")) active @endif">
        <a href="{{ route('dashboard.index') }}" class="nav-link">
          <span class="sidebar-icon">
            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
          </span> 
          <span class="sidebar-text">Dashboard</span>
        </a>
      </li>
     @role('Admin|Bursar')
      <li class="nav-item @if(isActiveUrl($urlPath, "contributions")) active @endif">
        <a href="{{ route('contributions.index') }}" class="nav-link">
          <span class="sidebar-icon">
            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path><path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>

          </span>
          <span class="sidebar-text">Michango</span>
        </a>
      </li>

      <li class="nav-item @if(isActiveUrl($urlPath, "expenses")) active @endif">
        <a href="{{ route('expenses.index') }}" class="nav-link">
          <span class="sidebar-icon">
            <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="icon icon-xs me-2" viewBox="0 0 20 20">
              <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
              <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
            </svg>

          </span>
          <span class="sidebar-text">Matumizi</span>
        </a>
      </li>
    @endrole

      
      <li class="nav-item @if(isActiveUrl($urlPath, "announcements")) active @endif">
        <a href="{{ route('announcements.index') }}" class="nav-link">
          <span class="sidebar-icon">
            <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="icon icon-xs me-2" viewBox="0 0 20 20">
              <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-11zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25.222 25.222 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56V3.224zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02 2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009a68.14 68.14 0 0 1 .496.008 64 64 0 0 1 1.51.048zm1.39 1.081c.285.021.569.047.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a65.81 65.81 0 0 1 1.692.064c.327.017.65.037.966.06z"/>
            </svg>
          </span>
          <span class="sidebar-text">Matangazo</span>
        </a>
      </li>
  
      <li class="nav-item @if(isActiveGroup($urlPath, ["zones", "families", "communities", "parishioners"])) active @endif">
        <span
          class="nav-link @if(isActiveGroup($urlPath, ["zones", "families", "communities", "parishioners"])) active @endif d-flex justify-content-between align-items-center"
          data-bs-toggle="collapse" data-bs-target="#submenu-components">
          <span>
            <span class="sidebar-icon">
              <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="icon icon-xs me-2" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
                <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
              </svg>
            </span> 
            <span class="sidebar-text">Parokia</span>
          </span>
          <span class="link-arrow">
            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          </span>
        </span>
        <div class="multi-level collapse @if(isActiveGroup($urlPath, ["zones", "families", "communities", "parishioners"])) show @endif" role="list"
          id="submenu-components" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item @if(isActiveUrl($urlPath, "zones")) active @endif">
              <a class="nav-link" href="{{ route('zones.index') }}">
                <span class="sidebar-text">Kanda</span>
              </a>
            </li>
            <li class="nav-item @if(isActiveUrl($urlPath, "families")) active @endif">
              <a class="nav-link" href="{{ route('families.index') }}">
                <span class="sidebar-text">familia</span>
              </a>
            </li>
            <li class="nav-item @if(isActiveUrl($urlPath, "communities")) active @endif">
              <a class="nav-link" href="{{ route('communities.index') }}">
                <span class="sidebar-text">Jumuiya</span>
              </a>
            </li>
            <li class="nav-item @if(isActiveUrl($urlPath, "parishioners")) active @endif">
              <a class="nav-link" href="{{ route('parishioners.index') }}">
                <span class="sidebar-text">Waumini</span>
              </a>
            </li>
           
          </ul>
        </div>
      </li>
  @role('Admin|Paroko|Bursar')
      <li class="nav-item @if(isActiveGroup($urlPath, ["profit-and-loss", "expenses-report", "contributions-report", "parishioners-report"])) active @endif">
        <span
          class="nav-link @if(isActiveGroup($urlPath, ["profit-and-loss", "expenses-report", "contributions-report", "parishioners-report"])) active @endif d-flex justify-content-between align-items-center"
          data-bs-toggle="collapse" data-bs-target="#submenu-report-components">
          <span>
            <span class="sidebar-icon">
              <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="icon icon-xs me-2" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
                <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
              </svg>
            </span> 
            <span class="sidebar-text">Taarifa</span>
          </span>
          <span class="link-arrow">
            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          </span>
        </span>
        <div class="multi-level collapse @if(isActiveGroup($urlPath, ["profit-and-loss", "expenses-report", "contributions-report", "parishioners-report"])) show @endif" role="list"
          id="submenu-report-components" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item @if(isActiveUrl($urlPath, "profit-and-loss")) active @endif">
              <a class="nav-link" href="{{ route('profit-and-loss.index') }}">
                <span class="sidebar-text">Repoti za Faida na Hasara</span>
              </a>
            </li>
            <li class="nav-item @if(isActiveUrl($urlPath, "expenses-report")) active @endif">
              <a class="nav-link" href="{{ route('expenses-report.index') }}">
                <span class="sidebar-text">Repoti za Matumizi</span>
              </a>
            </li>
            <li class="nav-item @if(isActiveUrl($urlPath, "contributions-report")) active @endif">
              <a class="nav-link" href="{{ route('contributions-report.index') }}">
                <span class="sidebar-text">Repoti za Michango</span>
              </a>
            </li>
            <li class="nav-item @if(isActiveUrl($urlPath, "parishioners-report")) active @endif">
              <a class="nav-link" href="{{ route('parishioners-report.index') }}">
                <span class="sidebar-text">Repoti za Waumini</span>
              </a>
            </li>
           
          </ul>
        </div>
      </li>

  @endrole
      <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
     
    </ul>
  </div>
</nav>