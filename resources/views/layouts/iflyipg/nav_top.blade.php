<nav id="Dispo_NavBar" class="navbar navbar-expand-lg mt-0 pt-0 pb-1 mb-0">
  <div class="container-fluid">
    <a class="navbar-brand my-0" href="/">
      <img class="img-mh80" src="{{ public_asset('/logos/ipg_logo.png') }}"/>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Main Menu">
      <i class="fas fa-compass" title="Main Menu"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="navbar-nav ms-auto">
        @include('nav_menu_top') {{-- Abuelo007X: Changing from nav_menu to nav_menu_top --}}
      </div>
    </div>
  </div>
</nav>
{{-- Section Added by Abuelo007X --}}
<nav id="Dispo_NavBar" class="navbar navbar-expand-lg mt-0 pt-0 pb-1 mb-5">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent2">
      <div class="navbar-nav ms-auto">
        @include('nav_menu_bottom')
      </div>
    </div>
  </div>
</nav>
{{-- End of added Section --}}
