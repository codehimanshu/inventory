<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app1.css') }}" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style="background-color: #000">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}" style="padding-top: 4px;">
                        <img src="{{ URL::to('logo.jpg') }}" height="40px;">
                    </a>
                </div>

                <div class="collapse navbar-collapse text-left" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            @if($title == "dashboard")
                                <li class="active"><a href="{{ route('home') }}">Dashboard</a></li>
                            @else
                                <li><a href="{{ route('home') }}">Dashboard</a></li>
                            @endif
                            @if($title == "inventory")
                                <li class="dropdown active">
                            @else
                                <li class="dropdown">
                            @endif
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Inventory <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-left">
                                    <li><a href="{{ route('stockInventory') }}">Warehouse</a></li>
                                    <li><a href="{{ route('tosite') }}">To Site</a></li>
                                </ul>
                            </li>
                            @if(Auth::user()->role == 1)
                                @if($title == "report")
                                    <li class="dropdown active">
                                @else
                                    <li class="dropdown">
                                @endif
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                        Generate Report <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-left">
                                        <li><a href="{{ route('stockReport') }}">Stock</a></li>
                                        <li><a href="{{ route('site1Report') }}">Site 1</a></li>
                                        <li><a href="{{ route('site2Report') }}">Site 2</a></li>
                                    </ul>
                                </li>
                            @endif
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    <footer style="bottom: 0; position: fixed; background-color: #000000a3; color: white; width: 100%;">
        <center>© Copyright 2018 Sukhmani Buildwell</center>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.table2excel.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $("#export").click(function(){
            date = new Date();
          $("#table2excel").table2excel({
            // exclude CSS class
            exclude: ".noExl",
            name: "Worksheet Name",
            filename: date+".xls" //do not include extension
          }); 
        }); 

        $(document).ready(function() {
            $('.datatable').DataTable();
        } );

        $(document).on("click", ".deleteRow", function(){
            $(this).closest('tr').remove();
        });

        $(document).on("keyup", ".costing", function(){
            costing = $(this).val();
            quantity = $(this).closest('tr').find('.quantity').val();
            console.log(costing);
            console.log(quantity);
            $(this).closest('tr').find('.amount').val(costing*quantity);
        });
    </script>

</body>
</html>
