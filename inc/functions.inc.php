<?php

    // redirect(location, time before redirected)
    function redirect($url, $seconds) {
    	header("Refresh: " . $seconds . "; URL=" . $url);
    }

    // shortString(string, to display characters)
    function shortString($string, $max) {
    	if(strlen($string) > ($max + 3)) {
    		return substr($string, 0, $max) . "..";
    	}
    	else {
    		return $string;
    	}
    }

    // ads()
    function ads() {
        return '<!--Place here your ad code, remove this line afterwards -->';
    }

    // supportMe()
    function supportMe() {
        // PLEASE DO NOT CHANGE ANYTHING ON THIS FUNCTION
        // IF YOU WANT US TO KEEP DEVELOPING AND IMPROVING THE CODE
        // SHOW US SOME RESPECT AND DON'T TOUCH THIS FUNCTION
        return '<h2 style="margin-top: 50px;">Contribute to keep this project alive!</h2><div style="overflow: auto;"><div style="float: left; width: 750px;"><p>If you like this server, please help us paying for the server costs.<br />Donations are welcome in order to keep me developing this project at these hard times.</p></div><div style="width: 150px; float: right; padding-top: 20px;"><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="KKGLEBUZRLQTS">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
      </form>
    </div>
</div>';
    }

    /* Functions below from @JimmyKane9
    ******************************************************************/
    // getkeys()
    function getkeys() {
        extract($GLOBALS);
        $query = "SELECT * FROM `keys` ORDER by date_added DESC";
        $results = $db->MakeQuery($query);
        if(mysql_num_rows($results) > 0) {
    		while($data = mysql_fetch_assoc($results)) {
    			if($data['expired'] == "False") {
    				$keys[0][] = $data;
    			}
    			else {
    				$keys[1][] = $data;
    			}
    		}
    		$keys[2]['availablekeys'] = count($keys[0]);
            return $keys;
        }
    	else {
    		return false;
    	}
    }

    // getassistants(id from a key record)
    function getassistants($keyid) {
        extract($GLOBALS);
        $query = 'SELECT * FROM `assistants` WHERE key_id="'.$keyid.'"';
        $result = $db->MakeQuery($query);
        $available_assistants_count = $db->GetRecordCount($result);
        if ($available_assistants_count > 0) {

            $assistants = $db->GetResultAsArray($result);
                    $assistants[0]['assistantscount'] = $available_assistants_count;
            return $assistants;
        }
        return false;
    }

    // getconfig
    function getconfig() {
        extract($GLOBALS);
        $query = "SELECT * FROM `config` WHERE id=1 ";
        $result = $db->MakeQuery($query);
        $config = $db->GetRecord($result);
        return $config;
    }

    // getstats
    function getstats() {
        extract($GLOBALS);
        $query = "SELECT * FROM `stats` WHERE id=1 ";
        $result = $db->MakeQuery($query);
        $stats = $db->GetRecord($result);
        return $stats;
    }
?>