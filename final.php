<?php include 'inc/header.php'; ?>
<?php 
	Session::checkSession();
?>
<?php
	$total = $exm->getTotalRows();
?>
<style type="text/css">
	.starttest{
		border: 1px solid #f4f4f4;
		padding: 20px;
		margin: 0 auto;
		width: 590px;
	}
	.starttest h2{
		border-bottom: 1px solid #ddd;
		font-size: 20px;
		margin-bottom: 20px;
		padding-bottom: 10px;
		text-align: center;
		color: #888; 	  
	}
	.starttest p {
    	line-height: 30px;
    	color: #555;
	}
	.starttest ul{
		margin: 0px;
		padding: 0px;
		list-style: none;
		padding-bottom: 30px;
	}
	.starttest ul li{
	  	margin-top: 7px;
	  	color: #555;
	}
	.starttest a{
	  	background: #f4f4f4;
	  	border: 1px solid #ddd;
	  	color: #666;
	  	display: block;
	  	margin-top: 12px;
	  	padding: 6px 10px;
	  	text-align: center;
	  	text-decoration: none;
	}
	.starttest a:hover{
	  	background: #f4f4f4;
	  	border: 1px solid #999;
	  	color: #444;
	  	display: block;
	  	margin-top: 12px;
	  	padding: 6px 10px;
	  	text-align: center;
	  	text-decoration: none;
	  	transition: all linear .3s;
	}
</style>
<div class="main">
<h1>Online Quiz - Final Result</h1>
	<div class="starttest">
		<h2>Congraculations ! You Are Done !</h2>

<?php 
	$userid = Session::get("userid");
	$userdata = $usr->getUserData($userid);
	$result = $userdata->fetch_assoc();
	//$percent = $pro->scorePercentage();

?>
		<ul>
			<li>Name:<strong> <?php echo $result['name']; ?> </strong></li>
			<li>E-mail:<strong> <?php echo $result['email']; ?> </strong></li>
			<li>Number of Questions:<strong> <?php echo $total; ?> </strong></li>
			<li>Final Score:<strong> 
<?php 
	if (isset($_SESSION['score'])){
		echo $_SESSION['score'];
		unset($_SESSION['score']);
	} 
?> 
		</strong></li>
		</ul>
		<a href="viewans.php"> View Answer </a>
		<a href="starttest.php"> Start Again </a>
	</div>
</div>
<?php include 'inc/footer.php'; ?>