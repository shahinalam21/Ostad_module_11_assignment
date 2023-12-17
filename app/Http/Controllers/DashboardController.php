<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Sales figures for today, yesterday, this month, and last month using Query Builder
        $todaySales = $this->getSalesForDate(now());
        $yesterdaySales = $this->getSalesForDate(now()->subDay());
        $thisMonthSales = $this->getSalesForMonth(now());
        $lastMonthSales = $this->getSalesForMonth(now()->subMonth());

        return view('admin_dashboard.admin_dashboard', compact('todaySales', 'yesterdaySales', 'thisMonthSales', 'lastMonthSales'));
    }

    private function getSalesForDate($date)
    {
        return DB::table('transactions')
            ->whereDate('created_at', $date)
            ->sum('amount');
    }

    private function getSalesForMonth($date)
    {
        return DB::table('transactions')
            ->whereYear('created_at', $date->year)
            ->whereMonth('created_at', $date->month)
            ->sum('amount');
    }
}
