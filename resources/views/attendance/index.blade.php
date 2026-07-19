@extends('layouts.app')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>
        <i class="bi bi-calendar-check-fill"></i>
        الحضور والانصراف
    </h2>

    <a href="{{ route('attendance.create') }}" class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>

        تسجيل حضور

    </a>

</div>

<div class="card shadow">

<div class="card-body">

<table class="table table-hover table-bordered align-middle">

<thead class="table-dark">

<tr>

<th>#</th>
<th>الموظف</th>
<th>التاريخ</th>
<th>الحضور</th>
<th>الانصراف</th>
<th>الحالة</th>

</tr>

</thead>

<tbody>

@forelse($attendances as $attendance)

<tr>

<td>{{ $attendance->id }}</td>

<td>{{ $attendance->employee->name }}</td>

<td>{{ $attendance->attendance_date }}</td>

<td>{{ $attendance->check_in }}</td>

<td>

{{ $attendance->check_out ?? '-' }}

</td>

<td>

@if($attendance->check_out)

<span class="badge bg-success">

انصرف

</span>

@else

<a href="{{ route('attendance.edit',$attendance->id) }}"
class="btn btn-warning btn-sm">

تسجيل الانصراف

</a>

@endif

</td>

</tr>

@empty

<tr>

<td colspan="6" class="text-center">

لا يوجد حضور اليوم

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

@endsection