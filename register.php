<?php
if(count($_POST)>0) {
/* Validation to ensure all fields are non-empty */
foreach($_POST as $key=>$value) {
if(empty($_POST[$key])) {
$message = ucwords($key) . " field is required";
break;
}
}

/* Validation about the right format of user email */
if(!isset($message)) {
if (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
$message = "Invalid UserEmail, Please input the correct UserEmail";
}
}

/* Validation to ensure gender is selected */
if(!isset($message)) {
if(!isset($_POST["gender"])) {
$message = " Gender field is required";
}
}

/* Validation to ensure about if the checkbox is checked or not */

if(!isset($message)) {
$message = "You have registered successfully!";	
unset($_POST);
}

}
?>
<html>
<head>
<title>Registration Form</title>
</head>
<body>
<form name="frmRegistration" method="post" action="">
<div class="message"><?php if(isset($message)) echo $message; ?></div>
<table>
<tr class="tableheader">
<td colspan="2">Registration Form</td>
</tr>
<tr class="tablerow">
<td align="right">Username</td>
<td><input type="text" name="userName" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>"></td>
</tr>
<tr class="tablerow">
<td align="right">Password</td>
<td><input type="password" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>"></td>
</tr>
<td>
</td>
</tr>
<tr class="tablerow">
<td align="right">Display Name</td>
<td><input type="text" name="displayName" value="<?php if(isset($_POST['displayName'])) echo $_POST['displayName']; ?>"></td>
</tr>
<tr class="tablerow">
<td align="right">Address</td>
<td><textarea rows="3" cols="17" name="userAddress"><?php if(isset($_POST['userAddress'])) echo $_POST['userAddress']; ?></textarea></td>
</tr>

<tr class="tablerow">
<td align="right">Email</td>
<td><input type="text" name="userEmail" value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>"></td>
</tr>
<tr class="tablerow">
<td align="right">Gender</td>
<td><input type="radio" name="gender" value="Male" <?php if(isset($_POST['gender']) && $_POST['gender']=="Male") { ?>checked<?php  } ?>> Male
<input type="radio" name="gender" value="Female" <?php if(isset($_POST['gender']) && $_POST['gender']=="Female") { ?>checked<?php  } ?>> Female
</td>
</tr>

<tr class="tableheader">
<td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
</tr>
</table>
</form>
</body></html>
