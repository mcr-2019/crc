<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Encrypted CSRF token for Laravel, in order for Ajax requests to work --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>
      {{ isset($title) ? \Illuminate\Support\Str::ucfirst($title).' :: Admin panel' : 'Admin panel' }}
    </title>

    @yield('before_styles')

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/') }}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/') }}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/') }}/dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/') }}/plugins/pace/pace.min.css">
    <link rel="stylesheet" href="{{ asset('public/vendor/backpack/pnotify/pnotify.custom.min.css') }}">

    <!-- BackPack Base CSS -->
    <link rel="stylesheet" href="{{ asset('public/vendor/backpack/backpack.base.css') }}">

    @yield('after_styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition {{ config('backpack.base.skin') }} sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo" target="_blank">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">{!! config('backpack.base.logo_mini') !!}</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">{!! config('backpack.base.logo_lg') !!}</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('backpack::base.toggle_navigation') }}</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          @include('backpack::inc.menu')
        </nav>
      </header>

      <!-- =============================================== -->

      @include('backpack::inc.sidebar')

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         @yield('header')

        <!-- Main content -->
        <section class="content">

          @yield('content')

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        @if (config('backpack.base.show_powered_by'))
            <div class="pull-right hidden-xs">
              {{ trans('backpack::base.powered_by') }} <a target="_blank" href="http://backpackforlaravel.com?ref=panel_footer_link">Backpack for Laravel</a>
            </div>
        @endif
      </footer>
    </div>
    <!-- ./wrapper -->


    @yield('before_scripts')

    <!-- jQuery 2.2.0 -->
    <script src="{{ asset('public/vendor/adminlte') }}/jquery/js/jquery-2.2.0.min.js"></script>
    
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('public/vendor/adminlte') }}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/vendor/adminlte') }}/plugins/sweetalert.min.js"></script>
    <script src="{{ asset('public/vendor/adminlte') }}/plugins/pace/pace.min.js"></script>
    <script src="{{ asset('public/vendor/adminlte') }}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('public/vendor/adminlte') }}/plugins/fastclick/fastclick.js"></script>
    <script src="{{ asset('public/vendor/adminlte') }}/dist/js/app.min.js"></script>

    <!-- page script -->
    <script type="text/javascript">
        // To make Pace works on Ajax calls
        $(document).ajaxStart(function() { Pace.restart(); });

        // Ajax calls should always have the CSRF token attached to them, otherwise they won't work
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        // Set active state on menu element
        var current_url = "{{ Request::url() }}";
        $("ul.sidebar-menu li a").each(function() {
          if ($(this).attr('href').startsWith(current_url) || current_url.startsWith($(this).attr('href')))
          {
            $(this).parents('li').addClass('active');
          }
        });
        {{-- Enable deep link to tab --}}
        var activeTab = $('[href="' + location.hash.replace("#", "#tab_") + '"]');
        activeTab && activeTab.tab('show');
        $('.nav-tabs a').on('shown.bs.tab', function (e) {
            location.hash = e.target.hash.replace("#tab_", "#");
        });
        
        function setStatusValue(elem) { 
           
          var orderStatus = jQuery(elem).val();
          var url = jQuery(elem).siblings('.change_order_status_button').data('href');
           
          jQuery(elem).siblings('.change_order_status_button').attr('href', url + '/' + orderStatus);
          jQuery(elem).siblings('.change_order_status_button').removeClass('disabled');
        }
        
        function changeAdminComment(elem, orderId) { 
           
          var button = jQuery(elem); 
          var commentContent = jQuery(elem).siblings('.change_admin_comment_content').val();
          var postUrl = "{{ url('/admin-panel/change-admin-comment') }}" + "/" + orderId;
         
          button.find('.fa-spinner').show();
           
          jQuery.post(
            postUrl,
            { content: commentContent }
          )
            .done(function( data ) {
              button.find('.fa-spinner').hide();
              window.location.reload();
            })
            .fail(function() {
              button.find('.fa-spinner').hide();
              window.location.reload();
            });
            
        }
        
        function changeMoneyReceivedAndPaymentStatus(elem, orderId) { 
            
          var button = jQuery(elem); 
          var moneyReceived = jQuery(elem).siblings('.change_money_received_content').val();
          var paymentStatus = jQuery(elem).siblings('.change_order_payment_status_select').val();
          var postUrl = "{{ url('/admin-panel/change-payment-data') }}" + "/" + orderId;
           
          button.find('.fa-spinner').show();
          
          jQuery.post(
            postUrl,
            {
              moneyReceived: moneyReceived,
              paymentStatus: paymentStatus
            }
          )
            .done(function( data ) {
              button.find('.fa-spinner').hide();
              window.location.reload();
            })
            .fail(function() {
              button.find('.fa-spinner').hide();
              window.location.reload();
            }); 
        }
        
        function changePartnerIsPaidStatus(elem, orderId) { 
            
          var button = jQuery(elem); 
          var partnerIsPaidStatus = jQuery(elem).siblings('.change_partner_is_paid_select').val();
          var postUrl = "{{ url('/admin-panel/change-partner-paid-status') }}" + "/" + orderId;
           
          button.find('.fa-spinner').show();
          
          jQuery.post(
            postUrl,
            {
              partnerIsPaidStatus: partnerIsPaidStatus
            }
          )
            .done(function( data ) {
              button.find('.fa-spinner').hide();
              window.location.reload();
            })
            .fail(function() {
              button.find('.fa-spinner').hide();
              window.location.reload();
            }); 
        }
    </script>

    @include('backpack::inc.alerts')

    @yield('after_scripts')

    <!-- JavaScripts -->
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
