<?php
session_start();
	include 'admin/include/global.php';
  $userdata1=$_GET['user_id'];
  $sql1= "SELECT * FROM userreg WHERE user_id='".$userdata1."'";
	$result1= mysqli_query($mysql,$sql1);
	$userdata = mysqli_fetch_array($result1);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Province Voting</title>
</head>
<body>
<?php 
  if(isset($_SESSION['msg']) && $_SESSION['msg'] == "success"){
echo '<script>alert("Vote Submitted!!");
            </script>';
unset($_SESSION['msg']);
  }  
  ?>
    <!-- Navbar  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php?user_id=<?php echo $userdata['user_id']; ?>">Ovsp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php?user_id=<?php echo $userdata['user_id']; ?>">Home</a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link active" href="result.php?user_id=<?php echo $userdata['user_id']; ?>">Result</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link active" href="feedback.php?user_id=<?php echo $userdata['user_id']; ?>">Feedback</a>
        </li>
      </ul>
      <div class="d-flex " style="margin-right:2%;">
      <form action="" method="post">
      <div class="input-group">
           <input type="text" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
           <input type="submit" name="submit" value="Search" class="btn btn-outline-light">
      </div>
        </form>
      </div>
      </div>
        
        
      </ul>
      
      
    </div>
  </div>
</nav>
<!-- Grid System  -->
<div class="container">
    <h1 style="text-align:center;">Province Voting</h1>
    <div class="row">
    <?php
    include('db.php');
    if(isset($_POST['submit'])){
      $areanum=$_POST['search'];
    $fire="SELECT * FROM proviencecard where areanum='$areanum'";
    $firequery=mysqli_query($con,$fire);
    while ($result=mysqli_fetch_array($firequery)) {
      ?>
      <div class="col-sm">
        <br>
    <div class="card" style="width: 18rem;">
    <h5 class="card-title" style="text-align:center"><?php print $result['candidate'];?></h5>
    <img class="card-img-top" src="<?php print $result['post_img'];?>" alt="Card image cap" style="width:100%; height:200px">
  <div class="card-body">
    <hr>
    <p class="card-text"><?php print $result['areanum'];?></p>
    <form action="pprocessing.php?user_id=<?php echo $userdata['user_id']; ?>" method="POST" enctype="multipart/form-data">
    <?php
    if($userdata['pro_status']==0){
      ?>
    <input type="hidden" name="votes" value="<?php echo $result['votes'] ?>" >
    <input type="hidden" name="id" value="<?php echo $result['id'] ?>" >
    <input type="submit" name="votebtn" class="btn btn-success" value="Vote"></a>
    <?php
    }
    else{
      
      ?>
    <input disabled type="button" name="votebtn" class="btn btn-danger" value="Vote"></a>
      
      <?php
    }
    ?>
    </form>
    
  </div>
</div>
    </div>

      <?php
    }
  }
    
    ?>
    <hr>
    </div>
    <div class="row">
      <div class="col-12">
    <a href="voting.php?user_id=<?php echo $userdata['user_id']; ?>"> <button class="btn btn-primary" style="width:100%;" ><< Back</button></a>

      </div>
</div>

<script src="style.js"></script>

</body>
</html>