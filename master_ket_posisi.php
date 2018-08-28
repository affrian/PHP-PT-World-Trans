<div class="cc" style="background-color: #E3DEDE;">
	<!-- <div class="head" style="margin-left: 90%"><button type="button" class="btn btn-danger keluar"><span class="fa fa-fw fa-close" ></span>  CLOSE</button></div> -->
	<div class="posisi">
				<ul class="nav nav-tabs">
					<li role="presentation" class="active"><input type="button" name="ketpos_btn_input" class="btn btn-danger" id="ketpos_btn_input" value="Input Keterangan"></li>
					<li role="presentation"><input type="button" name="ketpos_btn_select" class="btn btn-primary" id="ketpos_btn_select" value="Data Keterangan" ></li>
					  
				</ul>
			<div id="ketpos_divisi" style="margin-left: 1%;margin-bottom: 1%;">
				<h1><p class="text-center"><b>Master Keterangan Posisi</b></p></h1><hr />
				<form id="ketpos_form">
					<input type="text" name="ketpos_id" id="ketpos_id" placeholder="ketpos_id" hidden="true">
						<!-- Nama user -->
					<!-- user ALAMAT -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Alamat</p></label>
					    <div class="col-sm-7">
					    	<textarea name="ketpos_nama" class="form-control" id="ketpos_nama" placeholder="Keterangan" required="required"  cols="30" rows="6" maxlength="50"></textarea>
					    </div>
					</div>

					<div class="row">
					     <div class="col-md-7 offset-md-3"> <button type="button" id="ketpos_simpan" class="btn btn-md btn-primary btn-block"><span class="fa fa-sw fa-save" ></span> Save</button></div>
					</div>
				</form>	
			</div>

		<div id="ketpos_view" style="margin-left: 1%;margin-bottom: 1%;margin-right: 1%;"></div>

</div>
</div>

