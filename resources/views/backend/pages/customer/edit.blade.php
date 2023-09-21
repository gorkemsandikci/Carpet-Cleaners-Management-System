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


                        <div class="form-group">
                            <label for="first_name">İsim</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                   value="{{ $customer->first_name ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Soyisim</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                   value="{{ $customer->last_name ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="phone">Telefon</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                   value="{{ $customer->phone ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="gender">Cinsiyet</label>
                            @php
                                $gender = $customer->gender ?? '1';
                            @endphp
                            <select class="form-control" id="gender" name="gender">
                                <option value="other" {{$gender === '1' ? 'selected' : '' }}>Seçiniz</option>
                                <option value="male" {{$gender === 'male' ? 'selected' : '' }}>Erkek</option>
                                <option value="female" {{$gender === 'female' ? 'selected' : '' }}>Kadın</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="city_id">Şehir</label>
                            <select class="form-control" id="city_dd" name="city_id">
                                <option value="">Şehir Seç</option>
                                @if($cities)
                                    @foreach($cities as $city)
                                        <option
                                                value="{{ $city->id }}" {{ isset($customer) && $city->id == $customer->city_id ? 'selected' : '' }} >{{ $city->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="city_id">İlçe</label>
                            <select id="district_dd" class="form-control" name="district_id"></select>
                            <option value="">Şehir Seç</option>
                        </div>

                        <div class="form-group">
                            <label for="address">Açık Adres</label>
                            <textarea class="form-control" id="address" name="address"
                                      rows="3">{!! $customer->address ?? '' !!}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="special_notes">Özel Not</label>
                            <textarea class="form-control" id="special_notes" name="special_notes"
                                      rows="3">{!! $customer->special_notes ?? '' !!}
                            </textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Kaydet</button>
                        <button class="btn btn-light">İptal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customjs')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#city_dd').change(function (event) {
                getDistricts();
            });
            getDistricts();
        });

        function getDistricts() {
            var city_id = $('#city_dd').val();
            ;
            $('#district_dd').html('');
            $.ajax({
                url: "{{ url('/panel/customer/fetch-district') }}",
                type: 'POST',
                dataType: 'json',
                data: {city_id: city_id, _token: "{{ csrf_token() }}"},
                success: function (response) {
                    $('#district_dd').html(' <option value="">İlçe Seçin</option>');
                    $.each(response.districts, function (index, val) {
                        $('#district_dd').append('<option value="' + val.id + '"> ' + val.name + ' </option>')
                    });
                    $('#district_dd').val({{ empty($customer->id) ? null : $customer->district_id }});
                }
            })
        }
    </script>
@endsection
