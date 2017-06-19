
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Event Management System</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="/materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="/materialize/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Event Management System</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="/masterfile/export">Export Guest</a></li>
      </ul>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      @if(Session::has('flash_message'))
        <h4 style="color: #ee6e73;">{{ Session::get('flash_message') }}</h4>
      @endif
      {!! Form::open(array('action' => array('MasterfileController@store'),  'class' => 'bs-component','files'=>true)) !!}
        <div class="file-field input-field">
          <div class="btn">
            <span>File</span>
            <input type="file" name="file" >
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload mastefile">
          </div>
          <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
          </button>
        </div>
      {!! Form::close() !!}


    </div>

  </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="/materialize/js/materialize.js"></script>

  </body>
</html>
