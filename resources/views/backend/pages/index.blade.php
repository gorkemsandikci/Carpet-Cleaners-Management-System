@extends('backend.layout.app')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">{{ __('common.welcome') }} {{ Auth::user()->name }}</h3>
                    <h6 class="font-weight-normal mb-0">{{ __('common.dashboard') }} - {{ now()->format('d M Y') }}</h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card card-tale">
                <div class="card-body">
                    <p class="mb-4">{{ __('common.total_customers') }}</p>
                    <p class="fs-30 mb-2">{{ $totalCustomers }}</p>
                    <p><a href="{{ route('panel.customer.index') }}" style="color: #1f2937; font-weight: 600;">{{ __('common.view') }} {{ __('common.all') }}</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                    <p class="mb-4">{{ __('common.active_services') }}</p>
                    <p class="fs-30 mb-2">{{ $activeServices }}</p>
                    <p class="mb-0">{{ __('common.total') }}: {{ $totalServices }} <a href="{{ route('panel.service.index') }}" style="color: #1f2937; font-weight: 600;">{{ __('common.manage') }}</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
                    <div class="card card-light-blue">
                        <div class="card-body">
                    <p class="mb-4">{{ __('common.gallery_items') }}</p>
                    <p class="fs-30 mb-2">{{ $totalGalleryItems }}</p>
                    <p><a href="{{ route('panel.gallery.index') }}" style="color: #1f2937; font-weight: 600;">{{ __('common.manage_gallery') }}</a></p>
                        </div>
                    </div>
                </div>
        <div class="col-md-3 grid-margin stretch-card">
                    <div class="card card-light-danger">
                        <div class="card-body">
                    <p class="mb-4">{{ __('common.contact_messages') }}</p>
                    <p class="fs-30 mb-2">{{ $totalMessages }}</p>
                    <p class="mb-0">
                        @if($unreadMessages > 0)
                            <span class="badge badge-warning">{{ $unreadMessages }} {{ __('common.unread') }}</span>
                        @endif
                        <a href="{{ route('panel.contact-message.index') }}" style="color: #1f2937; font-weight: 600;" class="d-block mt-1">{{ __('common.view') }} {{ __('common.all') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">{{ __('common.customer_growth') }}</p>
                    <canvas id="customerChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">{{ __('common.service_status') }}</p>
                    <canvas id="serviceChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">{{ __('common.recent_customers') }}</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('common.name') }}</th>
                                <th>{{ __('common.phone') }}</th>
                                <th>{{ __('common.date') }}</th>
                                <th>{{ __('common.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($recentCustomers->count() > 0)
                                @foreach($recentCustomers as $customer)
                                    <tr>
                                        <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                        <td>{{ $customer->phone ?? '-' }}</td>
                                        <td>{{ $customer->created_at->format('d.m.Y') }}</td>
                                        <td>
                                            <a href="{{ route('panel.customer.edit', $customer->id) }}" class="btn btn-sm btn-primary">{{ __('common.view') }}</a>
                                </td>
                            </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">{{ __('common.no_customers_found') }}</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('panel.customer.index') }}" class="btn btn-primary">{{ __('common.view_all_customers') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">{{ __('common.recent_messages') }}</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('common.name') }}</th>
                                <th>{{ __('common.email') }}</th>
                                <th>{{ __('common.date') }}</th>
                                <th>{{ __('common.status') }}</th>
                                <th>{{ __('common.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($recentMessages->count() > 0)
                                @foreach($recentMessages as $message)
                                    <tr>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->created_at->format('d.m.Y') }}</td>
                                        <td>
                                            @if($message->status == 'unread')
                                                <span class="badge badge-warning">{{ __('common.unread') }}</span>
                                            @elseif($message->status == 'read')
                                                <span class="badge badge-info">{{ __('common.read') }}</span>
                                            @else
                                                <span class="badge badge-success">{{ __('common.replied') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('panel.contact-message.show', $message) }}" class="btn btn-sm btn-info">{{ __('common.view') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">{{ __('common.no_messages_found') }}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('panel.contact-message.index') }}" class="btn btn-primary">{{ __('common.view_all_messages') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">{{ __('common.quick_actions') }}</p>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('panel.service.create') }}" class="btn btn-primary btn-block">
                                <i class="mdi mdi-plus"></i> {{ __('common.add_new_service') }}
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('panel.gallery.create') }}" class="btn btn-info btn-block">
                                <i class="mdi mdi-image"></i> {{ __('common.add_gallery_item') }}
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('panel.homepage-content.create') }}" class="btn btn-success btn-block">
                                <i class="mdi mdi-home"></i> {{ __('common.add_homepage_content') }}
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('panel.settings.index') }}" class="btn btn-warning btn-block">
                                <i class="mdi mdi-settings"></i> {{ __('common.website_settings') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customjs')
<script>
    $(document).ready(function() {
        // Customer Growth Chart
        const customerCtx = document.getElementById('customerChart');
        if (customerCtx) {
            const customerData = @json($monthlyCustomers);
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            
            // Prepare data for last 6 months
            const labels = [];
            const data = [];
            const last6Months = [];
            
            for (let i = 5; i >= 0; i--) {
                const date = new Date();
                date.setMonth(date.getMonth() - i);
                const month = date.getMonth() + 1;
                const year = date.getFullYear();
                last6Months.push({month: month, year: year});
                labels.push(months[month - 1] + ' ' + year);
                
                const found = customerData.find(c => c.month == month && c.year == year);
                data.push(found ? found.count : 0);
            }

            new Chart(customerCtx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '{{ __('common.recent_customers') }}',
                        data: data,
                        borderColor: 'rgb(75, 192, 192)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        tension: 0.1,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1,
                                precision: 0
                            }
                        }]
                    },
                    legend: {
                        display: true
                    }
                }
            });
        }

        // Service Status Chart
        const serviceCtx = document.getElementById('serviceChart');
        if (serviceCtx) {
            const serviceData = @json($serviceStatus);
            const activeCount = serviceData.find(s => s.status == '1')?.count || 0;
            const inactiveCount = serviceData.find(s => s.status == '0')?.count || 0;

            new Chart(serviceCtx, {
                type: 'doughnut',
                data: {
                    labels: ['{{ __('common.active') }}', '{{ __('common.inactive') }}'],
                    datasets: [{
                        data: [activeCount, inactiveCount],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 99, 132, 0.8)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    legend: {
                        position: 'bottom',
                    }
                }
            });
        }
    });
</script>
@endsection
