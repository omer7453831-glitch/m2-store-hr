<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>تعديل موظف</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#eef2f7">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-warning">

<h3>تعديل بيانات الموظف</h3>

</div>

<div class="card-body">

<form action="{{ route('employees.update',$employee->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">

<label>اسم الموظف</label>

<input
type="text"
name="name"
class="form-control"
value="{{ $employee->name }}">

</div>

<div class="mb-3">

<label>رقم الهاتف</label>

<input
type="text"
name="phone"
class="form-control"
value="{{ $employee->phone }}">

</div>

<div class="mb-3">

<label>الوظيفة</label>

<input
type="text"
name="job_title"
class="form-control"
value="{{ $employee->job_title }}">

</div>

<button class="btn btn-warning">

حفظ التعديلات

</button>

<a href="{{ route('employees.index') }}" class="btn btn-secondary">

رجوع

</a>

</form>

</div>

</div>

</div>

</body>

</html>