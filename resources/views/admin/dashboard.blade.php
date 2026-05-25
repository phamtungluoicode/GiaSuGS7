@extends('layouts.admin')

@section('title', 'Trang chủ - Admin')
@section('header', 'Thống kê tổng quan')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    {{-- Tổng gia sư --}}
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-indigo-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Tổng gia sư</p>
                <p class="text-3xl font-bold text-indigo-600 mt-1">{{ $totalTeachers }}</p>
            </div>
            <div class="bg-indigo-100 rounded-full p-3">
                <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Tổng người dùng --}}
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Tổng người dùng</p>
                <p class="text-3xl font-bold text-green-600 mt-1">{{ $totalUsers }}</p>
            </div>
            <div class="bg-green-100 rounded-full p-3">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Tổng lượt thuê --}}
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Tổng lượt thuê</p>
                <p class="text-3xl font-bold text-yellow-600 mt-1">{{ $totalJobs }}</p>
            </div>
            <div class="bg-yellow-100 rounded-full p-3">
                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Tổng doanh thu --}}
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-red-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Tổng doanh thu</p>
                <p class="text-3xl font-bold text-red-600 mt-1">{{ number_format($totalRevenue) }} coin</p>
            </div>
            <div class="bg-red-100 rounded-full p-3">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

{{-- Biểu đồ --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">
    {{-- Biểu đồ doanh thu theo tháng --}}
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Doanh thu theo tháng (coin)</h3>
        <div style="height: 250px;">
            <canvas id="revenueChart"></canvas>
        </div>
    </div>

    {{-- Biểu đồ lượt thuê theo tháng --}}
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Lượt thuê theo tháng</h3>
        <div style="height: 250px;">
            <canvas id="jobsChart"></canvas>
        </div>
    </div>

    {{-- Biểu đồ người dùng mới --}}
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Người dùng mới theo tháng</h3>
        <div style="height: 250px;">
            <canvas id="usersChart"></canvas>
        </div>
    </div>

    {{-- Biểu đồ trạng thái công việc --}}
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Phân bố trạng thái công việc</h3>
        <div style="height: 250px;" class="flex justify-center">
            <canvas id="jobStatusChart"></canvas>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
<script>
    var chartData = @json($chartData);

    // Biểu đồ doanh thu
    new Chart(document.getElementById('revenueChart'), {
        type: 'line',
        data: {
            labels: chartData.labels,
            datasets: [{
                label: 'Doanh thu (coin)',
                data: chartData.revenue,
                borderColor: '#ef4444',
                backgroundColor: 'rgba(239, 68, 68, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.3,
                pointBackgroundColor: '#ef4444',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 5,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: '#f3f4f6' } },
                x: { grid: { display: false } }
            }
        }
    });

    // Biểu đồ lượt thuê
    new Chart(document.getElementById('jobsChart'), {
        type: 'bar',
        data: {
            labels: chartData.labels,
            datasets: [{
                label: 'Lượt thuê',
                data: chartData.jobs,
                backgroundColor: '#eab308',
                borderColor: '#ca8a04',
                borderWidth: 1,
                borderRadius: 6,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1 }, grid: { color: '#f3f4f6' } },
                x: { grid: { display: false } }
            }
        }
    });

    // Biểu đồ người dùng mới
    new Chart(document.getElementById('usersChart'), {
        type: 'bar',
        data: {
            labels: chartData.labels,
            datasets: [
                {
                    label: 'Người dùng mới',
                    data: chartData.newUsers,
                    backgroundColor: '#22c55e',
                    borderColor: '#16a34a',
                    borderWidth: 1,
                    borderRadius: 6,
                },
                {
                    label: 'Gia sư mới',
                    data: chartData.newTeachers,
                    backgroundColor: '#6366f1',
                    borderColor: '#4f46e5',
                    borderWidth: 1,
                    borderRadius: 6,
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'top' } },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1 }, grid: { color: '#f3f4f6' } },
                x: { grid: { display: false } }
            }
        }
    });

    // Biểu đồ trạng thái công việc
    var statusLabels = [];
    var statusData = [];
    var statusColors = ['#eab308', '#22c55e', '#ef4444', '#6366f1', '#f97316'];
    var statusNames = { '0': 'Chờ xác nhận', '1': 'Đã chấp nhận', '2': 'Đã từ chối' };

    Object.keys(chartData.jobStatus).forEach(function(key, index) {
        statusLabels.push(statusNames[key] || 'Trạng thái ' + key);
        statusData.push(chartData.jobStatus[key]);
    });

    if (statusData.length === 0) {
        statusLabels = ['Chưa có dữ liệu'];
        statusData = [1];
        statusColors = ['#e5e7eb'];
    }

    new Chart(document.getElementById('jobStatusChart'), {
        type: 'doughnut',
        data: {
            labels: statusLabels,
            datasets: [{
                data: statusData,
                backgroundColor: statusColors.slice(0, statusLabels.length),
                borderWidth: 2,
                borderColor: '#fff',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom', labels: { padding: 16 } }
            }
        }
    });
</script>
@endpush
