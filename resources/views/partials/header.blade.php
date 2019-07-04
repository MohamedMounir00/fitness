



<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="fontiran.com:license" content="Y68A9">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="../build/images/favicon.ico" type="image/ico"/>
    <title> {{trans('backend.web_site')}}||@yield('page_title')</title>
    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link href="https://fonts.googleapis.com/css?family=Tajawal:200,300,400,500,700,800,900&display=swap&subset=arabic" rel="stylesheet">
    <link href="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/demo/default/skins/header/base/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/demo/default/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/demo/default/skins/brand/dark.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/demo/default/skins/aside/dark.css')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/fontawesome5/css/all.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css" rel="stylesheet">
    <link href="{{asset('assets/vendors/general/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('vendors')}}/select2/dist/css/select2.min.css" rel="stylesheet">
    



@if($lang == "ar")

      <link href="{{asset('assets/demo/default/base/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/custome.rtl.css')}}" rel="stylesheet" type="text/css" />


    @else
        <link href="{{asset('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/custome.css')}}" rel="stylesheet" type="text/css" />


    @endif

    @yield('styles')
   <link href="{{asset('vendors')}}/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
   <link href="{{asset('vendors')}}/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('vendors')}}/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('vendors')}}/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('vendors')}}/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
</head>
