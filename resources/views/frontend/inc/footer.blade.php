<footer class="footer-3">
    <div id="newsletterSubscriptionFormResult" class="text-center"></div>
    <div class="content">
        <div id="newsletterSubscriptionFormResult" class="text-center"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div>
                        <h3>{{ $settings['site_name'] ?? config('app.name') }}</h3>
                        <p class="desc">{{ $settings['footer_text'] ?? 'Professional service provider' }}</p>
                    </div>
                    <div class="mt-5">
                        <h3>{{ __('common.follow_us') }}</h3>
                        <div class="social">
                            <nav>
                                <ul>
                                    @if(isset($settings['facebook_url']) && $settings['facebook_url'])
                                    <li><a href="{{ $settings['facebook_url'] }}" target="_blank"><i class="fab fa-facebook mr-1"></i></a></li>
                                    @endif
                                    @if(isset($settings['instagram_url']) && $settings['instagram_url'])
                                    <li><a href="{{ $settings['instagram_url'] }}" target="_blank"><i class="fab fa-instagram mr-1"></i></a></li>
                                    @endif
                                    @if(isset($settings['youtube_url']) && $settings['youtube_url'])
                                    <li><a href="{{ $settings['youtube_url'] }}" target="_blank"><i class="fab fa-youtube mr-1"></i></a></li>
                                    @endif
                                    @if(isset($settings['twitter_url']) && $settings['twitter_url'])
                                    <li><a href="{{ $settings['twitter_url'] }}" target="_blank"><i class="fab fa-twitter mr-1"></i></a></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="right-side">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 mb-4">
                                <h3>{{ __('common.corporate') }}</h3>
                                <nav class="links">
                                    <ul>
                                        <li><a href="{{ route('hakkimizda') }}">{{ __('common.about_us') }}</a></li>
                                        <li><a href="{{ route('hizmetlerimiz') }}">{{ __('common.services') }}</a></li>
                                        <li><a href="{{ route('galeri') }}">{{ __('common.gallery') }}</a></li>
                                        <li><a href="{{ route('iletisim') }}">{{ __('common.contact_us') }}</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-md-4 col-sm-6 mb-4">
                                <h3>{{ __('common.services') }}</h3>
                                <nav class="links">
                                    <ul>
                                        @php
                                            $companyId = auth()->check() && auth()->user()->company_id 
                                                ? auth()->user()->company_id 
                                                : \App\Models\Company::first()?->id;
                                            $footerServices = \App\Models\Service::where('company_id', $companyId)
                                                ->where('status', '1')
                                                ->limit(7)
                                                ->get();
                                        @endphp
                                        @if($footerServices->count() > 0)
                                            @foreach($footerServices as $service)
                                            <li><a href="{{ route('service.detail', $service->slug) }}">{{ $service->name }}</a></li>
                                            @endforeach
                                        @else
                                            <li><a href="{{ route('hizmetlerimiz') }}">{{ __('common.view_all_services') }}</a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-md-4 col-sm-6 mb-4">
                                <h3>{{ __('common.contact_us') }}</h3>
                                <nav class="links">
                                    <ul>
                                        @if(isset($settings['phone']) && $settings['phone'])
                                        <li><a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['phone']) }}"><i class="fa fa-mobile mr-1"></i>{{ $settings['phone'] }}</a></li>
                                        @endif
                                        @if(isset($settings['email']) && $settings['email'])
                                        <li><a href="mailto:{{ $settings['email'] }}"><i class="fa fa-envelope mr-1"></i>{{ $settings['email'] }}</a></li>
                                        @endif
                                        @if(isset($settings['address']) && $settings['address'])
                                        <li><a href="javascript:;"><i class="fa fa-map-marker mr-1"></i> {{ $settings['address'] }}</a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy">
        <div class="container"><span>{{ $settings['copyright_text'] ?? 'Copyright © ' . date('Y') . ' ' . ($settings['site_name'] ?? config('app.name')) . ' | All rights reserved.' }}</span>
        </div>
    </div>
</footer>
