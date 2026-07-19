@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    📊 لوحة التحكم
</h2>

<div class="row">

    <div class="col-md-3 mb-4">

        <div class="card shadow text-center p-3">

            <h5>👥 الموظفين</h5>

            <h2>{{ $employees }}</h2>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card shadow text-center p-3">

            <h5>✅ الحضور اليوم</h5>

            <h2>{{ $todayAttendance }}</h2>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card shadow text-center p-3">

            <h5>❌ الغياب</h5>

            <h2>{{ $absent }}</h2>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card shadow text-center p-3">

            <h5>⏰ المتأخرين</h5>

            <h2>{{ $late }}</h2>

        </div>

    </div>

</div>

<div class="card shadow">

    <div class="card-header">

        <h4>آخر عمليات الحضور</h4>

    </div>

    <div class="card-body">

        <table class="table table-hover">

            <thead>

                <tr>

                    <th>الموظف</th>

                    <th>التاريخ</th>

                    <th>الحضور</th>

                    <th>الانصراف</th>

                </tr>

            </thead>

            <tbody>

            @forelse($latestAttendance as $attendance)

                <tr>

                    <td>{{ $attendance->employee->name }}</td>

                    <td>{{ $attendance->attendance_date }}</td>

                    <td>{{ $attendance->check_in }}</td>

                    <td>{{ $attendance->check_out ?? '-' }}</td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="text-center">

                        لا توجد بيانات

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection