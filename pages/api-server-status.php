<?php

$websiteProperty = new WebsiteProperty();
$statistics = new Statistics();
$keys = getkeys();
$config = getconfig();
$stats = getstats();
$server_running = $statistics->checkServer($websiteProperty->getProperty("hostname_or_ip") . ':444');

//error_reporting(0);
?>
<h1>API Server Status and Statistics</h1>

<p>Hover with your mouse over the table headers to get a detailed explantion of what it is.</p>

<div style="overflow: hidden">
<div style="width:300px; float:left; margin-right: 25px;">
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
</table>
</div>
<div style="float:right; width: 530px; position: relative;">
<!-- Project Wonderful Ad Box Code -->
<div id="pw_adbox_61635_7_0"></div>
<script type="text/javascript"></script>
<noscript><map name="admap61635" id="admap61635"><area href="http://www.projectwonderful.com/out_nojs.php?r=0&c=0&id=61635&type=7" shape="rect" coords="0,0,300,250" title="" alt="" target="_blank" /></map>
<table cellpadding="0" cellspacing="0" style="width:300px;border-style:none;background-color:#ffffff;"><tr><td><img src="http://www.projectwonderful.com/nojs.php?id=61635&type=7" style="width:300px;height:250px;border-style:none;" usemap="#admap61635" alt="" /></td></tr><tr><td style="background-color:#ffffff;" colspan="1"><center><a style="font-size:10px;color:#0000ff;text-decoration:none;line-height:1.2;font-weight:bold;font-family:Tahoma, verdana,arial,helvetica,sans-serif;text-transform: none;letter-spacing:normal;text-shadow:none;white-space:normal;word-spacing:normal;" href="http://www.projectwonderful.com/advertisehere.php?id=61635&type=7" target="_blank">Ads by Project Wonderful!  Your ad here, right now: $0.06</a></center></td></tr></table>
</noscript>
<!-- End Project Wonderful Ad Box Code -->
</div>
</div>
<br />