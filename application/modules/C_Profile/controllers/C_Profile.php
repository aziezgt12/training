<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_Profile extends BaseController
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
		$this->load->model("Obat", "Obat");
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

		$data['title'] = "test";

		$data['profile'] = $this->db->get('profile')->row();


		$this->layout('index', $data);
	}


	function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$sql = $this->db->delete('tb_mst_dokter');
		if ($sql) {
			echo $this->httpResponseCode("200", "Delete Data Successfully");
		} else {
			echo $this->httpResponseCode("400", "Database Error");
		}
	}


	function getAllAjax()
	{
		$param = $this->input->post();

		$data['getOutward'] = $this->Container->getAllOutwardByParam($param);
		$contid = $data['getOutward']['contHdr']->contid;
		$data['containerReceived'] = $this->Container->getContainerReceived(true, $contid);
		$isNotReceived = $this->Container->getContainerReceived(false, $contid);
		$data['disabledButton'] = "";
		$data['message'] = "";

		if (count($isNotReceived) == 0) {
			$data['disabledButton'] = "disabled";
			$data['message'] = 'All containers have been received';
		}


		if ($contid == null) {
			echo $this->httpResponseCode("400", "Data Not Found");
			die;
		}
		$data['containerNotReceived'] = count($isNotReceived);



		$this->load->view("_data/loadOutwardAjax", $data);
	}

	//Profile Singkat PPID
	public function ppid()
	{

		$data['title'] = "Profile Singkat PPID";

		$data['profile'] = $this->db->get('profile')->row();


		$this->layout('index', $data);
	}

	function saveProfileSingkatPPID()
	{
		try {
			$param = $this->input->post();


			if ($this->db->count_all_results('profile') > 0) {
				// If there are rows in the "profile" table, update the existing row
				$sql = $this->db->update('profile', ['profile_singkat' => $param['profile']]);
			} else {
				// If there are no rows, insert a new row into the "profile" table
				$sql =  $this->db->insert('profile', ['profile_singkat' => $param['profile']]);
			}


			if ($sql) {
				echo $this->httpResponseCode("200", "Update Data Successfully");
			} else {
				echo $this->httpResponseCode("400", "Database Error");
			}
		} catch (\Throwable $th) {
			echo $this->httpResponseCode(400, $th->getMessage());
		}
	}

	//End Profile Singkat PPID

	//struktural
	public function struktural()
	{

		$data['title'] = "Profile Pejabat Struktural";

		$data['profile'] = $this->db->get('profile')->row();

		// print_r($data);
		// die;


		$this->layout('struktural', $data);
	}

	function saveStruktural()
	{
		try {
			$param = $this->input->post();



			$config['upload_path'] = './assets/berkas_ppid/';
			$config['allowed_types'] = '*';
			$config['max_size'] = 2048; // 2MB
			$config['encrypt_name'] = true;


			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('userfile')) {
				$error = array('error' => $this->upload->display_errors());
				echo $error['error'];
				echo $this->httpResponseCode("400", $error);
			} else {
				$data = $this->upload->data(); // Mendapatkan informasi file yang diunggah
				$file_name = $data['file_name']; // Mengambil nama file yang diunggah
				$this->db->update('profile', ['profil_pejabat_struktural' => $file_name]);
				echo "<iframe src='" . base_url('assets/berkas_ppid/') . $file_name . "' width='800' height='600' frameborder='0'></iframe>";
				// echo 'File uploaded successfully. File name: ' . $file_name;
				// echo $this->httpResponseCode("200", "Update Data Successfully");

			}



			// if ($sql) {
			// 	echo $this->httpResponseCode("200", "Update Data Successfully");
			// } else {
			// 	echo $this->httpResponseCode("400", "Database Error");
			// }
		} catch (\Throwable $th) {
			echo $this->httpResponseCode(400, $th->getMessage());
		}
	}

	//End struktural

	//struktur_organisasi
	public function struktur_organisasi()
	{

		$data['title'] = "Struktur Organisasi";

		$data['profile'] = $this->db->get('profile')->row();

		// print_r($data);
		// die;


		$this->layout('so', $data);
	}

	function saveSO()
	{
		try {
			$param = $this->input->post();



			$config['upload_path'] = './assets/berkas_ppid/';
			$config['allowed_types'] = '*';
			$config['max_size'] = 2048; // 2MB
			$config['encrypt_name'] = true;


			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('userfile')) {
				$error = array('error' => $this->upload->display_errors());
				echo $error['error'];
				echo $this->httpResponseCode("400", $error);
			} else {
				$data = $this->upload->data(); // Mendapatkan informasi file yang diunggah
				$file_name = $data['file_name']; // Mengambil nama file yang diunggah
				$this->db->update('profile', ['SO' => $file_name]);
				echo "<iframe src='" . base_url('assets/berkas_ppid/') . $file_name . "' width='800' height='600' frameborder='0'></iframe>";
				// echo 'File uploaded successfully. File name: ' . $file_name;
				// echo $this->httpResponseCode("200", "Update Data Successfully");

			}



			// if ($sql) {
			// 	echo $this->httpResponseCode("200", "Update Data Successfully");
			// } else {
			// 	echo $this->httpResponseCode("400", "Database Error");
			// }
		} catch (\Throwable $th) {
			echo $this->httpResponseCode(400, $th->getMessage());
		}
	}

	//End struktur_organisasi


	//Tugas Dan Tanggung Jawab
	public function tugas_fungsi()
	{

		$data['title'] = "Struktur Organisasi";

		$data['profile'] = $this->db->get('profile')->row();

		// print_r($data);
		// die;


		$this->layout('tugas_fungsi', $data);
	}

	function saveTugasDanTJ()
	{
		try {
			$param = $this->input->post();



			$config['upload_path'] = './assets/berkas_ppid/';
			$config['allowed_types'] = '*';
			$config['max_size'] = 2048; // 2MB
			$config['encrypt_name'] = true;


			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('userfile')) {
				$error = array('error' => $this->upload->display_errors());
				echo $error['error'];
				echo $this->httpResponseCode("400", $error);
			} else {
				$data = $this->upload->data(); // Mendapatkan informasi file yang diunggah
				$file_name = $data['file_name']; // Mengambil nama file yang diunggah
				$this->db->update('profile', ['tugas_dan_tanggungjawab_ppid' => $file_name]);
				echo "<iframe src='" . base_url('assets/berkas_ppid/') . $file_name . "' width='800' height='600' frameborder='0'></iframe>";
				// echo 'File uploaded successfully. File name: ' . $file_name;
				// echo $this->httpResponseCode("200", "Update Data Successfully");

			}



			// if ($sql) {
			// 	echo $this->httpResponseCode("200", "Update Data Successfully");
			// } else {
			// 	echo $this->httpResponseCode("400", "Database Error");
			// }
		} catch (\Throwable $th) {
			echo $this->httpResponseCode(400, $th->getMessage());
		}
	}

	public function visi_misi()
	{

		$data['title'] = "Struktur Organisasi";

		$data['profile'] = $this->db->get('profile')->row();

		// print_r($data);
		// die;


		$this->layout('visi_misi', $data);
	}

	function saveVisiMisi()
	{
		try {
			$param = $this->input->post();


			if ($this->db->count_all_results('profile') > 0) {
				// If there are rows in the "profile" table, update the existing row
				$sql = $this->db->update('profile', ['visi' => $param['visi'], 'misi' => $param['misi']]);
			} else {
				// If there are no rows, insert a new row into the "profile" table
				$sql =  $this->db->insert('profile', ['visi' => $param['visi'], 'misi' => $param['misi']]);
			}


			if ($sql) {
				echo $this->httpResponseCode("200", "Update Data Successfully");
			} else {
				echo $this->httpResponseCode("400", "Database Error");
			}
		} catch (\Throwable $th) {
			echo $this->httpResponseCode(400, $th->getMessage());
		}
	}


	public function sop_ppid()
	{

		$data['title'] = "SOP PPID";

		$data['list'] = $this->db->get('sop_ppid')->result();

		// print_r($data);
		// die;


		$this->layout('sop_ppid', $data);
	}

	function saveSOPPPID()
	{
		try {
			$param = $this->input->post();




			$config['upload_path'] = './assets/berkas_ppid/';
			$config['allowed_types'] = '*';
			$config['max_size'] = 5000; // 2MB
			$config['encrypt_name'] = true;


			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('userfile')) {
				$error = array('error' => $this->upload->display_errors());
				echo $error['error'];
				echo $this->httpResponseCode("400", $error);
			} else {
				$data = $this->upload->data(); // Mendapatkan informasi file yang diunggah
				$file_name = $data['file_name']; // Mengambil nama file yang diunggah
				$this->db->insert('sop_ppid', ['description' => $param['description'], 'file' => $file_name]);
				// echo "<iframe src='".base_url('assets/berkas_ppid/').$file_name."' width='800' height='600' frameborder='0'></iframe>";
				// echo 'File uploaded successfully. File name: ' . $file_name;
				echo $this->httpResponseCode("200", "Update Data Successfully");
			}



			// if ($sql) {
			// 	echo $this->httpResponseCode("200", "Update Data Successfully");
			// } else {
			// 	echo $this->httpResponseCode("400", "Database Error");
			// }
		} catch (\Throwable $th) {
			echo $this->httpResponseCode(400, $th->getMessage());
		}
	}

	public function rencana_strategis()
	{

		$data['title'] = "Rencana Strategis";

		$data['profile'] = $this->db->get('profile')->row();

		// print_r($data);
		// die;


		$this->layout('rencana_strategis', $data);
	}

	function saveRencanaStrategis()
	{
		try {
			$param = $this->input->post();



			$config['upload_path'] = './assets/berkas_ppid/';
			$config['allowed_types'] = '*';
			$config['max_size'] = 2048; // 2MB
			$config['encrypt_name'] = true;


			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('userfile')) {
				$error = array('error' => $this->upload->display_errors());
				echo $error['error'];
				echo $this->httpResponseCode("400", $error);
			} else {
				$data = $this->upload->data(); // Mendapatkan informasi file yang diunggah
				$file_name = $data['file_name']; // Mengambil nama file yang diunggah
				$this->db->update('profile', ['rencana_strategis' => $file_name]);
				echo "<iframe src='" . base_url('assets/berkas_ppid/') . $file_name . "' width='800' height='600' frameborder='0'></iframe>";
				// echo 'File uploaded successfully. File name: ' . $file_name;
				// echo $this->httpResponseCode("200", "Update Data Successfully");

			}



			// if ($sql) {
			// 	echo $this->httpResponseCode("200", "Update Data Successfully");
			// } else {
			// 	echo $this->httpResponseCode("400", "Database Error");
			// }
		} catch (\Throwable $th) {
			echo $this->httpResponseCode(400, $th->getMessage());
		}
	}
	//End Tugas Dan Tanggung Jawab


	public function sk_ppid()
	{

		$data['title'] = "SK PPID";

		$data['profile'] = $this->db->get('profile')->row();

		// print_r($data);
		// die;


		$this->layout('sk_ppid', $data);
	}

	function saveSKPPID()
	{
		try {
			$param = $this->input->post();


			$config['upload_path'] = './assets/berkas_ppid/';
			$config['allowed_types'] = '*';
			$config['max_size'] = 2048; // 2MB
			$config['encrypt_name'] = true;


			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('userfile')) {
				$error = array('error' => $this->upload->display_errors());
				echo $error['error'];
				echo $this->httpResponseCode("400", $error);
			} else {
				$data = $this->upload->data(); // Mendapatkan informasi file yang diunggah
				$file_name = $data['file_name']; // Mengambil nama file yang diunggah
				$this->db->update('profile', ['sk_ppid' => $file_name]);
				echo "<iframe src='" . base_url('assets/berkas_ppid/') . $file_name . "' width='800' height='600' frameborder='0'></iframe>";
				// echo 'File uploaded successfully. File name: ' . $file_name;
				// echo $this->httpResponseCode("200", "Update Data Successfully");

			}



			// if ($sql) {
			// 	echo $this->httpResponseCode("200", "Update Data Successfully");
			// } else {
			// 	echo $this->httpResponseCode("400", "Database Error");
			// }
		} catch (\Throwable $th) {
			echo $this->httpResponseCode(400, $th->getMessage());
		}
	}
}
