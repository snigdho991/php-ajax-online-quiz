<?php include 'inc/header.php'; ?>
<?php 
	Session::checkSession();
?>
<?php
	$question = $exm->getQuestion();
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
		margin-bottom: 10px;
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
	}
	.starttest ul li{
	  	margin-top: 5px;
	  	color: #555;
	}
	.starttest a{
	  	background: #f4f4f4;
	  	border: 1px solid #ddd;
	  	color: #666;
	  	display: block;
	  	margin-top: 35px;
	  	padding: 6px 10px;
	  	text-align: center;
	  	text-decoration: none;
	}
	.starttest a:hover{
	  	background: #f4f4f4;
	  	border: 1px solid #999;
	  	color: #444;
	  	display: block;
	  	margin-top: 35px;
	  	padding: 6px 10px;
	  	text-align: center;
	  	text-decoration: none;
	  	transition: all linear .3s;
	}
</style>
<div class="main">
<h1>Welcome to Online Exam</h1>
	<div class="starttest">
		<h2>Test Your Knowledge</h2>
		<p>This is a online challenge quiz to develop your knowledge</p>
		<ul>
			<li>Number of Qustions:<strong> <?php echo $total; ?> </strong></li>
			<li>Quiz Topic:<strong> PHP </strong></li>
			<li>Quistions' Type:<strong> MCQ </strong></li>
		</ul>
		<a href="test.php?q=<?php echo $question['quesNo']; ?>"> Start Quiz </a>
	</div>
</div>
<?php include 'inc/footer.php'; ?>