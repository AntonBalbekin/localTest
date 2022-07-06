<?
use Bitrix\Main\UI\Extension;
use Bitrix\Main\Loader;
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

Loader::includeModule('intranet');

Extension::load(["ui.buttons","ui.icons.b24", "sidepanel","fx","popup"]);

CJSCore::Init(array('ajax',"jquery",'loader','main','popup','ui')); 
class DemoTest  extends \CBitrixComponent{

    public function executeComponent()
    {
        try{
          
            $this->includeComponentTemplate();
        }
        catch (\Bitrix\Main\SystemException $e) {
            ShowError($e->getMessage());
        }

        
    }
    
}



