<?php
session_start();
include 'dbconnection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="free-educational-responsive-web-template-webEdu">
<meta name="author" content="webThemez.com">
<title>Student|Register</title>
<link rel="favicon" href="assets/images/favicon.png">
<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
<link rel="stylesheet" href="assets/css/style.css">

</head>

<body onload='document.form1.text1.focus()'>
<div class="navbar navbar-inverse">   
<div class="container"> 
<nav class="navbar navbar-static-top" role="navigation">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
<a href="index.php" style="color:#3d84e6;text-decoration:none;"><h1>STEM</h1></a>
</div>

<div class="collapse navbar-collapse" id="navbar-collapse-1">
<ul class="nav navbar-nav pull-right mainNav">
<li><a href="index.php">Courses</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Student<b class="caret"></b></a> 
<ul class="dropdown-menu">
<li><a href="login_student.html">Login</a></li>
<li class="active"><a href="studentregister.php">Register</a></li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tutor<b class="caret"></b></a> 
<ul class="dropdown-menu">
<li><a href="login.html">Login</a></li>
<li class="active"><a href="register_tutor.php">Register</a></li>
</ul>
</li>
<li><a href="contact.php">Contact</a></li>                  
</ul>
</div>
</nav>
</div>
</div>

<header id="head" class="secondary">
<div class="container">
<h1>Student Register Here</h1>
<p>  </p>
</div>
</header>


<div class="container">
<div class="row">
<div class="col-md-6">
<h3 class="section-title">Student Register Here</h3>
<form class="form-light mt-20" action="insert_data.php?action=new_student" method="post" role="form" onsubmit="return studentRegistrationFormValidation();">
<div class="form-group">
<label>UserName</label>
<input type="text" name="student_name" id="studnetName" class="form-control" placeholder="Enter Your Name" onkeypress="noneErrors(studnetName,studnetNameError)">
<span id="studnetNameError" style="color:red;"></span>
</div>
<div class="form-group">
<label>Student ID</label>
<input type="text" name="student_id" id="studnetID" class="form-control" placeholder="Enter Your ID" onkeypress="noneErrors(studnetID,studnetIdError)">
<span id="studnetIdError" style="color:red;"></span>
</div>

<div class="form-group">
<label>Password</label>
<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password"   onkeypress="noneErrors(password,passwordError);" maxlength="12" />
<span id="passwordError" style="color:red;"></span>
</div>


<div class="form-group">
<label>Confirm Password</label>
<input type="password" name="Confirmpassword" id="confPassword" onkeypress="noneErrors(confPassword,confPasswordError)" class="form-control" placeholder="Enter Confirm Password">
<span id="confPasswordError" style="color:red;"></span>
</div>

<div class="row">
<div class="col-md-12">
<div class="form-group">
<label>Email ID</label>
<input type="text" name="emaild" id="emailId" class="form-control"  onblur="emailExistsOrNot();" onkeypress="noneErrors(emailId,email2Error);noneErrors(emailId,emailError);" placeholder="Enter Email Id">
<span id="emailError"></span>
<span id="email2Error" style="color:red;"></span>

</div>
</div>
<div class="col-md-12">
<div class="form-group" >
<label>Major</label>
<select name="major" id="major" class="form-control" onchange="noneErrors(major,majorError)">
<option value="">Select Major</option>
<?php
$sql="select * from departments";
$result=  mysql_query($sql);
while($row=mysql_fetch_array($result)){
?>
<option value="<?=$row['dept_id']?>"><?=$row['dept_name']?></option>
<?php	
}
?>
<option value="others">others</option>
</select>
<span id="majorError" style="color:red;"></span>
</div>


</div>

</div>

<button type="submit" name="action" value="new_student" class="btn btn-two">Submit</button><p><br/></p>
</form>
</div>
</div>
</div>



<script>
function studentRegistrationFormValidation(){
var username=document.getElementById('studnetName').value;
var studentID=document.getElementById('studnetID').value;
var password=document.getElementById('password').value;
var confPassword=document.getElementById('confPassword').value;
var emailId=document.getElementById('emailId').value;
var major=document.getElementById('major').value;


var emailError=document.getElementById('emailError');

if(username=='' || password=='' || confPassword=='' || emailId=='' || major=='' || studentID==''){
if(username==''){
document.getElementById('studnetNameError').innerHTML="Please fill user name field";
}
if(password==''){

document.getElementById('passwordError').innerHTML="Please fill password field";
}

if(confPassword==''){

document.getElementById('confPasswordError').innerHTML="Please fill confirm password field";
}
if(emailId==''){

document.getElementById('email2Error').innerHTML="Please fill email id field";
}
if(major==''){

document.getElementById('majorError').innerHTML="Please select major field";
}
if(studentID==''){

document.getElementById('studnetIdError').innerHTML="Please fill student Id field";
}
return false;
}
if (document.getElementById('password').value.length < 5){
document.getElementById('passwordError').innerHTML='Password should be minimum 5 characters.';
return false;
}
if(password!=confPassword){
document.getElementById('confPasswordError').innerHTML="password and confirm password are mismatched";
return false;
}else{
document.getElementById('confPasswordError').innerHTML="";
document.getElementById('confPasswordError').style.color="green";
}
if(emailError.innerHTML=='This email id already exist' || emailError.innerHTML=='Please fill email id field'){
return false;
}
if(!validateEmail(emailId)){
	document.getElementById('email2Error').innerHTML='Please enter a valid email id';
	return false;
}else{
	emailExistsOrNot();
	if(emailError.innerHTML=='This email id already exist'){
	return false;
}
}

return true;
}


function validateEmail(email){
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}
</script>



<script>
function emailExistsOrNot() {
  var xhttp;
  var emailId=document.getElementById('emailId').value;
  var emailError=document.getElementById('emailError');
  if (window.XMLHttpRequest) {
    xhttp = new XMLHttpRequest();
    } else {
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
	  var result=xhttp.responseText;
	  if(result=='?>exists'){
		  emailError.innerHTML="This email id already exist";
		  emailError.setAttribute("style", "color: red;");
	  }else{
		  //emailError.innerHTML="This mail id is ok";
		  // emailError.setAttribute("style", "color: green;");
	  }
    }
  };
  var url="checkEmailForValidation.php?mail="+emailId;
 
  xhttp.open("GET", url, true);
  xhttp.send();
}
function noneErrors(id1,id2){
	if(id1.value!=''){
		id2.innerHTML='';
	}
}
</script>


</body>
</html>