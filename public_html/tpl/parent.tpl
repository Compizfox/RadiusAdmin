<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="application-name" content="RadiusAdmin">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="//netdna.bootstrapcdn.com/bootswatch/3.3.4/slate/bootstrap.min.css" rel="stylesheet" media="screen"/>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"/>
	<link href="//fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic" rel="stylesheet"/>
	<link href="stylesheet.css" rel="stylesheet"/>

	<title>{block name=title}{/block}</title>
</head>

<body>
<header>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="h1">RadiusAdmin <small>FreeRADIUS webinterface</small></div>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					{include file="tpl/include/topmenu.tpl"}
				</ul>
			</div>
		</div>
	</nav>
</header>

<div class="container-fluid">
	<div class="row">
		<nav class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				{include file="tpl/include/leftmenu.tpl"}
			</ul>
		</nav>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1>{block name=pagename}{/block}</h1>
			{block name=body}{/block}
		</div>
	</div>
</div>

<footer class="navbar navbar-fixed-bottom">
	<p class="text-center"><a href="https://github.com/Compizfox/RadiusAdmin">Made by Lars Veldscholte</a></p>
</footer>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>