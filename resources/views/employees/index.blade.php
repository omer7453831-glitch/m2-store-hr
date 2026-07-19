<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

<meta charset="UTF-8">

<title>M2 Store HR</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body style="background:#eef2f7">

<div class="container mt-5">

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<div class="card shadow">

<div class="card-header d-flex justify-content-between">

<h3>الموظفين</h3>

<a href="{{ route('employees.create') }}" class="btn btn-primary">

إضافة موظف

</a>

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>#</th>
<th>الاسم</th>
<th>الهاتف</th>
<th>الوظيفة</th>
<th>التحكم</th>

</tr>

</thead>

<tbody>

@foreach($employees as $employee)

<tr>

<td>{{ $employee->id }}</td>

<td>{{ $employee->name }}</td>

<td>{{ $employee->phone }}</td>

<td>{{ $employee->job_title }}</td>

<td>

<a
href="{{ route('employees.edit',$employee->id) }}"
class="btn btn-warning btn-sm">

<i class="bi bi-pencil"></i>

</a>

<form
action="{{ route('employees.destroy',$employee->id) }}"
method="POST"
style="display:inline;">

@csrf
@method('DELETE')

<button
class="btn btn-danger btn-sm"
onclick="return confirm('هل تريد حذف الموظف؟')">

<i class="bi bi-trash"></i>

</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

</body>

</html>