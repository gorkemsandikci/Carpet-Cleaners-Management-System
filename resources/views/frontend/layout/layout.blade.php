<!DOCTYPE html>
<html lang="tr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

<head>
    <base/>
    <meta charset="UTF-8"/>
    <meta name="description"
          content="İstanbul Koltuk Yıkama, Buharlı Koltuk Yıkama ve Leke Çıkarma alanında uzmanlaşmış bir temizlik şirketidir">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Padişah&Beyefendi Halı Koltuk Perde Yıkama</title>
    <link rel="shortcut icon" href="assets/uploads/vadi-koltuk-yikama-v.1.3-1.jpg" type="image/x-icon"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/fontawesome.css"/>
    <link rel="stylesheet" href="assets/css/style061d.css?v=1.3.21"/><!-- swiper -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css"/><!-- light gallery -->
    <link rel="stylesheet" href="assets/css/lightgallery.css"/>
    <link rel="stylesheet" href="assets/css/index.css"/>
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
<div id="preloader"><img src="assets/uploads/w-logo.png" class="logo" alt="Padişah&Beyefendi Halı Koltuk Perde Yıkama"/><i
        class="fa fa-circle-notch fa-spin"></i></div>

@include('frontend.inc.header')

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
<script data-cfasync="false" src="assets/js/cloudflare-static/email-decode.min.js"></script>
<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="assets/js/settings061d.js?v=1.3.21"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/axios.min.js"></script><!-- accordion -->
<script src="assets/js/accordion.js"></script><!-- swiper -->
<script src="assets/js/swiper-bundle.min.js"></script>
<script>const instance = axios.create({
        baseURL: 'https://vadikoltukyikama.com/api/v1/',
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
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/counterup.min.js"></script>
<script
    type="text/javascript">jQuery(document).ready(function ($) {
        $(".count").counterUp({delay: 10, time: 1000,})
    })</script>
<!-- light gallery -->
<script src="assets/js/lightgallery-all.js"></script>
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
<div><a
        href="https://web.whatsapp.com/send?phone=905322157205&amp;text=Merhaba%20vadikoltukyikama.com%20Web%20Sitenizden%20Ula%c5%9f%c4%b1yorum.%20Yard%c4%b1mc%c4%b1%20Olabilir%20misiniz?"
        class="whatsapp-icon" target="_blank"><img src="assets/uploads/whatsapp.png"></a></div>
<script>
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        el = $('.whatsapp-icon');
        var oldUrl = el.attr("href"); // Get current url
        var newUrl = oldUrl.replace("https://web.whatsapp.com/", "https://api.whatsapp.com/");
        el.attr('href', newUrl);
    }
</script>
<div><a href="tel://05322157205" class="phone-icon d-lg-none"><img src="assets/uploads/phone.png"
                                                                   class="pb-2"><span>Hemen Ara</span></a></div>
</body>


</html>
