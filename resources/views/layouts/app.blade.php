<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M2 Store HR</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<div class="sidebar">

    <h3>
        M2 Store HR
    </h3>

    <a href="{{ route('employees.index') }}">
        الموظفين
    </a>

    <a href="{{ route('attendance.index') }}">
        الحضور والانصراف
    </a>

</div>

<div class="main">

    @yield('content')

</div>

</body>

</html>