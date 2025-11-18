@extends('backend.layout.app')

@section('content')
<style>
    .color-picker-wrapper {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        border: 1px solid #e0e0e0;
    }
    
    .color-preview {
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .color-hex-input {
        font-family: 'Courier New', monospace;
        font-weight: 600;
    }
    
    .form-control-color {
        border: 2px solid #e0e0e0;
        border-radius: 8px;
    }
    
    .form-control-color:hover {
        border-color: var(--primary-color, #007bff);
    }
</style>
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="font-weight-bold">Website Settings</h3>
            <a href="{{ route('panel.settings.create') }}" class="btn btn-primary">Add New Setting</a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<form action="{{ route('panel.settings.bulk-update') }}" method="POST">
    @csrf
    @foreach($settings as $group => $groupSettings)
    <div class="row mb-4">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-capitalize">
                        @if($group == 'colors_main')
                            {{ __('common.main_colors') }}
                        @elseif($group == 'colors_alternative')
                            {{ __('common.alternative_colors') }}
                        @elseif($group == 'colors_shadow')
                            {{ __('common.shadow_colors') }}
                        @elseif($group == 'colors_button')
                            {{ __('common.button_colors') }}
                        @elseif($group == 'colors_background')
                            {{ __('common.background_colors') }}
                        @else
                            {{ str_replace('_', ' ', $group) }}
                        @endif
                    </h4>
                    <div class="row">
                        @foreach($groupSettings as $setting)
                        <div class="col-md-6 mb-3">
                            <label for="setting_{{ $setting->id }}" class="form-label">
                                {{ ucwords(str_replace('_', ' ', $setting->name)) }}
                            </label>
                            
                            @if($setting->type == 'textarea')
                                <textarea 
                                    name="settings[{{ $setting->id }}]" 
                                    id="setting_{{ $setting->id }}" 
                                    class="form-control" 
                                    rows="3"
                                >{{ is_array($setting->data) ? json_encode($setting->data) : $setting->data }}</textarea>
                            
                            @elseif($setting->type == 'color')
                                <div class="color-picker-wrapper">
                                    <div class="d-flex align-items-center mb-2">
                                        <input 
                                            type="color" 
                                            name="settings[{{ $setting->id }}]" 
                                            id="setting_{{ $setting->id }}" 
                                            class="form-control form-control-color mr-2" 
                                            style="width: 80px; height: 50px; cursor: pointer; border-radius: 8px;"
                                            value="{{ is_array($setting->data) ? '#000000' : ($setting->data ?? '#000000') }}"
                                        >
                                        <input 
                                            type="text" 
                                            class="form-control color-hex-input" 
                                            id="setting_{{ $setting->id }}_hex"
                                            value="{{ is_array($setting->data) ? '#000000' : ($setting->data ?? '#000000') }}"
                                            placeholder="#000000"
                                            pattern="^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$"
                                        >
                                    </div>
                                    <div class="color-preview" style="width: 100%; height: 40px; border-radius: 8px; background: {{ is_array($setting->data) ? '#000000' : ($setting->data ?? '#000000') }}; border: 2px solid #e0e0e0; margin-top: 8px;" id="preview_{{ $setting->id }}"></div>
                                </div>
                                <script>
                                    (function() {
                                        const colorInput = document.getElementById('setting_{{ $setting->id }}');
                                        const hexInput = document.getElementById('setting_{{ $setting->id }}_hex');
                                        const preview = document.getElementById('preview_{{ $setting->id }}');
                                        
                                        function updatePreview(color) {
                                            preview.style.background = color;
                                        }
                                        
                                        colorInput.addEventListener('input', function(e) {
                                            hexInput.value = e.target.value;
                                            updatePreview(e.target.value);
                                        });
                                        
                                        hexInput.addEventListener('input', function(e) {
                                            if(/^#[0-9A-F]{6}$/i.test(e.target.value)) {
                                                colorInput.value = e.target.value;
                                                updatePreview(e.target.value);
                                            }
                                        });
                                        
                                        updatePreview(colorInput.value);
                                    })();
                                </script>
                            
                            @elseif($setting->type == 'image')
                                <div class="d-flex align-items-center">
                                    @if($setting->data)
                                        <img src="{{ asset('storage/' . $setting->data) }}" alt="" class="img-thumbnail mr-2" style="max-width: 100px;">
                                    @endif
                                    <input 
                                        type="file" 
                                        name="settings[{{ $setting->id }}]" 
                                        id="setting_{{ $setting->id }}" 
                                        class="form-control"
                                        accept="image/*"
                                    >
                                </div>
                            
                            @elseif($setting->type == 'json')
                                <textarea 
                                    name="settings[{{ $setting->id }}]" 
                                    id="setting_{{ $setting->id }}" 
                                    class="form-control" 
                                    rows="5"
                                    placeholder='{"key": "value"}'
                                >{{ is_array($setting->data) ? json_encode($setting->data, JSON_PRETTY_PRINT) : $setting->data }}</textarea>
                                <small class="form-text text-muted">Enter valid JSON format</small>
                            
                            @else
                                <input 
                                    type="{{ $setting->type }}" 
                                    name="settings[{{ $setting->id }}]" 
                                    id="setting_{{ $setting->id }}" 
                                    class="form-control" 
                                    value="{{ is_array($setting->data) ? json_encode($setting->data) : ($setting->data ?? '') }}"
                                >
                            @endif
                            
                            <small class="form-text text-muted">
                                Type: {{ $setting->type }} | 
                                <a href="{{ route('panel.settings.destroy', $setting) }}" 
                                   onclick="return confirm('Are you sure?')" 
                                   class="text-danger">Delete</a>
                            </small>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-success btn-lg">Save All Settings</button>
        </div>
    </div>
</form>
@endsection

