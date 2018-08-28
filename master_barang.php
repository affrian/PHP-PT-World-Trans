<div class="cc" id="brg_form" style="background-color: #E3DEDE;">
	<!-- <div class="head" style="margin-left: 90%"><button type="button" class="btn btn-danger keluar"><span class="fa fa-fw fa-close" ></span>  CLOSE</button></div> -->
	<div class="posisi">
				<ul class="nav nav-tabs">
					<li role="presentation" class="active"><input type="button" name="brg_btn_input" class="btn btn-danger" id="brg_btn_input" value="Input Barang"></li>
					<li role="presentation"><input type="button" name="brg_btn_select" class="btn btn-primary" id="brg_btn_select" value="Data Barang" ></li>
					  
				</ul>
			<div id="brg_divisi" style="margin-left: 1%;margin-bottom: 1%;">
				<h1><p class="text-center"><b>Master Barang</b></p></h1><hr />
				<form id="brg_form">
					<input type="text" name="brg_id" id="brg_id" placeholder="id barang" hidden="true">

				 	<!-- Nama aktegori -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Kategori Barang</p></label>
					    <div class="col-sm-7">
					    	
					      <input type="text" name="brg_kategori" class="form-control" id="brg_kategori" placeholder="Nama Kategori" required="required" maxlength="20">
					      <input type="text" name="brg_ktg_id" id="brg_ktg_id" placeholder="id kategori" hidden="true">
					      <div class="pop_cari" id="brg_cari"	></div>
					    </div>
				  	</div>
				  	<!-- satuan kategori -->
					<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-3 control-label"><p class="text-left font-weight-normal">Nama Barang</p></label>
					    <div class="col-sm-7">
					      <input type="text" name="brg_nama" class="form-control" id="brg_nama" placeholder="Nama Barang" required="required" maxlength="20">
					    </div>
				  	</div>
					<!-- tombol save -->
					<div class="row">
					     <div class="col-md-7 offset-md-3"> <button type="button" id="brg_simpan" class="btn btn-md btn-primary btn-block"><span class="fa fa-sw fa-save" ></span> Save</button></div>
					</div>
				</form>	
			</div>

		<div id="brg_view" style="margin-left: 1%;margin-bottom: 1%;margin-right: 1%;"></div>

</div>
</div>

