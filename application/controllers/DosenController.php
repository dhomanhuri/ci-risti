<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class DosenController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('email') == "") {
			redirect('LoginController', 'refresh');
		}
		$this->load->model('Model_user');
		$this->load->model('AdminModels');
		$this->load->helper('text');
	}

	public function index()
	{
		$data['email'] = $this->session->userdata('email');
		$data['tampilan_dosen'] = "Dosen/Dashboard";
		$this->load->view('Dosen/Tview', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('LoginController');
	}

	public function updateStatus($id, $h)
	{
		if ($h == 1) {
			$hasil = 'disetujui';
		} else {
			$hasil = 'ditolak';
		}
		$data = array('status' => $hasil,);
		$this->AdminModels->upd('pengajuan_pembimbing', $data, ['id_pengajuan_pembimbing' => $id]);

		redirect('DosenController', 'refresh');
	}

	public function bimbingan()
	{
		$data['tampilan_dosen'] = "Dosen/TbBimbingan";
		$id = $this->session->userdata('id_users');

		// $data['nim'] = $this->AdminModels->getmahasiswa(null)->result();
		$dosen_id = $this->AdminModels->getdosen($id)->row()->id_dosen;
		$data['pkl'] = $this->AdminModels->pengajuan_admin_dosen($dosen_id);
		// var_dump($data['pkl']);


		$this->load->view('Dosen/Tview', $data);
	}

	public function detailLaporan($id)
	{
		//data detil
		$this->db->where('pengajuan_admin.id_pengajuan', $id);
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan=pengajuan_admin.id_perusahaan', 'left');
		$this->db->join('pengajuan_pembimbing', 'pengajuan_pembimbing.id_pengajuan=pengajuan_admin.id_pengajuan', 'left');
		$this->db->select('pengajuan_admin.*, perusahaan.nama as nama_perusahaan, perusahaan.alamat as alamat_perusahaan,pengajuan_pembimbing.status_laporan_pkl,pengajuan_pembimbing.file_laporan_pkl');
		$data['detail'] = $this->db->get('pengajuan_admin')->row_array();

		//data anggota 
		$this->db->where('id_pengajuan', $id);
		$data['anggota'] = $this->db->get('pengajuan_admin_anggota')->result_array();
		// var_dump($data['detail']);
		// die();


		$data['tampilan_dosen'] = "Dosen/detailLaporan";
		$this->load->view('Dosen/Tview', $data);
	}
	public function downloadLaporanPKL($id)
	{
		$this->db->where('id_pengajuan', $id);
		$this->db->from('pengajuan_pembimbing');
		$query = $this->db->get();
		$nama_file = $query->row()->file_laporan_pkl;
		force_download('uploads/laporan_pkl/' . $nama_file, NULL);
	}

	public function approveLaporan($id)
	{
		$this->db->where('id_pengajuan', $id);
		$this->db->set('status_laporan_pkl', '1');
		$this->db->update('pengajuan_pembimbing');
		redirect('DosenController/detailLaporan/' . $id, 'refresh');
	}
	public function rejectLaporan($id)
	{
		$this->db->where('id_pengajuan', $id);
		$this->db->set('status_laporan_pkl', '1');
		$this->db->update('pengajuan_pembimbing');
		redirect('DosenController/detailLaporan/' . $id, 'refresh');
	}
}

/* End of file DosenController.php */
/* Location: ./application/controllers/DosenController.php */