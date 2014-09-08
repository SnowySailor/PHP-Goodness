<?php

$canViewPage = ((Phpfox::getLib('database')->select('user_id')->from(Phpfox::getT('user'))->where('user_id = ' . Phpfox::getUserId())->execute('getSlaveField')) == '' ? 0 : 1);
$adminStuff = 

?>