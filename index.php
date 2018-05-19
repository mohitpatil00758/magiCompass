
<?php
require 'vendor/autoload.php';
	$client = new MongoDB\Client('mongodb://user:password@cluster0-shard-00-00-egp3y.mongodb.net:27017,cluster0-shard-00-01-egp3y.mongodb.net:27017,cluster0-shard-00-02-egp3y.mongodb.net:27017/test?ssl=true&replicaSet=Cluster0-shard-0&authSource=admin');

$blogdb = $client->Blog_DataBase;
$open_blog = $blogdb->Travel_Stories;

$blogdb = $client->Blog_DataBase;
$open_blog1 = $blogdb->subscribers;
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="style/layout.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="style/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="style/dist/js/jquery.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="style/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
<link type="text/css" rel="stylesheet" href="social/jssocials.css" />
<script src="social/jssocials.js"></script>
<link type="text/css" rel="stylesheet" href="social/jssocials-theme-plain.css" /><style>
<style>
.fa {
  font-size: 13px;
}

.fa:hover {
    transform : scale(1.2,1.2);
}

</style>
<script>
	$(document).ready(function() {
		$("#travel").click(function() {
			$("#add").load("travel.php");
		});
	});
	$(document).ready(function() {
		$("#Fiction").click(function() {
			$("#add").load("Fiction.php");
		});
	});
	$(document).ready(function() {
		$("#Published").click(function() {
			$("#add").load("Published.php");
		});
	});
	$(document).ready(function() {
		$("#Book_r").click(function() {
			$("#add").load("Book_r.php");
		});
	});
	$(document).ready(function() {
		$("#Justc").click(function() {
			$("#add").load("Justc.php");
		});
	});
	
	$(document).ready(function(){
		setTimeout(function () {
			$('#subscribe').modal('show');
		 }, 2000)
	});
	

       
</script>

<style>
.dropdown:hover > .dropdown-menu {
    display: block;
}
</style>
</head>
<body style="background-color: #ffffff" data-spy="scroll" data-target=".navbar" data-offset="50">

<header>
  <div class="jumbotron" style="margin-bottom: 0px;">
    <h1>MagiCompass</h1>
    <p>Stroies</p>
  </div>
  <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark">
        <a class="navbar-brand" href="web2.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#map">Map <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com" id="travel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Travel</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <?php
				$document = $open_blog->find(
					['Travel' => 'travel'],
					[
						'limit' => 8
					]
				);
                foreach ($document as $key) {
                echo '<a class="dropdown-item" href="#'.htmlspecialchars($key['Blog_title']).''.htmlspecialchars($key['Blog_Chpt']).' ">'.htmlspecialchars($key['Blog_title']).'' .htmlspecialchars($key['Blog_Chpt']). '</a>'. "\n" ;
              }
                ?>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="Fiction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fiction</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <?php
				$document = $open_blog->find(
					['Fiction' => 'fiction'],
					[
						'limit' => 8
					]
				);
                foreach ($document as $key) {
				echo '<a class="dropdown-item" href="#'.htmlspecialchars($key['Blog_title']).''.htmlspecialchars($key['Blog_Chpt']).' ">'.htmlspecialchars($key['Blog_title']).'' .htmlspecialchars($key['Blog_Chpt']). '</a>'. "\n" ;              
				}
                ?>
              </div>
            </li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle"  id="Published" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Published</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <?php
				$document = $open_blog->find(
					['Published' => 'published'],
					[
						'limit' => 8
					]
				);
                foreach ($document as $key) {
				echo '<a class="dropdown-item" href="#'.htmlspecialchars($key['Blog_title']).''.htmlspecialchars($key['Blog_Chpt']).' ">'.htmlspecialchars($key['Blog_title']).'' .htmlspecialchars($key['Blog_Chpt']). '</a>'. "\n" ;              
				}
                ?>
              </div>
            </li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="Book_r" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Book Review</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <?php
				$document = $open_blog->find(
					['Book_review' => 'Bookreview'],
					[
						'limit' => 8
					]
				);
                foreach ($document as $key) {
				echo '<a class="dropdown-item" href="#'.htmlspecialchars($key['Blog_title']).''.htmlspecialchars($key['Blog_Chpt']).' ">'.htmlspecialchars($key['Blog_title']).'' .htmlspecialchars($key['Blog_Chpt']). '</a>'. "\n" ;              
				}
                ?>
              </div>
            </li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle"  id="Justc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">#justCurious</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <?php
				$document = $open_blog->find(
					['just_C' => 'justCurious'],
					[
						'limit' => 8
					]
				);
                foreach ($document as $key) {
				echo '<a class="dropdown-item" href="#'.htmlspecialchars($key['Blog_title']).''.htmlspecialchars($key['Blog_Chpt']).' ">'.htmlspecialchars($key['Blog_title']).'' .htmlspecialchars($key['Blog_Chpt']). '</a>'. "\n" ;              
				}
                ?>
              </div>
            </li>			
          </ul>
		 <div id= "share"></div> 
		 <script>
		  $("#share").jsSocials({
			  showLabel: false,
			  showCount: true,
            shares: ["twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
        });
		 </script>
        </div>
      </nav>

<div id="map"></div>
  <script>
      function initMap() {
        // Styles a map in grey mode.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 19.1646942, lng: 72.8408792},
          zoom: 6,
          styles: [

  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "featureType": "administrative",
    "elementType": "geometry",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#bdbdbd"
      }
    ]
  },
  {
    "featureType": "administrative.neighborhood",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "road",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dadada"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "transit",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#c9c9c9"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  }
]
        });
      
	  <?php $document1 = $open_blog->find(
		[],
				['limit' => 9]
	  );
			foreach($document1 as $key1){
				
		?>
	  var v<?php echo $key1['_id'];?> = {lat: <?php echo preg_replace('/(\x{200e}|\x{200f})/u', '', $key1['latitdude']); ?>, lng: <?php echo preg_replace('/(\x{200e}|\x{200f})/u', '', $key1['longitude']); ?>};

		var image = 'img/marker.png';
        var marker<?php echo $key1['_id'];?> = new google.maps.Marker({
		position: v<?php echo $key1['_id'];?>,
          map: map,
		  icon : image
        });
		
		var C<?php echo $key1['_id'];?> = '<?php echo '<div class="container "id = "'.htmlspecialchars($key1['Blog_title']).''.htmlspecialchars($key1['Blog_Chpt']).'>' ; ?>'+ 
		'<?php echo  '<div class="card " style=" padding: 1px;" >'; ?>' +
		'<?php echo    '<div class="card-body">'; ?>'+
		'<?php echo      '<h6 class="card-title">'.htmlspecialchars($key1['Blog_title']).','.htmlspecialchars($key1['Blog_edition']).' '.htmlspecialchars($key1['Blog_Chpt']).'</h6>'; ?>'+ 
		'<?php echo '<a href="#'.htmlspecialchars($key1['Blog_title']).''.htmlspecialchars($key1['Blog_Chpt']).' ">Click Here</a>'; ?>'+
		'<?php echo    '</div>'; ?>'+ 
		'<?php echo '</div>'; ?>' ;

        var infowindow<?php echo $key1['_id'];?> = new google.maps.InfoWindow({
          content: C<?php echo $key1['_id'];?>,
		  maxWidth: 180
        });

        marker<?php echo $key1['_id'];?>.addListener('click', function() {
          infowindow<?php echo $key1['_id'];?>.open(map, marker<?php echo $key1['_id'];?>);
        });
		
		
		
		
		
			<?php } ?>

      }
    </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=API_KEY&callback=initMap">
    </script>
	
  
<div id="add">
<?php
$document1 = $open_blog->find(
	[],
	[
		'limit' => 16,
		'sort' => ['_id' => -1]
	]
);
foreach ($document1 as $key1) {


echo '<div class="container "id = "'.htmlspecialchars($key1['Blog_title']).''.htmlspecialchars($key1['Blog_Chpt']).'>'."\n";

echo  '<div class="card " style="width:80%;   box-shadow: 10px 10px 5px grey; border: 50px solid transparent;
    padding: 15px;" >'."\n";
echo    '<div class="card-body">'."\n";
echo      '<h2 class="card-title">'.htmlspecialchars($key1['Blog_title']).','.htmlspecialchars($key1['Blog_edition']).' '.htmlspecialchars($key1['Blog_Chpt']).'</h2>'."\n";
echo      $key1['Blog_Content'];
 
echo    '</div>'."\n";
echo '</div>'."\n"; 
}


?>
</div>

<div class="modal fade" id="subscribe">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Subscribe</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
		<div class="bd-example bd-example-tabs">
  <nav class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-login-tab" data-toggle="tab" href="#nav-login" role="tab" aria-controls="login" aria-expanded="true">Login</a>
    <a class="nav-item nav-link" id="nav-register-tab" data-toggle="tab" href="#nav-register" role="tab" aria-controls="register" aria-expanded="false">Register</a>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade active show" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab" aria-expanded="true">
      <div>
<form class="form-horizontal" role="form" method="POST" action="web2.php">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h2>Please Login</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="email">E-Mail Address</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                            <input type="text" name="email" class="form-control" id="email"
                                   placeholder="you@example.com" required autofocus>
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="sr-only" for="password">Password</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Password" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6" style="padding-top: .35rem">
                    <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                        <label class="form-check-label">
                            <input class="form-check-input" name="remember"
                                   type="checkbox" >
                            <span style="padding-bottom: .15rem">Remember me</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 1rem">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <button type="btn" class="btn btn-success" id = "btnlogin" name = "btnlogin" > Login</button>
                    <a class="btn btn-link" href="/password/reset">Forgot Your Password?</a>
                </div>
            </div>
        </form>
		</div>
		<?php 
				if(isset($_POST['btnlogin'])){
					$lemail = $_POST['email'];
					$lpass = hash('md5',$_POST['password']);
					
					$emaillog = $open_blog1 -> findOne(
					['E-mail' => $lemail]
					);
					if($emaillog == NULL){
						echo '<script type="text/javascript"> alert("Register First") </script>';
					}
					elseif($emaillog['password'] == $lpass){
						echo '<script type="text/javascript"> alert("WelCome '.$emaillog['Name'].'") </script>';
						$_SESSION['user'] = $emaillog['uname'];
					}
					else{
						echo '<script type="text/javascript"> alert("Incorrect Password") </script>';
					}
				}
			?>
	  </div>
	  
    <div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab" aria-expanded="false">
      <div>
<form class="form-horizontal"  action="web2.php" method="post">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h2>Register New User</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 field-label-responsive">
                <label for="name">Name</label>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        <input type="text" name="rname" id= "rname" class="form-control" 
                               placeholder="John Doe" required autofocus>
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
            <div class="col-sm-3 field-label-responsive">
                <label for="name">Username</label>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        <input type="text" name="runame" id= "runame" class="form-control" placeholder="johnDoe007" required autofocus>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 field-label-responsive">
                <label for="email">E-Mail Address</label>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                        <input type="text" name="remail" id="remail" class="form-control"
                               placeholder="you@example.com" required autofocus>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-3 field-label-responsive">
                <label for="password">Password</label>
            </div>
            <div class="col-sm-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                        <input type="password" name="rpassword" id = "rpassword" pattern=".{8,12}" class="form-control"
                               placeholder="Password" required>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-3 field-label-responsive">
                <label for="password">Confirm Password</label>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                            <i class="fa fa-repeat"></i>
                        </div>
                        <input type="password" name="rpassword-confirmation" id = "rpassword-confirmation" class="form-control"
                                placeholder="Password" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <button type="btn" class="btn btn-success" id = "btnreg" name = "btnreg">Register</button>
            </div>
        </div>
    </form>
	
	
	<?php
	if(isset($_POST['btnreg'])){
		$name = $_POST['rname'];
		$email = $_POST['remail'];
		$uname = $_POST['runame'];
		$pass = hash('md5',$_POST['rpassword']);
		$cpass = hash('md5',$_POST['rpassword-confirmation']);
	
		if($pass == $cpass){
			$unamelist =  $open_blog1 -> findOne(
				['uname' => $uname
				]
			);
			$emailist =  $open_blog1 -> findOne(
				['E-mail' => $email
				]
			);
			if ($unamelist == NULL && $emailist == NULL){
				
				$arrayInsrt = array(
				'Name' => $name,
				'uname' => $uname,
				'E-mail' => $email,
				'password' => $pass
				);
			
				if($insertOneBloginfo = $open_blog1->insertOne($arrayInsrt)){
				echo '<script type="text/javascript"> alert("Congrats... Registered Sucessfully") </script>';
				$_SESSION['user'] = $uname;
				}
				else{
				echo '<script type="text/javascript"> alert("Something went Wrong") </script>';
				}
			}
			elseif($emailist == NULL){
				echo '<script type="text/javascript"> alert("Username already exist") </script>';
			}
			else{
			echo '<script type="text/javascript"> alert("User already exist") </script>';
			}
		
		}
		else{
			echo '<script type="text/javascript"> alert("Password feild doesnot match") </script>';
		}
	}
	?>
	
	</div>
	
	  </div>

  </div>
</div>
        
        
      </div>
    </div>
  </div>




<footer>
<h6>Designed by Mohit Patil</h6>
</footer>
</body>
</html>


