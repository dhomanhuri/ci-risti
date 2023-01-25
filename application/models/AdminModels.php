<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminModels extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function cek_dosen()
	{
		$this->db->join('dosen', 'users.id_users = dosen.user_id', 'left');
		$this->db->where('level','dosen');
		return $this->db->get('users')
            ->result();	
    }
	

    public function pengajuan_admin()
	{
		$this->db->join('mahasiswa', 'mahasiswa.nim = pengajuan_admin.nim_pengaju', 'left');
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = pengajuan_admin.id_perusahaan', 'left');
		$this->db->select('pengajuan_admin.* , mahasiswa.nama as nama_pengaju, perusahaan.nama as nama_perusahaan, perusahaan.alamat as alamat_perusahaan');
		return $this->db->get('pengajuan_admin')->result_array();
    
    }

	public function getDataPengajuan($nim)
	{
		
		$this->db->join('mahasiswa', 'mahasiswa.nim = pengajuan_admin.nim_pengaju', 'left');
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = pengajuan_admin.id_perusahaan', 'left');
		$this->db->join('pengajuan_admin_anggota','pengajuan_admin_anggota.id_pengajuan=pengajuan_admin.id_pengajuan','left');
		$this->db->where('pengajuan_admin_anggota.nim_anggota', $nim);
		$this->db->select('pengajuan_admin.* , mahasiswa.nama as nama_pengaju, perusahaan.nama as nama_perusahaan, perusahaan.alamat as alamat_perusahaan');
		$data = $this->db->get('pengajuan_admin')->result_array();
		// var_dump($data);
		// die();
		return $data;
    }

    public function cekdosenid($id)
    {
    	return $this->db->where('id_users', $id)
		    	->get('users')
		    	->result();
    }
 
	public function tambahdosen()
	{
		$data = array(
			'id_users' => NULL,
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'level' => "dosen"

        );

		// User data array
		$this->db->insert('users', $data);

		$cek = $this->db->query('SELECT * FROM users order by id_users DESC LIMIT 1')->row();

		$dsn = array(
			'user_id' => $cek->id_users,
            'nama' => $this->input->post('nama_dsn'),
            'nip' => $this->input->post('nip'),
            'nomortelpon' => $this->input->post('nomordsn'),

        );

        $this->db->insert('dosen', $dsn);

		if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
	}

	public function ubahdosen($id)
	{
		$data = array(
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'level' => "dosen"
        );

		// User data array
		

		$cek = $this->db->query("SELECT * FROM users where id_users = $id order by id_users DESC LIMIT 1")->row();

		$dsn = array(
			'user_id' => $cek->id_users,
            'nama' => $this->input->post('nama_dsn'),
            'nip' => $this->input->post('nip'),
            'nomortelpon' => $this->input->post('nomordsn'),

        );
		$where1 = array('id_users' => $id);
		$where = array('user_id' => $id);

        $this->db->update('dosen', $dsn, $where);
        $this->db->update('users', $data, $where1);


		// if ($this->db->affected_rows() > 0) {
  //           return TRUE;
  //       } else {
  //           return FALSE;
  //       }
    }

	public function hapusdosen($id)
	{
		$this->db->where('user_id', $id)->delete('dosen');
		$this->db->where('id_users', $id)->delete('users');

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
	}

	public function perusahaan()
	{
		return $this->db->get('perusahaan')->result();
	}

	public function tambahperusahaan()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telpon' => $this->input->post('telpon'),
			'qty' => $this->input->post('qty'),
			'penanggung_jawab' => $this->input->post('penanggung_jawab')

		);

		$this->db->insert('perusahaan', $data);
		if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
	}

	public function hapusperusahaan($id)
	{
		$this->db->where('id_perusahaan', $id)->delete('perusahaan');

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
	}
	public function ubahperusahaan($id)
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telpon' => $this->input->post('telpon'),
			'qty' => $this->input->post('qty'),
			'penanggung_jawab' => $this->input->post('penanggung_jawab')

		);

		// User data array
		
		$where = array('id_perusahaan' => $id);

        $this->db->update('perusahaan', $data, $where);


		// if ($this->db->affected_rows() > 0) {
  //           return TRUE;
  //       } else {
  //           return FALSE;
  //       }
    }

	public function databimbingan()
	{
		$this->db->where('pengajuan_admin.id_pembimbing !=', '0');
		$this->db->join('mahasiswa', 'pengajuan_admin.nim_pengaju = mahasiswa.id_mahasiswa', 'left');
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = pengajuan_admin.id_perusahaan', 'left');
		$this->db->join('dosen', 'dosen.id_dosen=pengajuan_admin.id_pembimbing', 'left');
		$this->db->select('pengajuan_admin.* , mahasiswa.nama as nama_pengaju, perusahaan.nama as nama_perusahaan, perusahaan.alamat as alamat_perusahaan,dosen.nip,dosen.nama as nama_dosen');
		return $this->db->get('pengajuan_admin')->result_array();
		// return $this->db->query("SELECT dosen.nama, mahasiswa.kodeprodi, count(pengajuan_pembimbing.dosen_id) as jumlah 
		// 	FROM pengajuan_pembimbing 
		// 	JOIN dosen ON pengajuan_pembimbing.dosen_id = dosen.id_dosen 
		// 	JOIN mahasiswa ON pengajuan_pembimbing.nim = mahasiswa.nim 
		// 	GROUP BY  dosen.nama, mahasiswa.kodeprodi")->result();
		
	}

	// Get DataTable data
	function getPengajuanAdmin($postData=null){

		$response = array();
   
		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value
   
		// Custom search filter 
		$searchDosen = $postData['searchDosen'];
		
		## Search 
		$search_arr = array();
		$searchQuery = "";
		if($searchValue != ''){
		   $search_arr[] = " (id_pembimbing like '%".$searchValue."%' ) ";
		}
		if($searchDosen != ''){
		   $search_arr[] = " id_pembimbing='".$searchDosen."' ";
		}
		
		if(count($search_arr) > 0){
		   $searchQuery = implode(" and ",$search_arr);
		}
   
		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('pengajuan_admin')->result();
		$totalRecords = $records[0]->allcount;
   
		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$records = $this->db->get('pengajuan_admin')->result();
		$totalRecordwithFilter = $records[0]->allcount;
   
		## Fetch records
		$this->db->where('pengajuan_admin.id_pembimbing !=', '0');
		$this->db->join('mahasiswa', 'pengajuan_admin.nim_pengaju = mahasiswa.id_mahasiswa', 'left');
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = pengajuan_admin.id_perusahaan', 'left');
		$this->db->join('dosen', 'dosen.id_dosen=pengajuan_admin.id_pembimbing', 'left');
		$this->db->select('pengajuan_admin.* , mahasiswa.nama as nama_pengaju, perusahaan.nama as nama_perusahaan, perusahaan.alamat as alamat_perusahaan,dosen.nip,dosen.nama as nama_dosen');
		
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('pengajuan_admin')->result();
   
		$data = array();
	
		foreach($records as $record ){
		

			$data[] = array( 
			"nama_dosen"=>$record->nama_dosen . "<br/> NIP.". $record->nip,
			"nama_perusahaan"=>$record->nama_perusahaan ."<br/> Alamat : ". $record->alamat_perusahaan,
			"detail"=> "<a href ='".base_url()."index.php/DashboardAdmin/detailLaporan/".$record->id_pengajuan."' class='btn btn-primary'>Detail</a> ",
			); 
		}
   
		## Response
		$response = array(
		  "draw" => intval($draw),
		  "iTotalRecords" => $totalRecords,
		  "iTotalDisplayRecords" => $totalRecordwithFilter,
		  "aaData" => $data
		);
   
		return $response; 
	  }
   

    public function upd($t, $data, $w)
    {
    	$this->db->update($t, $data, $w);
    }

    public function getmahasiswa($id)
    {
    	if ($id != null) {
    		$this->db->where('user_id', $id);
    		return $this->db->get('mahasiswa');
    	}else{
    		return $this->db->get('mahasiswa');
    	}
    	
    }

    public function getdosen($id)
    {
    	if ($id != null) {
    		$this->db->where('user_id', $id);
    		return $this->db->get('dosen');
    	}else{
    		return $this->db->get('dosen');
    	}
    	
    }

	public function getPerusahaan()
    {
    	return $this->db->get('perusahaan')->result();
    	
    }

	public function getAllMahasiswa()
    {
		
		$this->db->where('pengajuan_admin.status_penerimaan !=','tidak_diterima_perusahaan');
		$this->db->join('pengajuan_admin_anggota','pengajuan_admin_anggota.nim_anggota=mahasiswa.nim','left');
		$this->db->join('pengajuan_admin', 'pengajuan_admin.id_pengajuan=pengajuan_admin_anggota.id_pengajuan', 'left');
		$this->db->select('mahasiswa.nim');
		$this->db->distinct();
		$x=$this->db->get('mahasiswa')->result_array();
		
		$y=[];
		foreach ($x as $key => $x) {
			array_push($y, $x['nim']);
		}
		// var_dump($y['nim']);
		// die;
	 	$this->db->where('mahasiswa.user_id !=', $this->session->userdata('id_users'));
		$this->db->where_not_in('mahasiswa.nim',$y);
		
    	$z= $this->db->get('mahasiswa')->result();
		return $z;
		//var_dump($z);
		//die();
    	
    }

    public function ins($t, $data)
    {
    	$this->db->insert($t, $data);
    }

    public function pengajuan_pembimbing($id)
    {
    	
    	return $this->db->query("SELECT pengajuan_pembimbing.*,mahasiswa.nama as mahasiswa, dosen.nip, dosen.nama as dosen FROM pengajuan_pembimbing JOIN mahasiswa on pengajuan_pembimbing.nim = mahasiswa.nim JOIN dosen on pengajuan_pembimbing.dosen_id = dosen.id_dosen WHERE pengajuan_pembimbing.nim = $id ")->result();
    	
    }

	public function pengajuan_pembimbing_dosen($id)
    {
    	
    	return $this->db->query("SELECT pengajuan_pembimbing.*,mahasiswa.nama as mahasiswa, dosen.nip, dosen.nama as dosen FROM pengajuan_pembimbing JOIN mahasiswa on pengajuan_pembimbing.nim = mahasiswa.nim JOIN dosen on pengajuan_pembimbing.dosen_id = dosen.id_dosen WHERE pengajuan_pembimbing.dosen_id = $id ")->result();
    	
    }

	public function pengajuan_admin_dosen($id)
	{
		$this->db->where('pengajuan_admin.id_pembimbing', $id);
		$this->db->join('mahasiswa', 'pengajuan_admin.nim_pengaju = mahasiswa.id_mahasiswa', 'left');
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = pengajuan_admin.id_perusahaan', 'left');
		$this->db->select('pengajuan_admin.* , mahasiswa.nama as nama_pengaju, perusahaan.nama as nama_perusahaan, perusahaan.alamat as alamat_perusahaan');
		return $this->db->get('pengajuan_admin')->result_array();
    }

}

/* End of file Admin.php */
/* Location: ./application/models/Admin.php */
