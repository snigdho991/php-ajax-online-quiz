<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exm = new Exam();
?>
<style type="text/css">
	.adpanel{width:480px; color: #999; margin: 20px auto 0; padding: 10px; border: 1px solid #ddd;}
</style>

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$addQues = $exm->addQuestions($_POST);
	}

	//Get Total
	$total = $exm->getTotalRows();
	$next  = $total+1;
?>

<div class="main">
<h1>Add Question</h1>
<?php
	if (isset($addQues)){
		echo $addQues;
	}
?>
	<div class="adpanel">
		<form action="" method="post">
			<table>
				<tr>
					<td style="vertical-align: top; padding-top: 3px;">Question No</td>
					<td style="vertical-align: top; padding-top: 3px;">:</td>
					<td style="padding-bottom: 15px;"><input type="number" readonly value="<?php if (isset($next)){echo $next;} ?>" name="quesNo"></td>
				</tr>

				<tr>
					<td style="vertical-align: top; padding-top: 3px;">Question</td>
					<td style="vertical-align: top; padding-top: 3px;">:</td>
					<td style="padding-bottom: 10px;"><input type="text" name="ques" placeholder="Enter Question..." required></td>
				</tr>

				<tr>
					<td style="vertical-align: top; padding-top: 3px;">Choice One</td>
					<td style="vertical-align: top; padding-top: 3px;">:</td>
					<td style="padding-bottom: 10px;"><input type="text" name="ans1" placeholder="Enter Choice One..." required></td>
				</tr>

				<tr>
					<td style="vertical-align: top; padding-top: 3px;">Choice Two</td>
					<td style="vertical-align: top; padding-top: 3px;">:</td>
					<td style="padding-bottom: 10px;"><input type="text" name="ans2" placeholder="Enter Choice Two..." required></td>
				</tr>

				<tr>
					<td style="vertical-align: top; padding-top: 3px;">Choice Three</td>
					<td style="vertical-align: top; padding-top: 3px;">:</td>
					<td style="padding-bottom: 10px;"><input type="text" name="ans3" placeholder="Enter Choice Three..."></td>
				</tr>

				<tr>
					<td style="vertical-align: top; padding-top: 3px;">Choice Four</td>
					<td style="vertical-align: top; padding-top: 3px;">:</td>
					<td style="padding-bottom: 13px;"><input type="text" name="ans4" placeholder="Enter Choice Four..."></td>
				</tr>

				<tr>
					<td style="vertical-align: top; padding-top: 3px;">Correct No</td>
					<td style="vertical-align: top; padding-top: 3px;">:</td>
					<td style="padding-bottom: 13px;"><input type="number" name="rightAns"></td>
				</tr>

				<tr>
					<td colspan="3" align="center">
						<input type="submit" value="Add This Question">
					</td>
				</tr>

			</table>
		</form>		
	</div>

</div>
<?php include 'inc/footer.php'; ?>