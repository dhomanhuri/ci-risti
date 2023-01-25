
<?php 
    if($pembimbing == null || empty($pembimbing)){
    echo form_open_multipart('MahasiswaController/inspembimbing'); ?>
        <div class="modal-body">
            <div class="col-md-6 mb-4">
                <label>Dosen Pembimbing</label>
                <select class="form-control" name="dosen">
                    <?php foreach($dosen as $d): ?>
                        <option value="<?php echo $d->id_dosen ?>"><?php echo $d->nama ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6 mb-4">
                <label>Nim</label>
                <input value="<?= $nim ?>" type="text" class="form-control" name="nim" required/>
            </div>

            <div class="col-md-6 mb-4">
                <label>Nim</label>
                <input type="text" class="form-control" name="nim1" />
            </div>

            <div class="col-md-6 mb-4">
                <label>Nim</label>
                <input type="text" class="form-control" name="nim2" />
            </div>

            <div class="col-md-6 mb-4">
                <label>File Pengajuan</label>
                <input type="file" class="form-control" accept="application/pdf" name="file" required/>
            </div>
                                             
        <input type="submit"  class="btn btn-primary btn-user" name="submit" value="Tambah Data" id="submit"/>
                   
        <button type="button" class="btn btn-danger btn-user" data-dismiss="modal">Batal</button>
                       
        <hr>
    </div>
                                        
<?php 
    echo form_close(); 
    } else {
?>

     <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Pengajuan Pembimbing</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bimbingan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM Pengusul</th>
                                <th>Nama Pengusul</th>
                                <th>NIM Anggota</th>
                                <th>NIM Anggota</th>
                                <th>NIP Pembimbing</th>
                                <th>Nama Pembimbing</th>
                                <th>Status</th>
                                <th>File Pengajuan</th>
                                <th>Upload at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($pembimbing as $mhs){ ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $mhs->nim; ?></td>
                                <td><?php echo $mhs->mahasiswa; ?></td>
                                <td><?php echo $mhs->nim_dua; ?></td>
                                <td><?php echo $mhs->nim_tiga; ?></td>
                                <td><?php echo $mhs->nip; ?></td>
                                <td><?php echo $mhs->dosen; ?></td>
                                <td><?php echo $mhs->status; ?></td>
                                <td><a href="<?= base_url('assets/balasan/'.$mhs->file_pengajuan) ?>"><?php echo $mhs->file_pengajuan; ?></a></td>
                                <td><?php echo $mhs->create_at; ?></td>
                            </tr>
                            <?php } ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
<?php } ?>