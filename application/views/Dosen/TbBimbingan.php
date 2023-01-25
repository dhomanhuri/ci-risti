<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Mahasiswa Bimbingan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Bimbingan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>Nama Perusahaan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($pkl as $pkl){ 
                        $no++; ?>
                        <tr>
                            <td> <?php 
                                    $this->db->where('id_pengajuan', $pkl['id_pengajuan']);
                                    $dt_anggota = $this->db->get('pengajuan_admin_anggota')->result_array();
                                    foreach ($dt_anggota as $key => $agt) {
                                        echo  $agt['nama_anggota'] . "<br/>";
                                    }
                                ?>

                            </td>
                            <td><?= $pkl['nama_perusahaan']?></td>
                            <td>
                            <a href="<?= base_url('index.php/DosenController/detailLaporan/'. $pkl['id_pengajuan']) ?>" class="btn btn-primary">Detail</a>
                        </td>
                        </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>