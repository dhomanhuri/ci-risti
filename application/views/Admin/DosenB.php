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
        <div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Pilih Nama Pembimbing</label>
						<select class="form-control selectpicker" name="nama_pembimbing" id="nama_pembimbing" data-live-search="true">
							<!-- <option>-- Pilih --</option> -->
                            <?php foreach ($data_dosen as $key => $dt_dosen) { ?>
                               <option value="<?= $dt_dosen['id_dosen']?>"><?= $dt_dosen['nip'] . " - " . $dt_dosen['nama']  ?> </option>
                            <?php }
                            ?>
						</select>
					</div>
                  
				</div>
			</div>
		</div>
        <div class="table-responsive">
            <table class="table table-bordered" id="tabelData" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Pembimbing</th>
                        <th>Data Perusahaan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

<script type="text/javascript">
	$(document).ready(function(){
        console.log($('#nama_pembimbing').val());
var userDataTable = $('#tabelData').DataTable({
  'processing': true,
  'serverSide': true,
  'serverMethod': 'post',
  //'searching': false, // Remove default Search Control
  'ajax': {
     'url':'<?=base_url()?>index.php/DashboardAdmin/PembimbingList',
     'data': function(data){
        data.searchDosen = $('#nama_pembimbing').val();
     }
  },
  'columns': [
     { data: 'nama_dosen' },
     { data: 'nama_perusahaan' },
     { data : 'detail'}
  ]
});

$('#nama_pembimbing').change(function(){
   userDataTable.draw();
});
$('#nama_pembimbing').keyup(function(){
   userDataTable.draw();
});
});
</script>
