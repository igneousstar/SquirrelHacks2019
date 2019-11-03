

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
	 <li><a href="index2.html">VIDEO FEED</a></li>
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

    class VideoStream {
	private $path = "";
	private $stream = "";
	private $buffer = 102400;
	private $start = -1;
	private $end = -1;
	private $size = 0;

	function __construct($filePath) {
		$this->path = $filePath;
	}

	private function open() {
		if(!($this->stream = fopen($this->path, 'rb'))) {
			die('Could not open stream for reading');
		}
	}

	private function setHeader() {
		ob_get_clean();
		header("Content-Type: video/mp4");
		header("Cache-Control: max-age=2592000, public");
		header("Expires: ".gmdate('D, d M Y H:i:s', time()+2592000) . ' GMT');
		header("Last-Modified: ".gmdate('D, d M Y H:i:s', @filetime($this->path)
		$this->start = 0;
		$this->size = filesize($this->path);
		$this->end = $this->size - 1;
		header("Accept-Ranges: 0-".$this->end);
		
		if(isset($_SERVER['HTTP_RANGE'])) {

			$c_start = $this->start;
			$c_end = $this->end;

			list(, $range) = explode('=', $_SERVER['HTTP_RANGE'], 2);
			if(strpos($range, ',')!==false) {
				header('HTTP/1.1 416 Requested Range Not Satisfiable');
				header("Content-Range: bytes $this->start-$this->end/$this->size');
				exit;
			}
			if ($range == '-') {
				$c_start = $this->size - substr($range, 1);
			} else {
				$range = explode('-', $range);
				$c_start = $range[0];

				$c_end = (isset($range[1]) && is_numeric($range[1])) ? $range[1] : $c_end;
			}
			$c_end = ($c_end > $this->end) ? $this->end : $c_end;
			if ($c_start > $c_end || $c_start > $this->size - 1 || $c_end >= $this->size) {
				header('HTTP/1.1 416 Requested Range Not Satisfied');
				header("Content-Range: bytes $this->start-$this->end/$this->size");
				exit;
			}
			$this->start = $c_start;
			$this->end = $c_end;
			$length = $this->end - $this->start + 1;
			fseek($this->stream, $this->start);
			header('HTTP/1.1 206 Partial Content');
			header("Content-Length: ".$length);
			header("Content-Range: bytes $this->start-$this->end/".$this->size);
		} else {
			header("Content-Length: ".$this->size);
		}
	}

	private function end() {
		fclose($this->stream);
		exit;
	}

	private function stream() {
		$i = $this->start;
		set_time_limit(0);
		while(!feof($this->stream) && $i <= $this->end) {
			$bytesToRead = $this->buffer;
			if(($i+$bytesToRead) > $this->end) {
				$bytesToRead = $this->end - $i + 1;
			}
			$data = fread($this->stream, $bytesToRead);
			echo $data;
			flush();
			$i += $bytesToRead;
		}
	}

	function start() {
		$this->open();
		$this->setHeader();
		$this->stream();
		$this->end();
	}

	$stream = new VideoStream();
	$stream->start();

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

    <form method="post">
    <p>
        <button class=btn  name="buttonL">UP CAMERA</button>
    </p>
    </form>
 <form method="post">
    <p>
        <button class=btn  name="buttonR">DOWN CAMERA</button>
    </p>
    </form>
  <form method="post">
    <p>
        <button class=btn  name="buttonGO">GO</button>
    </p>
    </form>
    </body>
</center>
    
    </div>
  </div>
  
 


</script>

</body>
</html>

