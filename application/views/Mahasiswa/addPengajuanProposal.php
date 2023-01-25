<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pengajuan PKL</h6>
        
    </div>
    <div class="card-body">
        <?php  echo form_open_multipart('MahasiswaController/insproposal'); ?>
        <div class="row">
           
                    <div class="col-md-6 mb-4">
                        <label for="">NIM Pengaju</label>
                        <input type="text" class="form-control" name="nim_pengaju" value="<?= $mahasiswa->nim ?>" readonly>
                    </div> 
                    <div class="col-md-6 mb-4">
                        <label for="">Nama Pengaju</label>
                        <input type="text" class="form-control" name="nim_pengaju" value="<?= $mahasiswa->nama ?>" readonly>
                    </div>  
                    <div class="col-md-12 mb-4">
                        <label for="">Data Anggota 1</label>
                        <select class="selectpicker form-control" data-live-search="true" id="data_anggota1" name="data_anggota1">
                            <option  value="null">== Pilih Anggota 1 == </option>
                            <?php foreach($all_mahasiswa as $p): ?>
                                <option value="<?php echo $p->nim ?>" data-tokens="<?php echo $p->nim ?>"><?php echo $p->nim ." - ". $p->nama ." - ". $p->kodeprodi ?></option>
                            <?php endforeach; ?>
                            
                        </select>

                    </div> 
                    <div class="col-md-12 mb-4">
                        <label for="">Data Anggota 2</label>
                        <select class="selectpicker form-control" data-live-search="true" id="data_anggota2" name="data_anggota2">
                            <option value="null">== Pilih Anggota 2 == </option>
                            <?php foreach($all_mahasiswa as $p): ?>
                                <option value="<?php echo $p->nim ?>" data-tokens="<?php echo $p->nim ?>"><?php echo  $p->nim ." - ". $p->nama . " - ". $p->kodeprodi ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div> 
                    
                    <div class="col-md-12 mb-4">
                        <label for="">Perusahaan</label>
                        <select class="selectpicker form-control" data-live-search="true" id="id_perusahaan" name="id_perusahaan">
                                <option  value="null">== Pilih Perusahaan == </option>
                            <?php foreach($perusahaan as $p): ?>
                                <option value="<?php echo $p->id_perusahaan ?>"><?php echo $p->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                        <a href="#" id="tambah_perusahaan">Tambah Lain</a>
                  
                    </div>   

                    
                    <div class="col-md-6 mb-4" id="perusahaan_class">
                        <label for="">Nama Perusahaan</label>
                        <input type="text" class="form-control" name="nama_perusahaan" >
                    </div>
                    <div class="col-md-6 mb-4" id="alamat_perusahaan_class">
                        <label for="">Alamat Perusahaan</label>
                        <textarea class="form-control" name="alamat_perusahaan" ></textarea>
                    </div>
                  

                    <div class="col-md-6 mb-4">
                        <label for="">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="durasi" >
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="">Tanggal Berakhir</label>
                        <input type="date" class="form-control" name="exp_durasi" >
                    </div>                               
                    <div class="col-md-12 mb-4">
                        <label for="">File Pengajuan</label>
                        <input type="file" class="form-control" accept="application/pdf" name="file" required/>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label>File MOU</label>
                        <input type="file" class="form-control" accept="application/pdf" name="file_mou" required/>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label>File Surat Perjanjian Kerja</label>
                        <input type="file" class="form-control" accept="application/pdf" name="file_spk" required/>
                    </div>
                    <input type="submit"  class="btn btn-primary btn-user" name="submit" value="Tambah" id="submit"/>

                </div>
            
        </div>
        <?php  echo form_close();  ?>
</div>



<script type="text/javascript">
$(document).ready(function(){
    var element = document.getElementById("perusahaan_class");
    element.style.display = "none";
    var alamat_perusahaan_class = document.getElementById("alamat_perusahaan_class");
    alamat_perusahaan_class.style.display = "none";
    $( "#tambah_perusahaan" ).click(function() {
        var element = document.getElementById("perusahaan_class");
        element.style.display = "block";
        var alamat_perusahaan_class = document.getElementById("alamat_perusahaan_class");
        alamat_perusahaan_class.style.display = "block";
    });
});

</script>

