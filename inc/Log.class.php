<?php


	class Log {
		public function Log() {}
		
		public function addLog($userID, $action) {
			$query = mysql_query("INSERT INTO admin_logs (user_id, action, dtime) VALUES ('" . $userID . "', '" . mysql_real_escape_string($action) . "', NOW())");
			if($query) {
				return true;
			}
			else {
				return false;
			}
		}

		public function getTotalRecordCount() {
			$query = mysql_query("SELECT id FROM admin_logs");
			if($query) {
				return mysql_num_rows($query);
			}
			else {
				return false;
			}
		}
		
		public function getLogs($count, $startRecord) {
			$query = mysql_query("SELECT * FROM admin_logs ORDER BY dtime DESC LIMIT " . mysql_real_escape_string($startRecord) . ",
			" . mysql_real_escape_string($count));
			if($query) {
				if(mysql_num_rows($query) == 0) {
					return false;
				}
				else {
					$return = array();
					while($data = mysql_fetch_assoc($query)) {
						$return[] = $data;
					}
					return $return;
				}
			}
			else {
				return false;
			}
		}
	}
?>