<!--FORM  LAPORAN servis -->
			<div id="form_lpr_klm" >
				<h1><p class="text-center"><b>Laporan Klaim Bon</b></p></h1><hr />
				<form class="form-horizontal" action="" method="GET" enctype="multipart/form-data" target="_blank">

					<div class="form-group row">
							<label for="inputPassword3" class="col-sm-12 col-md-3 col-lg-3 control-label"><p class="text-left">No Polisi</p></label>
							<div class="col-sm-4">
							      <input type="text" name="lap_mbl_nama" class="form-control tg" id="lap_mbl_nama" placeholder="No Polisi" maxlength="20" autocomplete="off">

							      <input type="text" id="lap_mbl_id" name="lap_mbl_id" placeholder="id mobil" hidden="true">
					     		 <div class="pop_cari" id="lap_mbl_cari"	></div>
						   	</div>
					</div>
					<div class="form-group row">
							<label for="inputPassword3" class="col-sm-12 col-md-3 col-lg-3 control-label"><p class="text-left">Tanggal Awal Klaim</p></label>
							<div class="col-sm-4">
							      <input type="date" name="lap_tgl_awal_klm" class="form-control tg" id="lap_tgl_awal_klm" placeholder="Tanggal Awal" maxlength="20">
						   	</div>
					</div>
					<div class="form-group row">
							<label for="inputPassword3" class="col-sm-12 col-md-3 col-lg-3 control-label"><p class="text-left">Tanggal Akhir Klaim</p></label>
							<div class="col-sm-4">
							      <input type="date" name="lap_tgl_akhir_klm" class="form-control tg" id="lap_tgl_akhir_klm" placeholder="Tanggal Awal" maxlength="20">
						   	</div>
					</div>


					  <div class="form-group row">
					    <div class="col-sm-offset-2 col-sm-12">
					      <button type="button" id="lap_btn_klm" class="btn btn-md btn-primary" ><span class="fa fa-sw fa-print"></span> print</button>
					    </div>
					  </div>

				</form>	
			</div><!-- end fromlaporan pemklman -->