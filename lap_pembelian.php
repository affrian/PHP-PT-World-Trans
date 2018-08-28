<!--FORM  LAPORAN PEMBELIAN -->
			<div id="form_lpr_pbl" >
				<h1><p class="text-center"><b>Laporan Pembelian</b></p></h1><hr />
				<form class="form-horizontal" action="pro_lap_pembelian.php" method="POST" enctype="multipart/form-data" target="_blank">

				<div class="form-group row">
				    <label for="inputPassword3" class="col-sm-12 col-md-3 col-lg-3 control-label"><p class="text-left">No Faktur Pembelian</p></label>
				    <div class="col-sm-4">
				      <input type="text" name="lap_pbl_fak" class="form-control tg" id="lap_pbl_fak" placeholder="No faktur Pembelian" style="text-transform: uppercase;" maxlength="20" autocomplete="off">
				    </div>
				</div>

				<div class="form-group row">
				    <label for="inputPassword3" class="col-sm-12 col-md-3 col-lg-3 control-label"><p class="text-left">TanggaL Awal Pembelian</p></label>
				    <div class="col-sm-4">
				      <input type="date" name="lap_tgl_awal_beli" class="form-control" id="lap_tgl_awal_beli" placeholder="Tanggal Awal Pembelian" >
				    </div>
				</div>

				<div class="form-group row">
				    <label for="inputPassword3" class="col-sm-12 col-md-3 col-lg-3 control-label"><p class="text-left">TanggaL Akhir Pembelian</p></label>
				    <div class="col-sm-4">
				      <input type="date" name="lap_tgl_akhir_beli" class="form-control" id="lap_tgl_akhir_beli" placeholder="Tanggal Akhir Pembelian" >
				    </div>
				</div>

				  <div class="form-group row">
				    <div class="col-sm-offset-2 col-sm-12">
				      <button type="submit" id="lap_btn_pbl" class="btn btn-md btn-primary" target="_blank" ><span class="fa fa-sw fa-print"></span> print</button>
				    </div>
				  </div>

				</form>	
			</div><!-- end fromlaporan pembelian -->