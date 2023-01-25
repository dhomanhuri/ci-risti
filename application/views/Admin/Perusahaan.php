<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Perusahaan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Perusahaan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="form-group text-right">
                <a data-toggle="modal" data-target="#tambah-data" class="btn btn-primary">Tambah Data Perusahaan</a>
            </div>
            <?=$this->session->flashdata('notif')?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Jumlah Diterima</th>
                        <th>Penanggung Jawab</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($perusahaan as $ph){ ?>
                    <tr>
                        <td><?php echo $ph->nama; ?></td>
                        <td><?php echo $ph->alamat; ?></td>
                        <td><?php echo $ph->telpon; ?></td>
                        <td><?php echo $ph->qty; ?></td>
                        <td><?php echo $ph->penanggung_jawab; ?></td>
                        <td>
                            <a  data-toggle="modal" data-target="#ubah-data<?php echo $ph->id_perusahaan ?>" class="btn btn-info"><i class="fa fa-pen"></i></a>
                            <a href="<?= base_url('index.php/DashboardAdmin/perusahaandelete/') . $ph->id_perusahaan; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                
                </tbody>
            </table>
        </div>
    </div>
    
</div>

</div>
<!-- /.container-fluid -->
<!-- Modal Tambah -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
<!-- <h4 class="modal-title">Tambah Data</h4> -->
</div>
<?php echo form_open('DashboardAdmin/perusahaanadd'); ?>
<div class="modal-body">
                        
              
<div class="form-group ">
    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama Perusahaan" name="nama"/> 
</div>
<div class="form-group ">
    <input type="text" class="form-control form-control-user" id="exampleInputNIP" placeholder="Jumlah Diterima" name="qty"/>
</div>                     
<div class="form-group ">
    <input type="text" class="form-control form-control-user" id="exampleInputNumber" placeholder="Nomor Telephone" name="telpon"/>
</div>
<div class="form-group ">
    <label>Alamat</label>
    <textarea class="form-control" name="alamat"></textarea>                    
</div> 
  <div class="form-group ">
    <input type="text" class="form-control form-control-user" id="exampleInputNIP" placeholder="Penanggung Jawab" name="penanggung_jawab"/>
</div> 

                        
<input type="submit"  class="btn btn-primary btn-user btn-block" name="submit" value="Tambah Data" id="submit"/>

<button type="button" class="btn btn-danger btn-user btn-block" data-dismiss="modal">Batal</button>

                        
<hr>
</div>
                    
<?php echo form_close(); ?>
</div>
</div>
</div>
</div>
<!-- END Modal Tambah -->

<?php foreach($perusahaan as $ph){ ?>
<!-- Modal Tambah -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ubah-data<?php echo $ph->id_perusahaan ?>" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
<!-- <h4 class="modal-title">Tambah Data</h4> -->
</div>
<?php echo form_open('DashboardAdmin/perusahaanedit/'.$ph->id_perusahaan); ?>
<div class="modal-body">
                        
              
<div class="form-group ">
    <input type="text" class="form-control form-control-user" id="exampleFirstName" value="<?= $ph->nama ?>" name="nama"/> 
</div>
<div class="form-group ">
    <input type="text" class="form-control form-control-user" id="exampleInputNIP" value="<?= $ph->qty ?>" name="qty"/>
</div>                     
<div class="form-group ">
    <input type="text" class="form-control form-control-user" id="exampleInputNumber" value="<?= $ph->telpon ?>" name="telpon"/>
</div>
<div class="form-group ">
    <label>Alamat</label>
    <textarea class="form-control" name="alamat"><?= $ph->alamat ?></textarea>                    
</div> 
  <div class="form-group ">
    <input type="text" class="form-control form-control-user" id="exampleInputNIP" value="<?= $ph->penanggung_jawab ?>" name="penanggung_jawab"/>
</div> 

                        
<input type="submit"  class="btn btn-primary btn-user btn-block" name="submit" value="Tambah Data" id="submit"/>

<button type="button" class="btn btn-danger btn-user btn-block" data-dismiss="modal">Batal</button>

                        
<hr>
</div>
                    
<?php echo form_close(); ?>
</div>
</div>
</div>
<?php } ?>
<!-- END Modal Tambah -->