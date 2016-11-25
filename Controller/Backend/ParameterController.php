<?php

namespace WH\ParameterBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use WH\BackendBundle\Controller\Backend\BaseController;

/**
 * @Route("/admin/parameters")
 *
 * Class ParameterController
 *
 * @package WH\ParameterBundle\Controller\Backend
 */
class ParameterController extends BaseController
{

	public $bundlePrefix = 'WH';
	public $bundle = 'ParameterBundle';
	public $entity = 'Parameter';

	/**
	 * @Route("/index/", name="bk_wh_parameter_parameter_index")
	 *
	 * @param Request $request
	 *
	 * @return string
	 */
	public function indexAction(Request $request)
	{
		$indexController = $this->get('bk.wh.back.index_controller');

		return $indexController->index($this->getEntityPathConfig(), $request);
	}

	/**
	 * @Route("/create/", name="bk_wh_parameter_parameter_create")
	 *
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function createAction(Request $request)
	{
		$createController = $this->get('bk.wh.back.create_controller');

		return $createController->create($this->getEntityPathConfig(), $request);
	}

	/**
	 * @Route("/update/{id}", name="bk_wh_parameter_parameter_update")
	 *
	 * @param         $id
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
	 */
	public function updateAction($id, Request $request)
	{
		$updateController = $this->get('bk.wh.back.update_controller');

		return $updateController->update($this->getEntityPathConfig(), $id, $request);
	}

	/**
	 * @Route("/delete/{id}", name="bk_wh_parameter_parameter_delete")
	 *
	 * @param         $id
	 *
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
	 */
	public function deleteAction($id)
	{
		$deleteController = $this->get('bk.wh.back.delete_controller');

		return $deleteController->delete($this->getEntityPathConfig(), $id);
	}

}
