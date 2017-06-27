<!doctype html>
<html>
<head>
	@include('cms.includes.head')
</head>
<body>
@include('cms.includes.delete_modal')
    <div class="wrapper">
	    <div class="sidebar" data-color="blue" data-image="/images/sidebar-1.jpg">
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
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{!! $error !!}</li>
								@endforeach
							</ul>
						</div>
					@endif
                        @yield('content')
	                </div>
	            </div>
	        </div>
        	@include('cms.includes.footer')
	    </div>
	</div>
</body>
	<script src="/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/js/material.min.js" type="text/javascript"></script>
	<script src="/js/bootstrap-notify.js"></script>
	<script src="/js/material-dashboard.js"></script>
	<script src="/js/app.js" type="text/javascript"></script>
	<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
	<script>
	tinymce.init({
		 selector: "textarea",theme: "modern",width: 680,height: 300,
		 plugins: [
			  "advlist autolink link image lists charmap print preview hr anchor pagebreak",
			  "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
			  "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
		],
		toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
		toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
		image_advtab: true ,
		external_filemanager_path:"/filemanager/",
		filemanager_title:"Responsive Filemanager" ,
		external_plugins: { "filemanager" : "/filemanager/plugin.min.js"}
	  });
	</script>
</html>
