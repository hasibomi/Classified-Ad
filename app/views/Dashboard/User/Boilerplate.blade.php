<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield("title")

    <!-- CSS Menu -->
    {{ HTML::style("assets/cssmenu/styles.css") }}
    {{ HTML::style("assets/css/dropdown-menu.css")}}

    <!--Bootstrap CDN -->
    {{ HTML::style("assets/css/bootstrap.min.css") }}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- main container -->
    <div class="container-fluid">
      
      <!-- Navbar -->
      @include("Dashboard.User.Partials.Navbar")

      <!-- User Ad List -->
      @yield("content")
    </div>
    <!-- main container end -->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{ HTML::script("assets/js/jquery-2.1.1.min.js") }}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{ HTML::script("assets/js/bootstrap.min.js") }}
    {{ HTML::script("assets/cssmenu/script.js") }}
    
    @yield("script")
  </body>
</html>