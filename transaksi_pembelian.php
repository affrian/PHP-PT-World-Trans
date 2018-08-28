<style>
	.lebar{
		width: 16%;
	}
	.colom{
		border: 1px solid black;
		/* width: 12%; */
	}
</style>
<div class="cc" style="background-color: #E3DEDE;">
	<!-- <div class="head" style="margin-left: 90%"><button type="button" class="btn btn-danger keluar"><span class="fa fa-fw fa-close" ></span>  CLOSE</button></div> -->
	<div class="posisi">
				<!-- <ul class="nav nav-tabs">
					<li role="presentation" class="active"><input type="button" name="pbl_btn_input" class="btn btn-danger" id="pbl_btn_input" value="Input mobil"></li>
					<li role="presentation"><input type="button" name="pbl_btn_select" class="btn btn-primary" id="pbl_btn_select" value="Data mobil" ></li>
					  
				</ul> -->
			<div id="pbl_divisi" style="margin-left: 1%;margin-bottom: 1%;">
				<h1><p class="text-center"><b>Transaksi Pembelian</b></p></h1>	<br>
				<b><?php date_default_timezone_set("asia/jakarta"); echo date('d-M-Y'); ?></b>
				<hr />
				<form id="pbl_form">
						<!-- Nama user -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-2 control-label"><p class="text-left font-weight-normal">ID Pembelian</p></label>
					    <div class="col-sm-3">
					      <input type="text" name="pbl_id" class="form-control" id="pbl_id" placeholder="Id Pembelian" required="required" maxlength="20" readonly="true">
					    </div>
				  	</div>
				 	<!-- Nama user -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-2 control-label"><p class="text-left font-weight-normal">Nama User</p></label>
					    <div class="col-sm-3">
					    	
					      <input type="text" name="pbl_usr_nama" class="form-control" id="pbl_usr_nama" placeholder="Nama User" required="required" maxlength="15" value="<?php echo $_SESSION['sess_usr_nama']; ?>" readonly="true">
					      <input type="text" name="pbl_usr_id" name="pbl_usr_id" id="pbl_usr_id" value="<?php echo $_SESSION['sess_usr_id']; ?>" hidden="true">
					    </div>
				  	</div>
				  		<!--Km showroom -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-2 control-label"><p class="text-left font-weight-normal">Supplier</p></label>
					    <div class="col-sm-3">
					    	
					      <input type="text" name="pbl_spl" class="form-control" id="pbl_spl" placeholder="Nama supplier" required="required" maxlength="11" >
					      <input type="text" id="spl_id" name="spl_id" hidden="true">
					      <div class="pop_cari" id="spl_cari"	></div>
					    </div>
				  	</div>
				  	<!--Km showroom -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-2 control-label"><p class="text-left font-weight-normal">No PO</p></label>
					    <div class="col-sm-3">
					    	
					      <input type="text" name="pbl_po" class="form-control" id="pbl_po" placeholder="No PO" required="required" maxlength="11" >
					    </div>
				  	</div>
					
					<!--detail pembelian -->
					<div class="form-row">
						<div class="col-md-2">
							<!-- textbox barang -->
					      	<input type="text" name="pbl_dt_brg_nama" class="form-control" id="pbl_dt_brg_nama" placeholder="Nama Barang" required="required">
					      	<!-- divisi cari -->
							<div class="pop_cari" id="pbl_brg_cari"	></div>
							<!-- textbox id barang -->
					      	<input type="text" name="pbl_dt_brg_id" class="form-control" id="pbl_dt_brg_id" placeholder="ID Barang" required="required" hidden="true">
						</div>

						<!-- divisi satuan barang -->
						<div class="col-md-2">
							<!-- textbox satuan barang-->
					      	<input type="text" name="pbl_dt_satuan" class="form-control" id="pbl_dt_satuan" placeholder="Satuan Barang" required="required">
						</div>

						<!-- divisi harga barang -->
						<div class="col-md-2">
							<!-- textbox harga barang -->
					    	<input type="text" name="pbl_dt_brg_harga" class="form-control nominal" id="pbl_dt_brg_harga" placeholder="Harga Barang" required="required" maxlength="11" onkeyup="pblharga_valid_angka(event)" >
						</div>

						<!-- divisi serial barang -->
						<div class="col-md-2">							
					    	<!-- textbx serial barang --> 
					      	<input type="text" name="pbl_dt_brg_serial" class="form-control" id="pbl_dt_brg_serial" placeholder="Serial Barang" required="required" maxlength="11" style="text-transform: uppercase;">
						</div>
						<!-- divisi jumlah beli -->
						<div class="col-md-2">
							<!-- textbx jumlah beli -->
					     	<input type="text" name="pbl_dt_jumlah" class="form-control" id="pbl_dt_jumlah" placeholder="Jumlah Beli" required="required" maxlength="11" onkeyup="pbljumbel_valid_angka(event)">
						</div>
					    <div class="col-md-2">   
					     	<!-- textbox subtotal beli -->
					      	<input type="text" name="pbl_dt_subtot" class="form-control nominal" id="pbl_dt_subtot" placeholder="Subtotal" required="required" maxlength="11" >
					    </div>
				  	</div>
				</form>	
			</div>

		<div id="pbl_view" style="margin-left: 1%;margin-bottom: 1%;margin-right: 1%;display: none;">
			<div id="pbl_view2"></div>

			<!-- <button class="btn btn-primary btn-md" id="pbl_selesai">Selesai</button> -->
		</div>

</div>
</div>

