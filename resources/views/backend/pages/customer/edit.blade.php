@extends('backend.layout.app')

@section('content')

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Müşteri </h4>
                    @if($errors)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    @if (session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    @if (!empty($customer->id))
                        @php
                            $route_link = route('panel.customer.update', $customer->id)
                        @endphp
                    @else
                        @php
                            $route_link = route('panel.customer.store')
                        @endphp
                    @endif
                    <form action="{{ $route_link }}" class="forms-sample" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @if (!empty($customer->id))
                            @method('PUT')
                        @endif

                        @if (!empty($customer->image))
                            <div class="form-group">
                                <div class="input-group col-xs-12">
                                    <img width="40%" src="{{asset($customer->image)}}">
                                </div>
                            </div>
                        @endif


                        <div class="form-group">
                            <label for="baslik">Başlık</label>
                            <input type="text" class="form-control" id="baslik" name="name"
                                   value="{{ $customer->name ?? '' }}"
                                   placeholder="Başlık">
                        </div>

                        <div class="form-group">
                            <label for="aciklama">Açıklama</label>
                            <textarea class="form-control" id="aciklama" name="description" placeholder="Açıklama"
                                      rows="3">{!! $customer->content ?? '' !!}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="durum">Durum</label>
                            @php
                                $status = $customer->status ?? '1';
                            @endphp
                            <select class="form-control" id="durum" name="status">
                                <option value="1" {{$status == '1' ? 'selected' : ''}}>Aktif</option>
                                <option value="0" {{$status == '0' ? 'selected' : ''}}>Pasif</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Kaydet</button>
                        <button class="btn btn-light">İptal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
