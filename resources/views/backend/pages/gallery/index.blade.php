@extends('backend.layout.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('common.gallery') }}</h4>
                    <p class="card-description">
                        <a href="{{ route('panel.gallery.create') }}" class="btn btn-primary">{{ __('common.add_gallery_item') }}</a>
                    </p>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('common.type') }}</th>
                                <th>{{ __('common.title') }}</th>
                                <th>{{ __('common.preview') }}</th>
                                <th>{{ __('common.order') }}</th>
                                <th>{{ __('common.status') }}</th>
                                <th>{{ __('common.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($galleries) && count($galleries) > 0)
                                @foreach($galleries as $gallery)
                                    <tr>
                                        <td>
                                            <span class="badge {{ $gallery->type == 'image' ? 'badge-info' : 'badge-warning' }}">
                                                {{ $gallery->type == 'image' ? __('common.image') : __('common.video') }}
                                            </span>
                                        </td>
                                        <td>{{ $gallery->title ?? __('common.untitled') }}</td>
                                        <td>
                                            @if($gallery->type == 'image' && $gallery->image)
                                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" style="max-width: 100px;">
                                            @elseif($gallery->type == 'video' && $gallery->video_url)
                                                <span class="text-muted">{{ __('common.video') }} URL</span>
                                            @else
                                                <span class="text-muted">{{ __('common.no_preview') }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $gallery->order }}</td>
                                        <td>
                                            @if($gallery->status == '1')
                                                <span class="badge badge-success">{{ __('common.active') }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ __('common.inactive') }}</span>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a class="btn btn-primary mr-2" href="{{ route('panel.gallery.edit', $gallery) }}">{{ __('common.edit') }}</a>
                                            <form action="{{ route('panel.gallery.destroy', $gallery) }}" method="POST" onsubmit="return confirm('{{ __('common.are_you_sure') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">{{ __('common.delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">{{ __('common.no_gallery_items_found') }}. <a href="{{ route('panel.gallery.create') }}">{{ __('common.create_one') }}</a></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
