<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GeneratePdf extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModels');
        setlocale(LC_ALL, 'id_ID');
    }


    function index($id)
    {
        // $data['proposal'] = $this->AdminModels->pengajuan_admin($id);
        // var_dump($data['proposal']);die;

        //data detil
        $this->db->where('pengajuan_admin.id_pengajuan', $id);
        $this->db->join('perusahaan', 'perusahaan.id_perusahaan=pengajuan_admin.id_perusahaan', 'left');
        $this->db->select('pengajuan_admin.*, perusahaan.nama as nama_perusahaan, perusahaan.alamat as alamat_perusahaan');
        $data['proposal'] = $this->db->get('pengajuan_admin')->row_array();

        //data anggota selain nim pengaju
        $this->db->where('id_pengajuan', $id);
        // $this->db->where('nim_anggota !=', $data['proposal']['nim_pengaju']);
        $data['anggota'] = $this->db->get('pengajuan_admin_anggota')->result_array();

        // var_dump($data);
        // die();
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $data['bulan'] = $bulan;
        $this->load->library('pdf');
        $html = $this->load->view('Mahasiswa/GeneratePengajuanView', $data, true);
        $this->pdf->createPDF($html, 'lembarpengesahan', false);
    }

    function tanggal_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode(' ', $tanggal);
        return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
    }
}
