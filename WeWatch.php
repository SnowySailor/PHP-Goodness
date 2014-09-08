<?php

defined('PHPFOX') or exit('NO DICE!');

$canViewPage = ((Phpfox::getLib('database')->select('user_id')->from(Phpfox::getT('user'))->where('user_id = ' . Phpfox::getUserId())->execute('getSlaveField')) == '' ? 0 : 1);
if($canViewPage) {
	echo '<!doctype html><html><head><title>We are watching</title><style>tr, td { border:1px solid black;}</style></head><body><table><tr><td>User Id</td><td>Action</td></tr>';
	$adminStuff = Phpfox::getLib('database')->select('*')->from('staff_track')->execute('getSlaveRows');

	foreach($adminStuff as $key => $value) {
		$userId = Phpfox::getLib('database')->select('user_name')->from('phpfox_user')->where('user_id = ' . $value['user_id'])->execute('getSlaveField');
		$action = $value['action'];
		echo "<tr><td>".$userId."</td><td>".$action."</td></tr>";
	}
	echo '</table></body></html>';
}

?>