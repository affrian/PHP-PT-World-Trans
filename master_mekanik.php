<div class="cc" style="background-color: #E3DEDE;">
	<!-- <div class="head" style="margin-left: 90%"><button type="button" class="btn btn-danger keluar"><span class="fa fa-fw fa-close" ></span>  CLOSE</button></div> -->
	<div class="posisi">
				<ul class="nav nav-tabs">
					<li role="presentation" class="active"><input type="button" name="mk_btn_input" class="btn btn-danger" id="mk_btn_input" value="Input Mekanik"></li>
					<li role="presentation"><input type="button" name="mk_btn_select" class="btn btn-primary" id="mk_btn_select" value="Data Mekanik" ></li>
					  
				</ul>
			<div id="mk_divisi" style="margin-left: 1%;margin-bottom: 1%;">
				<h1><p class="text-center"><b>Master Mekanik</b></p></h1><hr />
				<form id="mk_form">
					<input type="text" name="mk_id" id="mk_id" placeholder="mekanik id" hidden="true">
				 	<!-- Nama user -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Nama Mekanik</p></label>
					    <div class="col-sm-7">
					    	
					      <input type="text" name="mk_nama" class="form-control" id="mk_nama" placeholder="Nama Mekanik" required="required" maxlength="20">
					    </div>
				  	</div>
					<!-- jenis kelamin -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Jenis Kelamin</p></label>
					    <div class="col-sm-7">
					    	<input type="radio" name="mk_jk" value="Laki-Laki" class="mk_jk" id="mk_jklk"> Laki-Laki <input type="radio" class="mk_jk" name="mk_jk" value="Perempuan" id="mk_jkpr"> Perempuan
					    </div>
					</div>
				  	<!-- tempat tanggal lahir -->
				  	<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Tempat Tanggal Lahir</p></label>
					    <div class="col-sm-3">
					    	<input type="text" class="form-control" name="mk_tempat_lahir" id="mk_tempat_lahir" placeholder="Tempat Lahir" maxlength="20" required>
					    </div>
					     <div class="col-sm-4">
					    	<input type="date" class="form-control" id="mk_tgl_lahir" name="mk_tgl_lahir" placeholder="Tanggal Lahir" required>
					    </div>
					</div>
					<!-- user ALAMAT -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Alamat</p></label>
					    <div class="col-sm-7">
					    	<textarea name="mk_alamat" class="form-control" id="mk_alamat" placeholder="Alamat Mekanik" required="required"  cols="30" rows="6" maxlength="50"></textarea>
					    </div>
					</div>
					<!-- user email-->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Email</p></label>
					    <div class="col-sm-7">
					    	<input type="email" name="mk_email" id="mk_email" class="mk_email form-control" placeholder="example@gmail.com" maxlength="30" required>
					    </div>
					</div>
					<!-- user telepon-->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">No Telepon</p></label>
					    <div class="col-sm-7">
					    	<input type="text" name="mk_tlp" id="mk_tlp" class="mk_tlp form-control" maxlength="13" placeholder="08999385257" required onkeyup="mk_valid_angka(event)">
					    </div>
					</div>
					<!-- tombol save -->
					<div class="row">
					     <div class="col-md-7 offset-md-3"> <button type="button" id="mk_simpan" class="btn btn-md btn-primary btn-block"><span class="fa fa-sw fa-save" ></span> Save</button></div>
					</div>
				</form>	
			</div>

		<div id="mk_view" style="margin-left: 1%;margin-bottom: 1%;margin-right: 1%;"></div>

</div>
</div>

