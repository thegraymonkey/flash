
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Your Flash Games</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="/css/justified-nav.css" rel="stylesheet">

   

  </head>

  <body>

    <div class="container">

      <div class="masthead" style="margin-bottom:30px;">
        
        <img src="/images/logo1.png" class="img-rounded img-responsive">

        <form class="navbar-form navbar-right" role="search" method="GET" action="{{ route('search.index') }}">
		      <div class="form-group">
		        <input type="text" class="form-control" name="query" placeholder="Type name of the game" required autofocus>
		      </div>
		      <button type="submit" class="btn btn-success">Search</button>
		    </form>
        <nav>
          <ul class="nav nav-justified">
            <li @if($current_page === '/')class="active"@endif><a href="{{ url('/') }}">Home</a></li>
            <li @if($current_page === 'tops.index')class="active"@endif><a href="{{ url('tops') }}">Top Rated</a></li>
            <li @if($current_page === 'pops.index')class="active"@endif><a href="{{ url('pops') }}">Popular</a></li>
            
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
        <p>&copy; YourFlashPorn.com 2015</p>
      </footer>

    </div> <!-- /container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    
    @yield('topcss')
    @yield('bottomjs')		
    
  </body>
</html>
