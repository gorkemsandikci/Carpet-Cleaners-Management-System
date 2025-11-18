@extends('backend.layout.app')

@section('content')

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('common.create_gallery_item') }}</h4>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    <form action="{{ route('panel.gallery.store') }}" class="forms-sample" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="type">{{ __('common.type') }} *</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="image" {{ old('type') == 'image' ? 'selected' : '' }}>{{ __('common.image') }}</option>
                                <option value="video" {{ old('type') == 'video' ? 'selected' : '' }}>{{ __('common.video') }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">{{ __('common.title') }}</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                        </div>

                        <div class="form-group" id="image-field">
                            <label for="image">{{ __('common.image') }} *</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>

                        <div class="form-group" id="video-field" style="display: none;">
                            <label for="video_url">{{ __('common.video_url') }} *</label>
                            <input type="url" class="form-control" id="video_url" name="video_url" value="{{ old('video_url') }}" placeholder="https://www.youtube.com/embed/...">
                            <small class="form-text text-muted">{{ __('common.enter_youtube_embed_url') }}</small>
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
                        <a href="{{ route('panel.gallery.index') }}" class="btn btn-light">{{ __('common.cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customjs')
<script>
    $(document).ready(function() {
        $('#type').change(function() {
            if ($(this).val() == 'image') {
                $('#image-field').show();
                $('#video-field').hide();
                $('#image').prop('required', true);
                $('#video_url').prop('required', false);
            } else {
                $('#image-field').hide();
                $('#video-field').show();
                $('#image').prop('required', false);
                $('#video_url').prop('required', true);
            }
        });
        $('#type').trigger('change');
    });
</script>
@endsection

