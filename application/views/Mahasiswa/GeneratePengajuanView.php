<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>Create PDF from View in CodeIgniter Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style> 
        
        td{vertical-align:top;}
        li{margin:0;}
    </style>
</head>
<body>
<h1 style="text-align: center;">Lembar Pengesahan</h1>
<p style="text-indent: 12px;"> Yang bertanda tangan di bawah ini menyetujui rencana kegiatan yang akan dilaksanakan oleh mahasiswa 
    Politeknik Negeri Malang, sebagaimana tersebut di bawah ini: </p>
<table class="table table-striped table-hover" style="width:100%;" id="tabeldata">
    <tbody>
        <tr>
            <td style="width: 20%;">Nama Kegiatan</td>
            <td style="width:5%;">:</td>
            <td style="width: 70%;">Peraktek Kerja Lapangan</td>
        </tr>
        <tr>
            <td>Tempat</td>
            <td style="width:5%;">:</td>
            <td><?php echo $proposal['nama_perusahaan'];?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td style="width:5%;">:</td>
            <td><?php echo $proposal['alamat_perusahaan']; ?></td>
        </tr>
        <tr>
            <td>Pelaksanaan</td>
            <td style="width:5%;">:</td>
            <td style="vertical-align:top;"><?php $split= explode(' ', date("d m Y",strtotime($proposal['tanggal_mulai'])));
        echo $split[0] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[2]; 
         ?> sampai <?php $split= explode(' ', date("d m Y",strtotime($proposal['tanggal_akhir'])));
         echo $split[0] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[2]; 
          ?> atau sesuai dengan kebijakan instansi asalkan 
                tidak melebihi batas maksimal <br>yang ditetapkan pihak kampus (6 Bulan)</td>
        </tr>
        <tr>
            <td>Peserta</td>
            <td style="width:5%;">:</td>
            <td>
                <ol style="padding-left:5px; margin-top:0; list-style-position:inside;">
                    <?php foreach ($anggota as $key => $ang) { ?>
                        <li><?php echo $ang['nim_anggota'] . " - " . $ang['nama_anggota'];?></li>
                    <?php } ?>
                </ol>
            </td>
        </tr>
        <tbody>
</table>
<p style="text-align: center;"> Malang, <?php $split= explode(' ', date("d m Y",strtotime($proposal['created_at'])));
        echo $split[0] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[2]; 
         ?> <br>Mengetahui dan Menyetujui,</p>
<table class="table table-striped table-hover" style="width:100%;">
    <tbody>
        <tr>
            <td style="width:33%;text-align: center;">Ketua Program Studi <br>D4 Teknik Informatika, </td>
            <td style="width:33%;"></td>
            <td style="width:33%;text-align: center;">Koordinator <br>Praktek Kerja Lapangan,</td>
            
        </tr>
        <tr>
            <td style="width:33%;height:90px;"></td>
            <td style="width:33%;height:90px;"></td>
            <td style="width:33%;height:90px;"></td>
        </tr>
        <tr style="margin-bottom:-5px;">
            <td style="width:33%;"><p style="text-align:center;margin-bottom:12px;"><span style="border-bottom:1px solid black;text-align:center;width:100%;">Imam Fahrur Rozi, S.T., M.T.</span></p></td>
            <td style="width:33%;"></td>
            <td style="width:33%;"><p style="text-align:center;margin-bottom:12px;"><span style="border-bottom:1px solid black;text-align:center;width:100%;">Atiqah Nurul Asri, S.Pd., M.Pd.</span></p></td>
        </tr>
        <tr>
            <td style="width:33%;text-align: center;">NIP. 198406102008121004</td>
            <td style="width:33%;"></td>
            <td style="width:33%;text-align: center;">NIP. 197606252005012001</td>
        </tr>
        <tbody>
</table>
<p style="text-align: center;margin-bottom:90px;"> Ketua Jurusan <br>Teknologi Informasi,</p>
<p style="text-align: center;margin-bottom:-12px;"> <span style="border-bottom:1px solid black;text-align:center;width:100%;">Rudy Ariyanto, S.T., M.Cs</span></p>
<p style="text-align: center;"> NIP.19711101999031002</p>

</body>
</html>