<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>Angular 1 CRUD</title>
	<meta name="Author" content=""/>
	<link rel="stylesheet" type="text/css" href="./css/normalize.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/material-kit.css">
	<script src="./js/jquery.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="angular.min.js"></script>
	<script src="angular-route.min.js"></script>
	<script src="app.js"></script>
	<style>
		.col {
			float: left;
			width: 50%;
		}
	</style>
	
</head>
<!--instantiate the angular module-->
<body ng-app="funwithcountries">
	
	<!--	 NAVBAR SECTION -------------------------------------------------------->
	<nav class="navbar navbar-primary navbar-transparent navbar-fixed-top navbar-color-on-scroll" role="navigation">
	<div class="container-fluid">
    	<div class="navbar-header">
    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
    		</button>
    		<a class="navbar-brand" href="#">Brand</a>
    	</div>

    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    		<ul class="nav navbar-nav">
				<li class="active"><a href="#">Link</a></li>
        		<li><a href="#">Link</a></li>
        		<li class="dropdown">
        			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        			<ul class="dropdown-menu">
					  <li><a href="#">Action</a></li>
					  <li class="divider"></li>
					  <li><a href="#">Separated link</a></li>
					  <li class="divider"></li>
				      <li><a href="#">One more separated link</a></li>
        			</ul>
        		</li>
    		</ul>
    	</div>
	</div>
	</nav>
		
	<!-- PAGE HEADER SECTION ------------------------------------------------------>
	<div class="page-header header-filter header-small" filter-color="red" style="background-image: url('img/bg2.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h1 class="title text-center">Angular 1 - PHP</h1>
				</div>
			</div>
		</div>
	</div>
	
	<!-- MAIN SECTION ----------------------------------------------------------------->
	<div class='main main-raised'>
		<div class="section"><!-- .section gives extra padding -->
			<div class="container">
				<h1 class="text-center">Fun with countries</h1>
				<!--Think of it as a class CountryController and the app instantiates that class as countryCtrl -->
				<div ng-controller="CountryController as countryCtrl"
						 class="col"> 
					<ul>
						<!--			repeat countries-->
						<li ng-repeat="c in countryCtrl.countries">
							<a href ng-href="./#!/states/{{ c.code }}">
								<img ng-src="img/{{ c.code }}.png">
								{{ c.name }}
							</a>
							
							<state-view></state-view>

						</li>
					</ul>


				</div><!-- end CountryCtrl -->
				
				<div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="nav">
             <a href="./#!/" class="button">Home</a>
           
            <a href="./#!/cookies" class="button">About</a>
             
          </div>
        </div>
      </div>
    </div>
				
				<ng-view></ng-view>
			</div><!-- end .container -->
		</div><!-- end .section -->
	</div><!--END MAIN SECTION  -->

</body>
</html>
