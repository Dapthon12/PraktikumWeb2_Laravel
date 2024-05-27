<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bantuan Penduduk</title>
    <link rel="stylesheet" href="{{ asset('/lib/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('/lib/css/index.css') }}">
    <script type="text/javascript" src="{{ asset('/lib/js/jquery.min.js') }}"></script>
</head>

<body onload="menuSamping()">
    <!-- Rest of your body content -->
    <div>
        <div class="sidebar p-4 bg-success menu" id="sidebar">
            <img src="{{ asset('/lib/img/logo.png') }}" width="130" alt="">
            <h4 class="mb-5 text-white">KAB. BATOLA</h4>
            <li>
                <a class="text-white" href="{{route('penduduk.index')}}">
                    <i class="bi bi-book mr-2"></i>
                    Data Penduduk
                </a>
            </li>
            <li>
                <a class="text-white" href="{{route('sembako.index')}}">
                    <i class="bi bi-flower1 mr-2"></i>
                    Bantuan Sembako
                </a>
            </li>
            <li>
                <a class="text-white" href="{{route('tunai.index')}}">
                    <i class="bi bi-inboxes-fill mr-2"></i>
                    Bantuan Tunai / BLT
                </a>
            </li>
            <li>
                <a class="text-white" href="{{route('rumah.index')}}">
                    <i class="bi bi-stickies-fill mr-2"></i>
                    Bantuan Bedah Rumah
                </a>
            </li>
        </div>
    </div>
    <div></div>
    <div class="p-4" id="main-content">
        <div class="row">
            <div class="col-sm-1">
                <button class="btn btn-success" id="btn-toggle" onclick="menuSamping()">
                    <i class="bi bi-list"></i>
                </button>
            </div>
            <div class="col-sm-6">
                <!-- bagian judul halaman website-->
                <h3 align="justify"> @yield('judul_halaman') </h3>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-body">
                <!-- bagian konten blog -->
                @yield('konten')
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('/lib/js/bootstrap.js')
}}"></script>
    <script type="text/javascript" src="{{ asset('/lib/js/datatables.min.js')
}}"></script>
    <script type="text/javascript">
        function menuSamping() {
            document.getElementById("sidebar").classList.toggle("active-sidebar");
            document.getElementById("main-content").classList.toggle("active-main-content");
        }
    </script>
</body>


</html>