<!--FORM  LAPORAN servis -->
			<div id="form_lpr_svs" >
				<h1><p class="text-center"><b>Laporan Servis</b></p></h1><hr />
				<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" target="_blank">
				
					<div class="form-group row">
						<label for="inputPassword3" class="col-sm-12 col-md-3 col-lg-3 control-label"><p class="text-left">No Faktur Servis</p></label>
							<div class="col-sm-4">
							      <input type="text" name="lap_svs_fak" class="form-control tg" id="lap_svs_fak" placeholder="No faktur Servis" style="text-transform: uppercase;" maxlength="20" autocomplete="off">
						   	</div>
					</div>

					<div class="form-group row">
						<label for="inputPassword3" class="col-sm-12 col-md-3 col-lg-3 control-label"><p class="text-left">No Polisi</p></label>
							<div class="col-sm-4">
							      <input type="text" name="lap_svs_mbl" class="form-control tg" id="lap_svs_mbl" placeholder="No Polisi" maxlength="20" autocomplete="off">

							      <input type="text" id="lap_svs_mbl_id" name="lap_svs_mbl_id" placeholder="id mobil" hidden="true">
					     		 <div class="pop_cari" id="lap_svs_mbl_cari"	></div>
						   	</div>
					</div>

					<div class="form-group row">
						<label for="inputPassword3" class="col-sm-12 col-md-3 col-lg-3 control-label"><p class="text-left">Kategori Barang</p></label>
							<div class="col-sm-4">
							      <input type="text" name="lap_svs_ktg" class="form-control tg" id="lap_svs_ktg" placeholder="Nama Kategori" maxlength="20" autocomplete="off">

							      <input type="text" id="lap_svs_ktg_id" name="lap_svs_ktg_id" placeholder="id katergori" hidden="true">
					     		 <div class="pop_cari" id="lap_svs_ktg_cari"	></div>
						   	</div>
					</div>

					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-12 col-md-3 col-lg-3 control-label"><p class="text-left">TanggaL Awal Servis</p></label>
					    <div class="col-sm-4">
					      <input type="date" name="lap_tgl_awal_svs" class="form-control" id="lap_tgl_awal_svs" placeholder="Tanggal Awal Pemsvsan" >
					    </div>
					</div>

					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-12 col-md-3 col-lg-3 control-label"><p class="text-left">TanggaL Akhir Servis</p></label>
					    <div class="col-sm-4">
					      <input type="date" name="lap_tgl_akhir_svs" class="form-control" id="lap_tgl_akhir_svs" placeholder="Tanggal Akhir Servis" >
					    </div>
					</div>

					  <div class="form-group row">
					    <div class="col-sm-offset-2 col-sm-12">
					      <button type="button" id="lap_btn_svs" class="btn btn-md btn-primary" ><span class="fa fa-sw fa-print"></span> print</button>
					    </div>
					  </div>

				</form>	
			</div><!-- end fromlaporan pemsvsan -->