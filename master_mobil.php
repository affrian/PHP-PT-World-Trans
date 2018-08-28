<div class="cc" style="background-color: #E3DEDE;">
	<!-- <div class="head" style="margin-left: 90%"><button type="button" class="btn btn-danger keluar"><span class="fa fa-fw fa-close" ></span>  CLOSE</button></div> -->
	<div class="posisi">
				<ul class="nav nav-tabs">
					<li role="presentation" class="active"><input type="button" name="mbl_btn_input" class="btn btn-danger" id="mbl_btn_input" value="Input mobil"></li>
					<li role="presentation"><input type="button" name="mbl_btn_select" class="btn btn-primary" id="mbl_btn_select" value="Data mobil" ></li>
					  
				</ul>
			<div id="mbl_divisi" style="margin-left: 1%;margin-bottom: 1%;">
				<h1><p class="text-center"><b>Master Mobil</b></p></h1><hr />
				<form id="mbl_form">
					<input type="text" name="mbl_id" id="mbl_id" placeholder="mbl_id" hidden="true">
						<!-- Nama user -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Nama Supir</p></label>
					    <div class="col-sm-7">
					    	
					      <input type="text" name="mbl_spr_nama" class="form-control" id="mbl_spr_nama" placeholder="Nama supir" required="required" maxlength="20">
					      <input type="text" name="mbl_spr_id" id="mbl_spr_id" placeholder="mbl_spr_id" hidden="true">
					       <div class="pop_cari" id="mbl_spr_cari"	></div>
					    </div>
				  	</div>
				 	<!-- Nama user -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">No. Polisi</p></label>
					    <div class="col-sm-7">
					    	
					      <input type="text" name="mbl_nopol" class="form-control" id="mbl_nopol" placeholder="No. Polisi" required="required" maxlength="15">
					    </div>
				  	</div>
				  	<!--Km showroom -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">KM Showroom</p></label>
					    <div class="col-sm-7">
					    	
					      <input type="number" name="mbl_km_showroom" class="form-control" id="mbl_km_showroom" placeholder="KM Showroom" required="required" maxlength="11" onkeyup="mbl_valid_angkashowroom(event)">
					    </div>
				  	</div>

				  	<!--Km Awal -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">KM Awal</p></label>
					    <div class="col-sm-7">
					    	
					      <input type="number" name="mbl_km_awal" class="form-control" id="mbl_km_awal" placeholder="KM awal" required="required" maxlength="11" onkeyup="mbl_valid_angkaawal(event)">
					    </div>
				  	</div>
				  		<!--tangal Kedatangan-->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Tanggal Penggunaan</p></label>
					    <div class="col-sm-7">
					    	
					      <input type="date" name="mbl_tanggal" class="form-control" id="mbl_tanggal" placeholder="Nama mobil" required="required" maxlength="15" onkeyup="mbl_valid_angkatanggal(event)">
					    </div>
				  	</div>
					
					<div class="row">
					     <div class="col-md-7 offset-md-3"> <button type="button" id="mbl_simpan" class="btn btn-md btn-primary btn-block"><span class="fa fa-sw fa-save" ></span> Save</button></div>
					</div>
				</form>	
			</div>

		<div id="mbl_view" style="margin-left: 1%;margin-bottom: 1%;margin-right: 1%;"></div>

</div>
</div>

