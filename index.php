<?php include 'inc/header.php'; ?>
<?php 
	Session::checkLogin();
?>
<div class="main">
<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table class="tbl">    
			 <tr>
			   <td style="vertical-align: top; padding-top: 2px;">Email</td>
			   <td><input name="email" type="text" id="email"></td>
			 </tr>
			 <tr>
			   <td style="vertical-align: top; padding-top: 2px;">Password </td>
			   <td><input name="password" type="password" id="password"></td>
			 </tr>
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" id="loginsubmit" value="Log In">
			   </td>
			 </tr>
       </table>
	   </form>
	   <span class="empty" style="display: none;"><b>Error ! </b>Fields must NOT be Empty.</span>
	   <span class="disable" style="display: none;">UserID Status : <b>Disable</b> !</span>
	   <span class="error" style="display: none;"><b>Sorry ! </b>Email or Password NOT Matched.</span>
	   <p>New User ? <a href="register.php">Signup</a> Free</p>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>