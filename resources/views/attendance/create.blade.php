@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">

        <h3>تسجيل حضور موظف</h3>

    </div>

    <div class="card-body">

        @if(session('error'))

            <div class="alert alert-danger">

                {{ session('error') }}

            </div>

        @endif

        <form method="POST" action="{{ route('attendance.store') }}">

            @csrf

            <div class="mb-3">

                <label class="form-label">

                    اختر الموظف

                </label>

                <select class="form-select" name="employee_id" required>

                    <option value="">-- اختر موظف --</option>

                    @foreach($employees as $employee)

                        <option value="{{ $employee->id }}">

                            {{ $employee->employee_code }}
                            -
                            {{ $employee->name }}
                            -
                            {{ $employee->job_title }}

                        </option>

                    @endforeach

                </select>

            </div>

            <button class="btn btn-success">

                تسجيل الحضور

            </button>

        </form>

    </div>

</div>

@endsection