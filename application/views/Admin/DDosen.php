<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Diri Dosen Pembimbing</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Dosen</h6>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="form-group text-right">
                    <a data-toggle="modal" data-target="#tambah-data" class="btn btn-primary">Tambah Data Dosen</a>
                </div>
                <?=$this->session->flashdata('notif')?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <!-- <th>Password</th> -->
                                <th>Nama Dosen</th>
                                <th>NIP</th>
                                <th>Nomor Telpon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach ($dosen as $dt){ ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $dt->email; ?></td>
                            <!-- <td><?php echo $dt->password; ?></td> -->
                            <td><?php echo $dt->nama; ?></td>
                            <td><?php echo $dt->nip; ?></td>
                            <td><?php echo $dt->nomortelpon; ?></td>
                            <td>
                                <a data-toggle="modal" data-target="#ubah-data<?php echo $dt->id_users ?>" class="btn btn-info">Ubah</a>
                                <a href="<?= base_url('index.php/DashboardAdmin/dosendelete/') . $dt->id_users; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                 <h4 class="modal-title">Tambah Data</h4>
             </div>
             <?php echo form_open('DashboardAdmin/dosendadd'); ?>
               <div class="modal-body">
                                            
                                  
                    <div class="form-group ">
                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama Dosen" name="nama_dsn"/> 
                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control form-control-user" id="exampleInputNIP" placeholder="NIP" name="nip"/>
                    </div>
                    <div class="form-group ">
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" name="email"/>
                    </div>
                    <div class="form-group ">  
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password"/>   
                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control form-control-user" id="exampleInputNumber" placeholder="Nomor Ponsel" name="nomordsn"/>
                    </div>
                                            
                    <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Tambah Data" id="submit"/>
                    <input type="submit" class="btn btn-warning btn-user btn-block" name="submit" value="Batal" id="submit"/>

                                            
                    <hr>
                </div>
                                        
            <?php echo form_close(); ?>
            </div>
        </div>
   
</div>
<!-- END Modal Tambah -->

<?php foreach($dosen as $dt){ ?>
<!-- Modal Ubah-->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ubah-data<?php echo $dt->id_users ?>" class="modal fade">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                 <h4 class="modal-title">Tambah Data</h4>
             </div>
             <?php echo form_open('DashboardAdmin/dosenedit/'. $dt->id_users); ?>
                <div class="modal-body">
                                                         
                    <div class="form-group ">
                        <input type="text" class="form-control form-control-user" id="exampleFirstName" value="<?= $dt->nama ?>" name="nama_dsn"/> 
                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control form-control-user" id="exampleInputNIP" value="<?= $dt->nip ?>" name="nip"/>
                    </div>
                    <div class="form-group ">
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" value="<?= $dt->email ?>" name="email"/>
                    </div>
                    <div class="form-group ">  
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" value="<?= $dt->password ?>" name="password"/>   
                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control form-control-user" id="exampleInputNumber" value="<?= $dt->nomortelpon ?>" name="nomordsn"/>
                    </div>
                                            
                    <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Ubah Data" id="submit"/> 
                    <input type="submit" class="btn btn-warning btn-user btn-block" name="submit" value="Batal" id="submit"/>

                                            
                    <hr>
                </div>
                                        
            <?php echo form_close(); ?>
            
        </div>
    </div>
</div>
<?php } ?>
<!-- END Modal Ubah -->
<!-- /.container-fluid -->


  