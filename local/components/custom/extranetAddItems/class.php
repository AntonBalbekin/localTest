<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
 
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\ActionFilter;

class CCustomAjax extends CBitrixComponent implements Controllerable
{
	/**
	 * @return array
	 */


	public function configureActions()
	{
		return [
			'start' => [
				'prefilters' => [
					new ActionFilter\Authentication(),
					new ActionFilter\HttpMethod(
						array(ActionFilter\HttpMethod::METHOD_GET, ActionFilter\HttpMethod::METHOD_POST)
					),
					new ActionFilter\Csrf(),
				],
				'postfilters' => []
			]
		];
	}
	/**
	 * @param int $param1
	 * @return array
	 */
	public function startAction($id)
	{
		if($id==2208)
		{
			return new \Bitrix\Main\Engine\Response\Component("custom:extranetAddItems",'.default',["COMPONENT_TEMPLATE" => ".default","ID"=>$id]);
		}
		elseif($id==2209)
		{
			return new \Bitrix\Main\Engine\Response\Component("custom:extranetAddItems",'lead',["COMPONENT_TEMPLATE" => "lead","ID"=>$id]);
		}

		
	}
	function executeComponent()
	{
		d($this);
        try{
            $this->arResult['id']=$this->arParams['ID'];
            $this->includeComponentTemplate();
        }
        catch (\Bitrix\Main\SystemException $e) {
            ShowError($e->getMessage());
        }
	}
 
}