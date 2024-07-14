<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .bg-orange-300 {
            background-color: #FFB347;
            color: white;
        }
        .bg-orange-300:hover {
            background-color: #FFA726;
            color: white;
        }
        .bg-gray-200 {
            background-color: #ECEDEF;
        }
        .sidebar-sds {
            width: 60px;
            background-color: white;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 15px 0;
        }
        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 100%;
        }
        .sidebar-item {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar-item.mt-auto {
            margin-top: auto;
        }
        .sidebar-link {
            color: #333;
            font-size: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 60px;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <aside id="sidebar">
        @include('admin.dashboard.includes.sidebar')

    </aside>

    @yield('content')
    <i class="fas fa-envelope"></i>
</div>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>


<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
</body>
</html>
