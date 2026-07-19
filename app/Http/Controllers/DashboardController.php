<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;

class DashboardController extends Controller
{
    public function index()
    {
        $employees = Employee::count();

        $todayAttendance = Attendance::whereDate('attendance_date', today())->count();

        $absent = $employees - $todayAttendance;

        $late = Attendance::whereDate('attendance_date', today())
            ->where('late_minutes', '>', 0)
            ->count();

        $latestAttendance = Attendance::with('employee')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'employees',
            'todayAttendance',
            'absent',
            'late',
            'latestAttendance'
        ));
    }
}