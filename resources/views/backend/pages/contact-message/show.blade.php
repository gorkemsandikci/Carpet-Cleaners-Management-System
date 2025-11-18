@extends('backend.layout.app')

@section('content')

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('common.contact_message') }} {{ __('common.details') }}</h4>
                    
                    <div class="mb-3">
                        <strong>{{ __('common.name') }}:</strong> {{ $contactMessage->name }}
                    </div>
                    <div class="mb-3">
                        <strong>{{ __('common.email') }}:</strong> <a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a>
                    </div>
                    @if($contactMessage->subject)
                    <div class="mb-3">
                        <strong>{{ __('common.subject') }}:</strong> {{ $contactMessage->subject }}
                    </div>
                    @endif
                    <div class="mb-3">
                        <strong>{{ __('common.date') }}:</strong> {{ $contactMessage->created_at->format('d.m.Y H:i') }}
                    </div>
                    <div class="mb-3">
                        <strong>{{ __('common.status') }}:</strong> 
                        @if($contactMessage->status == 'unread')
                            <span class="badge badge-warning">{{ __('common.unread') }}</span>
                        @elseif($contactMessage->status == 'read')
                            <span class="badge badge-info">{{ __('common.read') }}</span>
                        @else
                            <span class="badge badge-success">{{ __('common.replied') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <strong>{{ __('common.message') }}:</strong>
                        <div class="mt-2 p-3 bg-light rounded">
                            {!! nl2br(e($contactMessage->message)) !!}
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('panel.contact-message.index') }}" class="btn btn-secondary">{{ __('common.back') }} {{ __('common.to') }} {{ __('common.list') }}</a>
                        <form action="{{ route('panel.contact-message.destroy', $contactMessage) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('common.are_you_sure') }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('common.delete') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

