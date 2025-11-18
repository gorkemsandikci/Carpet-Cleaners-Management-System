@extends('backend.layout.app')

@section('content')

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('common.homepage_content') }} {{ __('common.edit') }}</h4>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    <form action="{{ route('panel.homepage-content.update', $homepageContent) }}" class="forms-sample" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="section_key">{{ __('common.section') }} *</label>
                            <select class="form-control" id="section_key" name="section_key" required>
                                <option value="slider" {{ old('section_key', $homepageContent->section_key) == 'slider' ? 'selected' : '' }}>{{ __('common.slider') }}</option>
                                <option value="about" {{ old('section_key', $homepageContent->section_key) == 'about' ? 'selected' : '' }}>{{ __('common.about') }}</option>
                                <option value="features" {{ old('section_key', $homepageContent->section_key) == 'features' ? 'selected' : '' }}>{{ __('common.features') }}</option>
                                <option value="services_title" {{ old('section_key', $homepageContent->section_key) == 'services_title' ? 'selected' : '' }}>{{ __('common.services_title') }}</option>
                                <option value="faq" {{ old('section_key', $homepageContent->section_key) == 'faq' ? 'selected' : '' }}>{{ __('common.faq') }}</option>
                                <option value="counters" {{ old('section_key', $homepageContent->section_key) == 'counters' ? 'selected' : '' }}>{{ __('common.counters') }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">{{ __('common.title') }}</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $homepageContent->title) }}">
                        </div>

                        <div class="form-group">
                            <label for="content">{{ __('common.content') }}</label>
                            <textarea class="form-control" id="content" name="content" rows="10">{{ old('content', $homepageContent->content) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">{{ __('common.image') }}</label>
                            @if($homepageContent->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $homepageContent->image) }}" alt="" style="max-width: 200px;">
                                </div>
                            @endif
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            <small class="form-text text-muted">{{ __('common.leave_empty_keep_current') }}</small>
                        </div>

                        <div class="form-group">
                            <label for="button_text">{{ __('common.button_text') }}</label>
                            <input type="text" class="form-control" id="button_text" name="button_text" value="{{ old('button_text', $homepageContent->button_text) }}">
                        </div>

                        <div class="form-group">
                            <label for="button_link">{{ __('common.button_link') }}</label>
                            <input type="text" class="form-control" id="button_link" name="button_link" value="{{ old('button_link', $homepageContent->button_link) }}">
                        </div>

                        <div class="form-group">
                            <label for="order">{{ __('common.order') }}</label>
                            <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $homepageContent->order) }}" min="0">
                        </div>

                        <div class="form-group">
                            <label for="status">{{ __('common.status') }} *</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1" {{ old('status', $homepageContent->status) == '1' ? 'selected' : '' }}>{{ __('common.active') }}</option>
                                <option value="0" {{ old('status', $homepageContent->status) == '0' ? 'selected' : '' }}>{{ __('common.inactive') }}</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">{{ __('common.update') }}</button>
                        <a href="{{ route('panel.homepage-content.index') }}" class="btn btn-light">{{ __('common.cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

