


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made with help from www.w3schools.com - No Copyright -->
  <title>Replacement Search and Rescue Dog</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>

   <link rel="icon" href="https://cdn0.iconfinder.com/data/icons/cupcakes/48/rainbow_cupcake.png">
  

<!-- Our CSS  --> 
<link rel="stylesheet" type="text/css" href="style.css">



</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Seach and Rescue Dog</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#myCarousel">Home</a></li>
	 <li><a href="edupi.student.iastate.edu:8000/stream.mjpg">VIDEO FEED</a></li>
        <li><a href="#Projects">Manual Control</a></li>
      
        
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>



<!-- Container (TOUR Section) -->
<div id="skills" class="bg-1">
  <div class="container">
<br>
<br>
<p>
</p> 

    <h3 class="text-center"><center> SEARCH </h3>
<center>


    <?php
if (isset($_POST['buttonGD']))
    {
         exec('python3 getData.py 2>&1', $output);
        
        echo $output;
        print_r($output);
        echo 'Hello World DATA';
    }
if (isset($_POST['buttonRs']))
    {
         exec('python3 roomba_r_1.py 2>&1', $output);
        
        echo $output;
        print_r($output);
        echo 'Hello World turnRs';
    }

	 if (isset($_POST['buttonRb']))
    {
         exec('python3 roomba_r_3.py 2>&1', $output);
        
        echo $output;
        print_r($output);
        echo 'Hello World turnRb';
    }

	 if (isset($_POST['buttonLs']))
    {
         exec('python3 roomba_l_1.py 2>&1', $output);
        
        echo $output;
        print_r($output);
        echo 'Hello World turnLs';
    }

	 if (isset($_POST['buttonLb']))
    {
         exec('python3 roomba_l_3.py 2>&1', $output);
        
        echo $output;
        print_r($output);
        echo 'Hello World turnLb';
    }

	 if (isset($_POST['buttonS']))
    {
         exec('python3 roomba_stop.py 2>&1', $output);
        
        echo $output;
        print_r($output);
        echo 'Hello World STOP';
    }

	 if (isset($_POST['buttonC']))
    {
         exec('python3 roomba_clean.py 2>&1', $output);
        
        echo $output;
        print_r($output);
        echo 'Hello World clean';
    }    

if (isset($_POST['buttonI']))
    {
         exec('python3 roomba_init.py 2>&1', $output);
        
        echo $output;
        print_r($output);
        echo 'Hello World init';
    }
        
    if (isset($_POST['buttonE']))
    {
         exec('python3 roomba_end.py 2>&1', $output);
        
        echo $output;
        print_r($output);
        echo 'Hello World end';
    }
        
    if (isset($_POST['buttonG']))
    {
         exec('python3 roomba_fw_3.py 2>&1', $output);
        
        echo $output;
        print_r($output);
        echo 'Hello World Go';
    }


    if (isset($_POST['buttonR']))
    {
         exec('python3 on.py 2>&1', $output);
        
        echo $output;
        print_r($output);
	echo 'Hello World RIGHT';
    }

 if (isset($_POST['buttonL']))
    {
        exec('python3 off.py 2>&1', $output);
        
        echo $output;
	print_r($output);
	echo 'Hello World LEFT';
    }
?>
<html>
<body>
<div class="row">
<div class="col-sm-6" style="background-color:lavenderblush;">
<div  style="background-color:green">
<form method="post">
    <p>
        <button class=btn  name="buttonI">Initialize robot</button>
    </p>
    </form>
</div>
<div  style="background-color:red">
 <form method="post">
    <p>
        <button class=btn  name="buttonE">END robot</button>
    </p>
    </form>
</div>
<form method="post">
    <p>
        <button class=btn  name="buttonR">UP CAMERA</button>
    </p>
    </form>
 <form method="post">
    <p>
        <button class=btn  name="buttonL">DOWN CAMERA</button>
    </p>
    </form>
<form method="post">
    <p>
        <button class=btn  name="buttonGD">GET SENSOR DATA</button>
    </p>
    </form>


</div>
 <div class="col-sm-6" style="background-color:lavender;">  
<right>    
<form method="post">

 <form method="post">
    <p>
        <button class=btn  name="buttonG">GO</button>
    </p>
    </form>
  <form method="post">
    <p>
        <button class=btn  name="buttonRs">Small Right Turn</button>
    </p>
    </form>
<form method="post">
    <p>
        <button class=btn  name="buttonRb">Big Right Turn</button>
    </p>
    </form>
<form method="post">
    <p>
        <button class=btn  name="buttonLs">Small Left Turn</button>
    </p>
    </form>
<form method="post">
    <p>
        <button class=btn  name="buttonLb">Big Left Turn</button>
    </p>
    </form>
<form method="post">
    <p>
        <button class=btn  name="buttonS">STOP ROBOT</button>
    </p>
    </form>
<form method="post">
    <p>
        <button class=btn  name="buttonC">FIND BODIES</button>
    </p>
    </form>

    </body>
</center>
    </div>
    </div>
  </div>
  
 


</script>

</body>
</html>

