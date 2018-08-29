<!DOCTYPE html>
<html lang="en" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>@yield('title')</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
{!! Html::script('assets/admin/layout/css/livecss.js') !!}
<!-- BEGIN GLOBAL MANDATORY STYLES -->

{!! Html::style('assets/global/css/style.css') !!}
{!! Html::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
{!! Html::style('assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css') !!}
{!! Html::style('assets/global/plugins/uniform/css/uniform.default.css') !!}
{!! Html::style('assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css') !!}
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
{!! Html::style('assets/global/css/components-md-rtl.css', array('id' => 'style_components')) !!}
{!! Html::style('assets/global/css/plugins-md-rtl.css') !!}
{!! Html::style('assets/admin/layout/css/layout-rtl.css') !!}
{!! Html::style('assets/admin/layout/css/themes/darkblue-rtl.css', array('id' => 'style_color')) !!}
{!! Html::style('assets/admin/layout/css/custom-rtl.css') !!}
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>

<body class="page-md page-header-fixed page-quick-sidebar-over-content ">

<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">

	<div class="page-header-inner">
	
		<div class="page-logo">
			
			
			
			<div class="menu-toggler sidebar-toggler hide">
			
			</div>
		</div>
		
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
	
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				
				
				<!-- END TODO DROPDOWN -->
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				
					{!! HTML::image('assets/admin/layout/img/avatar3_small.jpg', Null, array("class" => "img-circle")) !!}
					<span class="username username-hide-on-mobile">
					{{ @$_SESSION["fname"] }} </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						
						<li>
							<a href="{{ url('logout') }}">
							<i class="icon-key"></i>خروج </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				{{-- <li class="dropdown dropdown-quick-sidebar-toggler"> --}}
					{{-- <a href="javascript:;" class="dropdown-toggle"> --}}
					<i class="icon-logout"></i>
					</a>
				</li>
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				
				
				<li>
					<a href="{{ url('admin/questions') }}">
					<i class="fa fa-question"></i>
					<span class="title">سوالات</span>
					</a>
					
				</li>
				
				<li>
					<a href="{{ url('admin/levels') }}">
					<i class="fa fa-question"></i>
					<span class="title">درجه بندی سطح سوالات</span>
					</a>
					
				</li>

				<li>
					<a href="{{ url('admin/plans') }}">
					<i class="fa fa-money"></i>
					<span class="title">بسته های افزایش سکه</span>
					</a>
					
				</li>

				<li>
					<a href="{{ url('admin/users') }}">
					<i class="fa fa-users"></i>
					<span class="title">کاربران</span>
					</a>
					
				</li>

				<li>
					<a href="{{ url('admin/transactions') }}">
					<i class="fa fa-cogs"></i>
					<span class="title">تراکنش‌ها</span>
					</a>
					
				</li>	
				
				
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
            @yield('content')
		</div>
	</div>
		
			
			
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->
<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
<div class="page-quick-sidebar-wrapper">
	<div class="page-quick-sidebar">
		<div class="nav-justified">
			<ul class="nav nav-tabs nav-justified">
				<li class="active">
					<a href="#quick_sidebar_tab_1" data-toggle="tab">
					Users <span class="badge badge-danger">2</span>
					</a>
				</li>
				<li>
					<a href="#quick_sidebar_tab_2" data-toggle="tab">
					Alerts <span class="badge badge-success">7</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
					More<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu pull-right" role="menu">
						<li>
							<a href="#quick_sidebar_tab_3" data-toggle="tab">
							<i class="icon-bell"></i> Alerts </a>
						</li>
						<li>
							<a href="#quick_sidebar_tab_3" data-toggle="tab">
							<i class="icon-info"></i> Notifications </a>
						</li>
						<li>
							<a href="#quick_sidebar_tab_3" data-toggle="tab">
							<i class="icon-speech"></i> Activities </a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="#quick_sidebar_tab_3" data-toggle="tab">
							<i class="icon-settings"></i> Settings </a>
						</li>
					</ul>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
					<div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
						<h3 class="list-heading">Staff</h3>
						<ul class="media-list list-items">
							<li class="media">
								<div class="media-status">
									<span class="badge badge-success">8</span>
								</div>
							
								{!! HTML::image('assets/admin/layout/img/avatar3.jpg', Null, array("class" => "media-object", "alt" => "...")) !!}
								<div class="media-body">
									<h4 class="media-heading">Bob Nilson</h4>
									<div class="media-heading-sub">
										 Project Manager
									</div>
								</div>
							</li>
							<li class="media">
								{!! HTML::image('assets/admin/layout/img/avatar1.jpg', Null, array("class" => "media-object", "alt" => "...")) !!}
								<div class="media-body">
									<h4 class="media-heading">Nick Larson</h4>
									<div class="media-heading-sub">
										 Art Director
									</div>
								</div>
							</li>
							<li class="media">
								<div class="media-status">
									<span class="badge badge-danger">3</span>
								</div>
								{!! HTML::image('assets/admin/layout/img/avatar4.jpg', Null, array("class" => "media-object", "alt" => "...")) !!}
								<div class="media-body">
									<h4 class="media-heading">Deon Hubert</h4>
									<div class="media-heading-sub">
										 CTO
									</div>
								</div>
							</li>
							<li class="media">
								{!! HTML::image('assets/admin/layout/img/avatar2.jpg', Null, array("class" => "media-object", "alt" => "...")) !!}
								<div class="media-body">
									<h4 class="media-heading">Ella Wong</h4>
									<div class="media-heading-sub">
										 CEO
									</div>
								</div>
							</li>
						</ul>
						<h3 class="list-heading">Customers</h3>
						<ul class="media-list list-items">
							<li class="media">
								<div class="media-status">
									<span class="badge badge-warning">2</span>
								</div>
								{!! HTML::image('assets/admin/layout/img/avatar6.jpg', Null, array("class" => "media-object", "alt" => "...")) !!}
								<div class="media-body">
									<h4 class="media-heading">Lara Kunis</h4>
									<div class="media-heading-sub">
										 CEO, Loop Inc
									</div>
									<div class="media-heading-small">
										 Last seen 03:10 AM
									</div>
								</div>
							</li>
							<li class="media">
								<div class="media-status">
									<span class="label label-sm label-success">new</span>
								</div>
								{!! HTML::image('assets/admin/layout/img/avatar7.jpg', Null, array("class" => "media-object", "alt" => "...")) !!}
								<div class="media-body">
									<h4 class="media-heading">Ernie Kyllonen</h4>
									<div class="media-heading-sub">
										 Project Manager,<br>
										 SmartBizz PTL
									</div>
								</div>
							</li>
							<li class="media">
								{!! HTML::image('assets/admin/layout/img/avatar8.jpg', Null, array("class" => "media-object", "alt" => "...")) !!}
								<div class="media-body">
									<h4 class="media-heading">Lisa Stone</h4>
									<div class="media-heading-sub">
										 CTO, Keort Inc
									</div>
									<div class="media-heading-small">
										 Last seen 13:10 PM
									</div>
								</div>
							</li>
							<li class="media">
								<div class="media-status">
									<span class="badge badge-success">7</span>
								</div>
								{!! HTML::image('assets/admin/layout/img/avatar9.jpg', Null, array("class" => "media-object", "alt" => "...")) !!}
								<div class="media-body">
									<h4 class="media-heading">Deon Portalatin</h4>
									<div class="media-heading-sub">
										 CFO, H&D LTD
									</div>
								</div>
							</li>
							<li class="media">
								{!! HTML::image('assets/admin/layout/img/avatar10.jpg', Null, array("class" => "media-object", "alt" => "...")) !!}
								<div class="media-body">
									<h4 class="media-heading">Irina Savikova</h4>
									<div class="media-heading-sub">
										 CEO, Tizda Motors Inc
									</div>
								</div>
							</li>
							<li class="media">
								<div class="media-status">
									<span class="badge badge-danger">4</span>
								</div>
								{!! HTML::image('assets/admin/layout/img/avatar11.jpg', Null, array("class" => "media-object", "alt" => "...")) !!}
								<div class="media-body">
									<h4 class="media-heading">Maria Gomez</h4>
									<div class="media-heading-sub">
										 Manager, Infomatic Inc
									</div>
									<div class="media-heading-small">
										 Last seen 03:10 AM
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="page-quick-sidebar-item">
						<div class="page-quick-sidebar-chat-user">
							<div class="page-quick-sidebar-nav">
								<a href="javascript:;" class="page-quick-sidebar-back-to-list"><i class="icon-arrow-left"></i>Back</a>
							</div>
							<div class="page-quick-sidebar-chat-user-messages">
								<div class="post out">
									{!! HTML::image('assets/admin/layout/img/avatar3.jpg', Null, array("class" => "avatar", "alt" => "")) !!}
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:15</span>
										<span class="body">
										When could you send me the report ? </span>
									</div>
								</div>
								<div class="post in">
									{!! HTML::image('assets/admin/layout/img/avatar2.jpg', Null, array("class" => "avatar", "alt" => "")) !!}
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Ella Wong</a>
										<span class="datetime">20:15</span>
										<span class="body">
										Its almost done. I will be sending it shortly </span>
									</div>
								</div>
								<div class="post out">
									{!! HTML::image('assets/admin/layout/img/avatar3.jpg', Null, array("class" => "avatar", "alt" => "")) !!}
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:15</span>
										<span class="body">
										Alright. Thanks! :) </span>
									</div>
								</div>
								<div class="post in">
									{!! HTML::image('assets/admin/layout/img/avatar2.jpg', Null, array("class" => "avatar", "alt" => "")) !!}
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Ella Wong</a>
										<span class="datetime">20:16</span>
										<span class="body">
										You are most welcome. Sorry for the delay. </span>
									</div>
								</div>
								<div class="post out">
									{!! HTML::image('assets/admin/layout/img/avatar3.jpg', Null, array("class" => "avatar", "alt" => "")) !!}
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:17</span>
										<span class="body">
										No probs. Just take your time :) </span>
									</div>
								</div>
								<div class="post in">
									{!! HTML::image('assets/admin/layout/img/avatar2.jpg', Null, array("class" => "avatar", "alt" => "")) !!}
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Ella Wong</a>
										<span class="datetime">20:40</span>
										<span class="body">
										Alright. I just emailed it to you. </span>
									</div>
								</div>
								<div class="post out">
									{!! HTML::image('assets/admin/layout/img/avatar3.jpg', Null, array("class" => "avatar", "alt" => "")) !!}
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:17</span>
										<span class="body">
										Great! Thanks. Will check it right away. </span>
									</div>
								</div>
								<div class="post in">
									{!! HTML::image('assets/admin/layout/img/avatar2.jpg', Null, array("class" => "avatar", "alt" => "")) !!}
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Ella Wong</a>
										<span class="datetime">20:40</span>
										<span class="body">
										Please let me know if you have any comment. </span>
									</div>
								</div>
								<div class="post out">
									{!! HTML::image('assets/admin/layout/img/avatar3.jpg', Null, array("class" => "avatar", "alt" => "")) !!}
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:17</span>
										<span class="body">
										Sure. I will check and buzz you if anything needs to be corrected. </span>
									</div>
								</div>
							</div>
							<div class="page-quick-sidebar-chat-user-form">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Type a message here...">
									<div class="input-group-btn">
										<button type="button" class="btn blue"><i class="icon-paper-clip"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
					<div class="page-quick-sidebar-alerts-list">
						<h3 class="list-heading">General</h3>
						<ul class="feeds list-items">
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 You have 4 pending tasks. <span class="label label-sm label-warning ">
												Take action <i class="fa fa-share"></i>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 Just now
									</div>
								</div>
							</li>
							<li>
								<a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-success">
												<i class="fa fa-bar-chart-o"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 Finance Report for year 2013 has been released.
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 20 mins
									</div>
								</div>
								</a>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-danger">
												<i class="fa fa-user"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 You have 5 pending membership that requires a quick review.
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 24 mins
									</div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-shopping-cart"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 New order received with <span class="label label-sm label-success">
												Reference Number: DR23923 </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 30 mins
									</div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-success">
												<i class="fa fa-user"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 You have 5 pending membership that requires a quick review.
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 24 mins
									</div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-bell-o"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 Web server hardware needs to be upgraded. <span class="label label-sm label-warning">
												Overdue </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 2 hours
									</div>
								</div>
							</li>
							<li>
								<a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-default">
												<i class="fa fa-briefcase"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 IPO Report for year 2013 has been released.
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 20 mins
									</div>
								</div>
								</a>
							</li>
						</ul>
						<h3 class="list-heading">System</h3>
						<ul class="feeds list-items">
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 You have 4 pending tasks. <span class="label label-sm label-warning ">
												Take action <i class="fa fa-share"></i>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 Just now
									</div>
								</div>
							</li>
							<li>
								<a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-danger">
												<i class="fa fa-bar-chart-o"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 Finance Report for year 2013 has been released.
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 20 mins
									</div>
								</div>
								</a>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-default">
												<i class="fa fa-user"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 You have 5 pending membership that requires a quick review.
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 24 mins
									</div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-shopping-cart"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 New order received with <span class="label label-sm label-success">
												Reference Number: DR23923 </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 30 mins
									</div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-success">
												<i class="fa fa-user"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 You have 5 pending membership that requires a quick review.
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 24 mins
									</div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-warning">
												<i class="fa fa-bell-o"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 Web server hardware needs to be upgraded. <span class="label label-sm label-default ">
												Overdue </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 2 hours
									</div>
								</div>
							</li>
							<li>
								<a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-briefcase"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 IPO Report for year 2013 has been released.
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 20 mins
									</div>
								</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
					<div class="page-quick-sidebar-settings-list">
						<h3 class="list-heading">General Settings</h3>
						<ul class="list-items borderless">
							<li>
								 Enable Notifications <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
							</li>
							<li>
								 Allow Tracking <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF">
							</li>
							<li>
								 Log Errors <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
							</li>
							<li>
								 Auto Sumbit Issues <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
							</li>
							<li>
								 Enable SMS Alerts <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
							</li>
						</ul>
						<h3 class="list-heading">System Settings</h3>
						<ul class="list-items borderless">
							<li>
								 Security Level
								<select class="form-control input-inline input-sm input-small">
									<option value="1">Normal</option>
									<option value="2" selected>Medium</option>
									<option value="e">High</option>
								</select>
							</li>
							<li>
								 Failed Email Attempts <input class="form-control input-inline input-sm input-small" value="5"/>
							</li>
							<li>
								 Secondary SMTP Port <input class="form-control input-inline input-sm input-small" value="3560"/>
							</li>
							<li>
								 Notify On System Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
							</li>
							<li>
								 Notify On SMTP Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
							</li>
						</ul>
						<div class="inner-content">
							<button class="btn btn-success"><i class="icon-settings"></i> Save Changes</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
<div class="page-footer-inner">
پنل مدیریت
</div>
<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
{!! Html::script('assets/global/plugins/respond.min.js.js') !!}
{!! Html::script('assets/global/plugins/excanvas.min.js.js') !!}
<![endif]-->
{!! Html::script('assets/global/plugins/jquery.min.js') !!}
{!! Html::script('assets/global/plugins/jquery-migrate.min.js') !!}
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
<script> CKEDITOR.replace('editor1');</script>
{!! Html::script('assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') !!}
{!! Html::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}
{!! Html::script('assets/global/plugins/jquery.blockui.min.js') !!}
{!! Html::script('assets/global/plugins/jquery.cokie.min.js') !!}
{!! Html::script('assets/global/plugins/uniform/jquery.uniform.min.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}
<!-- END CORE PLUGINS -->
{!! Html::script('assets/global/scripts/metronic.js') !!}
{!! Html::script('assets/admin/layout/scripts/layout.js') !!}
{!! Html::script('assets/admin/layout/scripts/quick-sidebar.js') !!}
{!! Html::script('assets/admin/layout/scripts/demo.js') !!}
@yield('scripts')
<script>

jQuery(document).ready(function() {   
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
});
</script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>