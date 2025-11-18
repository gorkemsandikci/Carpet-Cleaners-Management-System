@extends('backend.layout.app')

@section('content')

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('common.edit_service') }}</h4>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    <form action="{{ route('panel.service.update', $service) }}" class="forms-sample" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">{{ __('common.service_name') }} *</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $service->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="short_text">{{ __('common.short_text') }}</label>
                            <textarea class="form-control" id="short_text" name="short_text" rows="3">{{ old('short_text', $service->short_text) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="content">{{ __('common.content') }}</label>
                            <textarea class="form-control" id="content" name="content" rows="10">{{ old('content', $service->content) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">{{ __('common.image') }}</label>
                            @if($service->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" style="max-width: 200px;">
                                </div>
                            @endif
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            <small class="form-text text-muted">{{ __('common.leave_empty_keep_current') }}</small>
                        </div>

                        <div class="form-group">
                            <label for="status">{{ __('common.status') }} *</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1" {{ old('status', $service->status) == '1' ? 'selected' : '' }}>{{ __('common.active') }}</option>
                                <option value="0" {{ old('status', $service->status) == '0' ? 'selected' : '' }}>{{ __('common.inactive') }}</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">{{ __('common.update') }}</button>
                        <a href="{{ route('panel.service.index') }}" class="btn btn-light">{{ __('common.cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

