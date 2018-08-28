<style>
	.lebar{
		width: 15%;
	}
	.colom{
		border: 1px solid black;
		/* width: 12%; */
	}
	.tbl{
		width: 100% !important;
	}
</style>
<div class="cc" style="background-color: #E3DEDE;">
	<div class="posisi">
			<div id="klm_divisi" style="margin-left: 1%;margin-bottom: 1%;">
				<h1><p class="text-center"><b>Transaksi Klaim Bon</b></p></h1>	<br>
				<b><?php date_default_timezone_set("asia/jakarta"); echo date('d-M-Y'); ?></b>
				<hr />
				<form id="klm_form">
						<!-- Nama user -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-2 control-label"><p class="text-left font-weight-normal">ID Klaim</p></label>
					    <div class="col-sm-3">
					      <input type="text" name="klm_id" class="form-control" id="klm_id" placeholder="Id Klaim" required="required" maxlength="20" readonly="true">
					    </div>
				  	</div>
				 	<!-- Nama user -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-2 control-label"><p class="text-left font-weight-normal">Nama User</p></label>
					    <div class="col-sm-3">
					    	
					      <input type="text" name="klm_usr_nama" class="form-control" id="klm_usr_nama" placeholder="Nama User" required="required" maxlength="15" value="<?php echo $_SESSION['sess_usr_nama']; ?>" readonly="true" >
					      <input type="text" name="klm_usr_id" name="klm_usr_id" id="klm_usr_id" value="<?php echo $_SESSION['sess_usr_id']; ?>" hidden="true">
					    </div>
				  	</div>
				  		
					<!--detail pembelian -->
					<div class="form-row">

						<!-- divisi barang -->
						<div class="col-md-3">
							<!-- textbox barang -->
					      	<input type="text" name="klm_dt_nopol" class="form-control" id="klm_dt_nopol" placeholder="Nomor Polisi" required="required" autocomplete="off">
					      	<!-- divisi cari -->
							<div class="pop_cari" id="klm_nopol_cari"	></div>
							<!-- textbox id barang -->
					      	<input type="text" name="klm_dt_nopol_id" class="form-control" id="klm_dt_nopol_id" placeholder="ID Barang" required="required" hidden="true">
						</div>

						<!-- divisi satuan -->
						<div class="col-md-3">
							<input type="date" name="klm_dt_tgl" class="form-control" id="klm_dt_tgl" placeholder="Tanggal Bon" required="required">
						</div>

						<!-- divisi jumlah pakai -->
						<div class="col-md-3">
							<!-- textbx jumlah beli -->
					     	<input type="text" name="klm_dt_harga" class="form-control nominal" id="klm_dt_harga" placeholder="Nominal Klaim" required="required" maxlength="11" onkeyup="klm_valid_angka_nominal(event)">
						</div>

						<!-- divisi keterangan servis -->
					    <div class="col-md-3">
					    		<!-- <button class="btn btn-primary btn-sm">Beli</button> -->
								<input type="text" name="klm_dt_ket" class="form-control" id="klm_dt_ket" placeholder="keterangan" required="required" maxlength="50">
					    </div>
				  	</div>
				</form>	
			</div>

		<div id="klm_view" style="margin-left: 1%;margin-bottom: 1%;margin-right: 1%;display: none;width: 99%;"></div>

</div>
</div>

