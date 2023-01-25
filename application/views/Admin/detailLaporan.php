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
                    

                

                    
                   
                </div>
            
        </div>
</div>




