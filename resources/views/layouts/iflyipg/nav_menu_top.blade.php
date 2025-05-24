@if (Auth::check())
{{-- Menu Items For Users --}}

  <li class="nav-item">
    <a class="nav-link" href="{{ route('frontend.dashboard.index') }}">
      <i class="fas fa-laptop-house {{ $icon_style }}"></i>
      @lang('common.dashboard')
    </a>
  </li>

  {{-- Main Dropdown --}}
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fas fa-home {{ $icon_style }}"></i>
      {{ config('app.name') }}
    </a>
    <ul class="dropdown-menu {{ $border }}" aria-labelledby="offcanvasNavbarDropdown">
      <li>
        <a class="dropdown-item" href="{{ route('frontend.pilots.index') }}">
          <i class="fas fa-users {{ $icon_style }}"></i>
          @lang('disposable.menu_roster')
        </a>
      </li>
      @if($DBasic)
        <li>
          <a class="dropdown-item" href="{{ route('DBasic.airlines') }}">
            <i class="fas fa-hotel {{ $icon_style }}"></i>
            @lang('disposable.menu_airlines')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('DBasic.ranks') }}">
            <i class="fas fa-tags {{ $icon_style }}"></i>
            @lang('disposable.menu_ranks')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('DBasic.awards') }}">
            <i class="fas fa-trophy {{ $icon_style }}"></i>
            @lang('disposable.menu_awards')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('DBasic.stats') }}">
            <i class="fas fa-cogs {{ $icon_style }}"></i>
            @lang('disposable.menu_stats')
          </a>
        </li>
      @endif
      {{-- Abuelo007X: Removing option from menu
      @if($DSpecial)
        <li>
          <a class="dropdown-item" href="{{ route('DSpecial.market') }}">
            <i class="fas fa-shopping-bag {{ $icon_style }}"></i>
            @lang('disposable.menu_market')  {{-- Abuelo007X: Changing as option was added to resources/lang/*/disposable.php -}}
          </a>
        </li>
      @endif
      --}}
    </ul>
  </li>

  {{-- Flight Operations Dropdown --}}
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fas fa-paper-plane {{ $icon_style }}"></i>
      @lang('disposable.menu_fltops')
    </a>
    <ul class="dropdown-menu {{ $border }}" aria-labelledby="offcanvasNavbarDropdown">
      @if($DSpecial)
        <li>
          <a class="dropdown-item" href="{{ route('DSpecial.assignments') }}">
            <i class="fas fa-hourglass-half {{ $icon_style }}"></i>
            @lang('disposable.menu_assign')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('DSpecial.freeflight') }}">
            <i class="fas fa-paper-plane {{ $icon_style }}"></i>
            @lang('disposable.menu_myflight')
          </a>
        </li>
      @endif
      <li>
        <a class="dropdown-item" href="{{ route('frontend.flights.bids') }}">
          <i class="fas fa-file-download {{ $icon_style }}"></i>
          @lang('disposable.menu_bids')
        </a>
      </li>
      <hr>
      <li>
        <a class="dropdown-item" href="{{ route('frontend.flights.index') }}">
          <i class="fas fa-paper-plane {{ $icon_style }}"></i>
          @lang('disposable.menu_flights')
        </a>
      </li>
      @if($DSpecial)
        <li>
          <a class="dropdown-item" href="{{ route('DSpecial.tours') }}">
            <i class="fas fa-directions {{ $icon_style }}"></i>
            @lang('disposable.menu_tours')
          </a>
        </li>
      @endif
      @if($DBasic)
        <li>
          <a class="dropdown-item" href="{{ route('DBasic.fleet') }}">
            <i class="fas fa-plane {{ $icon_style }}"></i>
            @lang('disposable.menu_fleet')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('DBasic.hubs') }}">
            <i class="fas fa-house-user {{ $icon_style }}"></i>
            @lang('disposable.menu_hubs')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('DBasic.pireps') }}">
            <i class="fas fa-file-upload {{ $icon_style }}"></i>
            @lang('disposable.menu_reports')
          </a>
        </li>
      @endif
      <li>
        <a class="dropdown-item" href="{{ route('frontend.livemap.index') }}">
          <i class="fas fa-map {{ $icon_style }}"></i>
          @lang('disposable.menu_mapflt')
        </a>
      </li>
      @if($DBasic)
        <li>
          <a class="dropdown-item" href="{{ route('DBasic.livewx') }}">
            <i class="fas fa-cloud-sun-rain {{ $icon_style }}"></i>
            @lang('disposable.menu_mapwx')
          </a>
        </li>
      @endif
    </ul>
  </li>

  {{-- Resources Dropdown --}}
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fas fa-paperclip {{ $icon_style }}"></i>
      @lang('disposable.menu_docs')
    </a>
    <ul class="dropdown-menu {{ $border }}" aria-labelledby="offcanvasNavbarDropdown">
      <li>
        <a class="dropdown-item" href="{{ route('frontend.downloads.index') }}">
          <i class="fas fa-download {{ $icon_style }}"></i>
          {{ trans_choice('common.download', 2) }}
        </a>
      </li>
      @if($DBasic)
        <li>
          <a class="dropdown-item" href="{{ route('DBasic.news') }}">
            <i class="fas fa-book-open {{ $icon_style }}"></i>
            @lang('disposable.menu_news')
          </a>
        </li>
      @endif
      @if($DSpecial)
        <li>
          <a class="dropdown-item" href="{{ route('DSpecial.notams') }}">
            <i class="fas fa-sticky-note {{ $icon_style }}"></i>
            @lang('disposable.menu_notams')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('DSpecial.ops_manual') }}">
            <i class="fas fa-book {{ $icon_style }}"></i>
            @lang('disposable.menu_opsman')
          </a>
        </li>
      @endif
      @foreach($page_links->sortBy('name', SORT_NATURAL) as $page)
        <li>
          <a class="dropdown-item" href="{{ $page->url }}" target="{{ $page->new_window ? '_blank' : '_self' }}">
            <i class="{{ $page['icon'] ?? 'fas fa-file-alt' }} {{ $icon_style }}"></i>
            {{ $page['name'] }}
          </a>
        </li>
      @endforeach
    </ul>
  </li>

  {{-- Module Links - Logged In True --}}
  @foreach($moduleSvc->getFrontendLinks($logged_in=true) as &$link)
    <li class="nav-item">
      <a class="nav-link" href="{{ url($link['url']) }}">
        <i class="{{ $link['icon'] ?? 'fas fa-boxes' }} {{ $icon_style }}"></i>
        {{ ($link['title']) }}
      </a>
    </li>
  @endforeach

  {{-- Module Links - Logged In False --}}
  @foreach($moduleSvc->getFrontendLinks($logged_in=false) as &$link)
    <li class="nav-item">
      <a class="nav-link" href="{{ url($link['url']) }}">
        <i class="{{ $link['icon'] ?? 'fas fa-boxes' }} {{ $icon_style }}"></i>
        {{ ($link['title']) }}
      </a>
    </li>
  @endforeach
  
  {{-- Language Switcher --}}
  @if(Theme::getSetting('gen_multilang') && isset($languages))
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
        <span class="flag-icon flag-icon-{{ $languages[$locale]['flag-icon'] }}"></span>&nbsp;&nbsp;{{ $languages[$locale]['display'] }}
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        @foreach ($languages as $lang => $language)
          @if ($lang != $locale)
            <a class="dropdown-item" href="{{ route('frontend.lang.switch', $lang) }}">
              <span class="flag-icon flag-icon-{{ $language['flag-icon'] }}"></span>&nbsp;&nbsp;{{ $language['display'] }}
            </a>
          @endif
        @endforeach
      </div>
    </li>
  @endif

  {{-- Personal Dropdown --}}
  <li class="nav-item">
    <hr class="dropdown-divider">
  </li>

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fas fa-user-alt {{ $icon_style }}"></i>
      {{ Auth::user()->name_private }}
    </a>
    <ul class="dropdown-menu {{ $border }}" aria-labelledby="offcanvasNavbarDropdown">
      <li>
        <a class="dropdown-item" href="{{ route('frontend.profile.index') }}">
          <i class="far fa-id-badge {{ $icon_style }}"></i>
          @lang('disposable.menu_profile')
        </a>
      </li>
      @if($DBasic && $user)
        <li>
          <a class="dropdown-item" href="{{ route('DBasic.myairline', [$user->airline_id]) }}">
            <i class="fas fa-hotel {{ $icon_style }}"></i>
            @lang('disposable.menu_company')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('DBasic.hub', [$user->home_airport_id ?? '']) }}">
            <i class="fas fa-house-user {{ $icon_style }}"></i>
            @lang('disposable.menu_base')
          </a>
        </li>
      @endif
      {{-- Abuelo007X: Removing option from menu
      @if($DSpecial)
        <li>
          <a class="dropdown-item" href="{{ route('DSpecial.market.show', [$user->id]) }}">
            <i class="fas fa-shopping-basket {{ $icon_style }}"></i>
            @lang('disposable.menu_mymarket') {{-- Abuelo007X: Changing as option was added to resources/lang/*/disposable.php -}}
          </a>
        </li>
      @endif
      --}}
        <li>
          <a class="dropdown-item" href="{{ route('frontend.pireps.index') }}">
            <i class="fas fa-file-upload {{ $icon_style }}"></i>
            @lang('disposable.menu_pireps')
          </a>
        </li>
      @if($DBasic && Theme::getSetting('gen_stable_approach'))
        <li>
          <a class="dropdown-item" href="{{ route('DBasic.stable') }}">
            <i class="fas fa-file-upload {{ $icon_style }}"></i>
            FDM Reports
          </a>
        </li>
      @endif
    </ul>
  </li>

  {{-- Abuelo007X: Adding space to help on the dropdown view --}}
  <li class="nav-item dropdown">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </li>
@else
{{-- Menu Items For Guests --}}
  <li class="nav-item">
    <a class="nav-link" href="{{ route('frontend.pilots.index') }}">
      <i class="fas fa-users {{ $icon_style }}"></i>
      @lang('disposable.menu_roster')
    </a>
  </li>

  @if($DBasic)
    <li class="nav-item">
      <a class="nav-link" href="{{ route('DBasic.reports') }}">
        <i class="fas fa-file-upload {{ $icon_style }}"></i>
        @lang('disposable.menu_reports')
      </a>
    </li>
  @endif

  <li>
    <a class="nav-link" href="{{ route('frontend.livemap.index') }}">
      <i class="fas fa-map {{ $icon_style }}"></i>
      @lang('disposable.menu_mapflt')
    </a>
  </li>

  @foreach($page_links->sortBy('name', SORT_NATURAL) as $page)
    <li>
      <a class="nav-link" href="{{ $page->url }}" target="{{ $page->new_window ? '_blank' : '_self' }}">
        <i class="{{ $page['icon'] ?? 'fas fa-file-alt' }} {{ $icon_style }}"></i>
        {{ $page['name'] }}
      </a>
    </li>
  @endforeach

  <li class="nav-item">
    <a class="nav-link" href="{{ url('/register') }}">
      <i class="far fa-id-card {{ $icon_style }}"></i>
      @lang('common.register')
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('/login') }}">
      <i class="fas fa-sign-in-alt {{ $icon_style }}"></i>
      @lang('common.login')
    </a>
  </li>
@endif