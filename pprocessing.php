
<?php
session_start();
	include 'admin/include/global.php';
  include('db.php');
  $userdata1=$_GET['user_id'];
  $sql1= "SELECT * FROM userreg WHERE user_id='".$userdata1."'";
    $result1= mysqli_query($mysql,$sql1);
    $userdata = mysqli_fetch_array($result1);
        $id=$_POST['id'];
        $vote=$_POST['votes'];
        $userid=$userdata['user_id'];
        $vote+=1;
        $updatevote=mysqli_query($con,"UPDATE proviencecard SET votes='$vote'where id='$id'" );
        $updatestatus=mysqli_query($con,"UPDATE userreg SET pro_status=1 where user_id='$userid'" );

        if($updatevote && $updatestatus){
            $userdata['status'] = 1;
          $_SESSION['msg']="success";
            header("location:provience.php?user_id=".$userdata1);
      
        } 
        else{
          echo '<script>alert("Some error occured");
          window.location="voting.php";
          </script>';
        }       
     

?>