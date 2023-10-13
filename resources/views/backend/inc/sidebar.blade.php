
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Pano</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#customer-nav-item" aria-expanded="false" aria-controls="customer-nav-item">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Müşteriler</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="customer-nav-item">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('panel.customer.index') }}">Listele</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('panel.customer.create') }}">Oluştur</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#services-nav-item" aria-expanded="false" aria-controls="services-nav-item">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Hizmetlerimiz(e)</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="services-nav-item">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Listele(e)</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Oluştur(e)</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#gallery-nav-item" aria-expanded="false" aria-controls="gallery-nav-item">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Galeri(e)</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="gallery-nav-item">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Listele(e)</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Oluştur(e)</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#about-nav-item" aria-expanded="false" aria-controls="about-nav-item">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Hakkımızda</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="about-nav-item">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('panel.about.index') }}">Genel</a></li>
                </ul>
            </div>
            <div class="collapse" id="about-nav-item">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">İletişim(e)</a></li>
                </ul>
            </div>
        </li>

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="">--}}
{{--                <i class="icon-grid menu-icon"></i>--}}
{{--                <span class="menu-title">İletişim Mesajları</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="">--}}
{{--                <i class="icon-grid menu-icon"></i>--}}
{{--                <span class="menu-title">Site Ayarları</span>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</nav>
