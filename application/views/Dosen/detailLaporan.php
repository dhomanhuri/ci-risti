<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Data Bimbingan</h6>
      
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
                    

                    <div class="col-md-12 mb-4">
                        <label>File Laporan PKL</label>
                        <a href="<?php echo base_url(); ?>index.php/DosenController/downloadLaporanPKL/<?php echo $detail['id_pengajuan'];?>"><?php echo $detail['file_laporan_pkl']; ?></a><br/>
                        
                    </div>

                    <?php
                    if($detail['status_laporan_pkl'] != null){ ?>

                        <?php
                        if($detail['status_laporan_pkl'] == '0')
                        { ?>
                            <div class="col-md-12 mb-4">
                                <a href="<?= base_url('index.php/DosenController/approveLaporan/'.$detail['id_pengajuan']); ?>" class="btn btn-success">Terima</a>
                                <a href="<?= base_url('index.php/DosenController/rejectLaporan/'.$detail['id_pengajuan']); ?>" class="btn btn-danger">Tolak</a><br/>
                                
                            </div>
                        <?php 
                        }else if($detail['status_laporan_pkl'] == '1'){
                            ?>
                            <div class="col-md-12 mb-4">
                                <a href="<?= base_url('index.php/DosenController/approveLaporan/'.$detail['id_pengajuan']); ?>" class="btn btn-success disabled" >Terima</a>
                                
                            </div>
                        <?php
                        } else{ ?>
                            <div class="col-md-12 mb-4">
                                <a href="<?= base_url('index.php/DosenController/rejectLaporan/'.$detail['id_pengajuan']); ?>" class="btn btn-danger disabled">Tolak</a><br/>
                                
                            </div>
                        <?php
                        }                                                           
                    }
                    ?>
                    

                    
                   
                </div>
            
        </div>
</div>




