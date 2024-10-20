<?php
session_start();
	include 'admin/include/global.php';
if(!isset($_GET['user_id'])){
  header("location: index.php");
}
$userdata1=$_GET['user_id'];
$sql1= "SELECT * FROM userreg WHERE user_id='".$userdata1."'";
	$result1= mysqli_query($mysql,$sql1);
	$userdata = mysqli_fetch_array($result1);
	
if($userdata['status']==0){
  $status='<b style="color:red;">Not Voted</b>';
}
else{
  $status='<b style="color:green;">Voted</b>';

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="profile.css">
    <title>Home</title>
</head>
<body>
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
   <a class="nav-link active" href="voting.php?user_id=<?php echo $userdata['user_id']; ?>">Cast a Vote</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="result.php?user_id=<?php echo $userdata['user_id']; ?>">Result</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link active" href="feedback.php?user_id=<?php echo $userdata['user_id']; ?>">Feedback</a>
        </li>
      </ul>
      <div class="d-flex " style="margin-right:2%;">
        <a href="logout.php"><button class="btn btn-danger" type="submit">Logout</button></a>
      </div>
        
        
      </ul>
      
    </div>
  </div>
</nav>
<!-- Personal Information  -->
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-12 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                 <img src="<?php print $userdata['img'];?>" class="img-border"
                                style="border-radius:50%;width:200px;height: 200px; margin-top:20%; " > 
                              
                              </div>
                                <h6 class="f-w-600"><?php print $userdata['first_name'].' '.$userdata['last_name'];?></h6>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                            <div style="margin-top:10%;"></div>
                            <h2 style="text-align:center">Personal Information</h2>
                                <table class="table">

          <thead>

</thead>
<tbody style="border:1px solid black">
  <tr>
    <th scope="row">Id Card Number</th>
    <td><?php print $userdata['id_num'];?></td>
  </tr>
  <tr>
    <th scope="row">Your Name </th>
    <td><?php print $userdata['first_name'].' '.$userdata['last_name'];?></td>
  </tr>
  <tr>
    <th scope="row">Father Name is</th>
    <td><?php print $userdata['father_name'];?></td>
  </tr>
  <tr>
    <th scope="row">Area Number</th>
    <td><?php print $userdata['areanum'];?></td>
  </tr>

  <tr>
    <th scope="row">Birth-Date is</th>
    <td><?php print $userdata['date_of_birth'];?></td>
  </tr>


  <tr>
    <th scope="row">Issue date</th>
    <td><?php print $userdata['issue_date'];?></td>
  </tr>

  <tr>
    <th scope="row">Address</th>
    <td><?php print $userdata['address'];?></td>
  </tr>
  <tr>
    <th scope="row">Status</th>
    <td><?php print $status;?></td>
  </tr>
  
</tbody>
</table>

                               
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


      </div>
    </div>
  </div>

</body>
</html>
