<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @font-face {
            font-family: 'Amiri';
            font-style: normal;
            font-weight: 400;
            src: url({{ public_path('fonts/amiri-regular.ttf') }}) format('truetype');
        }
        body {
            font-family: 'Amiri', sans-serif;
            direction: rtl; /* Right-to-left text direction for Arabic */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: right; /* Align text to the right for Arabic */
        }
    </style>
</head>
<body>
<h1>تقرير بدل مبيت</h1>
{{--<h1>{{$data}}</h1>--}}

<table>
    <thead>
    <tr>
        <th>الإسم</th>
        <th>الرقم الوظيفي</th>
        <th>الإدارة</th>
        <th>من تاريخ</th>
        <th>الي تاريخ</th>
        <th>الأيام</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($data as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{$user->emplyee_id}}</td>
            <td>{{$user->management}}</td>
            <td>{{$user->from}}</td>
            <td>{{$user->to}}</td>
            <td>{{$user->days}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
