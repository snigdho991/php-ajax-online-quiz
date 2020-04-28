<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exm = new Exam();
?>
<style type="text/css">
	.adpanel{width:480px; color: #999; margin: 20px auto 0; padding: 10px; border: 1px solid #ddd;}
</style>

<div class="main">
<h1>Edit Question</h1>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$quesNo = $_POST['quesNo'];
		$ques   = $_POST['ques'];
		$ans   = $_POST['ans'];

		$rightAns = $_POST['rightAns'];

		$query = "UPDATE tbl_ques
					SET 
					ques = '$ques'
					WHERE 
					quesNo = '$quesNo'";
		$updated_row = $db->update($query);

		if ($rightAns == '1'){
		$query = "UPDATE tbl_ans
					SET 
					ans = '$ans',
					rightAns = '1'
					WHERE 
					quesNo = '$quesNo'";
		$updated_row = $db->update($query);
		} elseif ($rightAns == '0') {
			$query = "UPDATE tbl_ans
					SET 
					ans = '$ans',
					rightAns = '0'
					WHERE 
					quesNo = '$quesNo'";
			$updated_row = $db->update($query);
		}
	}
?>
	<div class="adpanel">
		<form action="" method="post">
			<table>
<?php
	if ($_GET['editques']) {
		$number = (int) $_GET['editques'];
	} else {
		header("Location:index.php");
	}
	$getques = $exm->getQuesByNumber($number);
?>
				<tr>
					<td style="vertical-align: top; padding-top: 3px;">Question No</td>
					<td style="vertical-align: top; padding-top: 3px;">:</td>
					<td style="padding-bottom: 15px;"><input type="number" readonly value="<?php echo $getques['quesNo']; ?>" name="quesNo"></td>
				</tr>

				<tr>
					<td style="vertical-align: top; padding-top: 3px;">Question</td>
					<td style="vertical-align: top; padding-top: 3px;">:</td>
					<td style="padding-bottom: 10px;"><input type="text" name="ques" value="<?php echo $getques['ques']; ?>"></td>
				</tr>
<?php 
	$getans = $exm->getAnswer($number);
	if ($getans){
		while ($result = $getans->fetch_assoc()){
			
?>
				<tr>
					<td style="vertical-align: top; padding-top: 3px;">Choice </td>
					<td style="vertical-align: top; padding-top: 3px;">:</td>
					<td style="padding-bottom: 10px;"><input type="text" name="ans" value="<?php echo $result['ans']; ?>"></td>
				</tr>

				<tr>
					<td style="vertical-align: top; padding-top: 3px;">Correct No</td>
					<td style="vertical-align: top; padding-top: 3px;">:</td>
					<td style="padding-bottom: 13px;"><input type="text" name="rightAns" value="<?php echo $result['rightAns']; ?>"></td>
				</tr>
<?php } } ?>
				<tr>
					<td colspan="3" align="center">
						<input type="submit" name="submit" value="Edit This Question">
					</td>
				</tr>

			</table>
		</form>		
	</div>

</div>
<?php include 'inc/footer.php'; ?>