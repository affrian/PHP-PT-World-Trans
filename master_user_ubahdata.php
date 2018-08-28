<div class="cc" id="usr_ubah" style="background-color: #E3DEDE;">
	<!-- <div class="head" style="margin-left: 90%"><button type="button" class="btn btn-danger keluar"><span class="fa fa-fw fa-close" ></span>  CLOSE</button></div> -->
	<div class="posisi">
			<div id="usr_ubah_divisi" style="margin-left: 1%;margin-bottom: 1%;">
				<h1><p class="text-center"><b>Ubah Data Pribadi</b></p></h1><hr />
				<form id="usr_ubah_form">
					<input type="text" value="<?php echo $_SESSION['sess_usr_id']; ?>" id="usr_ubah_id" name="usr_ubah_id" hidden="true">
					<!-- status user -->
					<!-- <div class="form-group row">
				    	<label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Status User</p></label>
					    <div class="col-sm-7">
					    	<select name="usr_ubah_status" id="usr_ubah_status" class="usr_ubah_status form-control">
					    		<option value="<?php echo $_SESSION['sess_usr_status'] ?>"><?php echo $_SESSION['sess_usr_status'] ?></option>
					    		<option value="SBU"> SBU (Strategic Bussines Unit)</option>
					    		<option value="Staff"> Staff</option>
					    		
					    	</select>
					    </div>
				 	</div> -->
				 	<!-- Nama user -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Nama User</p></label>
					    <div class="col-sm-7">
					    	
					      <input type="text" name="usr_ubah_nama" class="form-control" id="usr_ubah_nama" placeholder="Nama User" required="required" maxlength="20"  value="<?php echo $_SESSION['sess_usr_nama'] ?>">
					    </div>
				  	</div>
					<!-- jenis kelamin -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Jenis Kelamin</p></label>
					    <div class="col-sm-7">
					    	<input type="radio" id="lk" name="usr_ubah_jk" value="Laki-Laki"> Laki-Laki <input type="radio" name="usr_ubah_jk" value="Perempuan" id="pr"> Perempuan
					    </div>
					</div>
				  	<!-- tempat tanggal lahir -->
				  	<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Tempat Tanggal Lahir</p></label>
					    <div class="col-sm-3">
					    	<input type="text" class="form-control" name="usr_ubah_tempat_lahir" id="usr_ubah_tempat_lahir" placeholder="Tempat Lahir" maxlength="20" required value="<?php echo $_SESSION['sess_usr_tempat_lahir'] ?>">
					    </div>
					     <div class="col-sm-4">
					    	<input type="date" class="form-control" id="usr_ubah_tgl_lahir" name="usr_ubah_tgl_lahir" placeholder="Tempat Lahir" required value="<?php echo $_SESSION['sess_usr_tgl_lahir'] ?>">
					    </div>
					</div>
					<!-- user ALAMAT -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Alamat</p></label>
					    <div class="col-sm-7">
					    	<textarea name="usr_ubah_alamat" class="form-control" id="usr_ubah_alamat" placeholder="Alamat User" required="required"  cols="30" rows="6" maxlength="50"><?php echo $_SESSION['sess_usr_alamat'] ?></textarea>
					    </div>
					</div>
					<!-- user email-->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Email</p></label>
					    <div class="col-sm-7">
					    	<input type="email" name="usr_ubah_email" id="usr_ubah_email" class="usr_ubah_email form-control" placeholder="example@gmail.com" maxlength="30" required value="<?php echo $_SESSION['sess_usr_email'] ?>">
					    </div>
					</div>
					<!-- user telepon-->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">No Telepon</p></label>
					    <div class="col-sm-7">
					    	<input type="text" name="usr_ubah_tlp" id="usr_ubah_tlp" class="usr_ubah_tlp form-control" maxlength="13" placeholder="08999385257" required value="<?php echo $_SESSION['sess_usr_tlp'] ?>">
					    </div>
					</div>
					<!-- tombol save -->
					<div class="row">
					     <div class="col-md-7 offset-md-3"> <button type="button" id="usr_ubah_simpan" class="btn btn-md btn-primary btn-block"><span class="fa fa-sw fa-save" ></span> Save</button></div>
					</div>
				</form>	
			</div>

		<div id="usr_view" style="margin-left: 1%;margin-bottom: 1%;margin-right: 1%;"></div>

</div>
</div>
<!-- <?php echo $_SESSION['sess_usr_jk']; ?> -->
<script>

	// $(document).ready(function(){
		var status="<?php echo $_SESSION['sess_usr_jk'] ?>";
		console.log(status);
		if(status=="Laki-Laki"){
			 document.getElementById('lk').checked=true;
		}else{
			document.getElementById('pr').checked=true;
		}
	// });
	
</script>