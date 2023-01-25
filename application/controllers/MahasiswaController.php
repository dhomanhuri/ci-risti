<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MahasiswaController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('email') == "") {
			redirect('LoginController', 'refresh');
		}
		$this->load->model('model_user');
		$this->load->model('AdminModels');
		$this->load->helper('text');
	}

	public function index()
	{
		$data['email'] = $this->session->userdata('email');
		$data['tampilan_mahasiswa'] = "Mahasiswa/Dashboard";
		$this->load->view('Mahasiswa/Tview', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('LoginController');
	}

	public function addproposal()
	{
		$id = $this->session->userdata('id_users');
		$user = $this->AdminModels->getmahasiswa($id)->row();


		//get data to table
		$data['proposal'] = $this->AdminModels->getDataPengajuan($user->nim);

		//validasi add proposal

		$this->db->where('pengajuan_admin_anggota.nim_anggota', $user->nim);
		$this->db->join('pengajuan_admin', 'pengajuan_admin.id_pengajuan=pengajuan_admin_anggota.id_pengajuan', 'left');
		$this->db->order_by('pengajuan_admin_anggota.created_at', 'desc');
		$this->db->select('pengajuan_admin.status_penerimaan');
		$data['users'] = $this->db->get('pengajuan_admin_anggota')->row_array();
		if ($data['users'] == null) {
			$data['users'] = 'null';
		}

		$data['tampilan_mahasiswa'] = "Mahasiswa/PengajuanProposal";
		$this->load->view('Mahasiswa/Tview', $data);
	}
	public function createProposal()
	{
		$data['tampilan_mahasiswa'] = "Mahasiswa/addPengajuanProposal";
		$id = $this->session->userdata('id_users');
		$user = $this->AdminModels->getmahasiswa($id)->row();
		// var_dump($user);
		// die();
		// $data['proposal'] = $this->AdminModels->pengajuan_admin($id);
		$data['dosen'] = $this->AdminModels->getdosen(null)->result();
		$data['perusahaan'] = $this->AdminModels->getPerusahaan();
		$data['all_mahasiswa'] = $this->AdminModels->getAllMahasiswa();
		$data['mahasiswa'] = $user;



		$this->load->view('Mahasiswa/Tview', $data);
	}

	public function getAllMahasiswa()
	{
		$data = $this->AdminModels->getAllMahasiswa();
		// return $this->response->setJson(['data'=>$data]);
		header('Content-Type: application/json');
		echo json_encode($data);
	}



	public function insproposal()
	{
		$get_id_perusahaan = null;
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']  = '3000';
		$id = $this->session->userdata('id_users');
		$user = $this->AdminModels->getmahasiswa($id)->row();
		$new_file_name =  $user->nim . "_PENGAJUANPKL_" . date('YmdHms');
		$config['file_name'] = $new_file_name;
		$this->load->library('upload', $config);  //File Uploading library
		$this->upload->do_upload('file');  // input name which have to upload 
		$file_pengajuan = $this->upload->data('file_name');   //variable which store the path

		$config2['upload_path'] = './uploads/mou/';
		$config2['allowed_types'] = 'pdf';
		$config2['max_size']  = '3000';
		$id = $this->session->userdata('id_users');
		$user = $this->AdminModels->getmahasiswa($id)->row();
		$new_file_name2 =  $user->nim . "_PENGAJUANMOU_" . date('YmdHms');
		$config2['file_name'] = $new_file_name2;
		//$config2['encrypt_name'] = TRUE;
		$this->upload->initialize($config2);
		$this->upload->do_upload('file_mou');
		$file_mou = $this->upload->data('file_name');

		$config3['upload_path'] = './uploads/spk/';
		$config3['allowed_types'] = 'pdf';
		$config3['max_size']  = '3000';
		$id = $this->session->userdata('id_users');
		$user = $this->AdminModels->getmahasiswa($id)->row();
		$new_file_name3 =  $user->nim . "_PENGAJUANSPK_" . date('YmdHms');
		$config3['file_name'] = $new_file_name3;
		//$config3['encrypt_name'] = TRUE;
		$this->upload->initialize($config3);
		$this->upload->do_upload('file_spk');
		$file_spk = $this->upload->data('file_name');

		if ($this->input->post('id_perusahaan') == "null" || $this->input->post('id_perusahaan') == NULL) {
			$dt_perusahaan = array(
				'nama' => $this->input->post('nama_perusahaan'),
				'alamat' => $this->input->post('alamat_perusahaan')

			);
			$insert_perusahaan = $this->db->insert('perusahaan', $dt_perusahaan);
			$nama_perusahaan = $this->input->post('nama_perusahaan');

			$this->db->where('nama', $nama_perusahaan);
			$get_prs = $this->db->get('perusahaan')->result();
			$get_id_perusahaan = $get_prs[0]->id_perusahaan;
		} else {
			if ($this->input->post('nama_perusahaan') != null) //jika id_perusahaan tidak kosong tapi nama perusahaan tidak kosong, maka yang dipilih yang nama perusahaan
			{
				$dt_perusahaan = array(
					'nama' => $this->input->post('nama_perusahaan'),
					'alamat' => $this->input->post('alamat_perusahaan')

				);
				$insert_perusahaan = $this->db->insert('perusahaan', $dt_perusahaan);
				$nama_perusahaan = $this->input->post('nama_perusahaan');

				$this->db->where('nama', $nama_perusahaan);
				$get_prs = $this->db->get('perusahaan')->result();
				$get_id_perusahaan = $get_prs[0]->id_perusahaan;
			} else {
				$get_id_perusahaan = $this->input->post('id_perusahaan');
			}
		}

		if (!$this->upload->do_upload('file')) {
			$error = array('error' => $this->upload->display_errors());
			echo $this->upload->display_errors();
		} else if (!$this->upload->do_upload('file_mou')) {
			$error = array('error' => $this->upload->display_errors());
			echo $this->upload->display_errors();
		} else if (!$this->upload->do_upload('file_spk')) {
			$error = array('error' => $this->upload->display_errors());
			echo $this->upload->display_errors();
		} else {
			$id = $this->session->userdata('id_users');

			$user = $this->AdminModels->getmahasiswa($id)->row();

			$data = array(
				'nim_pengaju' => $user->nim,
				'id_perusahaan' => $get_id_perusahaan,
				'tanggal_mulai' => $this->input->post('durasi'),
				'tanggal_akhir' => $this->input->post('exp_durasi'),
				'file_pengajuan' => $file_pengajuan,
				'file_mou' => $file_mou,
				'file_spk' => $file_spk,
				'created_at' => date('Y-m-d H:m:s'),
				'status_penerimaan' => 'upload_proposal'
			);
			$this->AdminModels->ins('pengajuan_admin', $data);
			$last_id = $this->db->insert_id();


			$data_anggota1 = $this->input->post('data_anggota1');
			$data_anggota2 = $this->input->post('data_anggota2');
			// var_dump($data_anggota1 != "null");
			// die();
			if ($data_anggota1 != "null") {
				$this->db->where('nim', $data_anggota1);
				$getDataAnggota1 = $this->db->get('mahasiswa')->result();
				$dataAnggota1 = array(
					'nim_anggota' => $getDataAnggota1[0]->nim,
					'nama_anggota' => $getDataAnggota1[0]->nama,
					'prodi_anggota' => $getDataAnggota1[0]->kodeprodi,
					'id_pengajuan' => $last_id,
					'created_at' => date('Y-m-d H:m:s'),

				);
				$insert_anggota1 = $this->db->insert('pengajuan_admin_anggota', $dataAnggota1);
			}
			if ($data_anggota2 != 'null') {
				$this->db->where('nim', $data_anggota2);
				$getDataAnggota2 = $this->db->get('mahasiswa')->result();
				$dataAnggota2 = array(
					'nim_anggota' => $getDataAnggota2[0]->nim,
					'nama_anggota' => $getDataAnggota2[0]->nama,
					'prodi_anggota' => $getDataAnggota2[0]->kodeprodi,
					'id_pengajuan' => $last_id,
					'created_at' => date('Y-m-d H:m:s'),

				);
				$insert_anggota2 = $this->db->insert('pengajuan_admin_anggota', $dataAnggota2);
			}

			$dataAnggota3 = array(
				'nim_anggota' => $user->nim,
				'nama_anggota' => $user->nama,
				'prodi_anggota' => $user->kodeprodi,
				'id_pengajuan' => $last_id,
				'created_at' => date('Y-m-d H:m:s'),

			);
			$insert_anggota3 = $this->db->insert('pengajuan_admin_anggota', $dataAnggota3);


			redirect('MahasiswaController/addproposal');
		}
	}

	public function detailProposal($id)
	{
		//data detil
		$this->db->where('pengajuan_admin.id_pengajuan', $id);
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan=pengajuan_admin.id_perusahaan', 'left');
		$this->db->join('pengajuan_pembimbing', 'pengajuan_pembimbing.id_pengajuan=pengajuan_admin.id_pengajuan', 'left');
		$this->db->join('dosen', 'dosen.id_dosen=pengajuan_admin.id_pembimbing', 'left');
		$this->db->select('pengajuan_admin.*, perusahaan.nama as nama_perusahaan, perusahaan.alamat as alamat_perusahaan,pengajuan_pembimbing.status_laporan_pkl,pengajuan_pembimbing.file_laporan_pkl,
						dosen.nip, dosen.nama as nama_pembimbing,dosen.nomortelpon as no_telp_pembimbing');
		$data['detail'] = $this->db->get('pengajuan_admin')->row_array();

		//data anggota selain nim pengaju
		$this->db->where('id_pengajuan', $id);
		$data['anggota'] = $this->db->get('pengajuan_admin_anggota')->result_array();


		$data['tampilan_mahasiswa'] = "Mahasiswa/detailPengajuanProposal";
		$this->load->view('Mahasiswa/Tview', $data);
	}


	public function addpembimbing()
	{
		$data['tampilan_mahasiswa'] = "Mahasiswa/PengajuanPembimbing";
		$id = $this->session->userdata('id_users');
		$data['nim'] = $this->AdminModels->getmahasiswa($id)->row()->nim;
		$data['dosen'] = $this->AdminModels->getdosen(null)->result();
		$data['pembimbing'] = $this->AdminModels->pengajuan_pembimbing($data['nim']);

		$this->load->view('Mahasiswa/Tview', $data);
	}


	public function inspembimbing()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']  = '3000';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			$error = array('error' => $this->upload->display_errors());
			echo $this->upload->display_errors();
		} else {
			$id = $this->session->userdata('id_users');

			$user = $this->AdminModels->getmahasiswa($id)->row();
			$nim2 = $this->input->post('nim1');
			$nim3 = $this->input->post('nim2');
			$data = array(
				'nim' => $this->input->post('nim'),
				'dosen_id' => $this->input->post('dosen'),
				'file_pengajuan' => $this->upload->data('file_name'),
				'status' => 'diproses',
				'create_at' => date('Y-m-d')
			);
			if ($nim2 != null) {
				$data['nim2'] = $nim2;
			}

			if ($nim3 != null) {
				$data['nim3'] = $nim3;
			}

			$this->AdminModels->ins('pengajuan_pembimbing', $data);
			redirect('MahasiswaController/addpembimbing');
		}
	}

	public function inPerusahaan()
	{
		$data['tampilan_mahasiswa'] = "Mahasiswa/PerusahaanInfo";
		$data['perusahaan'] = $this->AdminModels->perusahaan();
		$this->load->view('Mahasiswa/Tview', $data);
	}

	public function downloadMou($id)
	{
		$this->db->where('id_pengajuan', $id);
		$this->db->from('pengajuan_admin');
		$query = $this->db->get();
		$nama_file = $query->row()->file_mou;
		force_download('uploads/mou/' . $nama_file, NULL);
	}

	public function downloadBalasanPerusahaan($id)
	{
		$this->db->where('id_pengajuan', $id);
		$this->db->from('pengajuan_admin');
		$query = $this->db->get();
		$nama_file = $query->row()->file_balasan_perusahaan;
		force_download('uploads/balasan_perusahaan/' . $nama_file, NULL);
	}

	public function downloadSpk($id)
	{
		$this->db->where('id_pengajuan', $id);
		$this->db->from('pengajuan_admin');
		$query = $this->db->get();
		$nama_file = $query->row()->file_spk;
		force_download('uploads/spk/' . $nama_file, NULL);
	}


	public function downloadLaporanPKL($id)
	{
		$this->db->where('id_pengajuan', $id);
		$this->db->from('pengajuan_pembimbing');
		$query = $this->db->get();
		$nama_file = $query->row()->file_laporan_pkl;
		force_download('uploads/laporan_pkl/' . $nama_file, NULL);
	}

	public function downloadPengantarPKL($id)
	{
		$this->db->where('id_pengajuan', $id);
		$this->db->from('pengajuan_admin');
		$query = $this->db->get();
		$nama_file = $query->row()->file_balasan_admin;
		// var_dump($query->row());
		// die();
		force_download('assets/balasan/' . $nama_file, NULL);
	}

	public function downloadLembarPengesahan($id)
	{
		$this->db->where('id_pengajuan', $id);
		$this->db->from('pengajuan_admin');
		$query = $this->db->get();
		$nama_file = $query->row()->file_pengesahan;
		// var_dump($query->row());
		// die();
		force_download('uploads/lembar_pengesahan/' . $nama_file, NULL);
	}


	public function updateFileProposal()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']  = '3000';
		//$config['encrypt_name'] = TRUE;
		$id = $this->session->userdata('id_users');
		$user = $this->AdminModels->getmahasiswa($id)->row();
		$new_file_name =  $user->nim . "_PENGAJUANPKL_" . date('YmdHms');
		$config['file_name'] = $new_file_name;
		$this->load->library('upload', $config);  //File Uploading library
		$this->upload->do_upload('file');  // input name which have to upload 
		$file_pengajuan = $this->upload->data('file_name');   //variable which store the path

		$config2['upload_path'] = './uploads/mou/';
		$config2['allowed_types'] = 'pdf';
		$config2['max_size']  = '3000';
		// $config2['encrypt_name'] = TRUE;
		$id = $this->session->userdata('id_users');
		$user = $this->AdminModels->getmahasiswa($id)->row();
		$new_file_name2 =  $user->nim . "_PENGAJUANMOU_" . date('YmdHms');
		$config2['file_name'] = $new_file_name2;
		$this->upload->initialize($config2);
		$this->upload->do_upload('file_mou');
		$file_mou = $this->upload->data('file_name');

		$config2['upload_path'] = './uploads/spk/';
		$config2['allowed_types'] = 'pdf';
		$config2['max_size']  = '3000';
		// $config2['encrypt_name'] = TRUE;
		$id = $this->session->userdata('id_users');
		$user = $this->AdminModels->getmahasiswa($id)->row();
		$new_file_name3 =  $user->nim . "_PENGAJUANSPK_" . date('YmdHms');
		$config3['file_name'] = $new_file_name3;
		$this->upload->initialize($config2);
		$this->upload->do_upload('file_spk');
		$file_spk = $this->upload->data('file_name');


		$id = $this->session->userdata('id_users');
		$id_pengajuan = $this->input->post('id_pengajuan');
		if ($this->upload->do_upload('file') != null) {
			$this->db->where('id_pengajuan', $id_pengajuan);
			$this->db->set('file_pengajuan', $file_pengajuan);
		}
		if ($this->upload->do_upload('file_mou') != null) {
			$this->db->where('id_pengajuan', $id_pengajuan);
			$this->db->set('file_mou', $file_mou);
		}
		if ($this->upload->do_upload('file_spk') != null) {
			$this->db->where('id_pengajuan', $id_pengajuan);
			$this->db->set('file_spk', $file_spk);
		}
		$this->db->update('pengajuan_admin');
		redirect('MahasiswaController/addproposal');
	}

	public function downloadTemplate($id)
	{
		$filename = null;

		if ($id == 1) {
			$filename = "FORM_BIMBINGAN_PKL_(DOSEN)_D3.docx";
		} else if ($id == 2) {
			$filename = "FORM BIMBINGAN PKL (DOSEN)_D4.docx";
		} else if ($id == 3) {
			$filename = "FORM BIMBINGAN PKL (INSTANSI).docx";
		} else if ($id == 4) {
			$filename = "FORM PENILAIAN PEMBIMBING PKL D4.docx";
		} else if ($id == 5) {
			$filename = "Draft Permohonan Pengantar PKL.docx";
		} else if ($id == 6) {
			$filename = "(MI) Tanda Terima Penyerahan Laporan PKL-Magang.docx";
		} else if ($id == 7) {
			$filename = "(TI) Tanda Terima Penyerahan Laporan PKL-Magang.docx";
		}
		force_download('assets/template/' . $filename, NULL);
	}

	public function uploadBalasanPerusahaan()
	{
		$balasan = $this->input->post('balasan_perusahaan');
		// var_dump($balasan);
		// die();
		if ($balasan == "y") {
			$config['upload_path'] = './uploads/balasan_perusahaan/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '3072';
			// $config['encrypt_name'] = TRUE;
			$id = $this->session->userdata('id_users');
			$user = $this->AdminModels->getmahasiswa($id)->row();
			$new_file_name =  $user->nim . "_BALASAN_PERUSAHAAN_MHS_" . date('YmdHms');
			$config['file_name'] = $new_file_name;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('file')) {
				$error = array('error' => $this->upload->display_error());
				echo $this->upload->display_error();
			} else {

				$data = array(
					'file_balasan_perusahaan' => $this->upload->data('file_name'),
					'status_penerimaan'	=> 'upload_balasan_perusahaan',
				);
				$this->AdminModels->upd('pengajuan_admin', $data, ['id_pengajuan' => $this->input->post('id_pengajuan')]);
				redirect('MahasiswaController/detailProposal/' . $this->input->post('id_pengajuan'));
			}
		} else {
			$data = array(
				'status_penerimaan'	=> 'tidak_diterima_perusahaan'
			);
			$this->AdminModels->upd('pengajuan_admin', $data, ['id_pengajuan' => $this->input->post('id_pengajuan')]);
			redirect('MahasiswaController/detailProposal/' . $this->input->post('id_pengajuan'));
		}
	}

	public function uploadLaporanPKL()
	{

		$config['upload_path'] = './uploads/laporan_pkl/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '3072';
		// $config['encrypt_name'] = TRUE;
		$id = $this->session->userdata('id_users');
		$user = $this->AdminModels->getmahasiswa($id)->row();
		$new_file_name =  $user->nim . "_LAPORAN_PKL_" . date('YmdHms');
		$config['file_name'] = $new_file_name;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			$error = array('error' => $this->upload->display_error());
			echo $this->upload->display_error();
		} else {

			$data = array(
				'status_penerimaan'	=> 'upload_laporan_pkl',
			);
			$this->AdminModels->upd('pengajuan_admin', $data, ['id_pengajuan' => $this->input->post('id_pengajuan')]);

			$this->db->where('id_pengajuan', $this->input->post('id_pengajuan'));
			$getIdPembimbing = $this->db->get('pengajuan_admin')->row_array();
			$data_pkl = array(
				'id_pengajuan' => $this->input->post('id_pengajuan'),
				'id_dosen' => $getIdPembimbing['id_pembimbing'],
				'status_laporan_pkl' => '0',
				'tanggal_acc_laporan_pkl' => date('Y-m-d H:m:s'),
				'file_laporan_pkl' => $this->upload->data('file_name'),
			);
			$this->db->insert('pengajuan_pembimbing', $data_pkl);
			redirect('MahasiswaController/detailProposal/' . $this->input->post('id_pengajuan'));
		}
	}
}

/* End of file MahasiswaController.php */
/* Location: ./application/controllers/MahasiswaController.php */