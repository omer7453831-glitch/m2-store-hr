<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('employee')
            ->latest()
            ->get();

        return view('attendance.index', compact('attendances'));
    }

    public function create()
    {
        $employees = Employee::orderBy('name')->get();

        return view('attendance.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
        ]);

        $today = now()->toDateString();

        $attendance = Attendance::where('employee_id', $request->employee_id)
            ->where('attendance_date', $today)
            ->first();

        if ($attendance) {
            return back()->with('error', 'تم تسجيل حضور الموظف اليوم بالفعل');
        }

        Attendance::create([
            'employee_id'     => $request->employee_id,
            'attendance_date' => $today,
            'check_in'        => now()->format('H:i:s'),
            'check_out'       => null,
            'late_minutes'    => 0,
        ]);

        return redirect()->route('attendance.index')
            ->with('success', 'تم تسجيل الحضور بنجاح');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $attendance = Attendance::findOrFail($id);

        $attendance->update([
            'check_out' => now()->format('H:i:s'),
        ]);

        return redirect()->route('attendance.index')
            ->with('success', 'تم تسجيل الانصراف');
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}