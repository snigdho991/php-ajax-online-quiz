<?php include 'inc/header.php'; ?>

<?php 
	Session::checkSession();
	$total = $exm->getTotalRows();
?>

<style type="text/css">
	.viewans {
	  border: 1px solid #eee;
	  margin: 0 auto;
	  max-width: 650px;
	  padding: 20px;
	}
	.viewans input[type="radio"] {
	  margin-bottom: 10px;
	  margin-right: 10px;
	  cursor:pointer;
	}
	.viewans h3 {
	  border-bottom: 1px dashed #ddd;
	  font-size: 16px;
	  margin-bottom: 10px;
	  padding-bottom: 10px;
	  margin-top: 20px;
	}

	.viewans a{
	  	background: #f4f4f4;
	  	border: 1px solid #ddd;
	  	color: #666;
	  	display: block;
	  	margin-top: 12px;
	  	padding: 6px 10px;
	  	text-align: center;
	  	text-decoration: none;
	}
	.viewans a:hover{
	  	background: #f4f4f4;
	  	border: 1px dashed #ccc;
	  	color: #444;
	  	display: block;
	  	margin-top: 12px;
	  	padding: 6px 10px;
	  	text-align: center;
	  	text-decoration: none;
	  	transition: all linear .3s;
	}
</style>

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$process = $pro->processData($_POST);
	}
?>
<div class="main">
<h1>Total Questions & Answers: <?php echo $total; ?></h1>
	<div class="viewans">
		<table>
<?php
	$getQues = $exm->getQuesByOrder();
	if ($getQues){
		while ($ques = $getQues->fetch_assoc()) {
?> 
			<tr>
				<td colspan="2">
				 <h3>Ques <?php echo $ques['quesNo']; ?>: <?php echo $ques['ques']; ?></h3>
				</td>
			</tr>
<?php 
	$number = $ques['quesNo'];
	$answer = $exm->getAnswer($number);
	if ($answer) {
		while ($result = $answer->fetch_assoc()) {
?>

			<tr>
				<td>
				 <input type="radio"/>
				 <?php
				 	if ($result['rightAns'] == '1') { 
				 		echo "<span style='color:blue'>".$result['ans']."  ✔"."</span>"; 
				 	} else {
				  		echo $result['ans']; 
				 	}
				 ?>
				</td>
			</tr>
	<?php } } ?>
<?php } } ?>			
		</table>
		<a href="starttest.php"> Start Again </a>
	</div>
</div>
<?php include 'inc/footer.php'; ?>