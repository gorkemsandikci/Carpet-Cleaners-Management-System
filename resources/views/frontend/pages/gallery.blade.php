@extends('frontend.layout.layout')

@section('content')

    <main>
        <div class="banner  overlap">
            <div class="bg"><img src="{{ url('/') }}/assets/images/breadcrumb-bg.jpg" alt="Galeri"/></div>
            <div class="container">
                <h1 class="title">Galeri</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item active">Galeri</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="panel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="yt">
                                            <iframe width="360" height="239"
                                                    src="https://www.youtube.com/embed/7XdCtZ2tLmk"
                                                    title="Karcher Buharlı Koltuk Yıkama - Padişah&Beyefendi Halı Koltuk Perde Yıkama"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="yt">
                                            <iframe width="360" height="239"
                                                    src="https://www.youtube.com/embed/goY1AN84efQ"
                                                    title="İşyeri Koltuk, Sandalye Yıkama - Padişah&Beyefendi Halı Koltuk Perde Yıkama"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="yt">
                                            <iframe width="360" height="239"
                                                    src="https://www.youtube.com/embed/t5eYVzfs_fI"
                                                    title="Dumankaya Konsept                      Padişah&Beyefendi Halı Koltuk Perde Yıkama"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="yt">
                                            <iframe width="360" height="239"
                                                    src="https://www.youtube.com/embed/_jymqxTdya4"
                                                    title="İstanbul Kaliteli Koltuk Yıkama - Padişah&Beyefendi Halı Koltuk Perde Yıkama"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="yt">
                                            <iframe width="360" height="239"
                                                    src="https://www.youtube.com/embed/s2pPUDJQ6aQ"
                                                    title="Mall Of İstanbul Koltuk Yıkama - Padişah&Beyefendi Halı Koltuk Perde Yıkama"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="yt">
                                            <iframe width="360" height="239"
                                                    src="https://www.youtube.com/embed/yHD3bN_7N0w"
                                                    title="Yatak Yıkama - Padişah&Beyefendi Halı Koltuk Perde Yıkama"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="yt">
                                            <iframe width="360" height="239"
                                                    src="https://www.youtube.com/embed/sLNXG_fluns"
                                                    title="Buharlı Koltuk Yıkama - Padişah&Beyefendi Halı Koltuk Perde Yıkama"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="yt">
                                            <iframe width="360" height="239"
                                                    src="https://www.youtube.com/embed/_RgHTIso8zg"
                                                    title="Başakşehir Koltuk Yıkama - Padişah&Beyefendi Halı Koltuk Perde Yıkama"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="yt">
                                            <iframe width="360" height="239"
                                                    src="https://www.youtube.com/embed/0EyLiSuq-eU"
                                                    title="Sandalye Yıkama - Padişah&Beyefendi Halı Koltuk Perde Yıkama"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gallery my-5">
                            <div class="big-title">
                                <h3>Fotoğraf Galerisi</h3>
                            </div>
                            <div class="row row-cols-1 row-cols-lg-3 row-cols-sm-2" id="photo-gallery">
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-04.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-04.png" title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-04.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-03.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-03.png" title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-03.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-07.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-07.png" title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-07.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-02.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-02.png" title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-02.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-11.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-11.png" title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-11.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-12.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-12.png" title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-12.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-08.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-08.png" title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-08.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-09.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-09.png" title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-09.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-10.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-10.png" title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-10.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-06.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-06.png" title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-06.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-07.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-07.png" title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-07.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-20.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-20.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-20.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-01.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-01.png" title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-referanslar-01.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-19.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-19.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-19.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-18.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-18.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-18.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-17.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-17.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-17.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-16.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-16.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-16.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-14.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-14.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-14.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-15.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-15.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-15.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-13.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-13.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-13.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-12.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-12.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-12.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-10.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-10.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-10.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-11.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-11.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-11.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-9.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-9.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-9.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-8.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-8.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-8.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-7.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-7.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-7.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-6.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-6.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-6.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-5.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-5.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-5.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-4.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-4.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-4.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-3-1.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-3-1.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-3-1.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-2-1.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-2-1.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-2-1.png"
                                                alt=""></div>
                                    </div>
                                </div>
                                <div class="col" data-src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-1-1.png"
                                     data-exthumbimage="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-1-1.png"
                                     title="">
                                    <div class="item">
                                        <div class="image w-equal-h"><img
                                                src="{{ url('/') }}/assets/uploads/vadi-koltuk-yikama-oncesi-sonrasi-1-1.png"
                                                alt=""></div>
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
