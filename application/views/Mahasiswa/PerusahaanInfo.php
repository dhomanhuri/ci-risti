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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Jumlah Diterima</th>
                        <th>Penanggung Jawab</th>
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
                    </tr>
                    <?php } ?>
                
                </tbody>
            </table>
        </div>
    </div>
    
</div>

</div>