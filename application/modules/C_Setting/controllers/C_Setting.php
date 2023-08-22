<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_Setting extends BaseController
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	/**
	 * [__construct description]
	 *
	 * @method __construct
	 */
	public function __construct()
	{
		// Load the constructer from MY_Controller
		parent::__construct();
		$this->load->model("Setting_model", "Setting");
	}

	/**
	 * [index description]
	 *
	 * @method index
	 *
	 * @return [type] [description]
	 */
	public function index()
	{

		$data['titlePage'] = "Setting";

		// $data['listOfUsers'] = $this->Setting->getAllUsers();
		$data['listOfGroup'] = $this->Setting->getAllGroup();
		$data['listOfMenu'] = $this->getMenu();

		$this->layout('index', $data);
	}

	// Menu
	function saveMenu()
	{
		try {


			$param = $this->input->post();
			// echo $this->httpResponseCode(200, $param);
			// die;


			$headerId = 0;
			if ($param['menu_level'] > 1) {
				if ($param['menu_level'] == 2) {
					$headerId = $param['header'];
				} elseif ($param['menu_level'] == 3) {
					$getHeaderId = $this->getMenuHeaderId($param['header']);
					$headerId = $getHeaderId->menudtl_id;
				}
			}

			$save = $this->Setting->saveMenu($param, $headerId, $this->userId);

			if ($save) {
				echo $this->httpResponseCode(200, "Save Menu Successfully");
			} else {
				echo $this->httpResponseCode(400, "Wrong Queries");
			}
		} catch (\Throwable $th) {
			echo json_encode($th->getMessage());
		}
	}

	function deletedMenu()
	{
		try {


			$param = $this->input->post();


			$save = $this->Setting->deletedMenu($param, $this->userId);

			if ($save) {
				echo $this->httpResponseCode(200, "Delete Menu Successfully");
			} else {
				echo $this->httpResponseCode(400, "Wrong Queries");
			}
		} catch (\Throwable $th) {
			echo json_encode($th->getMessage());
		}
	}
	// End Menu


	// Menu Access
	function getMEnuAccess()
	{
		$listOfMenuAccess = $this->getMenuAccessByGroup($this->input->get("group_id"));

		$menuAcces = [];
		foreach ($listOfMenuAccess as $item) {
			$menuAcces[] = $item['menu_id'];
		}


		$listMenu = $this->getMenu();

		if ($listMenu) {
			echo "<ol class='dd-list' id='menuDetect'>";
			foreach ($listMenu as $val) :
				$checked = in_array($val['hdrId'], $menuAcces) == true ? "checked" : "";

				echo "<li class='dd-item' data-id='2' style='position: 'sticky'; top:'0px'; background-color: 'white'>";
				echo "<div class='dd-handle'><input $checked name='menu_id[]' type='checkbox' value='" . $val['hdrId'] . "' id='blankCheckbox' aria-label=''...'> " . $val['hdrId'] . " - " . $val['title'] . "</div>";
				echo "<ol class='dd-list'>";
				foreach ($val['menuLevel2'] as $levl2) :
					$checked = in_array($levl2['subMenuId'], $menuAcces) == true ? "checked" : "";
					echo "<li class='dd-item' data-id='3'>";
					echo "<div class='dd-handle'><input $checked name='menu_id[]' type='checkbox' value='" . $levl2['subMenuId'] . "' id='blankCheckbox' aria-label=''...'>  " . $levl2['subMenuId'] . " - " . $levl2['subMenuTitle'] . "</div>";
					echo "<ol class='dd-list'>";
					foreach ($levl2['menuLevel3'] as $lvl3) :
						$checked = in_array($lvl3['dtlMenuId'], $menuAcces) == true ? "checked" : "";
						echo "<li class='dd-item' data-id='6'>";
						echo "<div class='dd-handle'><input $checked name='menu_id[]' type='checkbox' value='" . $lvl3['dtlMenuId'] . "' id='blankCheckbox' aria-label=''...'> " . $lvl3['dtlMenuId'] . " - " . $lvl3['dtlTitle'] . "</div>";
						echo "</li>";
					endforeach;
					echo "</ol>";
					echo "</li>";
				endforeach;
				echo "</ol>";
				echo "</li>";
			endforeach;
			echo "</ol>";
		} else {
			echo "<div class='alert alert-danger' style='margin-top: 25px;'>Data Not Found</div>";
		}
	}

	function saveAccessMenu()
	{
		try {
			$param = $this->input->post();

			$save = $this->Setting->SaveAccess($param);

			if ($save) {
				echo $this->httpResponseCode(200, $param['group_id']);
			} else {
				echo $this->httpResponseCode(400, false);
			}
		} catch (\Throwable $th) {
			echo json_encode($th->getMessage());
		}
	}

	// End Menu Access


}
