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
<h1>Users List</h1>
<table>
    <thead>
    <tr>
        <th>الإسم</th>
        <th>الرقم الوظيفي</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
