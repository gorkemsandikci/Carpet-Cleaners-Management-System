
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('panel.index') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">{{ __('common.pano') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#customer-nav-item" aria-expanded="false" aria-controls="customer-nav-item">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">{{ __('common.customers') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="customer-nav-item">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('panel.customer.index') }}">{{ __('common.list') }}</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('panel.customer.create') }}">{{ __('common.create') }}</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('panel.service.index') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">{{ __('common.services') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('panel.gallery.index') }}">
                <i class="icon-image menu-icon"></i>
                <span class="menu-title">{{ __('common.gallery') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('panel.homepage-content.index') }}">
                <i class="icon-home menu-icon"></i>
                <span class="menu-title">{{ __('common.homepage_content') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('panel.contact-message.index') }}">
                <i class="icon-envelope menu-icon"></i>
                <span class="menu-title">{{ __('common.contact_messages') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#about-nav-item" aria-expanded="false" aria-controls="about-nav-item">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">{{ __('common.about_us') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="about-nav-item">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('panel.about.index') }}">{{ __('common.general') }}</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('panel.settings.index') }}">
                <i class="icon-settings menu-icon"></i>
                <span class="menu-title">{{ __('common.website_settings') }}</span>
            </a>
        </li>
    </ul>
</nav>
