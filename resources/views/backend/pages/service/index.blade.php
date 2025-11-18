@extends('backend.layout.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('common.services') }}</h4>
                    <p class="card-description">
                        <a href="{{ route('panel.service.create') }}" class="btn btn-primary">{{ __('common.add_new_service') }}</a>
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
                                <th>{{ __('common.image') }}</th>
                                <th>{{ __('common.name') }}</th>
                                <th>{{ __('common.short_text') }}</th>
                                <th>{{ __('common.status') }}</th>
                                <th>{{ __('common.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($services) && count($services) > 0)
                                @foreach($services as $service)
                                    <tr>
                                        <td>
                                            @if($service->image)
                                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" style="max-width: 100px;">
                                            @else
                                                <span class="text-muted">{{ __('common.no_image') }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ Str::limit($service->short_text ?? '', 50) }}</td>
                                        <td>
                                            @if($service->status == '1')
                                                <span class="badge badge-success">{{ __('common.active') }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ __('common.inactive') }}</span>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a class="btn btn-primary mr-2" href="{{ route('panel.service.edit', $service) }}">{{ __('common.edit') }}</a>
                                            <form action="{{ route('panel.service.destroy', $service) }}" method="POST" onsubmit="return confirm('{{ __('common.are_you_sure_delete_service') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">{{ __('common.delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">{{ __('common.no_services_found') }}. <a href="{{ route('panel.service.create') }}">{{ __('common.create_one') }}</a></td>
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

