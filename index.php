<?php
include 'admin/include/global.php';
include 'admin/include/function.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

    <title>Welcome to Ovsp</title>
</head>
<body>
<div class="box">
  <h2>Welcome to OVSP</h2>
 

  <form  method="POST">
  <select onchange="login_selectuser()" id='select_scan' class="form-con">
  <option selected disabled="disabled" class='idtrue'> -- Id Card Number -- </option>
<?php				
$strSQL = "SELECT a.* FROM userreg AS a JOIN demo_finger AS b ON a.user_id=b.user_id";
$result = mysqli_query($mysql,$strSQL);
while($row = mysqli_fetch_array($result)){

$value = base64_encode($base_path1."verification.php?user_id=".$row['user_id']);

echo "<option  value=$value id='option' user_id='".$row['user_id']."' id_num='".$row['id_num']."'>$row[id_num]</option>";
}				
?>
</select>
     
	  <a href="" id="button_login" type="submit" style="float:right "><img src='admin/assets/image/finger-print.png' margin-right='10%'; height='50px' width='50px' ></a>

  </form>

<script type="text/javascript">

$('title').html('Login');

function login_selectuser(device_name, sn) {

$("#button_login").attr("href","finspot:FingerspotVer;"+$('#select_scan').val())

}

</script>
<script>
   
</script>
 
</div>
</body>
</html>

