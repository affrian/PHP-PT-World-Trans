<div class="cc" id="ktg_form" style="background-color: #E3DEDE;">
	<!-- <div class="head" style="margin-left: 90%"><button type="button" class="btn btn-danger keluar"><span class="fa fa-fw fa-close" ></span>  CLOSE</button></div> -->
	<div class="posisi">
				<ul class="nav nav-tabs">
					<li role="presentation" class="active"><input type="button" name="ktg_btn_input" class="btn btn-danger" id="ktg_btn_input" value="Input Kategori"></li>
					<li role="presentation"><input type="button" name="ktg_btn_select" class="btn btn-primary" id="ktg_btn_select" value="Data Kategori" ></li>
					  
				</ul>
			<div id="ktg_divisi" style="margin-left: 1%;margin-bottom: 1%;">
				<h1><p class="text-center"><b>Master Kategori</b></p></h1><hr />
				<form id="ktg_form">
					<input type="text" name="ktg_id" id="ktg_id" placeholder="kategori id" hidden="true">

				 	<!-- Nama aktegori -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Kategori Barang</p></label>
					    <div class="col-sm-7">
					    	
					      <input type="text" name="ktg_nama" class="form-control" id="ktg_nama" placeholder="Nama Kategori" required="required" maxlength="20" autocomplete="off">
					    </div>
				  	</div>
				  	<!-- satuan kategori -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Satuan Barang</p></label>
					    <div class="col-sm-7">
					      <input type="text" name="ktg_satuan" class="form-control" id="ktg_satuan" placeholder="Nama Satuan" required="required" maxlength="20" autocomplete="off">
					      <input type="text" name="ktg_stn_id" id="ktg_stn_id" placeholder="satuan id" hidden="true">
					      <div class="pop_cari" id="ktg_cari"	></div>
					    </div>
				  	</div>
					<!-- tombol save -->
					<div class="row">
					     <div class="col-md-7 offset-md-3"> <button type="button" id="ktg_simpan" class="btn btn-md btn-primary btn-block"><span class="fa fa-sw fa-save" ></span> Save</button></div>
					</div>
				</form>	
			</div>

		<div id="ktg_view" style="margin-left: 1%;margin-bottom: 1%;margin-right: 1%;"></div>

</div>
</div>

