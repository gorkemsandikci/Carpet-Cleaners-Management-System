@extends('frontend.layout.layout')

@section('content')

    <main>
        <div class="banner  overlap">
            <div class="bg"><img src="assets/images/breadcrumb-bg.jpg" alt="Hakkımızda"/></div>
            <div class="container">
                <h1 class="title">Hakkımızda</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item active">Hakkımızda</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="panel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <h3 data-fontsize="20" data-lineheight="30px">Profesyonel Ekip, Son Teknoloji Cihazlar</h3>
                            <p>Padişah&Beyefendi Halı Koltuk Perde Yıkama firması olarak kaliteli hizmeti herkesin
                                alabilmesi için uygun fiyatımız ve son
                                teknoloji cihazlarımız ile kendimizi geliştiriyoruz. Yaptığımız işin hakkını vermek ve
                                profesyonel
                                olarak hizmet vermek için her geçen gün kullandığımız cihazlarımızı güncelliyor,
                                ekibimizi büyütüyor ve
                                kaliteli hizmet için eğitimler ile destekliyoruz.</p>
                            <h3 data-fontsize="20" data-lineheight="30px">Kaliteli Hizmet, %100 Müşteri Memnuniyeti</h3>
                            <p>Ev veya iş yerlerinizde en çok kullandığınız eşyalardan olan koltuk ve perdelerinizin
                                temizliği
                                konusunda hizmet sunuyoruz. Uzun yıllara dayanan tecrübemiz sayesinde en ince
                                ayrıntısına kadar detaylı
                                ve titiz bir temizlik hizmeti veriyoruz. Bu sayede siz değerli müşterilerimiz bizi
                                tercih ediyorsunuz ve
                                biz de Padişah&Beyefendi Halı Koltuk Perde Yıkama olarak her geçen gün büyüyor ve
                                kalitemizi artırmayı amaçlıyoruz.</p>
                            <h3 data-fontsize="20" data-lineheight="30px">Yüzlerce Referans ve Etkili Sonuç</h3>
                            <p>instagram adresimiz&nbsp;<a href="https://www.instagram.com/vadikoltukyikama"
                                                           rel="noopener"
                                                           target="_blank">@vadikoltukyikama</a>&nbsp;sayfasındaki
                                paylaşımlara göz atabilir, yaptığımız işleri
                                görebilirsiniz. Özellikle yaptığımız işler ile ilgili öncesi sonrası hallerini
                                paylaşarak sizlere
                                sonuçlarımızı ve kaliteli işçiliğimizi göstermeyi amaçlıyoruz. Siz de ev ve iş
                                yerinizdeki her türden
                                kumaşa sahip koltuklarınızın temizlenmesi ile ilgili hemen iletişime geçebilirsiniz.</p>
                        </div>
                        <div class="gallery my-5">
                            <div class="row row-cols-1 row-cols-lg-3 row-cols-sm-2" id="photo-gallery">
                                <div class="col" data-src="/assets/uploads/hakkimizda.png"
                                     data-exthumbimage="/assets/uploads/hakkimizda.png" title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img src="assets/uploads/hakkimizda.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col" data-src="/assets/uploads/hakkimizda2.png"
                                     data-exthumbimage="/assets/uploads/hakkimizda2.png" title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img src="assets/uploads/hakkimizda2.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col" data-src="/assets/uploads/hakimizda3.png"
                                     data-exthumbimage="/assets/uploads/hakimizda3.png" title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img src="assets/uploads/hakimizda3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
