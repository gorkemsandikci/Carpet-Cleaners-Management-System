<!DOCTYPE html>
<html lang="tr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

<head>
    <base/>
    <meta charset="UTF-8"/>
    <meta name="description" content="{{ $settings['meta_description'] ?? 'Company Description' }}">
    <meta name="keywords" content="{{ $settings['meta_keywords'] ?? '' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $settings['meta_title'] ?? ($settings['site_name'] ?? 'Website') }}</title>
    @if(isset($settings['site_favicon']) && $settings['site_favicon'])
        <link rel="shortcut icon" href="{{ asset('storage/' . $settings['site_favicon']) }}" type="image/x-icon"/>
    @else
        <link rel="shortcut icon" href="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-v.1.3-1.jpg" type="image/x-icon"/>
    @endif
    <style>
        :root {
            /* Main Colors */
            --primary-color: {{ $settings['primary_color'] ?? '#007bff' }};
            --secondary-color: {{ $settings['secondary_color'] ?? '#6c757d' }};
            --accent-color: {{ $settings['accent_color'] ?? '#28a745' }};
            --text-primary: {{ $settings['text_primary'] ?? '#212529' }};
            --text-secondary: {{ $settings['text_secondary'] ?? '#6c757d' }};
            
            /* Alternative Colors */
            --success-color: {{ $settings['success_color'] ?? '#28a745' }};
            --warning-color: {{ $settings['warning_color'] ?? '#ffc107' }};
            --danger-color: {{ $settings['danger_color'] ?? '#dc3545' }};
            --info-color: {{ $settings['info_color'] ?? '#17a2b8' }};
            
            /* Shadow Colors */
            --shadow-color: {{ $settings['shadow_color'] ?? '#000000' }};
            --shadow-opacity: {{ $settings['shadow_opacity'] ?? '0.15' }};
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, {{ $settings['shadow_opacity'] ?? '0.15' }});
            --shadow-md: 0 4px 6px rgba(0, 0, 0, {{ $settings['shadow_opacity'] ?? '0.15' }});
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, {{ $settings['shadow_opacity'] ?? '0.15' }});
            
            /* Button Colors */
            --button-primary: {{ $settings['button_primary'] ?? '#007bff' }};
            --button-primary-hover: {{ $settings['button_primary_hover'] ?? '#0056b3' }};
            --button-secondary: {{ $settings['button_secondary'] ?? '#6c757d' }};
            --button-text: {{ $settings['button_text'] ?? '#ffffff' }};
            
            /* Background Colors */
            --header-bg: {{ $settings['header_background'] ?? '#ffffff' }};
            --footer-bg: {{ $settings['footer_background'] ?? '#343a40' }};
            --body-bg: {{ $settings['body_background'] ?? '#ffffff' }};
            --section-bg: {{ $settings['section_background'] ?? '#f8f9fa' }};
            
            /* Modern Gradients */
            --gradient-primary: linear-gradient(135deg, {{ $settings['primary_color'] ?? '#007bff' }} 0%, {{ $settings['accent_color'] ?? '#28a745' }} 100%);
            --gradient-secondary: linear-gradient(135deg, {{ $settings['secondary_color'] ?? '#6c757d' }} 0%, {{ $settings['primary_color'] ?? '#007bff' }} 100%);
        }
        
        /* Modern Button Styles with Gradient */
        .btn-primary, .big-button {
            background: var(--button-primary) !important;
            border-color: var(--button-primary) !important;
            color: var(--button-text) !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-sm);
            border-radius: 10px;
            font-weight: 600;
            padding: 14px 28px;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 14px;
        }
        
        .btn-primary::before, .big-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .btn-primary:hover::before, .big-button:hover::before {
            left: 100%;
        }
        
        .btn-primary:hover, .big-button:hover {
            background: var(--button-primary-hover) !important;
            border-color: var(--button-primary-hover) !important;
            transform: translateY(-3px) scale(1.02);
            box-shadow: var(--shadow-lg);
        }
        
        .btn-primary:active, .big-button:active {
            transform: translateY(-1px) scale(0.98);
            box-shadow: var(--shadow-sm);
        }
        
        /* Modern Card Styles with Gradient Border */
        .card, .panel {
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            overflow: hidden;
            position: relative;
            background: white;
        }
        
        .card::before, .panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card:hover::before, .panel:hover::before {
            transform: scaleX(1);
        }
        
        .card:hover, .panel:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-6px) scale(1.01);
        }
        
        /* Header Modernization with Glass Effect */
        .header-3 {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            box-shadow: var(--shadow-sm);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .header-3 .top-bar {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }
        
        /* Footer Modernization */
        .footer-3 {
            background: var(--footer-bg) !important;
        }
        
        /* Section Backgrounds */
        section {
            background: var(--section-bg);
        }
        
        /* Modern Links */
        a {
            color: var(--primary-color);
            transition: color 0.3s ease;
        }
        
        a:hover {
            color: var(--button-primary-hover);
        }
        
        /* Modern Input Fields with Floating Label Effect */
        .form-control {
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 14px 18px;
            background: #ffffff;
            font-size: 15px;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.1), var(--shadow-sm);
            outline: none;
            transform: translateY(-1px);
            background: #ffffff;
        }
        
        .form-control::placeholder {
            color: var(--text-secondary);
            opacity: 0.6;
        }
        
        /* Modern Badges */
        .badge {
            border-radius: 6px;
            padding: 6px 12px;
            font-weight: 600;
        }
        
        /* Smooth Animations */
        * {
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
        
        /* Modern Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--section-bg);
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 5px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--button-primary-hover);
        }
    </style>
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/fontawesome.css"/>
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/style061d.css?v=1.3.21"/><!-- swiper -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/swiper-bundle.min.css"/><!-- light gallery -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/lightgallery.css"/>
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/index.css"/>
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/modern-theme.css"/>
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/apple-inspired.css"/>
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/image-fixes.css"/>
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/frontend-text-fixes.css"/>
    <meta name="google-site-verification" content="qD05B_kpyU3mFXR1Ip6Oo8ZLm6Yr-kvH-Yde-8rSbDE"/>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKTMN92');</script><!-- End Google Tag Manager -->
</head>

<body>
<div id="preloader">
    @if(isset($settings['logo']) && $settings['logo'])
        <img src="{{ asset('storage/' . $settings['logo']) }}" class="logo" alt="{{ $settings['site_name'] ?? config('app.name') }}"/>
    @else
        <img src="{{ url('/') }}/assets/uploads/w-logo.png" class="logo" alt="{{ $settings['site_name'] ?? config('app.name') }}"/>
    @endif
    <i class="fa fa-circle-notch fa-spin"></i>
</div>

@include('frontend.inc.header')

@stack('custom_css')

@yield('content')

@include('frontend.inc.footer')

<div class="cookies-message" id="cookiesMessage" style="display: none;">
    <div class="times" onclick="closeCookiesMessage()">&times;</div>
    <div class="text">Tercihhlerinizi ve tekrar ziyaretlerinizi hatırlayarak size en alakalı deneyimi sunmak için web
        sitemizde çerezler kullanıyoruz. "Kabul Et" seçeneğine tıklayarak, TÜM çerezlerin kullanımına izin vermiş
        olursunuz.
    </div>
    <div class="buttons">
        <button class="btn btn-primary text-nowrap" onclick="acceptCookie()">Kabul Et</button>
        <a
            href="cerezler-hakkinda-bilgilendirme.html" class="btn btn-link text-nowrap"
            onclick="closeCookiesMessage()">Bilgilendirme</a></div>
</div>
<script data-cfasync="false" src="{{ url('/') }}/assets/js/cloudflare-static/email-decode.min.js"></script>
<script src="{{ url('/') }}/assets/js/jquery-3.5.1.min.js"></script>
<script src="{{ url('/') }}/assets/js/settings061d.js?v=1.3.21"></script>
<script src="{{ url('/') }}/assets/js/bootstrap.min.js"></script>
<script src="{{ url('/') }}/assets/js/axios.min.js"></script><!-- accordion -->
<script src="{{ url('/') }}/assets/js/accordion.js"></script><!-- swiper -->
<script src="{{ url('/') }}/assets/js/swiper-bundle.min.js"></script>
<script>const instance = axios.create({
        baseURL: '{{ url('/') }}/api/v1/',
        headers: {'Content-Type': 'application/json', 'Accept-Language': 'tr', 'Override-Language': 'tr',}
    });
    var swiper = new Swiper(".slider, .slider-2", {
        loop: !0,
        parallax: !0,
        speed: 600,
        autoHeight: !0,
        autoplay: {delay: 5000, disableOnInteraction: !1,},
        navigation: {nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev",}
    });
    setTimeout(() => {
        const _defaults = {
            loop: !0,
            speed: 600,
            slidesPerView: 1,
            spaceBetween: 30,
            autoplay: {delay: 4000, disableOnInteraction: !1,},
            pagination: {el: ".swiper-pagination", clickable: !0,},
            breakpoints: {576: {slidesPerView: 2,}, 992: {slidesPerView: 3,}},
        };
        var swiper = new Swiper(".services-2.left .service-slider", {..._defaults});
        var swiper = new Swiper(".services-2.right .service-slider", {..._defaults});
        var swiper = new Swiper(".services-2.full .service-slider", {
            ..._defaults,
            breakpoints: {..._defaults.breakpoints, 576: {slidesPerView: 3,}, 1200: {slidesPerView: 4}}
        })
    }, 100)</script>
<!-- counter -->
<script src="{{ url('/') }}/assets/js/waypoints.min.js"></script>
<script src="{{ url('/') }}/assets/js/counterup.min.js"></script>
<script
    type="text/javascript">jQuery(document).ready(function ($) {
        $(".count").counterUp({delay: 10, time: 1000,})
    })</script>
<!-- light gallery -->
<script src="{{ url('/') }}/assets/js/lightgallery-all.js"></script>
<script>$("#photo-gallery").lightGallery({
        thumbnail: !0,
        share: !1,
        getCaptionFromTitleOrAlt: !0,
        exThumbImage: "data-exthumbimage"
    })</script>
<!-- tabs -->
<script
    type="text/javascript">$(".tab-content").hide();
    $(".tabs li:first a").addClass("active");
    $(`.${$(".tabs li:first a").attr("href")}`).fadeIn();
    $(".tabs a").click(function (e) {
        e.preventDefault();
        $(".tab-content").hide();
        $(".tabs a").removeClass("active");
        $(this).addClass("active");
        $(`.${$(this).attr("href")}`).fadeIn()
    })</script>
<!-- cookie -->
<script type="text/javascript">let cookieKey = 'tr-cookie-accept';
    let cookieExpire = '0.5';
    if (getCookie(cookieKey) == null) {
        document.getElementById("cookiesMessage").style.display = ""
    }

    function acceptCookie() {
        setCookie(cookieKey, !0, cookieExpire);
        closeCookiesMessage()
    }</script>
<script>$(document).ready(function () {
        $('.svg-loader').removeClass('d-none');
        instance.get('webservice/posts/tr/post?start=0&count=3').then(function (response) {
            let template = '';
            $.each(response.data, (key, val) => {
                let excerpt = val.attributes.excerpt || '';
                let publishtime = new Date(val.publishtime * 1000).toLocaleDateString();
                let featured_image = val.attributes.featured_image || '';
                let additional_class = "w-equal-h";
                if (featured_image.length > 0) {
                    featured_image = `<div class="image ${additional_class}"><img src="${featured_image}" alt="${val.title}"/></div>`
                }
                template += `<div class="col"><a href="${val.link}" title="${val.title}"><div class="item">${featured_image}<div class="content"><div class="time">${publishtime}</div><div class="title mb-2">${val.title}</div><div>${excerpt}</div></div></div></a></div>`
            })
            $('#homepageBlogList').append(template);
            $('.svg-loader').addClass('d-none');
            toEqual()
        }).catch(function (error) {
            $('section.blog').addClass('d-none')
        })
    })</script>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKTMN92"
            height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript><!-- End Google Tag Manager (noscript) -->
@if(isset($settings['whatsapp']) && $settings['whatsapp'])
<div><a
        href="https://web.whatsapp.com/send?phone={{ preg_replace('/[^0-9]/', '', $settings['whatsapp']) }}&amp;text={{ urlencode('Merhaba, ' . ($settings['site_name'] ?? '') . ' Web Sitenizden Ulaşıyorum. Yardımcı Olabilir misiniz?') }}"
        class="whatsapp-icon" target="_blank"><img src="{{ url('/') }}/assets/uploads/whatsapp.png"></a></div>
<script>
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        el = $('.whatsapp-icon');
        var oldUrl = el.attr("href"); // Get current url
        var newUrl = oldUrl.replace("https://web.whatsapp.com/", "https://api.whatsapp.com/");
        el.attr('href', newUrl);
    }
</script>
@endif
@if(isset($settings['phone']) && $settings['phone'])
<div><a href="tel://{{ preg_replace('/[^0-9+]/', '', $settings['phone']) }}" class="phone-icon d-lg-none"><img src="{{ url('/') }}/assets/uploads/phone.png"
                                                                   class="pb-2"><span>{{ __('common.call_now') }}</span></a></div>
@endif
</body>


</html>
