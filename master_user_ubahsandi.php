<div class="cc" id="usr_ubah_divisi" style="background-color: #E3DEDE;">
	<!-- <div class="head" style="margin-left: 90%"><button type="button" class="btn btn-danger keluar"><span class="fa fa-fw fa-close" ></span>  CLOSE</button></div> -->
	<div class="posisi">
			<div id="usr_ubah_divisi2" style="margin-left: 1%;margin-bottom: 1%;">
				<h1><p class="text-center"><b>Ubah Kata Sandi</b></p></h1><hr />
				<form id="usr_ubah_sandi_form">
					<input type="text" value="<?php echo $_SESSION['sess_usr_id']; ?>" name="usr_ubah_pass_id" id="usr_ubah_pass_id" hidden="true">
					<!-- Password awal-->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Password Awal</p></label>
					    <div class="col-sm-7 input-group mb-3">
					    	<input type="password" name="usr_ubah_pass_awal" id="usr_ubah_pass_awal" class="usr_ubah_pass_awal form-control" maxlength="6" aria-describedby="basic-addon1" required>
					    	<div class="input-group-append">
					    		<span class="true_pass_awal input-group-text fa fa-lg fa-check" id="basic-addon1" style="color:green;display: none;"></span>
						    	<span class="false_pass_awal input-group-text fa fa-lg fa-times" id="basic-addon1" style="color: red;"></span>
						  	</div>
					    </div>
					</div>
					<!-- Password-->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Password Ganti</p></label>
					    <div class="col-sm-7 input-group mb-3">
					    	<input type="password" name="usr_ubah_pass_ganti" id="usr_ubah_pass_ganti" class="usr_ubah_pass_ganti form-control" maxlength="6" aria-describedby="basic-addon1" required>
					    	<div class="input-group-append">
					    		<span class="true_pass_ganti input-group-text fa fa-lg fa-check" id="basic-addon1" style="color:green;display: none;"></span>
						    	<span class="false_pass_ganti input-group-text fa fa-lg fa-times" id="basic-addon1" style="color: red;"></span>
						  	</div>
					    </div>
					</div>
					<!-- konfirmasi Password-->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Konfirmasi Password</p></label>
					    <div class="col-sm-7 input-group mb-3">
					    	<input type="password" name="usr_ubah_konfir" id="usr_ubah_konfir" class="usr_ubah_konfir form-control" maxlength="6" aria-describedby="basic-addon2"  required>
					    	
					    	<div class="input-group-append">
					    		<span class="true_ubah_konfir input-group-text fa fa-lg fa-check" id="basic-addon1" style="color:green;display: none;"></span>
						    	<span class="false_ubah_konfir input-group-text fa fa-lg fa-times" id="basic-addon2" style="color: red;"></span>
						  	</div>

					    </div>
					    <span class="warning_max" style="display:none;color: red;">Max 6 Karakter</span>
					</div>
					<!-- tombol save -->
					<div class="row">
					     <div class="col-md-7 offset-md-3"> <button type="button" id="usr_ubah_pass_simpan" class="btn btn-md btn-primary btn-block"><span class="fa fa-sw fa-save" ></span> Save</button></div>
					</div>
				</form>	
			</div>

		<div id="usr_view" style="margin-left: 1%;margin-bottom: 1%;margin-right: 1%;"></div>

</div>
</div>