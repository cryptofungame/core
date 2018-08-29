<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.3.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>ورود</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
{{-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/> --}}
{!! Html::style('assets/global/css/style.css') !!}
{!! Html::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
{!! Html::style('assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css') !!}
{!! Html::style('assets/global/plugins/uniform/css/uniform.default.css') !!}
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
{!! Html::style('assets/admin/pages/css/login-rtl.css') !!}
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
{!! Html::style('assets/global/css/components-md-rtl.css', array("id" =>"style_components")) !!}
{!! Html::style('assets/global/css/plugins-md-rtl.css') !!}
{!! Html::style('assets/admin/layout/css/layout-rtl.css') !!}
{!! Html::style('assets/admin/layout/css/themes/default-rtl.css', array("id" => "style_color")) !!}
{!! Html::style('assets/admin/layout/css/custom-rtl.css') !!}
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->

<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/verify') }}">
                        {!! csrf_field() !!}
        <h3 class="form-title"><p>ورود به سیستم</p></h3>
        <h6 align="center" style="color:red"><p>{!! @$error !!}</p></h6>
      
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">نام کاربری</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="نام کاربری" name="username"/>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">گذرواژه</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="گذر واژه" name="password"/>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-success uppercase">ورود</button>
            
        </div>
       
    </form>
    <!-- END REGISTRATION FORM -->
</div>
<div class="copyright">
    
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
{!! Html::script('assets/global/plugins/respond.min.js') !!}
{!! Html::script('assets/global/plugins/excanvas.min.js') !!} 
<![endif]-->
{!! Html::script('assets/global/plugins/jquery.min.js') !!}
{!! Html::script('assets/global/plugins/jquery-migrate.min.js') !!}
{!! Html::script('assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('assets/global/plugins/jquery.blockui.min.js') !!}
{!! Html::script('assets/global/plugins/uniform/jquery.uniform.min.js') !!}
{!! Html::script('assets/global/plugins/jquery.cokie.min.js') !!}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{!! Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') !!}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{!! Html::script('assets/global/scripts/metronic.js') !!}
{!! Html::script('assets/admin/layout/scripts/layout.js') !!}
{!! Html::script('assets/admin/layout/scripts/demo.js') !!}
{!! Html::script('assets/admin/pages/scripts/login.js') !!}
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
