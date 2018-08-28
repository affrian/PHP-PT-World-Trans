<div class="cc" style="background-color: #E3DEDE;">
	<!-- <div class="head" style="margin-left: 90%"><button type="button" class="btn btn-danger keluar"><span class="fa fa-fw fa-close" ></span>  CLOSE</button></div> -->
	<div class="posisi">
				<ul class="nav nav-tabs">
					<li role="presentation" class="active"><input type="button" name="spl_btn_input" class="btn btn-danger" id="spl_btn_input" value="Input Suppllier"></li>
					<li role="presentation"><input type="button" name="spl_btn_select" class="btn btn-primary" id="spl_btn_select" value="Data Supplier" ></li>
					  
				</ul>
			<div id="spl_divisi" style="margin-left: 1%;margin-bottom: 1%;">
				<h1><p class="text-center"><b>Master Supplier</b></p></h1><hr />
				<form id="spl_form">
					<input type="text" name="spl_id" id="spl_id" placeholder="spl_id" hidden="true">
				 	<!-- Nama user -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Nama Supplier</p></label>
					    <div class="col-sm-7">
					    	
					      <input type="text" name="spl_nama" class="form-control" id="spl_nama" placeholder="Nama Supplier" required="required" maxlength="20" autocomplete="off">
					    </div>
				  	</div>
				
					<!-- user ALAMAT -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Alamat Supplier</p></label>
					    <div class="col-sm-7">
					    	<textarea name="spl_alamat" class="form-control" id="spl_alamat" placeholder="Alamat Supplier" required="required"  cols="30" rows="6" maxlength="50"></textarea>
					    </div>
					</div>
					<!-- user telepon-->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">No Telepon</p></label>
					    <div class="col-sm-7">
					    	<input type="text" name="spl_tlp" id="spl_tlp" class="spl_tlp form-control" maxlength="13" placeholder="08999385257" required onkeyup="spl_valid_angka(event)">
					    </div>
					</div>
					<!-- tombol save -->
					<div class="row">
					     <div class="col-md-7 offset-md-3"> <button type="button" id="spl_simpan" class="btn btn-md btn-primary btn-block"><span class="fa fa-sw fa-save" ></span> Save</button></div>
					</div>
				</form>	
			</div>

		<div id="spl_view" style="margin-left: 1%;margin-bottom: 1%;margin-right: 1%;"></div>

</div>
</div>

