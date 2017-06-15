<!doctype html>
<html>
<head>
	@include('cms.includes.head')
</head>
<body>
    <div class="wrapper">
	    <div class="sidebar" data-color="purple" data-image="images/sidebar-1.jpg">
			<div class="logo">
				<a href="#" class="simple-text">
					Laravel CMS
				</a>
			</div>
	    	<div class="sidebar-wrapper">
                @include('cms.includes.left_sidebar')
	    	</div>
		</div>
	    <div class="main-panel">

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
                        @yield('content')
	                </div>
	            </div>
	        </div>
        	@include('cms.includes.footer')
	    </div>
	</div>
</body>
	<!--   Core JS Files   -->
	<script src="/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="/js/bootstrap-notify.js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="/js/material-dashboard.js"></script>
</html>
