<div class="cc" id="frm-cus" style="background-color: #E3DEDE;">
	<!-- <div class="head" style="margin-left: 90%"><button type="button" class="btn btn-danger keluar"><span class="fa fa-fw fa-close" ></span>  CLOSE</button></div> -->
	<div class="posisi">
				<ul class="nav nav-tabs">
					<li role="presentation" class="active"><input type="button" name="usr_btn_input" class="btn btn-danger" id="usr_btn_input" value="Input User"></li>
					<li role="presentation"><input type="button" name="usr_btn_select" class="btn btn-primary" id="usr_btn_select" value="Data User" ></li>
					  
				</ul>
			<div id="usr_divisi" style="margin-left: 1%;margin-bottom: 1%;">
				<h1><p class="text-center"><b>Master User</b></p></h1><hr />
				<form id="usr_form">
					<!-- status user -->
					<div class="form-group row">
				    	<label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Status User</p></label>
					    <div class="col-sm-7">
					    	<select name="usr_status" id="usr_status" class="usr_status form-control">
					    		<option value="">===Pilih Status User===</option>
					    		<option value="SBU"> SBU (Strategic Bussines Unit)</option>
					    		<option value="Staff"> Staff</option>
					    		
					    	</select>
					    </div>
				 	</div>
				 	<!-- Nama user -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Nama User</p></label>
					    <div class="col-sm-7">
					    	
					      <input type="text" name="usr_nama" class="form-control" id="usr_nama" placeholder="Nama User" required="required" maxlength="20">
					    </div>
				  	</div>
					<!-- jenis kelamin -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Jenis Kelamin</p></label>
					    <div class="col-sm-7">
					    	<input type="radio" name="usr_jk" value="Laki-Laki"> Laki-Laki <input type="radio" name="usr_jk" value="Perempuan"> Perempuan
					    </div>
					</div>
				  	<!-- tempat tanggal lahir -->
				  	<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Tempat Tanggal Lahir</p></label>
					    <div class="col-sm-3">
					    	<input type="text" class="form-control" name="usr_tempat_lahir" id="usr_tempat_lahir" placeholder="Tempat Lahir" maxlength="20" required>
					    </div>
					     <div class="col-sm-4">
					    	<input type="date" class="form-control" id="usr_tgl_lahir" name="usr_tgl_lahir" placeholder="Tempat Lahir" required>
					    </div>
					</div>
					<!-- user ALAMAT -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Alamat</p></label>
					    <div class="col-sm-7">
					    	<textarea name="usr_alamat" class="form-control" id="usr_alamat" placeholder="Alamat User" required="required"  cols="30" rows="6" maxlength="50"></textarea>
					    </div>
					</div>
					<!-- user email-->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Email</p></label>
					    <div class="col-sm-7">
					    	<input type="email" name="usr_email" id="usr_email" class="usr_email form-control" placeholder="example@gmail.com" maxlength="30" required="true" autocomplete="off">
					    </div>
					</div>
					<!-- user telepon-->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">No Telepon</p></label>
					    <div class="col-sm-7">
					    	<input type="text" name="usr_tlp" id="usr_tlp" class="usr_tlp form-control" maxlength="13" placeholder="08999385257" required onkeyup="usr_valid_angka(event)">
					    </div>
					</div>
					<!-- Password-->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Password</p></label>
					    <div class="col-sm-7 input-group mb-3">
					    	<input type="password" name="usr_pass" id="usr_pass" class="usr_pass form-control" maxlength="6" aria-describedby="basic-addon1" value="123456" required>
					    	<div class="input-group-append">
					    		<span class="true_pass input-group-text fa fa-lg fa-check" id="basic-addon1" style="color:green;"></span>
						    	<span class="false_pass input-group-text fa fa-lg fa-times" id="basic-addon1" style="color: red;display: none;"></span>
						  	</div>
					    </div>
					</div>
					<!-- konfirmasi Password-->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Konfirmasi Password</p></label>
					    <div class="col-sm-7 input-group mb-3">
					    	<input type="password" name="usr_konfir_pass" id="usr_konfir_pass" class="usr_konfir_pass form-control" maxlength="6" aria-describedby="basic-addon2" value="123456" required>
					    	
					    	<div class="input-group-append">
					    		<span class="true_konfir input-group-text fa fa-lg fa-check" id="basic-addon1" style="color:green;"></span>
						    	<span class="false_konfir input-group-text fa fa-lg fa-times" id="basic-addon2" style="color: red;display: none;"></span>
						  	</div>

					    </div>
					    <span class="warning_max" style="display:none;color: red;">Max 6 Karakter</span>
					</div>
					<!-- tombol save -->
					<div class="row">
					     <div class="col-md-7 offset-md-3"> <button type="button" id="usr_simpan" class="btn btn-md btn-primary btn-block"><span class="fa fa-sw fa-save" ></span> Save</button></div>
					</div>
				</form>	
			</div>

		<div id="usr_view" style="margin-left: 1%;margin-bottom: 1%;margin-right: 1%;"></div>

</div>
</div>

