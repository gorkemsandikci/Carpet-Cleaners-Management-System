@extends('backend.layout.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('common.contact_messages') }}</h4>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('common.name') }}</th>
                                <th>{{ __('common.email') }}</th>
                                <th>{{ __('common.subject') }}</th>
                                <th>{{ __('common.status') }}</th>
                                <th>{{ __('common.date') }}</th>
                                <th>{{ __('common.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($messages) && count($messages) > 0)
                                @foreach($messages as $message)
                                    <tr>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->subject ?? __('common.no_subject') }}</td>
                                        <td>
                                            @if($message->status == 'unread')
                                                <span class="badge badge-warning">{{ __('common.unread') }}</span>
                                            @elseif($message->status == 'read')
                                                <span class="badge badge-info">{{ __('common.read') }}</span>
                                            @else
                                                <span class="badge badge-success">{{ __('common.replied') }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $message->created_at->format('d.m.Y H:i') }}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-info mr-2" href="{{ route('panel.contact-message.show', $message) }}">{{ __('common.view') }}</a>
                                            <form action="{{ route('panel.contact-message.destroy', $message) }}" method="POST" onsubmit="return confirm('{{ __('common.are_you_sure') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">{{ __('common.delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">{{ __('common.no_messages_found') }}.</td>
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
