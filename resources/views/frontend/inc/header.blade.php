<header class="header-3">
    <div class="top-bar">
        <div class="container"><a href="{{ url('/') }}" class="logo"><img src="{{ url('/') }}/assets/uploads/w-logo.png"
                                                                      alt="{{ config('app.name') }}"/></a>
            <div class="d-flex align-items-center">
                <ul class="contact-items">
                    @if(isset($settings['phone']) && $settings['phone'])
                    <li><i class="fa fa-phone-alt"></i><a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['phone']) }}"><b>{{ __('common.phone') }}</b><span>{{ $settings['phone'] }}</span></a></li>
                    @endif
                    @if(isset($settings['email']) && $settings['email'])
                    <li><i class="far fa-envelope"></i><a href="mailto:{{ $settings['email'] }}"><b>{{ __('common.email') }}</b><span>{{ $settings['email'] }}</span></a></li>
                    @endif
                </ul>
                @if(isset($settings['phone']) && $settings['phone'])
                <a href="tel://{{ preg_replace('/[^0-9+]/', '', $settings['phone']) }}" target="_self" class="big-button"><i
                        class="fa fa-phone mr-1"></i><span>{{ $settings['cta_button_text'] ?? __('common.get_appointment') }}</span></a>
                @endif
            </div>
        </div>
    </div>
    <div class="bottom-bar">
        <div class="container"><a href="{{ url('/') }}" class="logo">
            @if(isset($settings['logo']) && $settings['logo'])
                <img src="{{ asset('storage/' . $settings['logo']) }}" alt="{{ $settings['site_name'] ?? config('app.name') }}"/>
            @else
                <img src="{{ url('/') }}/assets/uploads/w-logo.png" alt="{{ $settings['site_name'] ?? config('app.name') }}"/>
            @endif
        </a>
            <div class="d-flex align-items-center justify-content-end justify-content-lg-between w-100">
                <div class="mobile-menu"><i class="fa fa-bars"></i></div>
                <div class="menu">
                    <nav>
                        <ul>
                            <li><a href="{{ url('/') }}">{{ __('common.home') }}</a></li>
                            <li><a href="{{ url('/hakkimizda') }}">{{ __('common.about_us') }}</a></li>
                            <li><a href="{{ url('/hizmetlerimiz') }}">{{ __('common.services') }}</a></li>
                            <li><a href="{{ url('/galeri') }}">{{ __('common.gallery') }}</a></li>
                            <li><a href="{{ url('/iletisim') }}">{{ __('common.contact_us') }}</a></li>
                            @if(isset($settings['phone']) && $settings['phone'])
                            <li class="d-lg-none"><a href="tel://{{ preg_replace('/[^0-9+]/', '', $settings['phone']) }}" target="_self" class="big-button"><i
                                        class="fa fa-phone mr-1"></i><span>{{ $settings['cta_button_text'] ?? __('common.get_appointment') }}</span></a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <div class="lang">
                    <ul>
                        <li>
                            <a href="{{ route('language.switch', 'tr') }}" class="{{ app()->getLocale() == 'tr' ? 'active' : '' }}">
                                <img src="{{ url('/') }}/assets/images/tr.png" alt="Türkçe"/>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('language.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">
                                <img src="{{ url('/') }}/assets/images/en.png" alt="English"/>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
