<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_Auth extends CI_Controller
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
	private $_table = "ch_gen_tbl_user";
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

		if (!empty($this->session->userdata("userId"))) {
			redirect();
		}

		// print_r($data);
		// die;

		$this->load->view('auth');
	}

	function register()
	{
		// if (!empty($this->session->userdata("userId"))) {
		// 	redirect();
		// }


		$data['listOfJalur'] = json_decode(json_encode($this->Jalur->getAll(1)));
		// echo "<pre>";
		// print_r($data);
		// die;

		$data = [];

		$this->load->view('register', $data);
	}

	public function Authorize()
	{


		$param = $this->input->post();
		$this->db->where('userid', $param['uname']);
		$query = $this->db->get($this->_table);
		$user = $query->row();



		// cek apakah user sudah terdaftar?
		if (!$user) {
			echo json_encode(["message" => "user tidak dikenal"]);
			die;
		}

		// cek apakah passwordnya benar?
		if (md5(sha1(strtolower($param['password']))) != $user->userpassword) {
			echo json_encode(["message" => "password login anda salah"]);
			die;
		}

		$this->session->set_userdata('userId', $user->userid);
		$this->session->set_userdata('factoryId', $user->firstname);
		$this->session->set_userdata('groupId', $user->groupid);


		echo json_encode(true);
	}

	public function saveRegister()
	{
		$param = $this->input->post();

		if(strlen($param['fullname']) == '0')
		{
			echo $this->httpResponseCode(400, 'fullname tidak boleh kosong');
			die;
	
		}

		if(strlen($param['email']) == '0')
		{
			echo $this->httpResponseCode(400, 'email tidak boleh kosong');
			die;
	
		}

		if(strlen($param['userid']) == '0')
		{
			echo $this->httpResponseCode(400, 'userid tidak boleh kosong');
			die;
	
		}

		if(strlen($param['password']) == '0')
		{
			echo $this->httpResponseCode(400, 'password tidak boleh kosong');
			die;
	
		}

		if(strlen($param['tempat_lahir']) == '0')
		{
			echo $this->httpResponseCode(400, 'tempat lahir tidak boleh kosong');
			die;
	
		}


		if(strlen($param['tanggal_lahir']) == '0')
		{
			echo $this->httpResponseCode(400, 'tanggal lahir tidak boleh kosong');
			die;
	
		}

		if(strlen($param['jalur_id']) == '0')
		{
			echo $this->httpResponseCode(400, 'jalur pendaftaran tidak boleh kosong');
			die;
	
		}



		$cekEmail = $this->db->get_where($this->_table, ['email' => $param['email'] ])->row();
		if($cekEmail)
		{
			echo $this->httpResponseCode(400, 'email exists');
			die;
		} 



		$checkUserId = $this->db->get_where($this->_table, ['userid' => $param['userid'] ])->row();
		if($checkUserId) 
		{
			echo $this->httpResponseCode(400, 'username exists');
			die;
		}
	


		$data = [
			"fullname"		=> $param['fullname'],
			"userid"		=> $param['userid'],
			"userpassword"		=> md5(sha1(strtolower($param['password']))),
			"email"			=> $param['email'],
			"mobilenumber"			=> $param['notelp'],
			"tempat_lahir"	=> $param['tempat_lahir'],
			"tanggal_lahir" => $param['tanggal_lahir'],
			"jalur_id" => $param['jalur_id'],
			"no_pendaftaran" => date('dmy').rand(1,1000),
			"groupid" => 34,
			"created_date" => date("Y-m-d H:i:s")
		];

		$save = $this->db->insert($this->_table, $data);

	
		if($save)
		{
			echo $this->httpResponseCode(200, "Register Succesfully");
			die;
		}

		$this->httpResponseCode(400, "Wrong Queries");

	}

	

	public function logout()
	{
		$this->session->sess_destroy();

		redirect(base_url("C_Auth"));
	}
}
