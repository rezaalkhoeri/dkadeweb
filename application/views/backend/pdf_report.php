<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> DKADE PRODUCTION - REPORT </title>
</head>

<body style="font-size:12px">
	<table width="750" border="0" cellspacing="10" align="center">
		<tr>
			<td colspan="3">
				<table width="100%" border="0" cellspacing="5" cellpadding="0">
					<tr>
						<td width="100%" align="center">
							<h2> DKADE PRODUCTION</h2> <span> LAPORAN PESANAN TARIAN VIA WEBSITE</span>
                            <br />
                            <br />
                            <hr>
                        </td>
                    </tr>
				</table>
            </td>
        </tr>
        <tr>
			<td colspan="3">
				<table width="100%" border="0" cellspacing="5" cellpadding="0">
					<tr>
                        <td width="10%"> Dari Tanggal </td>
                        <td width="10%"> : </td>
                        <td> <?php echo $getFilter['dari']; ?> </td>
                    </tr>
                    <tr>
                        <td width="10%"> Sampai Tanggal </td>
                        <td width="10%"> : </td>
                        <td> <?php echo $getFilter['sampai']; ?> </td>
                    </tr>
                    <tr>
                        <td width="10%"> Status </td>
                        <td width="10%"> : </td>
                        <td> 
                            <?php if($getFilter['status'] =='L') { ?>
                                LUNAS
                            <?php } else if($getFilter['status'] =='B') { ?>
                                BELUM LUNAS
                            <?php } else { ?>
                                CANCEL
                            <?php }?>                    
                        </td>
                    </tr>
				</table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <table width="100%" cellpadding="0" cellspacing="0" border="1" align="center">
                    <tr>
                        <th> NO INVOICE </th>
                        <th> ATAS NAMA </th>
                        <th> NOMOR HP </th>
                        <th> EMAIL </th>
                        <th> ALAMAT </th>
                        <th> NAMA TARI </th>
                        <th> HARGA </th>
                        <th> TANGGAL PENTAS </th>
                        <th> TANGGAL PEMESANAN </th>
                        <th> BATAS BAYAR </th>
                        <th> TANGGAL BAYAR </th>
                        <th> STATUS </th>
                    </tr>
                    <?php foreach($getReport as $row){ ?>
                    <tr align="center">
                        <td> <?php echo $row->invoice; ?> </td>
                        <td> <?php echo $row->namaPemesan; ?> </td>
                        <td> <?php echo $row->notelp; ?> </td>
                        <td> <?php echo $row->email; ?> </td>
                        <td> <?php echo $row->alamat; ?> </td>
                        <td> <?php echo $row->nama_tari; ?> </td>
                        <td> <?php echo $row->harga; ?> </td>
                        <td> <?php echo $row->tanggalTampil; ?> </td>
                        <td> <?php echo $row->createdDate; ?> </td>
                        <td> <?php echo $row->batasBayar; ?> </td>
                        <td> <?php echo $row->tanggalTransfer; ?> </td>
                        <td> 
                            <?php 
                                $dateNow = date_create(date("Y-m-d"));
                                $batasBayar = date_create($row->batasBayar);
                                $diff = date_diff($dateNow,$batasBayar);
                            ?>

                                <?php if($row->status_bayar =='L') { ?>
                                    <label class="label label-success">LUNAS</label>
                                <?php } else if($row->status_bayar =='S') { ?>
                                    <label class="label label-warning">SELESAI</label>
                                <?php } else { ?>
                                    <?php if($diff->invert == 0){ ?>
                                    <?php if($row->status_bayar =='B') { ?>
                                            <label class="label label-warning">BELUM LUNAS</label>
                                    <?php } else { ?>
                                            <label class="label label-danger">CANCEL</label>
                                    <?php } ?>
                                    <?php } else {?>
                                    <label class="label label-default">KADALUARSA</label>
                                    <?php } ?>
                                <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </td>
        </tr>
	</table>
</body>

</html>