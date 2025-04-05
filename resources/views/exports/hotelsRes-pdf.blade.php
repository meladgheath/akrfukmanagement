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
            border-radius: 10px;
        }
        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: right; /* Align text to the right for Arabic */
        }
        .management{
            position: absolute;
            bottom: 5% ;
        }
        .management_name {
            position: absolute;
            bottom: 8%;
            left: 14%;
        }
       .department{
            position: absolute;
            bottom: 5%;
            right: 5%;
        }

        .department_name {
            position: absolute;
            bottom: 8%;
            right: 9%;
        }
        .date_from_to {
            position: absolute;
            top: 50%;
            right: 8%;
        }
    </style>
</head>
<body>
<h2>الــســـيـــد / {{$model[0]->name}}</h2>
<p>بعد التحية , , </p>
<p>نأمل منكم إجراء حجز فندقي باسم الســـادة المذكروين أدناه و ذلك في مدينة {{$model[0]->city}} :</p>
{{--<p>{{$users->name}}</p>--}}
{{--<p>{{$users->email}}</p>--}}
<table>
    <thead>
    <tr>
        <th>الإسم</th>
        <th>الإدارة</th>
        <th>رقــــم الهاتـــف</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($model as $m)
          <tr>
              <td>{{ $m->EmploymentName }}</td>
              <td>{{ $m->EmploymentManagement }}</td>
              <td>{{$m->phone}}</td>
          </tr>
      @endforeach
    </tbody>
</table>
<p class="date_from_to"> وذلك اعتبـــارا من يوم {{$model[0]->from}} م الي يوم  {{$model[0]->to}}م</p>
<h3 class="department_name">محمود البرعصي</h3>
<h3 class="department">رئيس قسم الحــجــوزات</h3>
<h3 class="management_name">محـــمد زغبية</h3>
<h3 class="management">مدير إدارة الشؤون الإدارية و العقار</h3>
</body>
</html>
