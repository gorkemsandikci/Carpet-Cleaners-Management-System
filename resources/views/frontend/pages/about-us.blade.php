@extends('frontend.layout.layout')

@section('content')

    <main>
        <div class="banner  overlap">
            <div class="bg"><img src="{{ url('/') }}/assets/images/breadcrumb-bg.jpg" alt="{{ $about_us->slug }}"/></div>
            <div class="container">
                <h1 class="title">{{ $about_us->title }}</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item active">{{ $about_us->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="panel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-5">
                            {!! $about_us->content  !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
