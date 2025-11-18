@extends('backend.layout.app')

@section('content')

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('common.add_homepage_content') }}</h4>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    <form action="{{ route('panel.homepage-content.store') }}" class="forms-sample" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="section_key">{{ __('common.section') }} *</label>
                            <select class="form-control" id="section_key" name="section_key" required>
                                <option value="slider">{{ __('common.slider') }}</option>
                                <option value="about">{{ __('common.about') }}</option>
                                <option value="features">{{ __('common.features') }}</option>
                                <option value="services_title">{{ __('common.services_title') }}</option>
                                <option value="faq">{{ __('common.faq') }}</option>
                                <option value="counters">{{ __('common.counters') }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">{{ __('common.title') }}</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                        </div>

                        <div class="form-group">
                            <label for="content">{{ __('common.content') }}</label>
                            <textarea class="form-control" id="content" name="content" rows="10">{{ old('content') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">{{ __('common.image') }}</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="button_text">{{ __('common.button_text') }}</label>
                            <input type="text" class="form-control" id="button_text" name="button_text" value="{{ old('button_text') }}">
                        </div>

                        <div class="form-group">
                            <label for="button_link">{{ __('common.button_link') }}</label>
                            <input type="text" class="form-control" id="button_link" name="button_link" value="{{ old('button_link') }}">
                        </div>

                        <div class="form-group">
                            <label for="order">{{ __('common.order') }}</label>
                            <input type="number" class="form-control" id="order" name="order" value="{{ old('order', 0) }}" min="0">
                        </div>

                        <div class="form-group">
                            <label for="status">{{ __('common.status') }} *</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>{{ __('common.active') }}</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>{{ __('common.inactive') }}</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">{{ __('common.save') }}</button>
                        <a href="{{ route('panel.homepage-content.index') }}" class="btn btn-light">{{ __('common.cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

