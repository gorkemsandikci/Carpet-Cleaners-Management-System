@extends('backend.layout.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('common.homepage_content') }}</h4>
                    <p class="card-description">
                        <a href="{{ route('panel.homepage-content.create') }}" class="btn btn-primary">{{ __('common.add_homepage_content') }}</a>
                    </p>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @foreach($contents as $sectionKey => $sectionContents)
                    <div class="mb-4">
                        <h5 class="text-capitalize">{{ str_replace('_', ' ', $sectionKey) }}</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>{{ __('common.title') }}</th>
                                    <th>{{ __('common.content') }} {{ __('common.preview') }}</th>
                                    <th>{{ __('common.image') }}</th>
                                    <th>{{ __('common.order') }}</th>
                                    <th>{{ __('common.status') }}</th>
                                    <th>{{ __('common.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sectionContents as $content)
                                    <tr>
                                        <td>{{ $content->title ?? __('common.untitled') }}</td>
                                        <td>{{ Str::limit(strip_tags($content->content ?? ''), 50) }}</td>
                                        <td>
                                            @if($content->image)
                                                <img src="{{ asset('storage/' . $content->image) }}" alt="" style="max-width: 100px;">
                                            @else
                                                <span class="text-muted">{{ __('common.no_image') }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $content->order }}</td>
                                        <td>
                                            @if($content->status == '1')
                                                <span class="badge badge-success">{{ __('common.active') }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ __('common.inactive') }}</span>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a class="btn btn-primary mr-2" href="{{ route('panel.homepage-content.edit', $content) }}">{{ __('common.edit') }}</a>
                                            <form action="{{ route('panel.homepage-content.destroy', $content) }}" method="POST" onsubmit="return confirm('{{ __('common.are_you_sure') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">{{ __('common.delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endforeach

                    @if(empty($contents) || count($contents) == 0)
                        <div class="text-center">
                            <p>{{ __('common.no_content_found') }}. <a href="{{ route('panel.homepage-content.create') }}">{{ __('common.create_one') }}</a></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
