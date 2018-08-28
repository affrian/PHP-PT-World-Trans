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
			<div id="svc_divisi" style="margin-left: 1%;margin-bottom: 1%;">
				<h1><p class="text-center"><b>Transaksi Servis</b></p></h1>	<br>
				<b><?php date_default_timezone_set("asia/jakarta"); echo date('d-M-Y'); ?></b>
				<hr />
				<form id="svc_form">
						<!-- Nama user -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-2 control-label"><p class="text-left font-weight-normal">ID Servis</p></label>
					    <div class="col-sm-3">
					      <input type="text" name="svc_id" class="form-control" id="svc_id" placeholder="Id Servis" required="required" maxlength="20" readonly="true">
					    </div>
				  	</div>
				 	<!-- Nama user -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-2 control-label"><p class="text-left font-weight-normal">Nama User</p></label>
					    <div class="col-sm-3">
					    	
					      <input type="text" name="svc_usr_nama" class="form-control" id="svc_usr_nama" placeholder="Nama User" required="required" maxlength="15" value="<?php echo $_SESSION['sess_usr_nama']; ?>" readonly="true" >
					      <input type="text" name="svc_usr_id" name="svc_usr_id" id="svc_usr_id" value="<?php echo $_SESSION['sess_usr_id']; ?>" hidden="true" >
					    </div>
				  	</div>
				  		<!--Km showroom -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-2 control-label"><p class="text-left font-weight-normal">No Polisi</p></label>
					    <div class="col-sm-3">
					    	
					      <input type="text" name="svc_mbl_nopol" class="form-control" id="svc_mbl_nopol" placeholder="No. Polisi" required="required" maxlength="11" autocomplete="off" >
					      <input type="text" id="svc_mbl_id" name="svc_mbl_id" placeholder="id mobil" hidden="true" >
					      <div class="pop_cari" id="svc_mbl_cari"	></div>
					    </div>
				  	</div>
				  			  		
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-2 control-label"><p class="text-left font-weight-normal">Mekanik</p></label>
					    <div class="col-sm-3" autocomplete="off">
					    	
					      <input type="text" name="svc_mk_nama" class="form-control" id="svc_mk_nama" placeholder="Nama Mekanik" required="required" maxlength="11" >
					      <input type="text" id="svc_mk_id" name="svc_mk_id" placeholder="mekanik id" hidden="true" >
					      <div class="pop_cari" id="svc_mk_cari"	></div>
					    </div>
				  	</div>
				  	<!--Km showroom -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-2 control-label"><p class="text-left font-weight-normal">KM Servis</p></label>
					    <div class="col-sm-3">
					    	
					      <input type="text" name="svc_km" class="form-control" id="svc_km" placeholder="KM servis" required="required" maxlength="10" onkeyup="svc_valid_angka_km(event)" >
					    </div>
				  	</div>
					
					<!--detail pembelian -->
					<div class="form-row">

						<!-- divisi barang -->
						<div class="col-md-2">
							<!-- textbox barang -->
					      	<input type="text" name="svc_dt_brg_nama" class="form-control" id="svc_dt_brg_nama" placeholder="Nama Barang" required="required" autocomplete="off">
					      	<!-- divisi cari -->
							<div class="pop_cari" id="svc_brg_cari"	></div>
							<!-- textbox id barang -->
					      	<input type="text" name="svc_dt_brg_id" class="lebar" id="svc_dt_brg_id" placeholder="ID Barang" required="required" hidden="true" >
					      	<input type="text" name="svc_dt_brg_stok" class="lebar" id="svc_dt_brg_stok" placeholder="stok Barang" required="required" hidden="true">
						</div>

						<!-- divisi satuan -->
						<div class="col-md-2">
							<input type="text" name="svc_dt_brg_satuan" class="form-control" id="svc_dt_brg_satuan" placeholder="Nama Satuan" required="required">
						</div>

						<!-- divisi serial barang -->
						<div class="col-md-2">
							<!-- textbx serial barang --> 
							<div class="input-group" style="width: 100%">
								<input type="text" name="svc_dt_brg_serial" class="form-control" id="svc_dt_brg_serial" placeholder="Serial Barang" required="required" maxlength="11" aria-describedby="basic-addon1" style="text-transform: uppercase;">
							   	<div class="input-group-append">
							    	<span class="true_serial input-group-text fa fa-xs fa-check" id="basic-addon1" style="color:green;display: none;"></span>
								    <span class="false_serial input-group-text fa fa-xs fa-times" id="basic-addon1" style="color: red;"></span>
								</div>
							</div>
						</div>

						<!-- divisi jumlah pakai -->
						<div class="col-md-2">
							<!-- textbx jumlah beli -->
					     	<input type="text" name="svc_dt_jumlah" class="form-control" id="svc_dt_jumlah" placeholder="Jumlah Pakai" required="required" maxlength="11" onkeyup="svc_valid_angka_jumlah(event)">
						</div>

						<!-- divisi keterangan posisi -->
						<div class="col-md-2">
								<!-- textbox subtotal beli -->
						      	<input type="text" name="svc_ket_posisi" class="form-control" id="svc_ket_posisi" placeholder="Posisi Pakai" required="required" maxlength="11" width="100%" autocomplete="off">
						      	<!-- divisi cari -->
								<div class="pop_cari" id="svc_ket_cari"></div>
								<!-- textbox id barang -->
						      	<input type="text" name="svc_ket_id" class="lebar" id="svc_ket_id" placeholder="ID posisi" required="required" hidden="true">		     	
						</div>

						<!-- divisi keterangan servis -->
					    <div class="col-md-2">
					    		<!-- <button class="btn btn-primary btn-sm">Beli</button> -->
								<input type="text" name="svc_ket" class="form-control" id="svc_ket" placeholder="keterangan" required="required">
					    </div>
				  	</div>
				</form>	
			</div>

		<div id="svc_view" style="margin-left: 1%;margin-bottom: 1%;margin-right: 1%;display: none;width: 99%;"></div>

</div>
</div>

