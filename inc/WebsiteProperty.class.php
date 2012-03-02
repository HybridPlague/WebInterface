<?php

	class WebsiteProperty {
		public function WebsiteProperty() {}
		
		public function getProperties() {
			$query = mysql_query("SELECT * FROM website_properties");
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
		
		public function getProperty($propertyName) {
			$query = mysql_query("SELECT property_content FROM website_properties WHERE property_name = '" . mysql_real_escape_string($propertyName) . "'");
			if($query) {
				if(mysql_num_rows($query) == 0) {
					die("no records");
					return false;
				}
				else {
					$data = mysql_fetch_assoc($query);
					return $data['property_content'];
				}
			}
			else {
				return false;
			}
		}
		
		public function updateProperty($id, $name, $content) {
			$query = mysql_query("UPDATE website_properties SET property_name = '" . mysql_real_escape_string($name) . "', property_content = '" . mysql_real_escape_string($content) . "' WHERE id = '" . mysql_real_escape_string($id) . "'");
			if($query) {
				return true;
			}
			else {
				return false;
			}
		}
	}
?>