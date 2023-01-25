<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pengajuan PKL</h6>
        
    </div>
    <div class="card-body">
            <div class="d-inline-flex p-2">
            <a href="#" id="tambah_pengajuan" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Pengajuan</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NIM & Nama </th>
                        <th>Detail Perusahaan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($proposal as $key => $prp) {
                    ?>
                    <tr>
                        <td><?= $prp['nim_pengaju']?><br/>
                        <?= $prp['nama_pengaju']?>
                        </td>
                        <td>Nama Perusahaan : <?= $prp['nama_perusahaan']?> <br/> 
                            Alamat : <?= $prp['alamat_perusahaan']?> 
                        </td>
                        <td><?= $prp['tanggal_mulai']?></td>
                        <td><?= $prp['tanggal_akhir']?></td>
                        <td>
                            <?= $prp['status_penerimaan']?>
                        </td>
                        <td>
                            <a href="<?= base_url('index.php/MahasiswaController/detailProposal/'. $prp['id_pengajuan']) ?>" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    var status= <?= json_encode($users) ?>;
    console.log(status);
    $( "#tambah_pengajuan").click(function() {
        console.log(status);
        if(status == null || status == 'null'){
            window.location.href="<?= base_url('index.php/MahasiswaController/createProposal');?>";
        }else{
            if( status.status_penerimaan == "tidak_diterima_perusahaan"){
            window.location.href="<?= base_url('index.php/MahasiswaController/createProposal');?>";
            }else{
                alert("Masih proses pengajuan");
            }
        }
 
    
    });
});
</script>

