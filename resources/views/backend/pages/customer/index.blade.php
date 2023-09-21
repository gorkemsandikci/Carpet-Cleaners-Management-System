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
                                <th>İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($customers) && count($customers) > 0)
                                @foreach($customers as $customer)
                                    <tr class="item" item-id="{{ $customer->id }}">
                                        <td>{{ $customer->first_name . ' ' . $customer->last_name }}</td>

                                        <td>{{ $customer->gender === 'male' ? 'Erkek' : ($customer->gender === 'female' ? 'Kadın' : null )}}</td>
                                        <td>{{ $customer->city_name }}</td>
                                        <td>{{ $customer->district_name }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td class="d-flex">
                                            <button class="btn detail-btn btn-info mr-2"
                                                    customer-item-id="{{ $customer->id }}">Detay
                                            </button>
                                            <a class="btn btn-primary mr-2"
                                               href="{{ route('panel.customer.edit', $customer->id) }}">Düzenle</a>
                                            <button type=button class="delete-btn btn btn-danger">Sil</button>
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
    </div><!-- the form to be viewed as dialog-->

@endsection

@section('customjs')
    <script>

        $(document).on('click', '.delete-btn', function (e) {
            e.preventDefault();
            var item = $(this).closest('.item');
            id = item.attr('item-id');
            alertify.confirm("Silmek istediğinizden emin misiniz?", "Silinen müşteri bilgileri kaybolacaktır.",
                function () {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        type: "POST",
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
    <script>

        $(document).on('click', '.detail-btn', function (e) {
            const customerID = $(this).attr('customer-item-id');

            $.ajax({
                url: "{{route('panel.customer.show', '')}}" + '/' + customerID,
                method: 'GET',
                success: function (customer) {
                    alertify.alert()
                        .setting({
                            message: `
                <div class="mb-2">
                    <b>İsim: </b> ${customer.name}
                </div>
                <div class="mb-2">
                    <b>Telefon: </b> ${customer.phone}
                </div>
                <div class="mb-2">
                    <b>Adres: </b> ${customer.address}
                </div>
                <div class="mb-2">
                    <b>Cinsiyet </b> ${customer.gender === 'male' ? 'Erkek' : (customer.gender === 'female' ? 'Kadın' : '')}
                </div>
                <div class="mb-2">
                    <b>E-Posta: </b> ${customer.email ?? '-'}
                </div>
                <div class="mb-2">
                    <b>İl: </b> ${customer.city_name}
                </div>
                <div class="mb-2">
                    <b>İlçe: </b> ${customer.district_name}
                </div>
            `,
                            title: 'Müşteri Detayları',
                            label: 'Tamam',
                            onok: function () {
                                alertify.success('Tamamlandı');
                            }
                        }).show();
                },
                error: function (error) {
                    console.log(error);
                }
            });

        });


    </script>
@endsection
