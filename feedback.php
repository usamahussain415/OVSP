<?php
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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Feedback</title>
</head>
<body>
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
        <a href="index.php"><button class="btn btn-danger" type="submit">Logout</button></a>
      </div>
        
        
      </ul>
      
    </div>
  </div>
</nav>
    <!--Section: Contact v.2-->
<section class="mb-4">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!--Section heading-->
<h2 class="h1-responsive font-weight-bold text-center my-4">Feedback</h2>
<!--Section description-->
<p class="text-center w-responsive mx-auto mb-5">If you have any issue.Send us message .We will try resolve the issue.</p>

<div class="row">

    <!--Grid column-->
    <div class="col-md-2 mb-md-0 mb-5">
    </div>
    <div class="col-md-8 mb-md-0 mb-5">
        <form  action="" method="POST">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form mb-0">
                    <label for="name" class="">Your name</label>

                        <input type="text" id="name" name="name" class="form-control"  required>
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form mb-0">
                    <label for="email" class="">Your email</label>

                        <input type="text" id="email" name="email" class="form-control" required>
                    </div>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-0">
                    <label for="subject" class="">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control"  required>
                    </div>
                </div>
            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-12">

                    <div class="md-form">
                    <label for="message">Your message</label>
                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                    </div>

                </div>
            </div>
            <!--Grid row-->
            <div class="text-center text-md-left">
              <br>
            <input class="btn btn-primary" type="submit" name="submit">
          </form>
        </div>
        <div class="col-md-2 mb-md-0 mb-5">
    </div>
        <div class="status"></div>
    </div>

</div>

</section>
</body>
</html>

<?php
  include('db.php');
 if(isset($_POST['submit'])){
   $name=$_POST['name'];
   $email=$_POST['email'];
   $subject=$_POST['subject'];
   $message=$_POST['message'];

   $query="insert into feedback(name,email,subject,message)values('$name','$email','$subject','$message')";
   $queryfire=mysqli_query($con,$query);
   if($query){
     ?>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script>
     swal("Good job!", "You'r Feedback Succesfully Submitted!", "success");
     </script>
     <script>
     /*$_SESSION['dialog']='Data Submitted Successfully';
     $_SESSION['ndialog']='success';*/

    </script>
     <?php
   }
   else{
     ?>
    <script>
    $_SESSION['dialog']='Something went wrong';
     $_SESSION['ndialog']='Error';
  
  </script>
    <?php
   }
 }

?>
<?php include('jquery.php') ?>