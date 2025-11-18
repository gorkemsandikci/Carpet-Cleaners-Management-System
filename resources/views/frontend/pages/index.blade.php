@extends('frontend.layout.layout')

@section('content')

    <main>
        <section class="slider overlap">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slide text-center">
                        <div class="bg overlay-none"><img src="{{ url('/') }}/assets/uploads/koltuk-7.jpg" alt=""/></div>
                        <div class="content" data-swiper-parallax="-500">
                            <div class="container">
                                <h2>{{ $sliders[0]->title ?? 'Profesyonel Hizmet' }}</h2>
                                <p style="font-size: 21px; margin-bottom: 24px; color: rgba(255,255,255,0.9);">{{ $sliders[0]->content ?? 'Kaliteli hizmet, profesyonel ekip' }}</p>
                                <a href="{{ $sliders[0]->button_link ?? '#' }}" class="btn btn-primary readmore">{{ $sliders[0]->button_text ?? __('common.get_appointment') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide text-center">
                        <div class="bg overlay-none"><img src="{{ url('/') }}/assets/uploads/koltuk-8.jpg" alt=""/></div>
                        <div class="content" data-swiper-parallax="-500">
                            <div class="container">
                                <h2>{{ $sliders[1]->title ?? 'Tüm İhtiyaçlarınız İçin Profesyonel Çözümler' }}</h2>
                                <p style="font-size: 21px; margin-bottom: 24px; color: rgba(255,255,255,0.9);">{{ $sliders[1]->content ?? 'Geniş hizmet yelpazesi' }}</p>
                                <a href="{{ $sliders[1]->button_link ?? route('iletisim') }}" class="btn btn-primary readmore">{{ $sliders[1]->button_text ?? __('common.get_appointment') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide text-center">
                        <div class="bg overlay-none"><img src="{{ url('/') }}/assets/uploads/koltuk6.jpg" alt=""/></div>
                        <div class="content" data-swiper-parallax="-500">
                            <div class="container">
                                <h2>{{ $sliders[2]->title ?? 'Profesyonel Ekip, Profesyonel Hizmet!' }}</h2>
                                <p style="font-size: 21px; margin-bottom: 24px; color: rgba(255,255,255,0.9);">{{ $sliders[2]->content ?? 'Uzman kadromuz ile hizmetinizdeyiz' }}</p>
                                <a href="{{ $sliders[2]->button_link ?? route('iletisim') }}" class="btn btn-primary readmore">{{ $sliders[2]->button_text ?? __('common.get_appointment') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide text-center">
                        <div class="bg overlay-none"><img src="{{ url('/') }}/assets/uploads/koltuk4.jpg" alt=""/></div>
                        <div class="content" data-swiper-parallax="-500">
                            <div class="container"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-prev swiper-button-white nav-btn"></div>
            <div class="swiper-button-next swiper-button-white nav-btn"></div>
        </section>
        <section class="about-2" style="padding: 120px 0; background: #ffffff;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        @if($aboutContent && $aboutContent->image)
                        <div style="border-radius: 18px; overflow: hidden; box-shadow: 0 8px 32px rgba(0,0,0,0.12);">
                            <img src="{{ asset('storage/' . $aboutContent->image) }}" class="img-fluid" alt="{{ $aboutContent->title ?? '' }}"/>
                        </div>
                        @else
                        <div style="border-radius: 18px; overflow: hidden; box-shadow: 0 8px 32px rgba(0,0,0,0.12);">
                            <img src="{{ url('/') }}/assets/uploads/slider1-3.png" class="img-fluid" alt="{{ $settings['site_name'] ?? config('app.name') }}"/>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="big-title" style="text-align: left;">
                            <h5 style="font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--text-secondary, #86868b); margin-bottom: 12px;">{{ __('common.excellence') }}</h5>
                            <h3 style="font-size: 56px; font-weight: 700; letter-spacing: -0.05em; line-height: 1.05; margin-bottom: 16px;">{{ $aboutContent->title ?? $settings['site_name'] ?? config('app.name') }}</h3>
                        </div>
                        <p style="font-size: 21px; line-height: 1.47059; color: var(--text-secondary, #86868b); margin-bottom: 32px;">{{ $aboutContent->content ?? 'Profesyonel ekibimiz ile eşyalarınızın türüne özel son teknoloji cihazlar, uygun temizlik maddeleri ve uzman personel hizmet veriyoruz. Hızlı teslimat ve güvenilir hizmet sunuyoruz. 7/24 ücretsiz randevu alabilirsiniz. Geniş hizmet ağımız ve garantili çalışma prensibimiz ile hizmetinizdeyiz.' }}</p>
                        <a href="{{ route('hakkimizda') }}" class="btn btn-primary" style="font-size: 17px; padding: 12px 22px;">{{ __('common.learn_more') }}</a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Features Section - Apple Style -->
        <section style="padding: 120px 0; background: #f5f5f7;">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-3 row-cols-sm-2 justify-content-center">
                    @if(isset($features) && $features->count() > 0)
                        @foreach($features as $feature)
                        <div class="col mb-4">
                            <div class="feature">
                                <i class="fa fa-{{ $loop->iteration == 1 ? 'calendar' : ($loop->iteration == 2 ? 'faucet' : 'heart') }}"></i>
                                <h4>{{ $feature->title }}</h4>
                                <p>{{ $feature->content }}</p>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="col mb-4">
                            <div class="feature">
                                <i class="fa fa-calendar"></i>
                                <h4>{{ __('common.get_appointment') }}</h4>
                                <p>{{ __('common.appointment_description') }}</p>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="feature">
                                <i class="fa fa-faucet"></i>
                                <h4>{{ __('common.professional_service') }}</h4>
                                <p>{{ __('common.service_description') }}</p>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="feature">
                                <i class="fa fa-heart"></i>
                                <h4>{{ __('common.satisfaction') }}</h4>
                                <p>{{ __('common.satisfaction_description') }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <section class="section-big main-color" style="padding: 80px 0; background: #f5f5f7;">
            <div class="container"> 
                <div class="row">
                    <div class="col-md-12 pb-20 text-center">
                        <h2 class="section-title mb-10"><span>En Sağlıklı Ürünleri Kullanıyoruz! </span></h2>
                        <p class="section-sub-title"><strong>Genç, dinamik ve güleryüzlü ekip </strong></p>
                        <div class="exp-separator center-separator">
                            <div class="exp-separator-inner"> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <ul class="i-list medium">
                            <li class="i-list-item">
                                <div class="icon">
                                    @if(file_exists(public_path('assets/uploads/icon-1.png')))
                                    <img src="{{ url('/') }}/assets/uploads/icon-1.png" style="width:70px" alt=""/>
                                    @else
                                    <i class="fa fa-cog" style="font-size: 48px; color: var(--primary-color, #0071e3);"></i>
                                    @endif
                                </div>
                                <div class="icon-content">
                                    <h4 class="title">Özel Makina<br/>
                                        Hizmeti</h4>
                                    <p class="sub-title">Yıkama makineleri endüstriyel tip olup vakum ve yıkama işlemini
                                        güçlü
                                        motorlar sayesinde derinlemesine hijyen sağlamaktadır.</p>
                                </div>
                                <div class="iconlist-timeline"> </div>
                            </li>
                            <li class="i-list-item">
                                <div class="icon">
                                    @if(file_exists(public_path('assets/uploads/icon-2.png')))
                                    <img src="{{ url('/') }}/assets/uploads/icon-2.png" style="width:70px" alt=""/>
                                    @else
                                    <i class="fa fa-spray-can" style="font-size: 48px; color: var(--primary-color, #0071e3);"></i>
                                    @endif
                                </div>
                                <div class="icon-content">
                                    <h4 class="title">Özel Deterjan Hizmeti</h4>
                                    <p>Profesyonel doğal leke çıkarıcılarla deterjanlar ile koltuk yıkama hizmetinde
                                        kullanmakta
                                        olup, koltuklara zarar vermeden lekeleri hızla çözülmesini sağlamaktayız.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="i-list medium">
                            <li class="i-list-item">
                                <div class="icon">
                                    @if(file_exists(public_path('assets/uploads/icon-3.png')))
                                    <img src="{{ url('/') }}/assets/uploads/icon-3.png" style="width:70px" alt=""/>
                                    @else
                                    <i class="fa fa-shield-alt" style="font-size: 48px; color: var(--primary-color, #0071e3);"></i>
                                    @endif
                                </div>
                                <div class="icon-content">
                                    <h4 class="title">Özel Dezenfeksiyon Hizmeti</h4>
                                    <p class="sub-title">Buharlı Temizlik kimyasalın kullanılmadığı doğal temizlik
                                        yöntemidir.
                                        Buharın püskürtme gücünü kullanarak temizlik yapıldığı için insan sağlığını
                                        korumaktadır.
                                    </p>
                                </div>
                                <div class="iconlist-timeline"> </div>
                            </li>
                            <li class="i-list-item">
                                <div class="icon">
                                    @if(file_exists(public_path('assets/uploads/icon-4.png')))
                                    <img src="{{ url('/') }}/assets/uploads/icon-4.png" style="width:70px" alt=""/>
                                    @else
                                    <i class="fa fa-wind" style="font-size: 48px; color: var(--primary-color, #0071e3);"></i>
                                    @endif
                                </div>
                                <div class="icon-content">
                                    <h4 class="title">Özel Kurutma Hizmeti</h4>
                                    <p>Bakterilerden tamamen arındırıldığında. Alanında en iyisi olan makinalarımız
                                        yüksek
                                        vakum
                                        gücü sayesinde suyu cekilip çok hafif nemli kalarak kısa sürede koltuklarınız
                                        kurumaktadır.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="i-list medium">
                            <li class="i-list-item">
                                <div class="icon">
                                    @if(file_exists(public_path('assets/uploads/icon-5.png')))
                                    <img src="{{ url('/') }}/assets/uploads/icon-5.png" style="width:70px" alt=""/>
                                    @else
                                    <i class="fa fa-broom" style="font-size: 48px; color: var(--primary-color, #0071e3);"></i>
                                    @endif
                                </div>
                                <div class="icon-content">
                                    <h4 class="title">Özel Leke Çıkarma Hizmeti</h4>
                                    <p class="sub-title">Yıkama işlemlerini sağlarken sadece lekelerden kurtulabilmeniz
                                        için
                                        özel
                                        olarak getirilen. Profesyonel Sanayi Tipi leke çıkarıcı makinaları
                                        koltuklarınızda
                                        kullanmaktayız.</p>
                                </div>
                                <div class="iconlist-timeline"> </div>
                            </li>
                            <li class="i-list-item">
                                <div class="icon">
                                    @if(file_exists(public_path('assets/uploads/icon-6.png')))
                                    <img src="{{ url('/') }}/assets/uploads/icon-6.png" style="width:70px" alt=""/>
                                    @else
                                    <i class="fa fa-tshirt" style="font-size: 48px; color: var(--primary-color, #0071e3);"></i>
                                    @endif
                                </div>
                                <div class="icon-content">
                                    <h4 class="title">Özel Kumaş Hizmeti</h4>
                                    <p>Koltuklarınızda bulunan kumaşlara zara gelmemesi, Özelliğinin ve Yeni satın almış
                                        gibi
                                        durması işlemi için kullanmış olduğumuz, özel solusyon ile koltuklarınızı yeni
                                        gibi
                                        olacaktır.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="services-2 full" style="padding: 120px 0; background: #ffffff;">
            <div class="big-title text-center">
                <h5>PROFESYONEL OLARAK SUNDUĞUMUZ</h5>
                <h3>HİZMETLER</h3>
            </div>
            <div class="service-slider">
                <div class="swiper-wrapper">
                    @if(!empty($services) && count($services) > 0)
                        @foreach($services as $service)
                            <div class="swiper-slide">
                                <div class="slide">
                                    <div class="item">
                                        @if($service->image)
                                        <div class="image"><img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->slug }}"/></div>
                                        @endif
                                        <div class="content">
                                            <h4>{{ $service->name }}</h4>
                                            @if($service->short_text)
                                            <p>{{ $service->short_text }}</p>
                                            @endif
                                            <a href="{{ route('service.detail', $service->slug) }}" class="readmore">{{ __('common.read_more') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <section class="faq" style="padding: 80px 0; background: #ffffff;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 pr-lg-5">
                        <div class="big-title">
                            <h3>SIK SORULAN SORULAR</h3>
                        </div>
                        <div class="desc">En çok sorulan soruların bazılarını aşağıda bulabilirsiniz.</div>
                        <div>
                            <ul>
                                <li><a href="javascript:;" class="acc-head"><span>Neden Koltuk Yıkama Hizmeti
                                 Almalıyım?</span></a>
                                    <div class="acc-body">Koltuklar evimizde en çok kirlenen ve temas halinde
                                        bulunduğumuz
                                        mobilyalardan biridir. Bu yüzden yoğun olarak toza, kire, bakteriye maruz
                                        kalmaktadır.
                                        Özellikle bebekler, çocuklar ve evcil dostlar istemsizce yapmış oldukları leke
                                        ve
                                        kirlerin
                                        düzenli olarak temizlenmesi gerekmektedir.
                                    </div>
                                </li>
                                <li><a href="javascript:;" class="acc-head"><span>Neden Yatak Yıkama Hizmeti
                                 Almalıyım?</span></a>
                                    <div class="acc-body">Yataklar farkında olmasak da gün içinde en çok kullandığımız
                                        mobilyalarımızdır. Ortalama 8 saatimiz yataklarda geçmektedir. Her ne kadar fark
                                        etmesek
                                        de sağlığımızı doğrudan etkileyebilmektedir.

                                        Yataklar, toz akarı da denilen maytlar için oldukça uygun yerlerdir. Bunların
                                        yanı
                                        sıra
                                        bakteri, virüs, mantar gibi mikroorganizmalar ve böcekler içinde uygun
                                        ortamlardır.
                                        Tüm bu
                                        organizmaların temizlenmesi ve kir, toz gibi pisliklerin uzaklaştırılması sadece
                                        profesyonel yatak temizliği ile mümkündür.
                                    </div>
                                </li>
                                <li><a href="javascript:;" class="acc-head"><span>Neden Perde Yıkama Hizmeti
                                 Almalıyım?</span></a>
                                    <div class="acc-body">Özellikle farklı yapıda olan ve mekanizma sahibi özel stor,
                                        zebra
                                        gibi
                                        perdelerin temizlenmesi oldukça güçtür. Bu perdeler temizliği genellikle
                                        silinerek
                                        yapılmaktadır. Fakat silmek dışarı ile temas halinde olan bu eşyaları
                                        temizlemeye
                                        yetmemektedir. Bu özel perdelerin buharlı özel cihazlar ve temizleyip dezenfekte
                                        eden özel
                                        temizlik maddeleri ile temizlenmesi gerekmektedir.
                                    </div>
                                </li>
                                <li><a href="javascript:;" class="acc-head"><span>Neden İş Yerim İçin Hizmet
                                 Almalıyım?</span></a>
                                    <div class="acc-body">İşletmelerde mobilya ve temizlenmesi gereken eşyalar vardır.
                                        Özellikle
                                        kafe, restoran gibi yada ofis, büro gibi yerlerde bulunan koltuk, halı,
                                        halıfleks,
                                        sandalye, perde gibi eşyaların temizlenmesi ve düzenli olarak temizlenerek
                                        müşterilerini,
                                        misafirlerini ağırlaması gerekmektedir.

                                        Özellikle işletmelerin hizmet vermediği saat aralığında onların zaman kaybı
                                        olmadan
                                        verdiğimiz bu hizmet ile hem işletmeler hem de müşteriler memnun kalmaktadır. Bu
                                        temizlik
                                        işlemleri işletmenin müşterilerine verdiği değeri göstermekte ve sürekli temiz
                                        eşyalar ile
                                        karşılaşan müşterilerde bunun farkında olarak bu tarz işletmeleri tercih
                                        etmektedir.
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        @if(file_exists(public_path('assets/uploads/sss1.jpg')))
                        <div class="image" style="border-radius: 18px; overflow: hidden; box-shadow: 0 8px 32px rgba(0,0,0,0.12);">
                            <img src="{{ url('/') }}/assets/uploads/sss1.jpg" class="img-fluid" alt="SIK SORULAN SORULAR"/>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section class="counters-2" style="padding: 80px 0; background: #f5f5f7;">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                    <div class="col">
                        <div class="item"><i class="fa fa-server"></i><span class="num"><span
                                    class="count">100</span><small>%</small></span><span class="title">Son Teknoloji
                        Makineler</span></div>
                    </div>
                    <div class="col">
                        <div class="item"><i class="fa fa-handshake"></i><span class="num"><span
                                    class="count">100</span><small>%</small></span><span
                                class="title">Profesyonel Hizmet</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item"><i class="fa fa-coins"></i><span class="num"><span
                                    class="count">100</span><small>%</small></span><span
                                class="title">Uygun Fiyat</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item"><i class="fa fa-users"></i><span class="num"><span
                                    class="count">100</span><small>%</small></span><span class="title">Alanında Tecrübeli
                        Ekip</span></div>
                    </div>
                </div>
            </div>
        </section>
        </div>
        </section>

        </div>
        <section class="blog-2">
            <div class="container">
                <div class="big-title text-center mb-5">
                    <h3>Blog Yazıları</h3>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3" id="homepageBlogList"></div>
                <div class="svg-loader text-center d-none pb-4">
                    <!-- By Sam Herbert (@sherb), for everyone. More @ http://goo.gl/7AJzbL -->
                    <svg width="120" height="30"
                         viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="var(--primary-color)">
                        <circle cx="15" cy="15" r="15">
                            <animate attributeName="r" from="15" to="15" begin="0s" dur="1.5s" values="15;9;15"
                                     calcMode="linear" repeatCount="indefinite"/>
                            <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="1.5s" values="1;.5;1"
                                     calcMode="linear" repeatCount="indefinite"/>
                        </circle>
                        <circle cx="60" cy="15" r="9" fill-opacity="0.3">
                            <animate attributeName="r" from="9" to="9" begin="0s" dur="1.5s" values="9;15;9"
                                     calcMode="linear"
                                     repeatCount="indefinite"/>
                            <animate attributeName="fill-opacity" from="0.5" to="0.5" begin="0s" dur="1.5s"
                                     values=".5;1;.5"
                                     calcMode="linear" repeatCount="indefinite"/>
                        </circle>
                        <circle cx="105" cy="15" r="15">
                            <animate attributeName="r" from="15" to="15" begin="0s" dur="1.5s" values="15;9;15"
                                     calcMode="linear" repeatCount="indefinite"/>
                            <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="1.5s" values="1;.5;1"
                                     calcMode="linear" repeatCount="indefinite"/>
                        </circle>
                    </svg>
                </div>
                <div class="text-center"><a href="blog.html" class="btn btn-primary show-all">Tümünü Gör</a></div>
            </div>
        </section>
    </main>

@endsection
