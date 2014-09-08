<?php

$canViewPage = ((Phpfox::getLib('database')->select('user_id')->from(Phpfox::getT('user'))->where('user_id = ' . Phpfox::getUserId())->execute('getSlaveField')) == '' ? 0 : 1);
if($canViewPage) {
	$adminStuff = Phpfox::getLib('database')->select('*')->from('staff_track')->execute('getSlaveRows');
	$array = array(
		array('column' => 12, 'column' => 13),
		array('column' => 15, 'column' => 13)
	);
	foreach($adminStuff as $key => $value) {
		$userId = Phpfox::getLib('database')->select('user_name')->from('phpfox_user')->where('user_id = ' . $value['user_id'])->execute('getSlaveField');
		$action = $value['action'];
		echo "<tr><td>".$userId."</td><td>".$action."</td></tr>";
	}

}

?>