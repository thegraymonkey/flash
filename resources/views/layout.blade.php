
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Flash Porn Games</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="/css/justified-nav.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

    <div class="container">

      <div class="masthead" style="margin-bottom:30px;">
        <!--<h3 class="text-muted">Project name</h3>-->
        <img src="/images/porngames.jpg" alt="Flash Porn Games">
        <form class="navbar-form navbar-right" role="search">
		  <div class="form-group">
		    <input type="text" class="form-control" placeholder="Type name of the game">
		  </div>
		  <button type="submit" class="btn btn-success">Submit</button>
		</form>
        <nav>
          <ul class="nav nav-justified">
            <li @if($current_page === '/')class="active"@endif><a href="{{ url('/') }}">Home</a></li>
            <li><a href="#">Top Rated</a></li>
            <li><a href="#">Popular</a></li>
            
            <li @if($current_page === 'contacts.show')class="active"@endif><a href="{{ url('contacts/show') }}">Contact</a></li>
          </ul>
        </nav>
      </div>
    

      <div class="row">
			<div class="main col-md-9">
				@yield('content')
			</div>
		
			<div class="sidebar col-md-3">
				@yield('sidebar')				
			</div>
		</div>

      <!-- Site footer -->
      <footer class="footer">
        <p>&copy; Company 2014</p>
      </footer>

    </div> <!-- /container -->

    @yield('topcss')
    @yield('bottomjs')		
    
  </body>
</html>
