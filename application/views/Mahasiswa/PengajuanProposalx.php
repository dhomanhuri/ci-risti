
<?php 
    if($proposal != null){
    echo form_open_multipart('MahasiswaController/updateFileProposal'); ?>
    <div class="modal-body">
    <?php if($proposal[0]->file_balasan != null) {?>
    <div class="row">
         <!-- Border Left Utilities -->
        <div class="col-lg-12">

            <div class="card mb-4 py-1 border-left-warning">
                <div class="card-body">
                    Menunggu Balasan
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
        <label for="">Informasi Mahasiswa</label>
            <div class="row">
                
                <div class="col-md-6 mb-4">
                    <input type="text" class="form-control" name="anggota1" placeholder="nama anggota 1" value="<?= $proposal [0] -> namaAng1 ?>" readonly>
                </div> 
                <div class="col-md-6 mb-4">
                    <input type="number" class="form-control" name="nim1" placeholder="nim anggota 1" min="1" value="<?= $proposal [0] -> nimAng1 ?>" readonly>
                </div>  
                <div class="col-md-6 mb-4">
                    <input type="text" class="form-control" name="anggota2" placeholder="nama anggota 2" value="<?= $proposal [0] -> namaAng2 ?>" readonly>
                </div> 
                <div class="col-md-6 mb-4">
                    <input type="number" class="form-control" name="nim2" placeholder="nim anggota 2" min="1" value="<?= $proposal [0] -> nimAng2 ?>" readonly>
                </div> 
                <div class="col-md-12 mb-4">
                    <input type="text" class="form-control" name="prodi" placeholder="prodi" value="<?= $proposal [0] -> kodeprodi ?>" readonly>
                </div>
                <div class="col-md-12 mb-4">
                    <input type="text" class="form-control" name="nama_perusahaan" placeholder="id_perusahaan" value="<?= $proposal [0]->nama_perusahaan ?>" readonly>
                </div> 
                <div class="col-md-6 mb-4">
                    <label for="">Tanggal Dimuluai</label>
                    <input type="date" class="form-control" name="durasi" value="<?= $proposal [0] -> tanggalMulai ?>" readonly>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="">Tanggal Berakhir</label>
                    <input type="date" class="form-control" name="exp_durasi" value="<?= $proposal [0] -> tanggalAkhir ?>" readonly>
                </div>                               
                <div class="col-md-12 mb-4">
                <label>File Pengajuan</label>
                    <a href="<?php echo base_url(); ?>index.php/DashboardAdmin/downloadPengajuan/<?php echo $proposal[0]->id_pengajuan;?>"><?php echo $proposal[0]->file_pengajuan; ?></a>
                    <input type="file" class="form-control" accept="application/pdf" name="file" />
                    <input type="hidden" class="form-control" name="id_pengajuan" value="<?= $proposal [0]->id_pengajuan ?>" readonly>
                </div>
                <div class="col-md-12 mb-4">
                    <label>File MOU</label>
                    <a href="<?php echo base_url(); ?>index.php/MahasiswaController/downloadMou/<?php echo $proposal[0]->id_pengajuan;?>"><?php echo $proposal[0]->file_mou; ?></a>
                    <input type="file" class="form-control" accept="application/pdf" name="file_mou" />

                </div>
                <div class="col-md-12 mb-4">
                    <label>File Balasan</label>
                    <a href="<?php echo base_url(); ?>index.php/DashboardAdmin/downloadBalasan/<?php echo $proposal[0]->id_pengajuan;?>"><?php echo $proposal[0]->file_balasan; ?></a>
                </div>
                <?php if($proposal[0]->file_balasan != null)
                {
                    ?>
                <div class="col-md-12 mb-4">
                    <label>File Surat Perjanjian Kerja</label>
                    <a href="<?php echo base_url(); ?>index.php/MahasiswaController/downloadSpk/<?php echo $proposal[0]->id_pengajuan;?>"><?php echo $proposal[0]->file_spk; ?></a>
                    <input type="file" class="form-control" accept="application/pdf" name="file_spk" />

                </div>
                <?php
                }else{
                    ?>
                <div class="col-md-12 mb-4">
                    <label>File Surat Perjanjian Kerja</label>
                    <input type="text" class="form-control" value ="Belum bisa upload karena belum mendapat balasan"/>
                </div>
                <?php
                } ?>
             
                <?php if($proposal != null) {?>
                
                <div class="col-md-12 mb-4">
                <label for="">Informasi Pembimbing</label>
                <input type="text" class="form-control" name="tempat" placeholder="Nama Pembimbing" value="<?php foreach ($dosen as $d){
                                                if ($proposal[0]->id_pembimbing == $d->id_dosen){
                                                    echo $d->nama;
                                                }
                                                } ; ?>" readonly>
                </div>
                <div class="col-md-12 mb-4">
                <input type="text" class="form-control" name="tempat" placeholder="NIP Pembimbing" value="<?php foreach ($dosen as $d){
                                                if ($proposal[0]->id_pembimbing == $d->id_dosen){
                                                    echo $d->nip;
                                                }
                                                } ; ?>" readonly>
                </div>
                <div class="col-md-12 mb-4">
                <input type="text" class="form-control" name="tempat" placeholder="Nomor Pembimbing" value="<?php foreach ($dosen as $d){
                                                if ($proposal[0]->id_pembimbing == $d->id_dosen){
                                                    echo $d->nomortelpon;
                                                }
                                                } ; ?>" readonly>
                </div>
                <?php } ?>
            </div>
            
            <input type="submit"  class="btn btn-primary btn-user" name="submit" value="Update" id="submit"/>
     
        <hr>
    </div>
                                        
<?php 
    echo form_close(); 
    } else {
    echo form_open_multipart('MahasiswaController/insproposal'); ?>
    <div class="modal-body">
        <label for="">Informasi Mahasiswa</label>
            <div class="row">
                
                <div class="col-md-6 mb-4">
                    <input type="text" class="form-control" name="anggota1" placeholder="nama anggota 1" >
                </div> 
                <div class="col-md-6 mb-4">
                    <input type="number" class="form-control" name="nim1" placeholder="nim anggota 1" min="1" >
                </div>  
                <div class="col-md-6 mb-4">
                    <input type="text" class="form-control" name="anggota2" placeholder="nama anggota 2" >
                </div> 
                <div class="col-md-6 mb-4">
                    <input type="number" class="form-control" name="nim2" placeholder="nim anggota 2" min="1" >
                </div> 
                <div class="col-md-12 mb-4">
                    <input type="text" class="form-control" name="prodi" placeholder="prodi" value="<?php echo $mahasiswa->kodeprodi?>">
                </div>
                <div class="col-md-12 mb-4">
                    <select class="form-control" name="id_perusahaan">
                        <?php foreach($perusahaan as $p): ?>
                            <option value="<?php echo $p->id_perusahaan ?>"><?php echo $p->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>   
                <div class="col-md-6 mb-4">
                    <label for="">Tanggal Dimuluai</label>
                    <input type="date" class="form-control" name="durasi" >
                </div>
                <div class="col-md-6 mb-4">
                    <label for="">Tanggal Berakhir</label>
                    <input type="date" class="form-control" name="exp_durasi" >
                </div>                               
                <div class="col-md-12 mb-4">
                <?php if($proposal == null) {?>
                    <input type="file" class="form-control" accept="application/pdf" name="file" required/>
                    <?php }else{ ?>
                    <input type="text" class="form-control">
                <?php } ?>
                </div>
                <div class="col-md-12 mb-4">
                <label>File MOU</label>
                <?php if($proposal == null) {?>
                    <input type="file" class="form-control" accept="application/pdf" name="file_mou" required/>
                    <?php }else{ ?>
                    <input type="text" class="form-control">
                <?php } ?>
                </div>
                <div class="col-md-12 mb-4">
                <label>File Surat Perjanjian Kerja</label>
                <?php if($proposal == null) {?>
                    <input type="file" class="form-control" accept="application/pdf" name="file_spk" required/>
                    <?php }else{ ?>
                    <input type="text" class="form-control">
                <?php } ?>
                </div>
                <?php if($proposal != null) {?>
                
                <div class="col-md-12 mb-4">
                <label for="">Informasi Pembimbing</label>
                <input type="text" class="form-control" name="tempat" placeholder="Nama Pembimbing" value="<?php foreach ($dosen as $d){
                                                if ($proposal[0]->id_pembimbing == $d->id_dosen){
                                                    echo $d->nama;
                                                }
                                                } ; ?>">
                </div>
                <div class="col-md-12 mb-4">
                <input type="text" class="form-control" name="tempat" placeholder="NIP Pembimbing" value="<?php foreach ($dosen as $d){
                                                if ($proposal[0]->id_pembimbing == $d->id_dosen){
                                                    echo $d->nip;
                                                }
                                                } ; ?>">
                </div>
                <div class="col-md-12 mb-4">
                <input type="text" class="form-control" name="tempat" placeholder="Nomor Pembimbing" value="<?php foreach ($dosen as $d){
                                                if ($proposal[0]->id_pembimbing == $d->id_dosen){
                                                    echo $d->nomortelpon;
                                                }
                                                } ; ?>">
                </div>
                <?php } ?>
            </div>
            
        <?php if($proposal == null) {?>
        <input type="submit"  class="btn btn-primary btn-user" name="submit" value="Tambah Data" id="submit"/>
                    
        <?php } ?>
        <hr>
    </div>
<?php
    }
?>

     
