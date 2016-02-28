<?php
session_start();
if(empty($_SESSION['tutor_email']))
header("Location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="free-educational-responsive-web-template-webEdu">
<meta name="author" content="webThemez.com">
<title>Tutor | Change Password</title>
<link rel="favicon" href="assets/images/favicon.png">
<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
<div class="navbar navbar-inverse">
<div class="container">
<div class="navbar-header">

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
<a href="tutor_profile.php" style="color:#3d84e6;text-decoration:none;"><h1>STEM</h1></a>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav pull-right mainNav">
<li><a href="tutor_profile.php">Tutor Profile</a></li>
<li><a href="test.php">Make schedule</a></li>
<li><a href="tutorRequest.php">Request to admin</a></li>
<li><a href="tutor_search_appointments.php">Appointments</a></li>
<li class="active"><a href="tutor_changepwd.php">Change Password</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</div>

</div>
</div>

<header id="head" class="secondary">
<div class="container">
<h2>Tutor Change Password</h2>
<h4>Hi <?=$_SESSION['t_name'];?> </h4>
</div>
</header>



<div class="container">
<div class="row">
<div class="col-md-6">

<h3 class="section-title">
<?php
if(isset($_SESSION['log'])=="success")
{
?>
<span style="color:green;">Updated Password Successfully</span>
<?php
unset($_SESSION['log']);
}else{
echo 'Change Password';
}

?></h3>
<form class="form-light mt-20" action="updatechange_password.php" 
onsubmit="return changePasswordValidations()" method="post" role="form">
<div class="form-group">
<label>Current Password</label>
<input type="password" name="oldpassword" id="oldPass" class="form-control" 
onkeypress="noneErrors(oldPass,oldPassError)" placeholder="Enter Current Password" />
<span id="oldPassError" style="color:red"></span>
</div>

<div class="form-group">
<label>New Password</label>
<input type="password" name="password" id="password" class="form-control"
onkeypress="noneErrors(password,newPassError);" onblur="passValid();"  placeholder="Enter New Password" maxlength="12" />
<span id="newPassError" style="color:red"></span>
</div>

<div class="form-group">
<label>Confirm Password</label>
<input type="password" name="confpassword" id="confPass" class="form-control"
onkeypress="noneErrors(confPass,confPassError)" placeholder="Enter Confirm Password" />
<span id="confPassError" style="color:red"></span>
</div>

<button type="submit" name="action" value="update_profile" class="btn btn-two">Update</button><p><br/></p>

</form>

</div>

</div>
</div>

<script>
function changePasswordValidations(){
var oldPass=document.getElementById('oldPass').value;
var newPass=document.getElementById('newPass').value;
var confPass=document.getElementById('confPass').value;

var oldPassError=document.getElementById('oldPassError');
var confPassError=document.getElementById('confPassError');
var newPassError=document.getElementById('newPassError');

if(oldPass=='' || newPass=='' || confPass==''){
if(oldPass==''){
oldPassError.innerHTML="Please fill Old password field";
}
if(newPass==''){
newPassError.innerHTML="Please fill New password field";
}
if(confPass==''){
confPassError.innerHTML="Please fill Confirm password field";
}
return false;
}
if(newPass!=confPass){
confPassError.innerHTML="New password and confirm password mismatch";
return false;
}
return true;
}
function noneErrors(id1,id2){
if(id1.value!=''){
id2.innerHTML='';
}
}
function passValid(){
var minLength = 5;
var newPass = document.getElementById('newPass').value;
if (newPass.length < minLength){
document.getElementById('newPassError').innerHTML='Your password should be minimum 5 characters.';
//alert('Your password must be at least 5 characters. Please try again.');
return false;
}
}
</script


</body>
</html>
