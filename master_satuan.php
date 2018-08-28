<div class="cc" style="background-color: #E3DEDE;">
	<!-- <div class="head" style="margin-left: 90%"><button type="button" class="btn btn-danger keluar"><span class="fa fa-fw fa-close" ></span>  CLOSE</button></div> -->
	<div class="posisi">
				<ul class="nav nav-tabs">
					<li role="presentation" class="active"><input type="button" name="stn_btn_input" class="btn btn-danger" id="stn_btn_input" value="Input Satuan"></li>
					<li role="presentation"><input type="button" name="stn_btn_select" class="btn btn-primary" id="stn_btn_select" value="Data Satuan" ></li>
					  
				</ul>
			<div id="stn_divisi" style="margin-left: 1%;margin-bottom: 1%;">
				<h1><p class="text-center"> <b>Master Satuan Barang	</b></p></h1><hr />
				<form id="stn_form">
					<input type="text" name="stn_id" id="stn_id" placeholder="satuan id" hidden="true">
				  	<!-- satuan kategori -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Satuan Barang</p></label>
					    <div class="col-sm-7">
					      <input type="text" name="stn_nama" class="form-control" id="stn_nama" placeholder="Nama Satuan" required="required" maxlength="20" autocomplete="off">
					    </div>
				  	</div>
					<!-- tombol save -->
					<div class="row">
					     <div class="col-md-7 offset-md-3"> <button type="button" id="stn_simpan" class="btn btn-md btn-primary btn-block"><span class="fa fa-sw fa-save" ></span> Save</button></div>
					</div>
				</form>	
			</div>

		<div id="stn_view" style="margin-left: 1%;margin-bottom: 1%;margin-right: 1%;"></div>

</div>
</div>

