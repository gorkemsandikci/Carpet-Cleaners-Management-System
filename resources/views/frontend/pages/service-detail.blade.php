@extends('frontend.layout.layout')

@section('content')
<main>
    <div class="banner overlap">
        <div class="bg">
            @if($service->image)
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}"/>
            @else
                <img src="{{ url('/') }}/assets/images/breadcrumb-bg.jpg" alt="{{ $service->name }}"/>
            @endif
        </div>
        <div class="container">
            <h1 class="title">{{ $service->name }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i> {{ __('common.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('hizmetlerimiz') }}">{{ __('common.services') }}</a></li>
                    <li class="breadcrumb-item active">{{ $service->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    
    <section style="padding: 80px 0; background: #ffffff;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-detail-content">
                        @if($service->image)
                        <div class="mb-5" style="border-radius: 18px; overflow: hidden; box-shadow: 0 8px 32px rgba(0,0,0,0.12);">
                            <img src="{{ asset('storage/' . $service->image) }}" class="img-fluid w-100" alt="{{ $service->name }}"/>
                        </div>
                        @endif
                        
                        @if($service->short_text)
                        <div class="lead mb-4" style="font-size: 21px; line-height: 1.47059; color: var(--text-secondary, #86868b);">
                            {{ $service->short_text }}
                        </div>
                        @endif
                        
                        @if($service->content)
                        <div class="content-text" style="font-size: 17px; line-height: 1.47059; color: var(--text-primary, #1d1d1f);">
                            {!! $service->content !!}
                        </div>
                        @else
                        <div class="content-text" style="font-size: 17px; line-height: 1.47059; color: var(--text-primary, #1d1d1f);">
                            <p>{{ __('common.service_content_coming_soon') }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="service-sidebar" style="position: sticky; top: 100px;">
                        <div class="card" style="border-radius: 18px; padding: 32px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                            <h3 style="font-size: 24px; font-weight: 600; margin-bottom: 24px; color: var(--text-primary, #1d1d1f);">
                                {{ __('common.get_appointment') }}
                            </h3>
                            
                            @if(isset($settings['phone']) && $settings['phone'])
                            <div class="mb-4">
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['phone']) }}" class="btn btn-primary w-100" style="font-size: 17px; padding: 14px 28px; border-radius: 12px;">
                                    <i class="fa fa-phone mr-2"></i> {{ $settings['phone'] }}
                                </a>
                            </div>
                            @endif
                            
                            @if(isset($settings['email']) && $settings['email'])
                            <div class="mb-4">
                                <a href="mailto:{{ $settings['email'] }}" class="btn btn-secondary w-100" style="font-size: 17px; padding: 14px 28px; border-radius: 12px; background: var(--secondary-color, #6c757d); border: none;">
                                    <i class="fa fa-envelope mr-2"></i> {{ __('common.email') }}
                                </a>
                            </div>
                            @endif
                            
                            <div class="mt-4 pt-4" style="border-top: 1px solid #e5e7eb;">
                                <h4 style="font-size: 19px; font-weight: 600; margin-bottom: 16px; color: var(--text-primary, #1d1d1f);">
                                    {{ __('common.why_choose_us') }}
                                </h4>
                                <ul style="list-style: none; padding: 0;">
                                    <li style="padding: 8px 0; color: var(--text-secondary, #86868b);">
                                        <i class="fa fa-check-circle mr-2" style="color: var(--accent-color, #28a745);"></i>
                                        {{ __('common.professional_team') }}
                                    </li>
                                    <li style="padding: 8px 0; color: var(--text-secondary, #86868b);">
                                        <i class="fa fa-check-circle mr-2" style="color: var(--accent-color, #28a745);"></i>
                                        {{ __('common.modern_equipment') }}
                                    </li>
                                    <li style="padding: 8px 0; color: var(--text-secondary, #86868b);">
                                        <i class="fa fa-check-circle mr-2" style="color: var(--accent-color, #28a745);"></i>
                                        {{ __('common.quality_service') }}
                                    </li>
                                    <li style="padding: 8px 0; color: var(--text-secondary, #86868b);">
                                        <i class="fa fa-check-circle mr-2" style="color: var(--accent-color, #28a745);"></i>
                                        {{ __('common.customer_satisfaction') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @if(isset($relatedServices) && $relatedServices->count() > 0)
    <section style="padding: 80px 0; background: #f5f5f7;">
        <div class="container">
            <div class="big-title text-center mb-5">
                <h3 style="font-size: 40px; font-weight: 700; letter-spacing: -0.05em; margin-bottom: 12px;">
                    {{ __('common.related_services') }}
                </h3>
            </div>
            <div class="row row-cols-1 row-cols-md-3">
                @foreach($relatedServices as $relatedService)
                <div class="col mb-4">
                    <div class="card service-item" style="border-radius: 18px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">
                        @if($relatedService->image)
                        <div style="overflow: hidden; height: 200px;">
                            <img src="{{ asset('storage/' . $relatedService->image) }}" class="img-fluid w-100" style="object-fit: cover; transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);" alt="{{ $relatedService->name }}"/>
                        </div>
                        @endif
                        <div class="card-body" style="padding: 24px;">
                            <h4 style="font-size: 24px; font-weight: 600; margin-bottom: 12px; color: var(--text-primary, #1d1d1f);">
                                {{ $relatedService->name }}
                            </h4>
                            @if($relatedService->short_text)
                            <p style="font-size: 17px; line-height: 1.47059; color: var(--text-secondary, #86868b); margin-bottom: 16px;">
                                {{ Str::limit($relatedService->short_text, 100) }}
                            </p>
                            @endif
                            <a href="{{ route('service.detail', $relatedService->slug) }}" class="btn btn-primary" style="font-size: 17px; padding: 12px 22px; border-radius: 12px;">
                                {{ __('common.learn_more') }}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</main>

<style>
.service-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 32px rgba(0,0,0,0.12) !important;
}

.service-item:hover img {
    transform: scale(1.1);
}
</style>
@endsection

