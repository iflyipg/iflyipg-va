@if (Auth::check())
{{-- Menu Items For Users --}}
  @if(Theme::getSetting('gen_darkmode') && !Theme::getSetting('gen_sidebar'))
    <li class="nav-item">
      <div class="form-check form-switch mt-2">
        <input class="form-check-input" type="checkbox" role="switch" id="darkSwitch" name="Dark Mode">
        <label class="form-check-label" for="darkSwitch">@lang('disposable.darkmode')</label>
      </div>
    </li>
  @endif

  @if (Theme::getSetting('gen_utc_clock') && !Theme::getSetting('gen_sidebar'))
    <li class="nav-item" style="pointer-events: none">
      <a class="nav-link" href="#">
        <i class="fas fa-clock {{ $icon_style }}"></i>
        <span id="utc_clock" class="me-1"></span>
      </a>
    </li>
  @endif

  @ability('admin', 'admin-access')
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/admin') }}">
        <i class="fas fa-circle-notch {{ $icon_style }}"></i>
        @lang('common.administration')
      </a>
    </li>
  @endability

  <li class="nav-item">
    <a class="nav-link" href="{{ url('/logout') }}">
      <i class="fas fa-sign-out-alt {{ $icon_style }}"></i>
      @lang('common.logout')
    </a>
  </li>

  {{-- Abuelo007X: Adding space to help on the dropdown view --}}
  <li class="nav-item dropdown">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </li>  
@endif
