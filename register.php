<?php include 'inc/header.php'; ?>
<?php 
  Session::checkLogin();
?>
<div class="main">
<h1>Online Exam System - User Registration</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/regi.png"/>
	</div>
	<div class="segment">
	<form action="" method="POST">
		<table>
		<tr>
           <td style="vertical-align: top; padding-top: 2px;">Name</td>
           <td><input type="text" name="name" id="name"></td>
         </tr>
		<tr>
           <td style="vertical-align: top; padding-top: 2px;">Username</td>
           <td><input type="text" name="username" id="username"></td>
         </tr>
         <tr>
           <td style="vertical-align: top; padding-top: 2px;">Password</td>
           <td><input type="password" name="password" id="password"></td>
         </tr>
         
         <tr>
           <td style="vertical-align: top; padding-top: 2px;">E-mail</td>
           <td><input type="text" name="email" id="email"></td>
         </tr>
         <tr>
           <td></td>
           <td><input type="submit" id="regsubmit" value="Sign Up">
           </td>
         </tr>
       </table>
	   </form>
     <span id="state"></span>
	   <p>Already Registered ? <a href="index.php">Login</a> Here</p>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>