<div class="cc" style="background-color: #E3DEDE;">
	<!-- <div class="head" style="margin-left: 90%"><button type="button" class="btn btn-danger keluar"><span class="fa fa-fw fa-close" ></span>  CLOSE</button></div> -->
	<div class="posisi">
				<ul class="nav nav-tabs">
					<li role="presentation" class="active"><input type="button" name="spr_btn_input" class="btn btn-danger" id="spr_btn_input" value="Input Supir"></li>
					<li role="presentation"><input type="button" name="spr_btn_select" class="btn btn-primary" id="spr_btn_select" value="Data Supir" ></li>
					  
				</ul>
			<div id="spr_divisi" style="margin-left: 1%;margin-bottom: 1%;">
				<h1><p class="text-center"><b>Master Supir</b></p></h1><hr />
				<form id="spr_form">
					<input type="text" name="spr_id" id="spr_id" placeholder="spr_id" hidden="true">
				 	<!-- Nama user -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Nama Supir</p></label>
					    <div class="col-sm-7">
					    	
					      <input type="text" name="spr_nama" class="form-control" id="spr_nama" placeholder="Nama Supir" required="required" maxlength="20">
					    </div>
				  	</div>
					<!-- jenis kelamin -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Jenis Kelamin</p></label>
					    <div class="col-sm-7">
					    	<input type="radio" name="spr_jk" value="Laki-Laki" id="spr_jklk"> Laki-Laki <input type="radio" name="spr_jk" value="Perempuan" id="spr_jkpr"> Perempuan
					    </div>
					</div>
				  	<!-- tempat tanggal lahir -->
				  	<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Tempat Tanggal Lahir</p></label>
					    <div class="col-sm-3">
					    	<input type="text" class="form-control" name="spr_tempat_lahir" id="spr_tempat_lahir" placeholder="Tempat Lahir" maxlength="20" required>
					    </div>
					     <div class="col-sm-4">
					    	<input type="date" class="form-control" id="spr_tgl_lahir" name="spr_tgl_lahir" placeholder="Tanggal Lahir" required>
					    </div>
					</div>
					<!-- user ALAMAT -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Alamat</p></label>
					    <div class="col-sm-7">
					    	<textarea name="spr_alamat" class="form-control" id="spr_alamat" placeholder="Alamat Supir" required="required"  cols="30" rows="6" maxlength="50"></textarea>
					    </div>
					</div>
					<!-- user email-->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Email</p></label>
					    <div class="col-sm-7">
					    	<input type="email" name="spr_email" id="spr_email" class="spr_email form-control" placeholder="example@gmail.com" maxlength="30" required>
					    </div>
					</div>
					<!-- user telepon-->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">No Telepon</p></label>
					    <div class="col-sm-7">
					    	<input type="text" name="spr_tlp" id="spr_tlp" class="spr_tlp form-control" maxlength="13" placeholder="08999385257" required onkeyup="spr_valid_angka(event)">
					    </div>
					</div>
					<!-- tombol save -->
					<div class="row">
					     <div class="col-md-7 offset-md-3"> <button type="button" id="spr_simpan" class="btn btn-md btn-primary btn-block"><span class="fa fa-sw fa-save" ></span> Save</button></div>
					</div>
				</form>	
			</div>

		<div id="spr_view" style="margin-left: 1%;margin-bottom: 1%;margin-right: 1%;"></div>

</div>
</div>

