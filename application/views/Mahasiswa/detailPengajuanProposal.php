<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Pengajuan PKL</h6>
      
    </div>
    <div class="card-body">
        <div class="row">
                

                    <?php
                    foreach ($anggota as $key => $ang) { 
                            if($ang['nim_anggota'] == $detail['nim_pengaju']){ ?>
                                <div class="col-md-6 mb-4">
                                    <label for="">NIM Pengaju</label>
                                    <input type="text" class="form-control" name="nim_pengaju" value="<?= $ang['nim_anggota'] ?>" readonly>
                                </div> 
                                <div class="col-md-6 mb-4">
                                    <label for="">Nama Pengaju</label>
                                    <input type="text" class="form-control" name="nama_pengaju" value="<?= $ang['nama_anggota'] ?>" readonly>
                                </div>  
                        <?php
                            }else{ ?>
                                <div class="col-md-6 mb-4">
                                    <label for="">NIM Anggota </label>
                                    <input type="text" class="form-control" name="nim_anggota1" value="<?= $ang['nim_anggota'] ?>"  readonly >

                                </div> 
                                <div class="col-md-6 mb-4">
                                    <label for="">Nama Anggota </label>
                                    <input type="text" class="form-control" name="nama_anggota1" value="<?= $ang['nama_anggota'] ?>" readonly >

                                </div> 
                        <?php    }
                        ?>
                                
                    <?php }
                    ?>

               
                    <!-- <div class="col-md-6 mb-4">
                        <label for="">NIM Anggota 2</label>
                        <input type="text" class="form-control" name="nim_anggota2"  value="<?= $anggota[1]['nim_anggota'] ?>" readonly >

                    </div> 
                    <div class="col-md-6 mb-4">
                        <label for="">Nama Anggota 2</label>
                        <input type="text" class="form-control" name="nama_anggota2"  value="<?= $anggota[1]['nama_anggota'] ?>" readonly >

                    </div>  -->

                    
                    <div class="col-md-6 mb-4" id="perusahaan_class">
                        <label for="">Nama Perusahaan</label>
                        <input type="text" class="form-control" name="nama_perusahaan" value="<?= $detail['nama_perusahaan'] ?>" readonly >
                    </div>
                    <div class="col-md-6 mb-4" id="alamat_perusahaan_class">
                        <label for="">Alamat Perusahaan</label>
                        <textarea class="form-control" name="alamat_perusahaan" readonly><?= $detail['alamat_perusahaan'] ?></textarea>
                    </div>
                  

                    <div class="col-md-6 mb-4">
                        <label for="">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="durasi" value="<?= $detail['tanggal_mulai'] ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="">Tanggal Berakhir</label>
                        <input type="date" class="form-control" name="exp_durasi" value="<?= $detail['tanggal_akhir'] ?>"  readonly>
                    </div>      
                    <hr>
                    <div class="col-md-6 mb-4">
                        <label for="">NIP Pembimbing</label>
                        <input type="text" class="form-control" name="nip" value="<?= $detail['nip'] ?>" readonly >
                    </div>
                    <div class="col-md-6 mb-4" >
                        <label for="">Nama Pembimbing</label>
                        <input type="text" class="form-control" name="nm_pembimbing" value="<?= $detail['nama_pembimbing'] ?>" readonly >
                    </div> 
                    <div class="col-md-6 mb-4" >
                        <label for="">No HP Pembimbing</label>
                        <input type="text" class="form-control" name="no_pembimbing" value="<?= $detail['no_telp_pembimbing'] ?>" readonly >
                    </div>                         
                    <div class="col-md-12 mb-4">
                        <label for="">File Pengajuan</label>
                        <a href="<?php echo base_url(); ?>index.php/DashboardAdmin/downloadPengajuan/<?php echo $detail['id_pengajuan'];?>"><?php echo $detail['file_pengajuan']; ?></a>
                  
                    </div>
                    <div class="col-md-12 mb-4">
                        <label>File MOU</label>
                        <a href="<?php echo base_url(); ?>index.php/MahasiswaController/downloadMou/<?php echo $detail['id_pengajuan'];?>"><?php echo $detail['file_mou']; ?></a>
                  
                    </div>
                    <div class="col-md-12 mb-4">
                        <label>File Surat Perjanjian Kerja</label>
                        <a href="<?php echo base_url(); ?>index.php/MahasiswaController/downloadSpk/<?php echo $detail['id_pengajuan'];?>"><?php echo $detail['file_spk']; ?></a>
                  
                    </div>
                    <div class="col-md-12 mb-4">
                        <label>Surat Pengantar Admin</label>
                        <a href="<?php echo base_url(); ?>index.php/MahasiswaController/downloadPengantarPKL/<?php echo $detail['id_pengajuan'];?>"><?php echo $detail['file_balasan_admin']; ?></a>
                  
                    </div>
                    <div class="col-md-12 mb-4">
                        <label>File Pengesahan</label>
                        <a href="<?php echo base_url(); ?>index.php/MahasiswaController/downloadLembarPengesahan/<?php echo $detail['id_pengajuan'];?>"><?php echo $detail['file_pengesahan']; ?></a>
                  
                    </div>
                    <div class="col-md-12 mb-4">
                        <label>File Balasan Perusahaan</label>
                        <?php 
                        if($detail['file_balasan_perusahaan'] != null){ ?>
                            <a href="<?php echo base_url(); ?>index.php/MahasiswaController/downloadBalasanPerusahaan/<?php echo $detail['id_pengajuan'];?>">Download File</a><br/>

                        <?php }
                        ?>
                        
                        <a href="#" data-toggle="modal" data-x = "<?= $detail['id_pengajuan'] ?>"  class="btn btn-info btn_upload_balasan">Upload File Balasan Perusahaan</a>

                    </div>

                    <div class="col-md-12 mb-4">
                        <label>File Laporan PKL</label>
                        <a href="<?php echo base_url(); ?>index.php/MahasiswaController/downloadLaporanPKL/<?php echo $detail['id_pengajuan'];?>"><?php echo $detail['file_laporan_pkl']; ?></a><br/>
                        <a href="#" data-toggle="modal" data-x = "<?= $detail['id_pengajuan'] ?>"  class="btn btn-info btn_upload_laporan">Upload Laporan PKL</a>

                    </div>

                    
                   
                </div>
            
        </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="uploadbalasan" class="modal fade">
    <div class="modal-dialog lab-modal-body">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Balasan Perusahaan</h5>
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                
            </div>
            <?php echo form_open_multipart('MahasiswaController/uploadBalasanPerusahaan'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_pengajuan" id="id_pengajuan">
                </div>
                <div class="form-group">
                    <label>Apakah anda diterima ?</label><br/>
                    <input type="radio" id="balasan_perusahaan" name="balasan_perusahaan" value="y">
                    <label for="y">YA</label>
                    <input type="radio" id="balasan_perusahaan" name="balasan_perusahaan" value="t">
                    <label for="t">TIDAK</label><br>
                </div>
                <div class="form-group">
                    <label>Upload Balasan Perusahaan</label>
                    <input type="file" class="form-control form-control-user" accept="application/pdf" name="file" required/>
                    <p><i>* hanya untuk yang diterima.</i></p>
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

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="uploadLaporanPKL" class="modal fade">
    <div class="modal-dialog lab-modal-body">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Laporan PKL</h5>
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                
            </div>
            <?php echo form_open_multipart('MahasiswaController/uploadLaporanPKL'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_pengajuan" id="id_pengajuan">
                </div>
                <div class="form-group">
                    <label>Upload Laporan PKL</label>
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



<script type="text/javascript">
$(".btn_upload_balasan").on( "click", function() {
  
    $('#uploadbalasan').modal('show'); 
    $(".lab-modal-body #id_pengajuan").val( $(this).data('x'));

});

$(".btn_upload_laporan").on( "click", function() {
  
  $('#uploadLaporanPKL').modal('show'); 
  $(".lab-modal-body #id_pengajuan").val( $(this).data('x'));

});

</script>

