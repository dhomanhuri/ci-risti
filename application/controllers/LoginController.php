<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_user');
		$this->load->helper(array('url', 'form'));
		$this->load->library(array('form_validation', 'session'));
	}

	public function index()
	{
		$this->load->view('Login');
	}

	public function register()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('nama', 'NAMA_MHS', 'required');
			$this->form_validation->set_rules('nim', 'NIM', 'required');
			$this->form_validation->set_rules('email', 'EMAIL', 'required');
			$this->form_validation->set_rules('password', 'PASSWORD', 'required');
			$this->form_validation->set_rules('nomormhs', 'NP_MHS', 'required');
			$this->form_validation->set_rules('nomorortu', 'NP_ORTU', 'required');
			$this->form_validation->set_rules('kodeprodi', 'KODEPRODI', 'required');
			$this->form_validation->set_rules('kelas', 'KELAS', 'required');

			if ($this->form_validation->run() == TRUE) {
				if ($this->Model_user->register() == TRUE) {
					$data = [
						'notif'           => 'Registrasi Berhasil'
					];
					$this->load->view('Login', $data);
				} else {
					$data = [
						'notif'           => 'Registrasi gagal'
					];
					$this->load->view('Registrasi', $data);
				}
				// jika sukses

			} else {
				// jika gagal
				$data = [
					'notif'           => validation_errors()
				];
				$this->load->view('Registrasi', $data);
			}
		} else {
			$this->load->view('Registrasi');
		}
	}

	// if ($this->form_validation->run() == FALSE) {
	// 	$this->load->view('Registrasi');
	// }else{

	// 	$data['nama_mhs']   =    $this->input->post('nama_mhs');
	// 	$data['nim']   =    $this->input->post('nim');
	// 	$data['email']   =    $this->input->post('email');
	// 	$data['password']   =    $this->input->post('password');
	// 	$data['np_mhs']   =    $this->input->post('np_mhs');
	// 	$data['np_ortu']   =    $this->input->post('np_ortu');
	// 	$data['kodeprodi']   =    $this->input->post('kodeprodi');
	// 	$data['kelas']   =    $this->input->post('kelas');

	// 	$this->load->model('model_user');
	// 	$hasil = $this->model_user->register($data);
	// 	$pesen['message'] = "Pendaftaran berhasil";

	// 	$this->load->view('Login', $pesan, $hasil);

	// }



	public function cek_login()
	{
		$data = array(
			'email' => $this->input->post('email', TRUE),
			'password' => md5($this->input->post('password', TRUE))
		);
		$this->load->model('model_user'); //untuk load model
		$hasil = $this->model_user->cek_user($data);

		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = TRUE;
				$sess_data['id_users'] = $sess->id_users;
				$sess_data['email'] = $sess->email;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('level') == 'admin') {
				redirect('DashboardAdmin/getmahasiswa');
			} elseif ($this->session->userdata('level') == 'mahasiswa') {
				redirect('MahasiswaController');
			} elseif ($this->session->userdata('level') == 'dosen') {
				redirect('DosenController/bimbingan');
			}
		} else {
			$this->db->where('email', $this->input->post('email'));
			$cek_email = $this->db->get('users')->row_array();

			if ($cek_email != null) {
				echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
			} else {
				echo "<script>alert('Email anda belum terdaftar. Segera lakukan registrasi!');history.go(-1);</script>";
			}
		}
	}
}

/* End of file LoginController.php */
/* Location: ./application/controllers/LoginController.php */