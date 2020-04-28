<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
	
class Exam{
		private $db;
		private $fm;

		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function addQuestions($data){
			$quesNo = $data['quesNo'];
			$ques   = $data['ques'];

			$ans = array();
			$ans[1] = $data['ans1'];
			$ans[2] = $data['ans2'];
			$ans[3] = $data['ans3'];
			$ans[4] = $data['ans4'];

			$rightAns = $data['rightAns'];
			$query = "INSERT INTO tbl_ques(quesNo, ques) VALUES('$quesNo', '$ques')";
			$inserted_row = $this->db->insert($query);
			if ($inserted_row) {
				foreach ($ans as $key => $ansName) {
					if ($ansName != '') {
						if ($rightAns == $key) {
							$rightquery = "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES('$quesNo', '1', '$ansName')";
						} else {
							$rightquery = "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES('$quesNo', '0', '$ansName')";
						}
						$insert_row = $this->db->insert($rightquery);
						if ($insert_row) {
							continue;
						} else {
							die("Something Went Wrong !");
						}
					}
				}

				$msg = "<span class='success'>Question Status : <b>Added</b> !</span>";
				return $msg;
			}
		}

		public function getQuesByOrder(){
			$query = "SELECT * FROM tbl_ques ORDER BY quesNo ASC";
			$result = $this->db->select($query);
			return $result;
		}

		public function delQuestion($quesNo){
			$tables = array("tbl_ques","tbl_ans");
			foreach ($tables as $table) {
				$delquery = "DELETE FROM $table WHERE quesNo = '$quesNo'";
				$deldata  = $this->db->delete($delquery);
			}
			if ($deldata) {
				$msg = "<span class='success'>Question <b>Deleted</b> Successfully !</span>";
				return $msg;
			} else {
				$msg = "<span class='error'><b>Error !</b> Question Not Deleted.</span>";
				return $msg;
			}
		}

		public function getTotalRows(){
			$query     = "SELECT * FROM tbl_ques";
			$getresult = $this->db->select($query);
			$total     = $getresult->num_rows;
			return $total;
		}

		public function getQuestion(){
			$query     = "SELECT * FROM tbl_ques ORDER BY quesNo ASC";
			$getdata = $this->db->select($query);
			$result = $getdata->fetch_assoc();
			return $result;
		}

		public function getQuesByNumber($number){
			$query     = "SELECT * FROM tbl_ques WHERE quesNo = '$number'";
			$getdata = $this->db->select($query);
			$result = $getdata->fetch_assoc();
			return $result;
		}

		public function getAnswer($number){
			$query     = "SELECT * FROM tbl_ans WHERE quesNo = '$number'";
			$getdata = $this->db->select($query);
			return $getdata;
		}
	}
?>