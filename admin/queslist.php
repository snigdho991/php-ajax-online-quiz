<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exm = new Exam();
?>
<?php
	if (isset($_GET['delques'])){
		$quesNo = (int)$_GET['delques'];
		$delques = $exm->delQuestion($quesNo);
	}
?>
<div class="main">
	<h1>Questions List</h1>
<?php
	if (isset($delques)){
		echo $delques;
	}
?>
	<div class="queslist">
		<table class="tblone">
			<tr>
				<th width="8%">No</th>
				<th width="67%">Questions</th>
				<th width="25%">Action</th>
			</tr>

<?php 
	$getData = $exm->getQuesByOrder();
	if ($getData){
		$i = 0;
		while ($result = $getData->fetch_assoc()) {
			$i++;
?> 

			<tr align="center">
				<td><?php echo $i; ?></td>
				<td><?php echo $result['ques']; ?></td>
				<td>
					<a onclick="return confirm('Are You Sure To Remove ?')" href="?delques=<?php echo $result['quesNo']; ?>">Remove</a>
				</td>
			</tr>
<?php } } ?>
		</table>
	</div>

</div>
<?php include 'inc/footer.php'; ?>