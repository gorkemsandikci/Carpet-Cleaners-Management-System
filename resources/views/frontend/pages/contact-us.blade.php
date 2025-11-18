@extends('frontend.layout.layout')

@section('content')

    <main>
        <div class="banner  overlap">
            <div class="bg"><img src="{{ url('/') }}/assets/images/breadcrumb-bg.jpg" alt="Bize Ulaşın"/></div>
            <div class="container">
                <h1 class="title">Bize Ulaşın</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item active">Bize Ulaşın</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="panel contact">
            <div class="container">
                <div class="d-lg-flex">
                    <div class="infos">
                        <h3 class="mb-5">İletişim Bilgilerimiz</h3>
                        <div class="">
                            <div class="item">
                                <div class="content">
                                    <h6><i class="fa fa-home"></i><span>Adres</span></h6><span> Maslak, Bilim Sk. No:5, 34398
                    Sarıyer/İstanbul</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="content">
                                    <h6><i class="fa fa-phone"></i><span>Telefon</span></h6>
                                    <div><a href="tel:05322157205">0532 215 72 05</a></div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="content">
                                    <h6><i class="fa fa-envelope"></i><span>E-posta</span></h6>
                                    <div><a
                                            href="cdn-cgi/l/email-protection.html#751c1b131a350314111c1e1a1901001e0c1c1e1418145b161a18"><span
                                                class="__cf_email__"
                                                data-cfemail="81e8efe7eec1f7e0e5e8eaeeedf5f4eaf8e8eae0ece0afe2eeec">[email&#160;protected]</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-body ">
                        <div class="big-title mb-4">
                            <h3 class="mb-5">{{ __('common.write_to_us') }}</h3>
                        </div>
                        <form method="post" action="{{ route('contact.store') }}" class="contact-form">
                            @csrf
                            <div class="form-group"><input type="text" class="form-control " name="name"
                                                           placeholder="{{ __('common.name') }}"
                                                           id="" required/></div>
                            <div class="form-group"><input type="email" class="form-control " name="email"
                                                           placeholder="{{ __('common.email') }}"
                                                           id="" required/></div>
                            <div class="form-group"><input type="text" class="form-control " name="subject"
                                                           placeholder="{{ __('common.subject') }}" id=""/></div>
                            <div class="form-group"><textarea name="message" class="form-control " placeholder="{{ __('common.message') }}"
                                                              rows="2"
                                                              id="" required></textarea></div>
                            <div class="form-result"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary contact-submit"><i
                                        class="fa fa-paper-plane mr-1"></i><span>{{ __('common.send') }}</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="map">
                <div class="">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24048.02891781857!2d28.998601409919523!3d41.112612124564414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab5bf15c34913%3A0x19571e96a2eaf2f6!2zTWFzbGFrLCBTYXLEsXllci_EsHN0YW5idWw!5e0!3m2!1str!2str!4v1667676797761!5m2!1str!2str"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </main>

@endsection
