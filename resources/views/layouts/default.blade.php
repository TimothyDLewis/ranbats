<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		RanBats
		@yield("title")
	</title>
	<link href="//fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css"/>
	<link href="{{ asset("css/font-awesome-4.7.0.min.css") }}" rel="stylesheet"/>
	<link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet"/>
	<link href="{{ asset("css/light-bootstrap-dashboard.css") }}" rel="stylesheet"/>
	<style type="text/css">
		.nav-mobile-menu {
			display: none !important;
		}

		.navbar-static-text {
			font-weight: 400;
			margin: 5px 0px;
			font-size: 20px;
			color: #888888;
			display: inline-block;
			padding-top: .3125rem;
			padding-bottom: .3125rem;
			white-space: nowrap;
		}

		.alert[data-notify="container"] {
			border-radius: 0;
		}

		.alert button.close {
			background-color: inherit;
		}

		.rank-col {
			width: 1%;
			min-width: 50px;
		}

		.admin-control {
			margin-top: -15px;
		}

		.action-col {
			width: 1%;
			min-width: 150px;
		}
	</style>
	@yield("styles")
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
	<div class="wrapper">
		<div class="sidebar" data-color="{{ $authUser && $authUser->sidebar ? $authUser->sidebar : "black" }}">
			<div class="sidebar-wrapper">
				@include("components.sidebar")
			</div>
		</div>
		<div class="main-panel">
			<nav class="navbar navbar-expand-lg" color-on-scroll="500">
				<div class="container-fluid">
					<p class="navbar-static-text" style="cursor: default;">@yield("breadcrumb", "Home")</p>
					<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-bar burger-lines"></span>
						<span class="navbar-toggler-bar burger-lines"></span>
						<span class="navbar-toggler-bar burger-lines"></span>
					</button>
				</div>
			</nav>
			@include("partials.feedback")
			<div class="content">
				<div class="container-fluid">
					@yield("content")
				</div>
			</div>
			<footer class="footer">
                <div class="container-fluid" style="display: none;">
                    <nav class="navbar">
                        <p class="navbar-static-text">
                        	<span class="d-block d-sm-none">XS</span>
                        	<span class="d-none d-sm-block d-md-none">SM</span>
                        	<span class="d-none d-md-block d-lg-none">MD</span>
                        	<span class="d-none d-lg-block d-xl-none">LG</span>
                        	<span class="d-none d-xl-block">XL</span>
                        </p>
                    </nav>
                </div>
            </footer>
		</div>
	</div>
	<script src="{{ asset("js/core/jquery.3.2.1.min.js") }}" type="text/javascript"></script>
	<script src="{{ asset("js/core/popper.min.js") }}" type="text/javascript"></script>
	<script src="{{ asset("js/core/bootstrap.min.js") }}" type="text/javascript"></script>
	<script src="{{ asset("js/light-bootstrap-dashboard.js") }}" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function(){

		});
	</script>
	@yield("scripts")
</body>
</html>