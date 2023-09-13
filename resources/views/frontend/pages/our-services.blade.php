@extends('frontend.layout.layout')

@push('custom_css')
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/our-services.css">
@endpush

@section('content')

    <main>
        <div class="banner  overlap">
            <div class="bg"><img src="{{ url('/') }}/assets/images/breadcrumb-bg.jpg" alt="Hizmetlerimiz"/>
            </div>
            <div class="container"><h1 class="title">Hizmetlerimiz</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item active">Hizmetlerimiz</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="panel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <div class="section">
                                <div class="row"> </div>
                                <div class="row">
                                    @if(!empty($services) && count($services) > 0)
                                        @foreach($services as $service)
                                            <div class="col-md-6">
                                                <div class="feature">
                                                    <div class="{{ $service->id  % 2 === 0 ? 'card2' : 'card1'  }}">
                                                        <div class="icon-wrapper2"><img src="{{ url('/').$service->image }}"/>
                                                        </div>
                                                        <a class="big-readmore" href="{{  url('/').'/'.$service->slug }}">{{ $service->name }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
