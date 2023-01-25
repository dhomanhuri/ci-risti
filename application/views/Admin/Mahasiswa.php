<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Proposal Mahasiswa</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Detail Mahasiswa</th>
                        <th>Detail Perusahaan</th>
                        <th>File Pengajuan</th>
                        <th>File Balasan Admin</th>
                        <th>File Balasan Perusahaan</th>
                        <th>Pembimbing</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($proposal as $key => $prp){ ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?= $prp['nim_pengaju']?> <br/> 
                        <?= $prp['nama_pengaju']?>
                        </td>
                        <td>Nama Perusahaan : <?= $prp['nama_perusahaan']?> <br/> 
                            Alamat : <?= $prp['alamat_perusahaan']?> 
                        </td>
                        <td>
                            <a href="<?php echo base_url(); ?>index.php/DashboardAdmin/downloadPengajuan/<?php echo $prp['id_pengajuan'];?>">Download Proposal</a><br/>
                            <a href="<?php echo base_url(); ?>index.php/GeneratePdf/index/<?php echo $prp['id_pengajuan'];?>">Download Lembar Pengesahan</a><br>
                            <a href="<?php echo base_url(); ?>index.php/MahasiswaController/downloadMou/<?php echo $prp['id_pengajuan'];?>">Download MOU</a>
                            <a href="<?php echo base_url(); ?>index.php/MahasiswaController/downloadSpk/<?php echo $prp['id_pengajuan'];?>">Download Surat Perjanjian Kerja</a>
                        </td>
                        <td>
                            <?php if($prp['file_balasan_admin'] != null){ ?>    
                            <a href="<?php echo base_url(); ?>index.php/DashboardAdmin/downloadBalasan/<?php echo $prp['id_pengajuan'];?>">Download File Balasan</a><br/>
                            <?php } else{ ?>
                                Belum upload
                            <?php } ?>
                            <?php if($prp['file_pengesahan'] != null){ ?>    
                            <a href="<?php echo base_url(); ?>index.php/DashboardAdmin/downloadPengesahan/<?php echo $prp['id_pengajuan'];?>">Download File Pengesahan</a><br/>
                            <?php } else{ ?>
                                Belum upload
                            <?php } ?>
                        </td>
                        <td>
                            <?php if($prp['file_balasan_perusahaan'] != null){ ?>    
                            <a href="<?php echo base_url(); ?>index.php/DashboardAdmin/downloadBalasanPerusahaan/<?php echo $prp['id_pengajuan'];?>">Download File Balasan</a><br/></td>
                            <?php } else{ ?>
                                Belum upload
                            <?php } ?>
                        <td><?php foreach ($dosen as $d){
                            if ($prp['id_pembimbing'] == $d->id_dosen){
                                echo $d->nama;
                            }
                            } ; ?>
                        </td>
                        <td>
                            
                            <a href="#" data-toggle="modal" data-x = "<?= $prp['id_pengajuan'] ?>" class="btn btn-info btn_upload_balasan" style="font-size:10px">Upload File Pengantar</a><br/><br/>
                            <a href="#" data-toggle="modal" data-x = "<?= $prp['id_pengajuan'] ?>" class="btn btn-info btn_upload_pengesahan" style="font-size:10px">Upload Lembar Pengesahan</a> <br/><br/>
                            <a href="#" data-toggle="modal" data-x = "<?= $prp['id_pengajuan'] ?>"  class=" btn btn-warning btn_tambah_pembimbing" style="font-size:10px">Tambah Pembimbing</a>
                        </td>
                    </tr>
                    <?php } ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="uploadbalasan" class="modal fade">
    <div class="modal-dialog lab-modal-body">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Surat Pengantar</h5>
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                
            </div>
            <?php echo form_open_multipart('DashboardAdmin/uploadBalasan'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_pengajuan" id="id_pengajuan">
                </div>
                <div class="form-group">
                    <label>Upload Surat Pengantar</label>
                    <input type="file" class="form-control form-control-user" accept="application/pdf" name="file" required/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Upload" id="submit" />
                    <button class="btn btn-warning btn-user btn-block" data-dismiss="modal"> Back </button>
                </div>
            </div>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="uploadpengesahan" class="modal fade">
    <div class="modal-dialog lab-modal-body">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Balasan</h5>
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                
            </div>
            <?php echo form_open_multipart('DashboardAdmin/uploadPengesahan'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_pengajuan" id="id_pengajuan">
                </div>
                <div class="form-group">
                    <label>Upload File Pengesahan</label>
                    <input type="file" class="form-control form-control-user" accept="application/pdf" name="file" required/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Upload" id="submit" />
                    <button class="btn btn-warning btn-user btn-block" data-dismiss="modal"> Back </button>
                </div>
            </div>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="uploadpembimbing" class="modal fade">
    <div class="modal-dialog lab-modal-body">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pembimbing</h4>
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            </div>
            <?php echo form_open_multipart('DashboardAdmin/uploadPembimbing'); ?>
            <div class="modal-body">
            <input type="hidden" name="id_pengajuan" id="id_pengajuan">
                
                <div class="col-md-12 mb-4">
                    <label>Dosen Pembimbing</label>
                    <select class="form-control" name="dosen">
                    <?php foreach($dosen as $d): ?>
                        <option value="<?php echo $d->id_dosen ?>"><?php echo $d->nama ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">  
                <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Menugaskan" id="submit" />
                <button class="btn btn-warning btn-user btn-block" data-dismiss="modal"> Back </button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $(".btn_upload_balasan").on( "click", function() {
        console.log("halo upload balasan");
        $('#uploadbalasan').modal('show'); 
        $(".lab-modal-body #id_pengajuan").val( $(this).data('x'));
        
    });

    $(".btn_upload_pengesahan").on( "click", function() {
        $('#uploadpengesahan').modal('show'); 
        $(".lab-modal-body #id_pengajuan").val( $(this).data('x'));
        
    });

    $(".btn_tambah_pembimbing").on( "click", function() {
        $('#uploadpembimbing').modal('show'); 
        $(".lab-modal-body #id_pengajuan").val( $(this).data('x'));
        
    });
});
    
</script>