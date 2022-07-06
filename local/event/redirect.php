<?php
\Bitrix\Main\Loader::includeModule('extranet');
$eventManager = \Bitrix\Main\EventManager::getInstance();
$eventManager->addEventHandlerCompatible('main','OnAfterUserLogin',
function(&$filds){
    
    $userTipe=\Bitrix\Extranet\Util::checkExternalAuthId($filds['USER_ID']);
    
    if($userTipe==1)
    {
        $servername=$_SERVER["SERVER_NAME"];
        header("Location: http://$servername/extranet/novaya-stranitsa.php?clear_cache=Y");
    }

});