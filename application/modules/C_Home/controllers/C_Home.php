<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_Home extends BaseController
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
		$data['user'] = $this->db->get_where("ch_gen_tbl_user", ['notactive' => 0])->result(); 
		$data['sales'] = $this->db->get_where("ch_gen_tbl_mst_sales", ['is_active' => 1])->result(); 
		$data['sertifikat'] = $this->db->get("ch_gen_tbl_trans_sertifikat")->result(); 
		$data['layanan'] = $this->db->get("ch_gen_tbl_mst_layanan")->result(); 

		$this->layout('index', $data);
	}
	
}
