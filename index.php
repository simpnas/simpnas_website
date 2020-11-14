<?php 
	include("header.php"); 
	$sql = mysqli_query($mysqli,"SELECT * FROM stats");
	$install_count = mysqli_num_rows($sql);

?>

<div class="starter-template">
  <h1>SimpNAS <small class="text-danger">BETA</small></h1>
  <p class="lead">Network Attached Storage Solution built with <u>Simple</u> in Mind.</p>
  <kbd>wget https://simpnas.com/install.sh; bash install.sh</kbd>
  <p class="mt-3">Number of Installs</p>
  <div class="badge badge-primary p-2"><?php echo $install_count; ?></div>
</div>

  <div id="carouselExampleIndicators" class="carousel slide mb-5" data-ride="carousel">
<ol class="carousel-indicators">
  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
</ol>
<div class="carousel-inner">
  <div class="carousel-item active">
    <img class="d-block w-100" src="img/dashboard.png">
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="img/disks.png">
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="img/volumes.png">
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="img/add_volume.png">
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="img/shares.png">
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="img/add-share.png">
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="img/users.png">
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="img/apps.png">
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="img/install-transmission.png">
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="img/setup.png">
  </div>
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>
   
<?php include("footer.php"); ?>