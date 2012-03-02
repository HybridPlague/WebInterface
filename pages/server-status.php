<?php

$websiteProperty = new WebsiteProperty();
$statistics = new Statistics();
$keys = getkeys();
$config = getconfig();
$stats = getstats();
$server_running = $statistics->checkServer($websiteProperty->getProperty("hostname_or_ip") . ':443');
$server_running_api = $statistics->checkServer($websiteProperty->getProperty("hostname_or_ip") . ':444');

//error_reporting(0);
?>
<h1>Server Status and Statistics</h1>

<p>Hover with your mouse over the table headers to get a detailed explantion of what it is.</p>
<p>&nbsp;</p>

<h1 style="float:left; margin-left: 125px;">Main Server</h1>

<h1 style="float: right; margin-right: 250px;"> API Server</h1>



<div style="width:835px; vertical-align:top;">

<div style="width:415px; float:left;">
<?php


		
		$keyFactor = 0;
if(count($keys[0]) > 0) {	
	foreach($keys[0] as $key) {
		if($key['keyload'] < $config['max_keyload']) {
			$keyFactor++;
		}
	}
}		

?>

<table class="notificationFix" width="415px">
    <tr>
        <th><acronym class="toolTip" title="Displays whether the server is on or off.">Server status</acronym></th>
        <td id="server-status">
            <?php
            if($server_running == true)
                echo '<p class="notification green minimal">ON</p>';
            else
                echo '<p class="notification red minimal">OFF</p>';
            ?>
        </td>        
    </tr>
    <tr>
        <th><acronym class="toolTip" title="Displays the time that the server is running without being turned off or crashing.">Server uptime</acronym></th>
        <td id="server-uptime">
            <?php
            if ($server_running == true) {
				if($stats['up_time'] > 3600) {
					echo floor($stats['up_time'] / 3600) . ' hours ';
					echo floor(($stats['up_time'] % 3600) / 60) . ' minutes';
				}
				elseif($stats['up_time'] > 60) {
					echo floor($stats['up_time'] / 60) . ' minutes ';
					echo ($stats['up_time'] % 60) . ' seconds';
				}
				else {
					echo $stats['up_time'] . ' seconds';
				}
			}
			else {
				echo '<p class="notification red minimal">0 seconds</p>';
			}
                
            ?>
        </td>        
    </tr>
    <tr>
        <th><acronym class="toolTip" title="The number of available keys that are not overloaded and not expired.">Available keys</acronym></th>
        <td id="availabe-keys"><?php
            if ($keyFactor == 0)
                echo '<p class="notification red minimal">0</p>';
            else
                echo '<p class="notification green minimal">' .  $keyFactor. '</p>';
            ?>
        </td>
    </tr>
    <tr>
        <th><acronym class="toolTip" title="The number of overloaded keys that are not expired.">Overloaded keys</acronym></th>
        <td id="overloaded-keys"><?php
            if (($keys[2]['availablekeys'] - $keyFactor) !== 0)
                echo '<p class="notification red minimal">' . ($keys[2]['availablekeys'] - $keyFactor) . '</p>';
            else
                echo '<p class="notification green minimal">0</p>';
            ?>
        </td>
    </tr>
    <tr>
        <th><acronym class="toolTip" title="People connected at the same time with the proxy server.">Active connections</acronym></th>
        <td id="active-connections"><?php
		
            if ($config['active_connections'] > ($config['max_connections'] * $keyFactor))
                echo '<p class="notification red minimal">' . $config['active_connections'] . '</p>';
            else
                echo '<p class="notification green minimal">' . $config['active_connections'] . '</p>';
            ?>
        </td>

    </tr>
    <tr>
        <th><acronym class="toolTip" title="The maximum active connections per key.">Maximum connections / key</acronym></th>
        <td id="max-connections"><?php echo $config['max_connections'] ?></td>
    </tr>

    <tr>
        <th><acronym class="toolTip" title="The maximum load per key.">Max keyload</acronym></th>
        <td id="max-keyload"><?php echo $config['max_keyload'] ?></td>

    </tr>
    <tr>
        <th><acronym class="toolTip" title="The dropdown for the keyload. The keyload drops with this number everytime the dropdown check interval is reached.">Keyload dropdown</acronym></th>
        <td id="keyload-dropdown"><?php echo $config['keyload_dropdown'] ?></td>

    </tr>
    <tr>
        <th><acronym class="toolTip" title="The time before a key has cool down.">Keyload check interval</acronym></th>
        <td id="keyload-interval"><?php echo $config['keyload_dropdown_interval'] ?></td>      
    </tr>
    <tr>
        <th><acronym class="toolTip" title="The time remaining before the keys are cooled down.">Time remaining until dropdown</acronym></th>
        <td id="dropdown-time"><?php $secondsLeft = $config['keyload_dropdown_interval'] - $stats['elapsed_key_check_interval'];
		
			if($secondsLeft > 60) {
					echo floor($secondsLeft / 60) . ' minutes ';
					echo ($secondsLeft % 60). ' seconds';
			}
			else {
				echo $secondsLeft . ' seconds';
			}
			
		 ?></td>      
    </tr>
    <tr>
        <th><acronym class="toolTip" title="The time when keys will get reset to generate new assistants. When a new 4S key is donated it also accepts new people, so please donate your (friends/family?) 4S keys!">Accepting new people</acronym></th>
        <td id="happy-hour"><?php 
		
				$secondsLeft = $websiteProperty->getProperty("accepting_people_in") - $stats['happy_hour_elapsed'];
				
				if($secondsLeft < 0) {
					echo '<p class="notification green minimal">Happy Hour!</p>';
				}
				else {
					if($secondsLeft > 3600) {
						echo floor($secondsLeft / 3600) . ' hours ';
						echo floor(($secondsLeft % 3600) / 60) . ' minutes';
					}
					elseif($secondsLeft > 60) {
						echo floor($secondsLeft / 60) . ' minutes ';
						echo ($secondsLeft % 60) . ' seconds';
					}
					else {
						echo $secondsLeft . ' seconds';
					}
				}
			
		 ?></td>      
    </tr>
</table>

</div>

<div style="width:415px; float:right;"><table class="notificationFix" width="415px">
  <tr>
    <th><acronym class="toolTip" title="Displays whether the server is on or off.">Server status</acronym></th>
    <td id="server-status-api">
            <?php
            if($server_running_api == true)
                echo '<p class="notification green minimal">ON</p>';
            else
                echo '<p class="notification red minimal">OFF</p>';
            ?>
        </td>      
  </tr>
  <tr>
   <th><acronym class="toolTip" title="Displays the time that the server is running without being turned off or crashing.">Server uptime</acronym></th>
        <td id="server-uptime">
        <p class="notification red minimal">Error</p>
		</td>
  </tr>
</table>

</div>

<br style="clear:both;" />

<div style="float:left; width: 530px; position: relative;">
<?php if(count($keys[0]) == 0) { ?>
<p class="notification yellow" style="margin-top: 0;">All the keys are expired, <a href="?page=help-fly-the-birds">Help Fly The Birds</a> to add <?php echo $config['max_connections'] ?> more connections!</p>
<?php } elseif($keyFactor == 0) { ?>
<p class="notification yellow" style="margin-top: 0;">All the keys are <b>overloaded</b>. This means the keys are getting a lot of load and are paused to prevent a ban. Please <a href="?page=help-fly-the-birds">Help Fly The Birds</a> to add <?php echo $config['max_connections'] ?> more connections!</p>
<?php
} elseif($config['active_connections'] >= ($config['max_connections'] * $keyFactor)) { ?>
<p class="notification yellow" style="margin-top: 0;">The maximum connection count is reached. This means all new connections will get refused by the server. <a href="?page=help-fly-the-birds">Help Fly The Birds</a> another key to add <?php echo $config['max_connections'] ?> more connections!</p>

<?php } ?>
</div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br />
</p>
<h1>Available keys</h1>
<p>Hover with your mouse over the table headers to get a detailed explantion of what it is.</p>
<?php

	$keyTables = array();

	if(count($keys[0]) > 0) {
		foreach($keys[0] as $key) {
			$keyTables[] = $key;
		}
	}
	if(count($keys[1]) > 0) {
	    foreach ($keys[1] as $key) {
			$keyTables[] = $key;
		}
	}
	
	 ?>
    <table id="keys" width="100%">
        <tr>
            <th><acronym class="toolTip" title="Just a follow number for the list.">#</acronym></th>
            <th><acronym class="toolTip" title="The validation data hash is an undecryptable MD5 hash from the validation session data. This is used as unique identifier and can never be the same, it's put in a 32-bit long MD5 hash to protect the data from being stolen. The validation session data is used to identify an iPhone 4S to the Apple servers, to get a connection with the Siri servers.">Validation data hash</acronym></th>
            <th><acronym class="toolTip" title="How many assistants a key has generated. This is where Apple bans keys. If too many assistants are generated in short time Apple will stop generating assistants. Keys with <b>0</b> are just donated or probably banned and can't generate a new assistant but they can still be used to process speech packets.">Assistants</acronym></th>
            <th><acronym class="toolTip" title="The current load on each key. The more packets a key processes the hotter it's getting. Once it has reached the max keyload it's paused for a short time to let it cool down.">Keyload</acronym></th>
            <th><acronym class="toolTip" title="The date and time when the key was donated.">Date added</acronym></th>
        </tr>
        <?php
		if($keys[2] == false) {
			echo '<td colspan="5"><p class="notification red" style="padding: 0 5px; margin: 5px;">There are no keys available right now, Help Fly The Birds!</p></td>';
		}
		else {
			
			
			$pid = $_GET['page-id'];
			$tPages = round(count($keyTables) / $websiteProperty->getProperty("max_key_entries_per_page"), 0);
			if(empty($pid)) { $pid = 1; }
			
			if($pid > 1) {
				$count = $websiteProperty->getProperty("max_key_entries_per_page") * ( $pid - 1);
			}
			else {
				$count = 0;
			}
			$keys = array();
			$j = 0;
			foreach($keyTables as $key) {
				if($j >= $count && $j < $count + $websiteProperty->getProperty("max_key_entries_per_page")) {
					$keys[] = $key;
				}
				$j++;
			}
			
			foreach ($keys as $key) {
			?>
				<tr> 
					<td width="30px"><?php echo ++$count; ?></td>
					<td width="260px"><?php echo md5($key['sessionValidation']); ?></td>
                    <td>
					<?php
						$assistants=getassistants($key['id']);
						if(empty($assistants[0]['assistantscount'])) {
							echo '0';
						}
						else {
							echo $assistants[0]['assistantscount'];
						}
					?>
					<td width="380px">
						<?php if($key['expired'] == "True") {
							echo '<div class="progressBar red">';
							echo '<div style="width: 100%;"></div>';
							echo '<span style="left: 44%">Expired</span>';
							echo '</div>';
						}
						elseif($key['keyload'] >= $config['max_keyload']) {
							echo '<div class="progressBar red">';
							echo '<div style="width: 100%;"></div>';
							echo '<span style="left: 41%">Overloaded</span>';
							echo '</div>';
						} else {
							$percent = round(($key['keyload']/$config['max_keyload']) * 100, 0);
							echo '<div class="progressBar ';
							if($percent < 33) {
								echo 'green';
							}
							else if ($percent < 66) {
								echo 'yellow';
							}
							else {
								echo 'red';
							}
							echo '">';
    						echo '<div style="width:' . $percent . '%;"></div>';
							echo '<span>' . $percent . '%</span>';
							echo '</div>';
						}
						?>
					</td>
					<td width="145px">
						<?php echo $key['date_added'] ?>
					</td>
				</tr>
				
			<?php 
				if($count == $pid * MAX_KEY_RECORDS_PAGE) {
					break;
				}
			} 
			echo '<tr><td colspan="5" class="pagination">';
			if($pid > 1) {
				echo '<a href="?page=' . $_GET['page'] . '&amp;page-id=' . 1 . '#keys">&lt;&lt;</a>';
				echo '<a href="?page=' . $_GET['page'] . '&amp;page-id=' . ($pid - 1) . '#keys">&lt;</a>';
			}
			if(($pid - 2) > 0) {
				$i = $pid - 2;
			}
			else {
				$i = 1;
			}
			if(($pid + 2) <= $tPages) {
				$mPage = $pid + 2;
			}
			else {
				$mPage = $tPages;
			}
			while($i <= $mPage) {
				echo '<a href="?page=' . $_GET['page'] . '&amp;page-id=' . $i . '#keys"';
				if($pid == $i) {
					echo ' class="current"';
				}
				echo '>' . $i . '</a>';
				$i++;
			}
			if($pid < $tPages) {
				echo '<a href="?page=' . $_GET['page'] . '&amp;page-id=' . ($pid + 1) . '#keys">&gt;</a>';
				echo '<a href="?page=' . $_GET['page'] . '&amp;page-id=' . $tPages. '#keys">&gt;&gt;</a>';
			}
			
			echo '</td></tr>';
			
			
		}
        ?>
    </table>