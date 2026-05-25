<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TutorJob;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function index()
    {
        $totalTeachers = User::where('role', 'teacher')
            ->where('status', 1)
            ->count();

        $totalUsers = User::where('role', 'user')->count();

        $totalJobs = TutorJob::count();

        $totalRevenue = Transaction::where('status', 'success')->sum('coin');

        // Doanh thu theo tháng (6 tháng gần nhất)
        $monthlyRevenue = Transaction::where('status', 'success')
            ->where('created_at', '>=', now()->subMonths(5)->startOfMonth())
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('SUM(coin) as total')
            )
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Lượt thuê theo tháng (6 tháng gần nhất)
        $monthlyJobs = TutorJob::where('created_at', '>=', now()->subMonths(5)->startOfMonth())
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Phân bố trạng thái công việc
        $jobStatusCounts = TutorJob::select('status', DB::raw('COUNT(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        // Người dùng mới theo tháng (6 tháng gần nhất)
        $monthlyNewUsers = User::where('role', 'user')
            ->where('created_at', '>=', now()->subMonths(5)->startOfMonth())
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        $monthlyNewTeachers = User::where('role', 'teacher')
            ->where('created_at', '>=', now()->subMonths(5)->startOfMonth())
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Tạo labels 6 tháng
        $months = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $months[] = [
                'label' => 'T' . $date->month . '/' . $date->year,
                'month' => $date->month,
                'year' => $date->year,
            ];
        }

        $revenueData = [];
        $jobsData = [];
        $newUsersData = [];
        $newTeachersData = [];
        $monthLabels = [];

        foreach ($months as $m) {
            $monthLabels[] = $m['label'];
            $revenueData[] = $monthlyRevenue->where('month', $m['month'])->where('year', $m['year'])->first()->total ?? 0;
            $jobsData[] = $monthlyJobs->where('month', $m['month'])->where('year', $m['year'])->first()->total ?? 0;
            $newUsersData[] = $monthlyNewUsers->where('month', $m['month'])->where('year', $m['year'])->first()->total ?? 0;
            $newTeachersData[] = $monthlyNewTeachers->where('month', $m['month'])->where('year', $m['year'])->first()->total ?? 0;
        }

        $chartData = [
            'labels' => $monthLabels,
            'revenue' => $revenueData,
            'jobs' => $jobsData,
            'newUsers' => $newUsersData,
            'newTeachers' => $newTeachersData,
            'jobStatus' => $jobStatusCounts,
        ];

        return view('admin.dashboard', compact(
            'totalTeachers',
            'totalUsers',
            'totalJobs',
            'totalRevenue',
            'chartData'
        ));
    }
}
