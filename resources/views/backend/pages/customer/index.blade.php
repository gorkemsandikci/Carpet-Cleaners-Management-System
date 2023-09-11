@extends('backend.layout.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Müşteriler</h4>
                    <p class="card-description">
                        <a href="{{ route('panel.customer.create')  }}" class="btn btn-primary">Yeni Ekle</a>
                    </p>
                    @if (session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>İsim</th>
                                <th>Cinsiyet</th>
                                <th>Şehir</th>
                                <th>İlçe</th>
                                <th>Adres</th>
                                <th>Telefon</th>
                                <th>E-Posta</th>
                                <th>Durum</th>
                                <th>İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($customers) && count($customers) > 0)
                                @foreach($customers as $customer)
                                    <tr class="item" item-id="{{ $customer->id }}">
                                        <td>{{ $customer->first_name . ' ' . $customer->last_name }}</td>

                                        <td>{{ $customer->customer->gender ?? null}}</td>
                                        <td>{{ $customer->city_id }}</td>
                                        <td>{{ $customer->district_id }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="durum" data-toggle="toggle"
                                                           data-on="Aktif"
                                                           data-off="Pasif" {{ $customer->status === '1' ? 'checked' : '' }}>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="d-flex">
                                            <a class="btn btn-primary mr-2"
                                               href="{{ route('panel.customer.edit', $customer->id) }}">Düzenle</a>
                                            <button type=button class="sil-btn btn btn-danger">Sil</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customjs')
    <script>
        $(document).on('change', '.durum', function (e) {
            id = $(this).closest('.item').attr('item-id');
            state = $(this).prop('checked');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: "POST",
                url: "{{route('panel.customer.status')}}",
                data: {
                    id: id,
                    state: state
                },
                success: function (response) {
                    if (response.status == 'true') {
                        alertify.success("Müşteri Aktif Edildi");
                    } else {
                        alertify.error("Müşteri Pasif Edildi")
                    }
                }
            });
        });

        $(document).on('click', '.sil-btn', function (e) {
            e.preventDefault();
            var item = $(this).closest('.item');
            id = item.attr('item-id');
            alertify.confirm("Silmek istediğinizden emin misiniz?", "Silinen kategoryiye bir daha erişilemez.",
                function () {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        type: "DELETE",
                        url: "{{route('panel.customer.destroy')}}",
                        data: {
                            id: id
                        },
                        success: function (response) {
                            if (response.error == false) {
                                item.remove();
                                alertify.success(response.message);
                            } else {
                                alertify.error("Hata oluştu!");
                            }
                        }
                    });
                },
                function () {
                    alertify.error('İşlem iptal edildi!');
                });
        });

    </script>
@endsection
