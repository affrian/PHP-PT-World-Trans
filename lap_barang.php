<!--FORM  LAPORAN servis -->
			<div id="form_lpr_brg" >
				<h1><p class="text-center"><b>Laporan Persedian Barang</b></p></h1><hr />
				<form class="form-horizontal" action="pro_lap_barang.php" method="GET" enctype="multipart/form-data" target="_blank">
					<div class="form-group row">
						<label for="inputPassword3" class="col-sm-12 col-md-3 col-lg-3 control-label"><p class="text-left">Kategori Serial Barang <span style="color: red">*</span></p></label>
							<div class="col-sm-5">
							      <input type="radio" name="lap_brg_serial" value="serial">Serial Number <input type="radio" name="lap_brg_serial"  value="non-serial">Tanpa Serial Number
						   	</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword3" class="col-sm-12 col-md-3 col-lg-3 control-label"><p class="text-left">Kategori Barang</p></label>
							<div class="col-sm-4">
							      <input type="text" name="lap_brg_ktg" class="form-control tg" id="lap_brg_ktg" placeholder=" Nama Kategori" maxlength="20" autocomplete="off">

							      <input type="text" id="lap_brg_ktg_id" name="lap_brg_ktg_id" placeholder="id katergori" hidden="true">
					     		 <div class="pop_cari" id="lap_brg_ktg_cari"></div>
						   	</div>
					</div>

					<div class="form-group row">
						<label for="inputPassword3" class="col-sm-12 col-md-3 col-lg-3 control-label"><p class="text-left">Nama Barang</p></label>
							<div class="col-sm-4">
							      <input type="text" name="lap_brg" class="form-control tg" id="lap_brg" placeholder=" Nama Barang" maxlength="20" autocomplete="off">

							      <input type="text" id="lap_brg_id" name="lap_brg_id" placeholder="id Barang" hidden="true">
					     		 <div class="pop_cari" id="lap_brg_cari"	></div>
						   	</div>
					</div>

					  <div class="form-group row">
					    <div class="col-sm-offset-2 col-sm-12">
					      <button type="button" id="lap_btn_brg" class="btn btn-md btn-primary" ><span class="fa fa-sw fa-print"></span> print</button>
					    </div>
					  </div>

				</form>	
			</div><!-- end fromlaporan pembrgan -->

			