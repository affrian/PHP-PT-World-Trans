// jquery
$(document).ready(function(){
	// format rupiah
	$('.nominal').divide();
	// faktur pembelian
	pbl_faktur();
	// faktur service
	svc_faktur();
	// faktur kalim
	klm_faktur();
	// pop cari leave
	$(document).click(function(){
		$(".pop_cari").hide('slow');
	});//end pop
	// hide menu menu master user jika bukan status yang diharapkan
		$.ajax({
			url:"pro_cek_status.php",
			success:function(html){
				console.log("sts="+html);
				if(html!="SBU"){
					$("#mn_master_user").hide();
					
				}

			}
		});

	// ====================================================================file master_user.php
	// start save user
	$("#usr_simpan").click(function(){
		var usr_form=$("#usr_form").serialize();
		// alert(usr_form);
		usr_status=$('#usr_status').val();
		usr_jk=$("input[name='usr_jk']:checked").length;
		usr_nama=$("#usr_nama").val();
		usr_tempat_lahir=$("#usr_tempat_lahir").val();
		usr_tgl_lahir=$("#usr_tgl_lahir").val();
		usr_alamat=$("#usr_alamat").val();
		usr_email=$("#usr_email").val();
		usr_tlp=$("#usr_tlp").val();
		usr_pass=$("#usr_pass").val();
		usr_konfir_pass=$("#usr_konfir_pass").val();
		// panjang karakter
		usr_pass_max=$("#usr_pass").val().length;
		usr_konfir_pass_max=$("#usr_konfir_pass").val().length;
	
		if($.trim(usr_status)==""||$.trim(usr_nama)==""||usr_jk<1||$.trim(usr_tempat_lahir)==""||
			$.trim(usr_tgl_lahir)==""||$.trim(usr_alamat)==""||$.trim(usr_email)==""||$.trim(usr_tlp)==""||
			$.trim(usr_pass)==""||$.trim(usr_konfir_pass)==""){

			alert('Data Tidak Boleh Ada Yang Kosong!!');
		}else if(usr_konfir_pass!=usr_pass){
				alert('Password Tidak Sama!!');
				$("#usr_konfir_pass").focus();
		}else if(usr_pass_max<6 || usr_konfir_pass_max<6){
			alert("Passwor Yang Anda Masukan Kurang Dari 6 Karakter!!");
			$("#usr_pass").val("");
			$("#usr_konfir_pass").val("");

		}else{
			$.ajax({
				url:"pro_master_user.php?pro=insert",
				type:"get",
				data:usr_form,
				cache:false,
				success:function(html){
					// alert(html);
					$("#usr_nama").val("");
					$("#usr_tempat_lahir").val("");
					$("#usr_tgl_lahir").val("");
					$("#usr_alamat").val("");
					$("#usr_email").val("");
					$("#usr_tlp").val("");
					$("#usr_pass").val("");
					$("#usr_konfir_pass").val("");
				}
			});
		}
	});// end save
	
	// start keyup password
		$("#usr_pass").keyup(function(){
			max=$(this).val().length;
			// alert(max);
			if(max>=6){
				$(".true_pass").show();
				$(".false_pass").hide();
			}else{
				$(".true_pass").hide();
				$(".false_pass").show();
			}
		});// end key upp password
	
	// start keyup password
		$("#usr_konfir_pass").keyup(function(){
			max=$(this).val().length;
			usr_pass=$("#usr_pass").val();
			usr_konfir_pass=$("#usr_konfir_pass").val();
			// alert(max);
			if(max>=6 && usr_konfir_pass==usr_pass){
				$(".true_konfir").show();
				$(".false_konfir").hide();
			}else{
				$(".true_konfir").hide();
				$(".false_konfir").show();
			}
		});// end key upp password

		// start click ust_btn_select
		$("#usr_btn_select").click(function(){
			$("#usr_divisi").slideUp("slow");
			$("#usr_view").show("slow");
			$("#usr_view").load('pro_master_user.php?pro=select');
		});// endtclick ust_btn_select
	
		// start click ust_btn_input
		$("#usr_btn_input").click(function(){
			$("#usr_divisi").show("slow");
			$("#usr_view").hide("slow");
			// $("#usr_view").load('pro_master_user.php?pro=select');
		});// endtclick ust_btn_select


		 // jika textbox email di enater
       $("#usr_email").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#usr_tlp").focus();
            }
        });//end

        // jika textbox telpn user di enater
       $("#usr_tlp").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#usr_pass").focus();
            }
        });//end


        // jika textbox user pass di enater
       $("#usr_pass").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#usr_konfir_pass").focus();
            }
        });//end

       // jika textbox user pass di enater
      $("#usr_konfir_pass").keyup(function(event) {
      		a=$(this).val();
      		b= $("#usr_pass").val();
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){

            	if(a!=b){
            		alert("Maaf Password Tidak Sama");
            	}else{
            		 $("#usr_simpan").focus();
            	}
                
            	
            }
        });//end

      // jika status di rubah
      $("#usr_status").change(function(event) {
      	 $("#usr_nama").focus();
      });//end

       // jika textbox user nama di enter
        $("#usr_nama").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("input[name=usr_jk]").focus();
            }
        });//end

          // jika radio button user di enter
        $("input[name=usr_jk]").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#usr_tempat_lahir").focus();
            }
        });//end

         // jika tempat lahir di enter
        $("#usr_tempat_lahir").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#usr_tgl_lahir").focus();
            }
        });//end

          // jika tanggal lahir di enter
        $("#usr_tgl_lahir").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#usr_alamat").focus();
            }
        });//end


		// ================================================================FILE master_user_ubahdata.php
		// tombol usr_ubah_simpan
			$("#usr_ubah_simpan").click(function(){
				var usr_ubah_form=$("#usr_ubah_form").serialize();
				// alert(usr_ubah_form);
				// usr_ubah_status=$('#usr_ubah_status').val();
				usr_ubah_jk=$("input[name='usr_ubah_jk']:checked").length;
				usr_ubah_nama=$("#usr_ubah_nama").val();
				usr_ubah_tempat_lahir=$("#usr_ubah_tempat_lahir").val();
				usr_ubah_tgl_lahir=$("#usr_ubah_tgl_lahir").val();
				usr_ubah_alamat=$("#usr_ubah_alamat").val();
				usr_ubah_email=$("#usr_ubah_email").val();
				usr_ubah_tlp=$("#usr_ubah_tlp").val();
				// panjang karakter
			
				if($.trim(usr_ubah_nama)==""||usr_ubah_jk<1||$.trim(usr_ubah_tempat_lahir)==""||
					$.trim(usr_ubah_tgl_lahir)==""||$.trim(usr_ubah_alamat)==""||$.trim(usr_ubah_email)==""||$.trim(usr_ubah_tlp)==""){

					alert('Data Tidak Boleh Ada Yang Kosong!!');
				}else{
					$.ajax({
						url:"pro_master_user.php?pro=update",
						type:"get",
						data:usr_ubah_form,
						cache:false,
						success:function(html){
							alert("Data Telah Dirubah!! Silahkan LogoUt dan Login Kembali untuk Melihat Perubahan Data.");
							// $("#usr_ubah_nama").val("");
							// $("#usr_ubah_tempat_lahir").val("");
							// $("#usr_ubah_tgl_lahir").val("");
							// $("#usr_ubah_alamat").val("");
							// $("#usr_ubah_email").val("");
							// $("#usr_ubah_tlp").val("");
							// $("#usr_ubah_pass").val("");
							// $("#usr_ubah_konfir_pass").val("");
						}
					});
				}
			});// end save
		// =================================================================================fle master_user_ubah_sandi.php
		// keyupd password awal
		$("#usr_ubah_pass_awal").keyup(function(){
			usr_ubah_pass_id=$('#usr_ubah_pass_id').val();
			a=$(this).val();
			$.ajax({
				url:"pro_master_user.php?pro=cek_pass",
				type:"get",
				data:"usr_ubah_pass_id="+usr_ubah_pass_id+"&pass_awal="+a,
				cache:false,
				success:function(html){
					// alert(html);
					a=html.split("|");
					console.log(a[0]);
					if(a[0]=="benar"){
						$(".true_pass_awal").show();
						$(".false_pass_awal").hide();
					}else{
						$(".true_pass_awal").hide();
						$(".false_pass_awal").show();
					}
				}
			});
		});

		// keyup password ganti
		$("#usr_ubah_pass_ganti").keyup(function(){
			a=$(this).val().length;
			if(a>=6){
				$(".true_pass_ganti").show();
				$(".false_pass_ganti").hide();
			}else{
				$(".true_pass_ganti").hide();
				$(".false_pass_ganti").show();
			}

		});
		// konfirmasi password ganti
		$("#usr_ubah_konfir").keyup(function(){
			a=$(this).val().length;
			b=$(this).val();
			c=$("#usr_ubah_pass_ganti").val();
			if(a>=6 && b==c){
				$(".true_ubah_konfir").show();
				$(".false_ubah_konfir").hide();
			}else{
				$(".true_ubah_konfir").hide();
				$(".false_ubah_konfir").show();
			}

		});

		// tombol rubah pass simpan
		$("#usr_ubah_pass_simpan").click(function(){
			a=$("#usr_ubah_pass_awal").val();
			b=$("#usr_ubah_pass_ganti").val();
			c=$("#usr_ubah_konfir").val();
			if($.trim(a)==""||$.trim(b)==""||$.trim(c)==""){
				alert("Tidak Boleh Ada Data Yang Kosong!!");
			}else if(b!=c){
				alert("Password Konfirmasi Tidak Sama!!");
				$("#usr_ubah_pass_ganti").val("");
				$("#usr_ubah_konfir").val("");
				$("#usr_ubah_pass_ganti").focus();

			}else{
				usr_ubah_pass_id=$('#usr_ubah_pass_id').val();
				d=$("#usr_ubah_pass_awal").val();
				$.ajax({
					url:"pro_master_user.php?pro=cek_pass",
					type:"get",
					data:"usr_ubah_pass_id="+usr_ubah_pass_id+"&pass_awal="+d,
					cache:false,
					success:function(html){
						// alert(html);
						a=html.split("|");
						console.log(a[0]);
						if(a[0]!="benar"){
							alert("Maaf Password Awal Tidak Ada!!");
							$("#usr_ubah_pass_awal").val("");
							$("#usr_ubah_pass_awal").focus();
						}else{
							$.ajax({
								url:"pro_master_user.php?pro=update_pass",
								type:"get",
								data:"usr_ubah_konfir="+c+"&usr_ubah_pass_id="+usr_ubah_pass_id,
								cache:false,
								success:function(html2){
									alert("Kata Sandi Berhasil Dirubah!!");
									// 
									$("#usr_ubah_pass_awal").val("");
									$("#usr_ubah_pass_ganti").val("");
									$("#usr_ubah_konfir").val("");
								}
							});
						}
					}
				});
			}

		});
// ============================================================================================file master_satuan.php
	$("#stn_simpan").click(function(event) {
		stn_id=$("#stn_id").val();
		stn_nama=$("#stn_nama").val();
		if($.trim(stn_nama)==""){
			alert("Nama Satuan Harus Di isi!!");
		}else{
			$.ajax({
				url:"pro_master_satuan.php?pro=insert",
				type:"get",
				data:"stn_id="+stn_id+"&stn_nama="+stn_nama,
				cache:false,
				success:function(html){
					// alert(html);
					$("#stn_id").val("");
					$("#stn_nama").val("");
				}
			});
		}
	});

	// start click stn_btn_select
		$("#stn_btn_select").click(function(){
			$("#stn_divisi").slideUp("slow");
			$("#stn_view").show("slow");
			$("#stn_view").load('pro_master_satuan.php?pro=select');
		});// endtclick stn_btn_select

	// start click stn_btn_input
		$("#stn_btn_input").click(function(){
			$("#stn_divisi").show("slow");
			$("#stn_view").hide("slow");
			// $("#usr_view").load('pro_master_user.php?pro=select');
		});// endtclick ust_btn_select

	 // jika textbox user pass di enater
       $("#stn_nama").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#stn_simpan").focus();
            }
        });//end	

// ============================================================================================file master_kategori.php
	// keyup nama satuan
	$("#ktg_satuan").keyup(function(event) {
		a=$("#ktg_satuan").val();
		// console.log(a);
		$.ajax({
			url:"pro_master_kategori.php?pro=cari_satuan",
			type:"get",
			data:"ktg_satuan="+a,
			cache:false,
			success:function(html){
				// alert(html);
				$("#ktg_cari").load("pro_master_kategori.php?pro=cari_satuan&ktg_satuan="+a);
				$("#ktg_cari").show();
			}
		});
	});
	

	// simpan kategori
	$("#ktg_simpan").click(function(event) {
			ktg_id=$("#ktg_id").val();
			ktg_stn_id=$("#ktg_stn_id").val();
			ktg_nama=$("#ktg_nama").val();
			// alert(ktg_id+"/"+ktg_stn_id+"/"+ktg_nama);
			if($.trim(ktg_nama)==""||$.trim(ktg_stn_id)==""){
				alert("Tidak Boleh Ada Data Yang Kosong!!");

			}else{
				$.ajax({
					url:"pro_master_kategori.php?pro=insert",
					type:"get",
					data:"ktg_id="+ktg_id+"&ktg_stn_id="+ktg_stn_id+"&ktg_nama="+ktg_nama,
					cache:false,
					success:function(html){
						// alert(html);
						$("#ktg_id").val("");
						$("#ktg_stn_id").val("");
						$("#ktg_nama").val("");
						$("#ktg_satuan").val("");
					}
				});
			}
	});//end simpan kategori

// start click stn_btn_select
		$("#ktg_btn_select").click(function(){
			$("#ktg_divisi").slideUp("slow");
			$("#ktg_view").show("slow");
			$("#ktg_view").load('pro_master_kategori.php?pro=select');
		});// endtclick stn_btn_select

// start click stn_btn_input
		$("#ktg_btn_input").click(function(){
			$("#ktg_divisi").show("slow");
			$("#ktg_view").hide("slow");
			// $("#usr_view").load('pro_master_user.php?pro=select');
		});// endtclick ust_btn_select

 // jika textbox user pass di enater
       $("#ktg_nama").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#ktg_satuan").focus();
            }
        });//end

// ============================================================================================file master_mekanik.php
// tombol mk_ubah_simpan
			$("#mk_simpan").click(function(){
				var mk_form=$("#mk_form").serialize();
				// alert(mk_form);
				// mk_ubah_status=$('#mk_ubah_status').val();
				mk_nama=$("#mk_nama").val();
				mk_jk=$("input[name='mk_jk']:checked").length;
				mk_tempat_lahir=$("#mk_tempat_lahir").val();
				mk_tgl_lahir=$("#mk_tgl_lahir").val();
				mk_alamat=$("#mk_alamat").val();
				mk_email=$("#mk_email").val();
				mk_tlp=$("#mk_tlp").val();
				// panjang karakter
			
				if($.trim(mk_nama)==""||mk_jk<1||$.trim(mk_tempat_lahir)==""||
					$.trim(mk_tgl_lahir)==""||$.trim(mk_alamat)==""||$.trim(mk_email)==""||$.trim(mk_tlp)==""){

					alert('Data Tidak Boleh Ada Yang Kosong!!');
				}else{
					$.ajax({
						url:"pro_master_mekanik.php?pro=insert",
						type:"get",
						data:mk_form,
						cache:false,
						success:function(html){
							// alert(html);
							$("#mk_id").val("");
							$("#mk_nama").val("");
							$(".mk_jk").prop('checked', false);;
							$("#mk_tempat_lahir").val("");
							$("#mk_tgl_lahir").val("");
							$("#mk_alamat").val("");
							$("#mk_email").val("");
							$("#mk_tlp").val("");
						}
					});
				}
			});// end save

// start click stn_btn_select
		$("#mk_btn_select").click(function(){
			$("#mk_divisi").slideUp("slow");
			$("#mk_view").show("slow");
			$("#mk_view").load('pro_master_mekanik.php?pro=select');
		});// endtclick stn_btn_select

// start click stn_btn_input
		$("#mk_btn_input").click(function(){
			$("#mk_divisi").show("slow");
			$("#mk_view").hide("slow");
			// $("#usr_view").load('pro_master_user.php?pro=select');
		});// endtclick ust_btn_select

// jika nama mekanik di enter
     $("#mk_nama").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("input[name=mk_jk]").focus();
            }
        });//end

     // jika jenis kelamin mekanik di enter
    $("input[name=mk_jk]").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#mk_tempat_lahir").focus();
            }
        });//end

    // jika tempat lahir di enter
    $("#mk_tempat_lahir").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#mk_tgl_lahir").focus();
            }
        });//end

     // jika tanggal lahir di enter
    $("#mk_tgl_lahir").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#mk_alamat").focus();
            }
        });//end


     // jika email lahir di enter
     $("#mk_email").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#mk_tlp").focus();
            }
        });//end

      // jika telpon lahir di enter
     $("#mk_tlp").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#mk_simpan").focus();
            }
        });//end



// ==========================================================================================file master_barang.php
	// keyup nama kategori
	$("#brg_kategori").keyup(function(event) {
		a=$("#brg_kategori").val();
		// console.log(a);
		$.ajax({
			url:"pro_master_barang.php?pro=cari_kategori",
			type:"get",
			data:"brg_kategori="+a,
			cache:false,
			success:function(html){
				// alert(html);
				$("#brg_cari").load("pro_master_barang.php?pro=cari_kategori&brg_kategori="+a);
				$("#brg_cari").show();
			}
		});
	});

// tombol mk_ubah_simpan
			$("#brg_simpan").click(function(){
				var brg_form=$("#brg_form").serialize();
				// alert(brg_form);
				// brg_ubah_status=$('#brg_ubah_status').val();
				brg_id=$("#brg_id").val();

				brg_kategori=$("#brg_kategori").val();
				brg_ktg_id=$("#brg_ktg_id").val();
				brg_nama=$("#brg_nama").val();
				
			
				if($.trim(brg_kategori)==""||$.trim(brg_ktg_id)==""||$.trim(brg_nama)==""){

					alert('Data Tidak Boleh Ada Yang Kosong!!');
				}else{
					$.ajax({
						url:"pro_master_barang.php?pro=insert",
						type:"get",
						data:"brg_id="+brg_id+"&brg_ktg_id="+brg_ktg_id+"&brg_nama="+brg_nama,
						cache:false,
						success:function(html){
							// alert(html);
							$("#brg_id").val("");

							$("#brg_kategori").val("");
							$("#brg_ktg_id").val("");
							$("#brg_nama").val("");
						}
					});
				}
			});// end save
// start click stn_btn_select
		$("#brg_btn_select").click(function(){
			$("#brg_divisi").slideUp("slow");
			$("#brg_view").show("slow");
			$("#brg_view").load('pro_master_barang.php?pro=select');
		});// endtclick stn_btn_select

// start click stn_btn_input
		$("#brg_btn_input").click(function(){
			$("#brg_divisi").show("slow");
			$("#brg_view").hide("slow");
			// $("#usr_view").load('pro_master_user.php?pro=select');
		});// endtclick ust_btn_select

        // jika textbox telpn user di enater
       $("#brg_nama").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#brg_simpan").focus();
            }
        });//end
// ============================================================================================file master_supir.php
// tombol spr_simpan
			$("#spr_simpan").click(function(){
				var spr_form=$("#spr_form").serialize();
				// alert(spr_form);
				// spr_status=$('#spr_status').val();
				spr_id=$("#spr_id").val();
				
				spr_jk=$("input[name='spr_jk']:checked").length;
				spr_nama=$("#spr_nama").val();
				spr_tempat_lahir=$("#spr_tempat_lahir").val();
				spr_tgl_lahir=$("#spr_tgl_lahir").val();
				spr_alamat=$("#spr_alamat").val();
				spr_email=$("#spr_email").val();
				spr_tlp=$("#spr_tlp").val();
				// panjang karakter
			
				if($.trim(spr_nama)==""||spr_jk<1||$.trim(spr_tempat_lahir)==""||
					$.trim(spr_tgl_lahir)==""||$.trim(spr_alamat)==""||$.trim(spr_email)==""||$.trim(spr_tlp)==""){

					alert('Data Tidak Boleh Ada Yang Kosong!!');
				}else{
					$.ajax({
						url:"pro_master_supir.php?pro=insert",
						type:"get",
						data:spr_form,
						cache:false,
						success:function(html){
							// alert(html);
							$("#spr_id").val("");
							$("input[name='spr_jk']").prop('checked',false);
							$("#spr_nama").val("");
							$("#spr_tempat_lahir").val("");
							$("#spr_tgl_lahir").val("");
							$("#spr_alamat").val("");
							$("#spr_email").val("");
							$("#spr_tlp").val("");
						}
					});
				}
			});// end save
// start click spr_btn_select
		$("#spr_btn_select").click(function(){
			$("#spr_divisi").slideUp("slow");
			$("#spr_view").show("slow");
			$("#spr_view").load('pro_master_supir.php?pro=select');
		});// endtclick spr_btn_select

// start click spr_btn_input
		$("#spr_btn_input").click(function(){
			$("#spr_divisi").show("slow");
			$("#spr_view").hide("slow");
			// $("#usr_view").load('pro_master_user.php?pro=select');
		});// endtclick spr_btn_select

  // jika tnama supir di enter
     $("#spr_nama").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("input[name=spr_jk]").focus();
            }
        });//end
 // jika jenis kelamin supir di enter
     $("input[name=spr_jk]").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#spr_tempat_lahir").focus();
            }
        });//end

    // jika tempat lahir supir di enter
     $("#spr_tempat_lahir").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#spr_tgl_lahir").focus();
            }
        });//end

     // jika tempat lahir supir di enter
     $("#spr_tgl_lahir").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#spr_alamat").focus();
            }
        });//end

      // jika tempat lahir supir di enter
     $("#spr_email").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#spr_tlp").focus();
            }
        });//end

      // jika tempat lahir supir di enter
      $("#spr_tlp").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#spr_simpan").focus();
            }
        });//end




// =============================================================================================file master_mobil.php
// keyup nama satuan
	$("#mbl_spr_nama").keyup(function(event) {
		a=$("#mbl_spr_nama").val();
		// console.log(a);
		$.ajax({
			url:"pro_master_mobil.php?pro=cari_supir",
			type:"get",
			data:"mbl_spr_nama="+a,
			cache:false,
			success:function(html){
				// alert(html);
				$("#mbl_spr_cari").load("pro_master_mobil.php?pro=cari_supir&mbl_spr_cari="+a);
				$("#mbl_spr_cari").show();
			}
		});
	}); 
	// tombol save mobil
		$("#mbl_simpan").click(function(){
				var mbl_form=$("#mbl_form").serialize();
				// alert(mbl_form);
				// mbl_status=$('#mbl_status').val();
				mbl_id=$("#mbl_id").val();
				mbl_spr_id=$("#mbl_spr_id").val();
				mbl_spr_nama=$("#mbl_spr_nama").val();
				mbl_nopol=$("#mbl_nopol").val();
				mbl_km_showroom=$("#mbl_km_showroom").val();
				mbl_km_awal=$("#mbl_km_awal").val();
				mbl_tanggal=$("#mbl_tanggal").val();
				
				// panjang karakter
			
				if($.trim(mbl_spr_id)==""||$.trim(mbl_spr_nama)==""||$.trim(mbl_nopol)==""||
				   $.trim(mbl_km_showroom)==""||$.trim(mbl_km_awal)==""||$.trim(mbl_tanggal)==""){

					alert('Data Mobil Tidak Boleh Ada Yang Kosong!!');
				}else{
					$.ajax({
						url:"pro_master_mobil.php?pro=insert",
						type:"get",
						data:mbl_form,
						cache:false,
						success:function(html){
							// alert(html);
							$("#mbl_id").val("");
							
							$("#mbl_spr_id").val("");
							$("#mbl_spr_nama").val("");
							$("#mbl_nopol").val("");
							$("#mbl_km_showroom").val("");
							$("#mbl_km_awal").val("");
							$("#mbl_tanggal").val("");
							
						}
					});
				}
			});// end save
// start click mbl_btn_select
		$("#mbl_btn_select").click(function(){
			$("#mbl_divisi").slideUp("slow");
			$("#mbl_view").show("slow");
			$("#mbl_view").load('pro_master_mobil.php?pro=select');
		});// endtclick mbl_btn_select

// start click mbl_btn_input
		$("#mbl_btn_input").click(function(){
			$("#mbl_divisi").show("slow");
			$("#mbl_view").hide("slow");
			// $("#usr_view").load('pro_master_user.php?pro=select');
		});// endtclick spr_btn_select

// keyp max karakter showroom
	$("#mbl_km_showroom").keyup(function(event) {
		max=$(this).val().length;
		string=$(this).val();
		if(max>11){
			// alert(string.substr(0,2));
			$(this).val(string.substr(0,11));
			alert("Maaf Maximal 11 Karakter");
		}
	});
	// keyp max km awal
	$("#mbl_km_awal").keyup(function(event) {
		max=$(this).val().length;
		string=$(this).val();
		if(max>11){
			// alert(string.substr(0,2));
			$(this).val(string.substr(0,11));
			alert("Maaf Maximal 11 Karakter");
		}
	});


	// jika nopol di enter
       $("#mbl_nopol").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#mbl_km_showroom").focus();
            }
        });//end

       // jika km showrom di enter
       $("#mbl_km_showroom").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#mbl_km_awal").focus();
            }
        });//end

        // jika tanggal pengunaan mobil di enter
       $("#mbl_km_awal").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#mbl_tanggal").focus();
            }
        });//end

        // jika tanggal pengunaan mobil di enter
       $("#mbl_tanggal").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                  $("#mbl_simpan").focus();
            }
        });//end
// ========================================================================================== file master_ket_poisi.php

// tombol save keterangan
		$("#ketpos_simpan").click(function(){
				var ketpos_form=$("#ketpos_form").serialize();
				// alert(ketpos_form);
				// ketpos_status=$('#ketpos_status').val();
				ketpos_id=$("#ketpos_id").val();
				ketpos_nama=$("#ketpos_nama").val();
				
				
				// panjang karakter
			
				if($.trim(ketpos_nama)==""){

					alert('Data Keterangan Posisi Tidak Boleh  Kosong!!');
				}else{
					$.ajax({
						url:"pro_master_ketpos.php?pro=insert",
						type:"get",
						data:ketpos_form,
						cache:false,
						success:function(html){
							// alert(html);
							$("#ketpos_id").val("");
							
							$("#ketpos_nama").val("");
							
							
						}
					});
				}
			});// end save

// start click mbl_btn_select
		$("#ketpos_btn_select").click(function(){
			$("#ketpos_divisi").slideUp("slow");
			$("#ketpos_view").show("slow");
			$("#ketpos_view").load('pro_master_ketpos.php?pro=select');
		});// endtclick ketpos_btn_select

// start click ketpos_btn_input
		$("#ketpos_btn_input").click(function(){
			$("#ketpos_divisi").show("slow");
			$("#ketpos_view").hide("slow");
			// $("#usr_view").load('pro_master_user.php?pro=select');
		});// endtclick spr_btn_select
// ============================================================================================file transaksi_pembelian.php
	// keyup nama barang
	$("#pbl_dt_brg_nama").keyup(function(event) {
		a=$(this).val();
		// console.log(a);
		$.ajax({
			url:"pro_transaksi_pembelian.php?pro=cari_barang",
			type:"get",
			data:"pbl_dt_brg_nama="+a,
			cache:false,
			success:function(html){
				// alert(html);
				$("#pbl_brg_cari").load("pro_transaksi_pembelian.php?pro=cari_barang&pbl_dt_brg_nama="+a);
				$("#pbl_brg_cari").show();
			}
		});
	});

	// keyup nama barang
	$("#pbl_spl").keyup(function(event) {
		a=$(this).val();
		// console.log(a);
		$.ajax({
			url:"pro_transaksi_pembelian.php?pro=cari_spl",
			type:"get",
			data:"pbl_spl="+a,
			cache:false,
			success:function(html){
				// alert(html);
				$("#spl_cari").load("pro_transaksi_pembelian.php?pro=cari_spl&pbl_spl="+a);
				$("#spl_cari").show();
			}
		});
	});

// kalkulasi subtottal subtotal
	$("#pbl_dt_jumlah").on("keyup",function(event){
		var pbl_dt_jumlah=$(this).val();
		var pbl_dt_brg_harga=$("#pbl_dt_brg_harga").val();
		var kal_pbl_dt_jumlah=parseInt(pbl_dt_brg_harga)*parseInt(pbl_dt_jumlah);
		if(!isNaN(kal_pbl_dt_jumlah)){
			$("#pbl_dt_subtot").val(kal_pbl_dt_jumlah);
			// console.log(kal_diskon_akhir);
		}
	});//end keyup

 // jika textbox pbl_po di enter
       $("#pbl_po").keyup(function(event) {
           pass=$(this).val();
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                // if($.trim(pass)==""){
                //   alert("Password Tdak Boleh Kosong!!");
                 $("#pbl_dt_brg_nama").focus();
                // }

            }
        });
 // jika textbox no pbl_dt_brg_harga di enter
      $("#pbl_dt_brg_harga").keyup(function(event) {
           pass=$(this).val();
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#pbl_dt_brg_serial").focus();
            }
        });//end
// jika textbox pbl_dt_brg_serial di enter
      $("#pbl_dt_brg_serial").keyup(function(event) {
           pass=$(this).val();
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                $("#pbl_dt_jumlah").focus();
            }
        });//end

// jika textbox pbl_dt_brg_serial di enter
      $("#pbl_dt_jumlah").keyup(function(event) {
      		pbl_id=$("#pbl_id").val();

      		pbl_form=$("#pbl_form").serialize();
      		pbl_dt_brg_nama=$("#pbl_dt_brg_nama").val();
      		pbl_dt_brg_id=$("#pbl_dt_brg_id").val();
           	pbl_dt_jumlah=$(this).val();
           	pbl_dt_brg_harga=$("#pbl_dt_brg_harga").val();
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                if($.trim(pbl_dt_brg_nama)==""|$.trim(pbl_dt_brg_id)==""|$.trim(pbl_dt_jumlah)==""|$.trim( 	pbl_dt_brg_harga)==""){
                	alert("Data Masih Ada Yang Kosong!!");
                	$("#pbl_dt_brg_harga").focus();
                }else{
                	$.ajax({
                		url:"pro_transaksi_pembelian.php?pro=insert",
                		type:"get",
                		data:pbl_form,
                		success:function(html){
                			// console.log(html);
                			$("#pbl_dt_brg_nama").val("");
                			$("#pbl_dt_satuan").val("");
				      		$("#pbl_dt_brg_id").val("");
				           	$("#pbl_dt_jumlah").val("");
				           	$("#pbl_dt_brg_harga").val("");
				           	$("#pbl_dt_brg_serial").val("");
				           	$("#pbl_dt_subtot").val("");
				           	$("#pbl_dt_brg_nama").focus();
				           	$("#pbl_view2").load("pro_transaksi_pembelian.php?pro=select&pbl_id="+pbl_id);
				           	$("#pbl_view").show();
                		}

                	});
                }
            }
        });//end
// =================================================================================================file master_supplier.php

// tombol spl_simpan
			$("#spl_simpan").click(function(){
				var spl_form=$("#spl_form").serialize();
				// alert(spl_form);
				spl_id=$("#spl_id").val();
				spl_nama=$("#spl_nama").val();
				spl_alamat=$("#spl_alamat").val();
				spl_tlp=$("#spl_tlp").val();
				// panjang karakter
			
				if($.trim(spl_nama)==""||$.trim(spl_alamat)==""||$.trim(spl_tlp)==""){

					alert('Data Tidak Boleh Ada Yang Kosong!!');
				}else{
					$.ajax({
						url:"pro_master_supplier.php?pro=insert",
						type:"get",
						data:spl_form,
						cache:false,
						success:function(html){
							// alert(html);
							$("#spl_id").val("");
							$("#spl_nama").val("");
							$("#spl_alamat").val("");
							$("#spl_tlp").val("");
						}
					});
				}
			});// end save


// start click mbl_btn_select
		$("#spl_btn_select").click(function(){
			$("#spl_divisi").slideUp("slow");
			$("#spl_view").show("slow");
			$("#spl_view").load('pro_master_supplier.php?pro=select');
		});// endtclick spl_btn_select

// start click spl_btn_input
		$("#spl_btn_input").click(function(){
			$("#spl_divisi").show("slow");
			$("#spl_view").hide("slow");
			// $("#usr_view").load('pro_master_user.php?pro=select');
		});// endtclick spr_btn_select

 // jika nama supplier di enter
     $("#spl_nama").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#spl_alamat").focus();
            }
        });//end

     // jika telpon supplier di enter
     $("#spl_tlp").keyup(function(event) {
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                 $("#spl_simpan").focus();
            }
        });//end

// ============================================================================================file transaksi_service.php
// keyup nama barang
	$("#svc_mbl_nopol").keyup(function(event) {
		a=$(this).val();
		console.log(a);
		$.ajax({
			url:"pro_transaksi_service.php?pro=cari_nopol",
			type:"get",
			data:"svc_mbl_nopol="+a,
			cache:false,
			success:function(html){
				// alert(html);
				$("#svc_mbl_cari").load("pro_transaksi_service.php?pro=cari_nopol&svc_mbl_nopol="+a);
				$("#svc_mbl_cari").show();
			}
		});
	});//end

// keyup nama barang
	$("#svc_mk_nama").keyup(function(event) {
		a=$(this).val();
		console.log(a);
		$.ajax({
			url:"pro_transaksi_service.php?pro=cari_mekanik",
			type:"get",
			data:"svc_mk_nama="+a,
			cache:false,
			success:function(html){
				// alert(html);
				$("#svc_mk_cari").load("pro_transaksi_service.php?pro=cari_mekanik&svc_mk_nama="+a);
				$("#svc_mk_cari").show();
			}
		});
	});//end

	// keyup nama barang
	$("#svc_dt_brg_nama").keyup(function(event) {
		a=$(this).val();
		console.log(a);
		$.ajax({
			url:"pro_transaksi_service.php?pro=cari_barang",
			type:"get",
			data:"svc_dt_brg_nama="+a,
			cache:false,
			success:function(html){
				// alert(html);
				$("#svc_brg_cari").load("pro_transaksi_service.php?pro=cari_barang&svc_dt_brg_nama="+a);
				$("#svc_brg_cari").show();
			}
		});
	});//end

// keyup nama posisi
	$("#svc_ket_posisi").keyup(function(event) {
		a=$(this).val();
		console.log(a);
		$.ajax({
			url:"pro_transaksi_service.php?pro=cari_ket",
			type:"get",
			data:"svc_ket_posisi="+a,
			cache:false,
			success:function(html){
				// alert(html);
				$("#svc_ket_cari").load("pro_transaksi_service.php?pro=cari_ket&svc_ket_posisi="+a);
				$("#svc_ket_cari").show();
			}
		});
	});//end

// keyup nama posisi
	$("#svc_dt_brg_serial").keyup(function(event) {
		a=$(this).val();
		b=$("#svc_dt_brg_id").val();
		// console.log(a);
		$.ajax({
			url:"pro_transaksi_service.php?pro=cari_serial",
			type:"get",
			data:"svc_dt_brg_serial="+a+"&svc_dt_brg_id="+b,
			cache:false,
			success:function(html){
				console.log(html);
				if(html!=""){
					$(".true_serial").show();
					$(".false_serial").hide();
				}else{
					$(".true_serial").hide();
					$(".false_serial").show();
				}
				// $("#svc_ket_cari").load("pro_transaksi_service.php?pro=cari_ket&svc_ket_posisi="+a);
				// $("#svc_ket_cari").show();
			}
		});
	});//end

	// keyup nama posisi
	$("#svc_dt_jumlah").keyup(function(event) {
		a=$(this).val();
		b=$("#svc_dt_brg_stok").val();

		c=parseInt(a);
		d=parseInt(b);
		if(c>d){
			alert("Maaf Barang Kurang!!");
			$("#svc_dt_jumlah").val("");
		}
		
	});//end


// jika textbox pbl_dt_brg_serial di enter
      $("#svc_ket").keyup(function(event) {
      		svc_form=$("#svc_form").serialize();
      		// wajib ada
      		svc_id=$("#svc_id").val();
      		svc_dt_brg_nama=$("#svc_dt_brg_nama").val();
      		svc_dt_brg_id=$("#svc_dt_brg_id").val();
      		svc_dt_brg_stok=$("#svc_dt_brg_stok").val();
      		svc_dt_brg_satuan=$("#svc_dt_brg_satuan").val();
      		svc_dt_jumlah=$("#svc_dt_jumlah").val();
      		// tidak harus ada
			svc_dt_brg_serial=$("#svc_dt_brg_serial").val();      		
      		svc_ket_posisi=$("#svc_ket_posisi").val();
      		svc_ket_id=$("#svc_ket_id").val();
      		

            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                if($.trim(svc_dt_brg_nama)==""||$.trim(svc_dt_brg_id)==""||$.trim(svc_dt_brg_stok)==""||$.trim(svc_dt_brg_satuan)==""||
                	$.trim(svc_dt_jumlah)==""){
                	alert("Data Masih Ada Yang Kosong!!");
            	}else if(svc_dt_brg_serial!=""){
                	$.ajax({
						url:"pro_transaksi_service.php?pro=cari_serial",
						type:"get",
						data:"svc_dt_brg_serial="+svc_dt_brg_serial+"&svc_dt_brg_id="+svc_dt_brg_id,
						cache:false,
						success:function(html){
							// console.log(html);
							if(html!=""){
								// alert(svc_form);
								// start
								$.ajax({
									url:"pro_transaksi_service.php?pro=insert",
									type:"get",
									data:svc_form,
									cache:false,
									success:function(html){
										// alert(html);
										$("#svc_dt_brg_nama").val("");
										$("#svc_dt_brg_id").val("");
										$("#svc_dt_brg_stok").val("");
										$("#svc_dt_brg_satuan").val("");
										$("#svc_dt_jumlah").val("");

										$("#svc_dt_brg_serial").val("");   
										$("#svc_ket_posisi").val("");
										$("#svc_ket_id").val("");
										$("#svc_ket").val("");

										$(".false_serial").show();
										$(".true_serial").hide();

										$("#svc_view").load("pro_transaksi_service.php?pro=select&svc_id="+svc_id);
										$("#svc_view").show();
										$("#svc_dt_brg_nama").focus();
									}
								});
								// end
							}else{
								alert("Serial Tidak Ditemukan");
							}
						
						}
					});
                }else{
                	// alert(svc_form);
                	// start ajax
					$.ajax({
						url:"pro_transaksi_service.php?pro=insert",
						type:"get",
						data:svc_form,
						cache:false,
						success:function(html){
							// alert(html);
							$("#svc_dt_brg_nama").val("");
							$("#svc_dt_brg_id").val("");
							$("#svc_dt_brg_stok").val("");
							$("#svc_dt_brg_satuan").val("");
							$("#svc_dt_jumlah").val("");

							$("#svc_dt_brg_serial").val("");   
							$("#svc_ket_posisi").val("");
							$("#svc_ket_id").val("");
							$("#svc_ket").val("");

							$(".false_serial").show();
							$(".true_serial").hide();

							$("#svc_view").load("pro_transaksi_service.php?pro=select&svc_id="+svc_id);
							$("#svc_view").show();
							$("#svc_dt_brg_nama").focus();
						}
					});
					// end ajax
                }
            }
        });//end

	// enter textbx km servis
	$("#svc_km").keyup(function(event) {
		  var charcode =(event.which)?event.which:event.keycode;
		   if(charcode==13){
		   	$("#svc_dt_brg_nama").focus();
		   }
	});//end

	// enter textbx serial
	$("#svc_dt_brg_serial").keyup(function(event) {
		  var charcode =(event.which)?event.which:event.keycode;
		   if(charcode==13){
		   	$("#svc_dt_jumlah").focus();
		   }
	});//end
	// enter textbx jumlah pkai
	$("#svc_dt_jumlah").keyup(function(event) {
		  var charcode =(event.which)?event.which:event.keycode;
		   if(charcode==13){
		   	$("#svc_ket_posisi").focus();
		   }
	});//end



// ========================================================================================file transaksi_klaim.php
// keyup nama polisi
	$("#klm_dt_nopol").keyup(function(event) {
		a=$(this).val();
		// console.log(a);
		$.ajax({
			url:"pro_transaksi_klaim.php?pro=cari_nopol",
			type:"get",
			data:"klm_dt_nopol="+a,
			cache:false,
			success:function(html){
				// alert(html);
				$("#klm_nopol_cari").load("pro_transaksi_klaim.php?pro=cari_nopol&klm_dt_nopol="+a);
				$("#klm_nopol_cari").show();
			}
		});
	});//end
	
	//enter harga klem 
	$("#klm_dt_harga").keyup(function(event) {
		  var charcode =(event.which)?event.which:event.keycode;
		   if(charcode==13){
		   	$("#klm_dt_ket").focus();
		   }
	});//end

	//enter ketereangan klem 
	$("#klm_dt_ket").keyup(function(event) {
		  var charcode =(event.which)?event.which:event.keycode;
		   if(charcode==13){
			   	klm_form=$("#klm_form").serialize();

			   	klm_id=$("#klm_id").val();
			   	klm_dt_nopol=$("#klm_dt_nopol").val();
			   	klm_dt_nopol_id=$("#klm_dt_nopol_id").val();
			   	klm_dt_tgl=$("#klm_dt_tgl").val();
			   	klm_dt_harga=$("#klm_dt_harga").val();
			   	klm_dt_ket=$("#klm_dt_ket").val();

			   	if($.trim(klm_dt_nopol)==""||$.trim(klm_dt_nopol_id)==""||$.trim(klm_dt_tgl)==""||$.trim(klm_dt_harga)==""||$.trim(klm_dt_ket)==""){
			   		alert("Data Tidak Boleh Kosong!!");
			   	}else{
			   		$.ajax({
			   			url:"pro_transaksi_klaim.php?pro=insert",
						type:"get",
						data:"klm_id="+klm_id+"&klm_dt_nopol_id="+klm_dt_nopol_id+"&klm_dt_tgl="+klm_dt_tgl+"&klm_dt_harga="+klm_dt_harga+"&klm_dt_ket="+klm_dt_ket,
						cache:false,
						success:function(html){
							// alert(html);
							$("#klm_view").load('pro_transaksi_klaim.php?pro=select&klm_id='+klm_id);
							$("#klm_view").show();
							$("#klm_dt_nopol").val("");
						   	$("#klm_dt_nopol_id").val("");
						   	$("#klm_dt_tgl").val("");
						   	$("#klm_dt_harga").val("");
						   	$("#klm_dt_ket").val("");
						   	$("#klm_dt_nopol").focus();
						}
			   		});
			   	}
		   }
	});//end
// =====================================================================================file lap_servis.php
// keyup nama polisi
	$("#lap_svs_mbl").keyup(function(event) {
		a=$(this).val();
		// console.log(a);
		$.ajax({
			url:"lap_ambil_data.php?pro=cari_nopol",
			type:"get",
			data:"lap_svs_mbl="+a,
			cache:false,
			success:function(html){
				// alert(html);
				$("#lap_svs_mbl_cari").load("lap_ambil_data.php?pro=cari_nopol&lap_svs_mbl="+a);
				$("#lap_svs_mbl_cari").show();
			}
		});
	});//end

// keyup nama polisi
	$("#lap_svs_ktg").keyup(function(event) {
		a=$(this).val();
		// console.log(a);
		$.ajax({
			url:"lap_ambil_data.php?pro=cari_kategori",
			type:"get",
			data:"lap_svs_ktg="+a,
			cache:false,
			success:function(html){
				// alert(html);
				$("#lap_svs_ktg_cari").load("lap_ambil_data.php?pro=cari_kategori&lap_svs_ktg="+a);
				$("#lap_svs_ktg_cari").show();
			}
		});
	});//end
	// jika klik print laoran servis
$("#lap_btn_svs").click(function(event) {
	lap_svs_fak=$("#lap_svs_fak").val();
	lap_svs_mbl_id=$("#lap_svs_mbl_id").val();
	lap_svs_ktg_id=$("#lap_svs_ktg_id").val();
	lap_tgl_awal_svs=$("#lap_tgl_awal_svs").val();
	lap_tgl_akhir_svs=$("#lap_tgl_akhir_svs").val();

	if($.trim(lap_svs_fak)==""&&$.trim(lap_svs_mbl_id)==""&&$.trim(lap_svs_ktg_id)==""&&$.trim(lap_tgl_awal_svs)==""&&$.trim(lap_tgl_akhir_svs)==""){
		alert("Salah Satu Data Harus Diisi!!");
	}else if($.trim(lap_svs_fak)!=""&&$.trim(lap_svs_mbl_id)!=""&&$.trim(lap_svs_ktg_id)!=""&&$.trim(lap_tgl_awal_svs)!=""&&$.trim(lap_tgl_akhir_svs)!=""){
		alert("Hanya diperbolehkan laporan berdasarkan 1 filter saja!!");
	}else{
		window.open("pro_lap_servis.php?lap_svs_fak="+lap_svs_fak+"&lap_svs_mbl_id="+lap_svs_mbl_id+"&lap_svs_ktg_id="+lap_svs_ktg_id+"&lap_tgl_awal_svs="+lap_tgl_awal_svs+"&lap_tgl_akhir_svs="+lap_tgl_akhir_svs,"_blank");
		$("#lap_svs_fak").val("");
		$("#lap_svs_mbl").val("");
		$("#lap_svs_mbl_id").val("");
		$("#lap_svs_ktg").val("");
		$("#lap_svs_ktg_id").val("");
		$("#lap_tgl_awal_svs").val("");
		$("#lap_tgl_akhir_svs").val("");
	}
});//end
// ===========================================================================================file lap_barang.php
$("#lap_btn_brg").click(function(event) {
	// option serial or non serial
	lap_brg_serial=$("input[name='lap_brg_serial']:checked").length;
	lap_brg_serial2=$("input[name='lap_brg_serial']:checked").val();
	// kategori barang
	lap_brg_ktg_id=$("#lap_brg_ktg_id").val();
	lap_brg_ktg=$("#lap_brg_ktg").val();
	// data barang
	lap_brg=$("#lap_brg").val();
	lap_brg_id=$("#lap_brg_id").val();

	if(lap_brg_serial<1){
		alert("Kategori Serial Barang Wajib Disi!!");
	}else if($.trim(lap_brg_ktg)=="" && $.trim(lap_brg_ktg_id)=="" && $.trim(lap_brg)=="" && $.trim(lap_brg_id)==""){
		alert("Maaf Salah Satu Filter Laporan Harus Diisi, persedian barang berdasarkan kategori atau nama barang");
	}else if($.trim(lap_brg_ktg)!="" && $.trim(lap_brg_ktg_id)!="" && $.trim(lap_brg)!="" && $.trim(lap_brg_id)!=""){
		alert("Maaf Hanya bisa filter 1 data");
		// kategori barang
		lap_brg_ktg_id=$("#lap_brg_ktg_id").val("");
		lap_brg_ktg=$("#lap_brg_ktg").val("");
		// data barang
		lap_brg=$("#lap_brg").val("");
		lap_brg_id=$("#lap_brg_id").val("");
	}else{
		// alert("Kategori Serial Barang !!"+lap_brg_serial2);
		window.open("pro_lap_barang.php?lap_brg_serial="+lap_brg_serial2+"&lap_brg_id="+lap_brg_id+"&lap_brg_ktg_id="+lap_brg_ktg_id,"_blank");
		// option serial or non serial
		lap_brg_serial2=$("input[name='lap_brg_serial']:checked").prop('checked',false);
		// kategori barang
		lap_brg_ktg_id=$("#lap_brg_ktg_id").val("");
		lap_brg_ktg=$("#lap_brg_ktg").val("");
		// data barang
		lap_brg=$("#lap_brg").val("");
		lap_brg_id=$("#lap_brg_id").val("");
	}
});//end



// keyup nama kategori
	$("#lap_brg_ktg").keyup(function(event) {
		a=$(this).val();
		// console.log(a);
		$.ajax({
			url:"lap_ambil_data_barang.php?pro=cari_kategori",
			type:"get",
			data:"lap_brg_ktg="+a,
			cache:false,
			success:function(html){
				// alert(html);
				$("#lap_brg_ktg_cari").load("lap_ambil_data_barang.php?pro=cari_kategori&lap_brg_ktg="+a);
				$("#lap_brg_ktg_cari").show();
			}
		});
	});//end

// keyup nama kategori
	
$("#lap_brg").keyup(function(event) {
		a=$(this).val();
		console.log(a);
		$.ajax({
			url:"lap_ambil_data_barang.php?pro=cari_barang",
			type:"get",
			data:"lap_brg="+a,
			cache:false,
			success:function(html){
				// alert(html);
				$("#lap_brg_cari").load("lap_ambil_data_barang.php?pro=cari_barang&lap_brg="+a);
				$("#lap_brg_cari").show();
			}
		});
	});//end
// =======================================================================================file lap_klaim.php
$("#lap_mbl_nama").keyup(function(event) {
		a=$(this).val();
		console.log(a);
		$.ajax({
			url:"lap_ambil_data_klaim.php?pro=cari_nopol",
			type:"get",
			data:"lap_mbl_nama="+a,
			cache:false,
			success:function(html){
				// alert(html);
				$("#lap_mbl_cari").load("lap_ambil_data_klaim.php?pro=cari_nopol&lap_mbl_nama="+a);
				$("#lap_mbl_cari").show();
			}
		});
	});//end



	$("#lap_btn_klm").click(function(event) {
		// kategori barang
		lap_mbl_nama=$("#lap_mbl_nama").val();
		lap_mbl_id=$("#lap_mbl_id").val();
		// data barang
		lap_tgl_awal_klm=$("#lap_tgl_awal_klm").val();
		lap_tgl_akhir_klm=$("#lap_tgl_akhir_klm").val();

		if($.trim(lap_mbl_nama)=="" && $.trim(lap_mbl_id)=="" && $.trim(lap_tgl_awal_klm)=="" && $.trim(lap_tgl_akhir_klm)==""){
			alert("Maaf Salah Satu Filter Laporan Harus Diisi, Laporan Klaim berdasarkan No.Polisi atau Periode tanggal!!");
		}else{
			// alert("Kategori Serial Barang !!"+lap_klm_serial2);
			window.open("pro_lap_klaim.php?lap_mbl_id="+lap_mbl_id+"&lap_tgl_awal_klm="+lap_tgl_awal_klm+"&lap_tgl_akhir_klm="+lap_tgl_akhir_klm,"_blank");
				$("#lap_mbl_nama").val("");
				$("#lap_mbl_id").val("");
				$("#lap_tgl_awal_klm").val("");
				$("#lap_tgl_akhir_klm").val("");
		}
	});//end


//========================================================================================file menu backup_database.php
	 //id backup
		$("#backup_db").click(function(event) {
			event.preventDefault();
			cf=confirm("Anda Yakin Akan Melakukan backup data??");
			if(cf==true){
				// alert("ok deh");
				// $("#loading").show("slow");
				$.ajax({
					url:"db_backup.php",
					beforeSend:function(html1){
						$("#loading").show("slow");
					},
					success:function(html2){
						$("#loading").hide("slow");
						alert(html2);
					}
				});
			}
		}); 

// =================================================================================file lap_pembelian.php

	// button laporan pembelian
	$("#lap_btn_pbl").click(function(e){
		e.preventDefault();
			lap_pbl_fak=$("#lap_pbl_fak").val();
			lap_tgl_awal_beli=$("#lap_tgl_awal_beli").val();
			lap_tgl_akhir_beli=$("#lap_tgl_akhir_beli").val();


			if($.trim(lap_pbl_fak)=="" && $.trim(lap_tgl_awal_beli)=="" && $.trim(lap_tgl_akhir_beli)==""){
				alert("Data Tidak Boleh Kosong!! Pilih Kriteria Laporan");
			}else if($.trim(lap_pbl_fak)!="" && $.trim(lap_tgl_awal_beli)!="" && $.trim(lap_tgl_akhir_beli)!=""){
				alert("Pilih Salah Satu Kriteria Laporan!! berdasarkan No.Faktur/Periode");
			}else{
				window.open('pro_lap_pembelian.php?lap_pbl_fak='+lap_pbl_fak+'&lap_tgl_awal_beli='+lap_tgl_awal_beli+'&lap_tgl_akhir_beli='+lap_tgl_akhir_beli,'_blank');
			}


	});
	// end buttton
});// end jquery
//|| ==========================================================================================||
//||								BATAS AKHR JQUERY 										   ||
//|| ==========================================================================================||
//
//
// ==========================================================================file master_user.php
// 	function hapus data user
	function fun_usr_hapus(usr_id){
		kon=confirm("Anda Yakin Akan Menghapus Data ini??");
		if(kon==true){
			$.ajax({
				url:"pro_master_user.php?pro=delete",
				type:"get",
				data:"usr_id="+usr_id,
				cache:false,
				success:function(html){
					// alert(html);
					$("#usr_view").load('pro_master_user.php?pro=select');
				}
			});
		}
		
	}//end function hapus data user

// valid anggka usr_tlp
function usr_valid_angka(evt){
	var charcode= (evt.which) ? evt.which : event.keycode;
		if(charcode>31 &&(charcode <48||charcode>57)){
			alert("maaf harus angka");
			$("#usr_tlp").val("");
			return false;
		}
	return true;
}//end fungsi
// ==========================================================================file master_satuan.php
// 	function hapus data user
	function fun_stn_hapus(stn_id){
		kon=confirm("Anda Yakin Akan Menghapus Data ini??");
		if(kon==true){
			$.ajax({
				url:"pro_master_satuan.php?pro=delete",
				type:"get",
				data:"stn_id="+stn_id,
				cache:false,
				success:function(html){
					// alert(html);
					$("#stn_view").load('pro_master_satuan.php?pro=select');
				}
			});
		}
		
	}//end function hapus data user
	// 	function hapus data user
	function fun_stn_update(stn_id){
			$.ajax({
				url:"pro_master_satuan.php?pro=ambil_satuan",
				type:"get",
				data:"stn_id="+stn_id,
				cache:false,
				success:function(html){
					// alert(html);
					a=html.split('|');
					$("#stn_id").val(a[0]);
					$("#stn_nama").val(a[1]);
					$("#stn_view").hide();
					$("#stn_divisi").show('slow');

				}
			});	
	}//end function hapus data user
// ============================================================================================file master_kategori.php
// copy satuan
function stn_copy(stn_id, stn_nama){
	$("#ktg_satuan").val(stn_nama);
	$("#ktg_stn_id").val(stn_id);
	$('.ktg_cari').hide('slow');
}//end copy satuan

// 	function hapus data user
	function fun_ktg_hapus(ktg_id){
		kon=confirm("Anda Yakin Akan Menghapus Data ini??");
		if(kon==true){
			$.ajax({
				url:"pro_master_kategori.php?pro=delete",
				type:"get",
				data:"ktg_id="+ktg_id,
				cache:false,
				success:function(html){
					// alert(html);
					$("#ktg_view").load('pro_master_kategori.php?pro=select');
				}
			});
		}
		
	}//end function hapus data user

// 	function hapus data user
	function fun_ktg_update(ktg_id){
			$.ajax({
				url:"pro_master_kategori.php?pro=ambil_kategori",
				type:"get",
				data:"ktg_id="+ktg_id,
				cache:false,
				success:function(html){
					// alert(html);
					a=html.split('|');
					$("#ktg_id").val(a[0]);
					$("#ktg_nama").val(a[1]);
					$("#ktg_stn_id").val(a[2]);
					$("#ktg_satuan").val(a[3]);
					$("#ktg_view").hide();
					$("#ktg_divisi").show('slow');

				}
			});	
	}//end function hapus data user
// ===============================================================================file master_mekanik.php

// 	function hapus data mekanik
	function fun_mk_hapus(mk_id){
		kon=confirm("Anda Yakin Akan Menghapus Data ini??");
		if(kon==true){
			$.ajax({
				url:"pro_master_mekanik.php?pro=delete",
				type:"get",
				data:"mk_id="+mk_id,
				cache:false,
				success:function(html){
					// alert(html);
					$("#mk_view").load('pro_master_mekanik.php?pro=select');
				}
			});
		}
		
	}//end function hapus data user

// 	function hapus data user
	function fun_mk_update(mk_id){
			$.ajax({
				url:"pro_master_mekanik.php?pro=ambil_mekanik",
				type:"get",
				data:"mk_id="+mk_id,
				cache:false,
				success:function(html){
					// alert(html);
					a=html.split('|');
					$("#mk_id").val(a[0]);
					$("#mk_nama").val(a[1]);
						var jk=a[2];
						if(jk=="Laki-Laki"){
							$("#mk_jklk").prop('checked',true);
						}else{
							$("#mk_jkpr").prop('checked',true);
						}
					$("#mk_tempat_lahir").val(a[3]);
					$("#mk_tgl_lahir").val(a[4]);
					$("#mk_alamat").val(a[5]);
					$("#mk_email").val(a[6]);
					$("#mk_tlp").val(a[7]);
					$("#mk_view").hide();
					$("#mk_divisi").show('slow');

				}
			});	
	}//end function hapus data user

	// valid anggka usr_tlp
function mk_valid_angka(evt){
	var charcode= (evt.which) ? evt.which : event.keycode;
		if(charcode>31 &&(charcode <48||charcode>57)){
			alert("maaf harus angka");
			$("#mk_tlp").val("");
			return false;
		}
	return true;
}//end fungsi
// ============================================================================file master_barang.php
// copy satuan
function ktg_copy(ktg_id, ktg_nama){
	$("#brg_kategori").val(ktg_nama);
	$("#brg_ktg_id").val(ktg_id);
	$('#brg_cari').hide('slow');
	$('#brg_nama').focus();
}//end copy satuan

// 	function hapus data barang
	function fun_brg_hapus(brg_id){
		kon=confirm("Anda Yakin Akan Menghapus Data ini??");
		if(kon==true){
			$.ajax({
				url:"pro_master_barang.php?pro=delete",
				type:"get",
				data:"brg_id="+brg_id,
				cache:false,
				success:function(html){
					// alert(html);
					$("#brg_view").load('pro_master_barang.php?pro=select');
				}
			});
		}
		
	}//end function hapus data user

// 	function hapus data user
	function fun_brg_update(brg_id){
			$.ajax({
				url:"pro_master_barang.php?pro=ambil_barang",
				type:"get",
				data:"brg_id="+brg_id,
				cache:false,
				success:function(html){
					// alert(html);
					a=html.split('|');
					$("#brg_id").val(a[0]);

					$("#brg_kategori").val(a[3]);
					$("#brg_ktg_id").val(a[2]);
					$("#brg_nama").val(a[1]);
					$("#brg_view").hide();
					$("#brg_divisi").show('slow');

				}
			});	
	}//end function hapus data user
// ===============================================================================file master_supir.php
// 	function hapus data supir
	function fun_spr_hapus(spr_id){
		kon=confirm("Anda Yakin Akan Menghapus Data ini??");
		if(kon==true){
			$.ajax({
				url:"pro_master_supir.php?pro=delete",
				type:"get",
				data:"spr_id="+spr_id,
				cache:false,
				success:function(html){
					// alert(html);
					$("#spr_view").load('pro_master_supir.php?pro=select');
				}
			});
		}
		
	}//end function hapus data supir

// 	function hapus data user
	function fun_spr_update(spr_id){
			$.ajax({
				url:"pro_master_supir.php?pro=ambil_supir",
				type:"get",
				data:"spr_id="+spr_id,
				cache:false,
				success:function(html){
					// alert(html);
					a=html.split('|');
					$("#spr_id").val(a[0]);

					$("#spr_nama").val(a[1]);
					jk=a[2];
					if(jk=="Laki-Laki"){
						$("input[name='spr_jk'][value='Laki-Laki']").prop('checked',true);
					}else{
						$("input[name='spr_jk'][value='Perempuan']").prop('checked',true);
					}
					$("#spr_tempat_lahir").val(a[3]);
					$("#spr_tgl_lahir").val(a[4]);
					$("#spr_alamat").val(a[5]);
					$("#spr_email").val(a[6]);
					$("#spr_tlp").val(a[7]);
					
					$("#spr_view").hide();
					$("#spr_divisi").show('slow');

				}
			});	
	}//end function hapus data user
	// valid anggka mbl_tanggal
function spr_valid_angka(evt){
	var charcode= (evt.which) ? evt.which : event.keycode;
		if(charcode>31 &&(charcode <48||charcode>57)){
			alert("maaf harus angka");
			$("#spr_tlp").val("");
			return false;
		}
	return true;
}//end fungsi
// ==================================================================================================file master_mobil.php
// copy satuan
function spr_copy(spr_id, spr_nama){
	$("#mbl_spr_nama").val(spr_nama);
	$("#mbl_spr_id").val(spr_id);
	$('.mbl_spr_cari').hide('slow');
	$("#mbl_nopol").focus();
}//end copy satuan 

// 	function hapus data mobil
	function fun_mbl_hapus(mbl_id){
		kon=confirm("Anda Yakin Akan Menghapus Data ini??");
		if(kon==true){
			$.ajax({
				url:"pro_master_mobil.php?pro=delete",
				type:"get",
				data:"mbl_id="+mbl_id,
				cache:false,
				success:function(html){
					// alert(html);
					$("#mbl_view").load('pro_master_mobil.php?pro=select');
				}
			});
		}
		
	}//end function hapus data mobil

// 	function hapus data user
	function fun_mbl_update(mbl_id){
			$.ajax({
				url:"pro_master_mobil.php?pro=ambil_mobil",
				type:"get",
				data:"mbl_id="+mbl_id,
				cache:false,
				success:function(html){
					// alert(html);
					a=html.split('|');
					$("#mbl_id").val(a[0]);
							
					$("#mbl_spr_id").val(a[1]);
					$("#mbl_spr_nama").val(a[2]);
					$("#mbl_nopol").val(a[3]);
					$("#mbl_km_showroom").val(a[4]);
					$("#mbl_km_awal").val(a[5]);
					$("#mbl_tanggal").val(a[6]);
					
					$("#mbl_view").hide();
					$("#mbl_divisi").show('slow');

				}
			});	
	}//end function hapus data user

	// valid anggka usr_tlp
function mbl_valid_angkashowroom(evt){
	var charcode= (evt.which) ? evt.which : event.keycode;
		if(charcode>31 &&(charcode <48||charcode>57)){
			alert("maaf harus angka");
			$("#mbl_km_showroom").val("");
			return false;
		}
	return true;
}//end fungsi

	// valid anggka usr_tlp
function mbl_valid_angkaawal(evt){
	var charcode= (evt.which) ? evt.which : event.keycode;
		if(charcode>31 &&(charcode <48||charcode>57)){
			alert("maaf harus angka");
			$("#mbl_km_awal").val("");
			return false;
		}
	return true;
}//end fungsi

	// valid anggka mbl_tanggal
function mbl_valid_angkatanggal(evt){
	var charcode= (evt.which) ? evt.which : event.keycode;
		if(charcode>31 &&(charcode <48||charcode>57)){
			alert("maaf harus angka");
			$("#mbl_tanggal").val("");
			return false;
		}
	return true;
}//end fungsi
// ========================================================================filr master_ket_posisi.php
// 	function hapus data mobil
	function fun_ketpos_hapus(ketpos_id){
		kon=confirm("Anda Yakin Akan Menghapus Data ini??");
		if(kon==true){
			$.ajax({
				url:"pro_master_ketpos.php?pro=delete",
				type:"get",
				data:"ketpos_id="+ketpos_id,
				cache:false,
				success:function(html){
					// alert(html);
					$("#ketpos_view").load('pro_master_ketpos.php?pro=select');
				}
			});
		}
		
	}//end function hapus data mobil

// 	function hapus data posisi
	function fun_ketpos_update(ketpos_id){
			$.ajax({
				url:"pro_master_ketpos.php?pro=ambil_posisi",
				type:"get",
				data:"ketpos_id="+ketpos_id,
				cache:false,
				success:function(html){
					// alert(html);
					a=html.split('|');
					$("#ketpos_id").val(a[0]);
					$("#ketpos_nama").val(a[1]);
					
					
					$("#ketpos_view").hide();
					$("#ketpos_divisi").show('slow');

				}
			});	
	}//end function hapus data posisi
// ============================================================================================file transaksi_pembelian.php
// function faktur pembelian
	function pbl_faktur(){
		$.ajax({
			url:"pro_transaksi_pembelian.php",
			type:"get",
			data:"pro=faktur",
			cache:false,
			success:function(html){
				a=html.split("|");
				// console.log(a[0]);
				// console.log(html);
				$("#pbl_id").val(a[0]);
			}
		})
	}//end function

// copy satuan
function brg_copy(brg_id, brg_nama,stn_nama){
	$("#pbl_dt_brg_nama").val(brg_nama);
	$("#pbl_dt_brg_id").val(brg_id);
	$("#pbl_dt_satuan").val(stn_nama);
	$('.pbl_dt_brg_cari').hide('slow');
	$("#pbl_dt_brg_harga").focus();
}//end copy satuan 

	// valid anggka pbl_dt_harga
function pblharga_valid_angka(evt){
	var charcode= (evt.which) ? evt.which : event.keycode;
		if(charcode>31 &&(charcode <48||charcode>57)){
			alert("maaf harus angka");
			$("#pbl_dt_brg_harga").val("");
			return false;
		}
	return true;
}//end fungsi

	// valid anggka pbl_jumbel
function pbljumbel_valid_angka(evt){
	var charcode= (evt.which) ? evt.which : event.keycode;
		if(charcode>31 &&(charcode <48||charcode>57)){
			alert("maaf harus angka");
			$("#pbl_dt_jumlah").val("");
			return false;
		}
	return true;
}//end fungsi


// 	function hapus pembelian
	function fun_pbl_hapus(pbl_id,brg_id,pbl_serial,pbl_jumlah){
		pbl_id=$("#pbl_id").val();
		kon=confirm("Anda Yakin Akan Menghapus Data ini??");
		if(kon==true){
			// alert(pbl_id+"/"+brg_id+"/"+pbl_serial+"/"+pbl_jumlah);
			$.ajax({
				url:"pro_transaksi_pembelian.php?pro=delete",
				type:"get",
				data:"pbl_id="+pbl_id+"&brg_id="+brg_id+"&pbl_serial="+pbl_serial+"&pbl_jumlah="+pbl_jumlah,
				cache:false,
				success:function(html){
					// alert(html);
						$("#pbl_view2").load("pro_transaksi_pembelian.php?pro=select&pbl_id="+pbl_id);
						$("#pbl_view").show();
				}
			});
		}
		
	}//end function hapus data mobil
// 	function selesai pembelian
	function fun_pbl_selesai(pbl_kaltot){
		// alert(pbl_kaltot);
		// pbl_form=$("#pbl_form").serialize();
		// alert(pbl_form);
		spl_id=$("#spl_id").val();
		spl_nama=$("#pbl_spl").val();
		pbl_id=$("#pbl_id").val();
		// pbl_usr_id=$("#pbl_usr_id").val();
		pbl_po=$("#pbl_po").val();
		// alert(pbl_id+"/"+pbl_kaltot+"/"+pbl_po+"/"+spl_id);
		kon=confirm("Anda Yakin Sudah Selesai??");
		if(kon==true){
			if($.trim(spl_id)==""||$.trim(spl_nama)==""){
				alert("Nama Supplier Tidak Boleh Kosong!!");
			}else{
				// alert(pbl_id+"/"+brg_id+"/"+pbl_serial+"/"+pbl_jumlah);
				$.ajax({
					url:"pro_transaksi_pembelian.php?pro=selesai",
					type:"get",
					data:"pbl_id="+pbl_id+"&pbl_po="+pbl_po+"&pbl_kaltot="+pbl_kaltot+"&spl_id="+spl_id,
					cache:false,
					success:function(html){
						// alert(html);
							// $("#pbl_view").load("pro_transaksi_pembelian.php?pro=select");
							$("#pbl_view").hide('slow');
							$("#pbl_po").val("");
							$("#pbl_spl").val("");
							$("#spl_id").val("");
							pbl_faktur();

					}
				});
			}
		}
	}//end function hapus data mobil

	// copy satuan
function spl_copy(spl_id, spl_nama){
	$("#pbl_spl").val(spl_nama);
	$("#spl_id").val(spl_id);
	$('#spl_cari').hide('slow');

	$("#pbl_po").focus();
}//end copy satuan 
// ==========================================================================file master_supplier.php
// valid anggka usr_tlp
function spl_valid_angka(evt){
	var charcode= (evt.which) ? evt.which : event.keycode;
		if(charcode>31 &&(charcode <48||charcode>57)){
			alert("maaf harus angka");
			$("#spl_tlp").val("");
			return false;
		}
	return true;
}//end fungsi

// 	function hapus pembelian
	function fun_spl_hapus(spl_id){
		kon=confirm("Anda Yakin Akan Menghapus Data ini??");
		if(kon==true){
			// alert(spl_id);
			$.ajax({
				url:"pro_master_supplier.php?pro=delete",
				type:"get",
				data:"spl_id="+spl_id,
				cache:false,
				success:function(html){
					// alert(html);
						$("#spl_view").load("pro_master_supplier.php?pro=select");
						$("#spl_view").show();
				}
			});
		}
		
	}//end function hapus data mobil

// 	function hapus data posisi
	function fun_spl_update(spl_id){
			$.ajax({
				url:"pro_master_supplier.php?pro=ambil_supplier",
				type:"get",
				data:"spl_id="+spl_id,
				cache:false,
				success:function(html){
					// alert(html);
					a=html.split('|');
					$("#spl_id").val(a[0]);
					$("#spl_nama").val(a[1]);
					$("#spl_alamat").val(a[2]);
					$("#spl_tlp").val(a[3]);
					
					$("#spl_view").hide();
					$("#spl_divisi").show('slow');

				}
			});	
	}//end function hapus data posisi


// ==========================================================================FILE transaksi_service.php
// function faktur servis
	function svc_faktur(){
		$.ajax({
			url:"pro_transaksi_service.php",
			type:"get",
			data:"pro=faktur",
			cache:false,
			success:function(html){
				a=html.split("|");
				// console.log(a[0]);
				// console.log(html);
				$("#svc_id").val(a[0]);
			}
		})
	}//end function
// copy data mbil
function mbl_copy(mbl_id, mbl_nopol){
	$("#svc_mbl_nopol").val(mbl_nopol);
	$("#svc_mbl_id").val(mbl_id);
	$("#svc_mk_nama").focus();
}//end copy satuan 

// copy data mbil
function mk_copy(mk_id, mk_nama){
	$("#svc_mk_nama").val(mk_nama);
	$("#svc_mk_id").val(mk_id);
	$("#svc_km").focus();

}//end copy satuan 

// copy data mbil
function svc_brg_copy(brg_id, brg_nama,brg_stok,stn_nama){
	$("#svc_dt_brg_nama").val(brg_nama);
	$("#svc_dt_brg_id").val(brg_id);
	$("#svc_dt_brg_stok").val(brg_stok);
	$("#svc_dt_brg_satuan").val(stn_nama);

	$("#svc_dt_brg_serial").focus();
}//end copy satuan 

// copy data mbil
function svc_ket_copy(ket_id, ket_nama){
	$("#svc_ket_posisi").val(ket_nama);
	$("#svc_ket_id").val(ket_id);

	$("#svc_ket").focus();
}//end copy satuan 

// 	function hapus servis
	function fun_svs_hapus(svc_id,brg_id,svc_serial,svc_jumlah){
		kon=confirm("Anda Yakin Akan Menghapus Data ini??");
		if(kon==true){
			// alert(pbl_id+"/"+brg_id+"/"+pbl_serial+"/"+pbl_jumlah);
			$.ajax({
				url:"pro_transaksi_service.php?pro=delete",
				type:"get",
				data:"svc_id="+svc_id+"&brg_id="+brg_id+"&svc_serial="+svc_serial+"&svc_jumlah="+svc_jumlah,
				cache:false,
				success:function(html){
					// alert(html);
						$("#svc_view").load("pro_transaksi_service.php?pro=select&svc_id="+svc_id);
						$("#svc_view").show();
				}
			});
		}
		
	}//end function hapus data servis

	function fun_svc_selesai(){
		svc_form=$("#svc_form").serialize();
		svc_id=$("#svc_id").val();
      	svc_usr_nama=$("#svc_usr_nama").val();
      	svc_usr_id=$("#svc_usr_id").val();
      	svc_mbl_nopol=$("#svc_mbl_nopol").val();
      	svc_mbl_id=$("#svc_mbl_id").val();
      	svc_mk_nama=$("#svc_mk_nama").val();
      	svc_mk_id=$("#svc_mk_id").val();
      	svc_km=$("#svc_km").val();

		kon=confirm("Anda Yakin Sudah Selesai??");
		if(kon==true){
			if($.trim(svc_id)==""||$.trim(svc_usr_nama)==""||$.trim(svc_usr_id)==""||$.trim(svc_mbl_nopol)==""
      			||$.trim(svc_mbl_id)==""||$.trim(svc_mk_nama)==""||$.trim(svc_mk_id)==""||$.trim(svc_km)==""){

      			alert("Data Masih Ada Yang Kosong!!");
      		}else{
      			// alert(svc_id+"/"+svc_usr_nama+"/"+svc_usr_id+"/"+svc_mbl_nopol+"/"+svc_mbl_id+"/"+svc_mk_nama+"/"+svc_mk_id+"/"+svc_km);
      			// alert(svc_form);
      			$.ajax({
		   			url:"pro_transaksi_service.php?pro=selesai",
					type:"get",
					data:svc_form,
					cache:false,
					success:function(html){
						// alert(html)
			      		$("#svc_mbl_nopol").val("");
			      		$("#svc_mbl_id").val("");
			      		$("#svc_mk_nama").val("");
			      		$("#svc_mk_id").val("");
			      		$("#svc_km").val("");

			      		$("#svc_view").hide('slow');
			      		svc_faktur();
					}
		   		});	//end ajax
      		}//end if 2
		} //end if awal     		
	}//end function

	// valid anggka km servis
function svc_valid_angka_km(evt){
	var charcode= (evt.which) ? evt.which : event.keycode;
		if(charcode>31 &&(charcode <48||charcode>57)){
			alert("maaf harus angka");
			$("#svc_km").val("");
			return false;
		}
	return true;
}//end fungsi

	// valid anggka km servis
function svc_valid_angka_jumlah(evt){
	var charcode= (evt.which) ? evt.which : event.keycode;
		if(charcode>31 &&(charcode <48||charcode>57)){
			alert("maaf harus angka");
			$("#svc_dt_jumlah").val("");
			return false;
		}
	return true;
}//end fungsi

// ========================================================================FILE transaksi_klaim.php
// function faktur servis
	function klm_faktur(){
		$.ajax({
			url:"pro_transaksi_klaim.php",
			type:"get",
			data:"pro=faktur",
			cache:false,
			success:function(html){
				a=html.split("|");
				// console.log(a[0]);
				// console.log(html);
				$("#klm_id").val(a[0]);
			}
		})
	}//end function

// copy data mbil
function klm_mbl_copy(mbl_id, mbl_nopol){
	$("#klm_dt_nopol").val(mbl_nopol);
	$("#klm_dt_nopol_id").val(mbl_id);
	$("#klm_dt_tgl").focus();
}//end copy satuan 

	// valid anggka km servis
function klm_valid_angka_nominal(evt){
	var charcode= (evt.which) ? evt.which : event.keycode;
		if(charcode>31 &&(charcode <48||charcode>57)){
			alert("maaf harus angka");
			$("#klm_dt_harga").val("");
			return false;
		}
	return true;
}//end fungsi

// 	function hapus kalim
	function fun_klm_hapus(klm_id,mbl_id,klm_dt_tgl,klm_dt_harga,klm_dt_ket){
		// alert(klm_id+"/"+mbl_id+"/"+klm_dt_tgl+"/"+klm_dt_harga+""+klm_dt_ket);
		kon=confirm("Anda Yakin Akan Menghapus Data ini??");
		if(kon==true){
			$.ajax({
				url:"pro_transaksi_klaim.php?pro=delete",
				type:"get",
				data:"klm_id="+klm_id+"&mbl_id="+mbl_id+"&klm_dt_tgl="+klm_dt_tgl+"&klm_dt_harga="+klm_dt_harga+"&klm_dt_ket="+klm_dt_ket,
				cache:false,
				success:function(html){
					// alert(html);
						$("#klm_view").load("pro_transaksi_klaim.php?pro=select&klm_id="+klm_id);
						$("#klm_view").show();
				}
			});
		}
		
	}//end function hapus data kalim
// function selasai klaim
	function fun_klm_selesai(klm_total){
		
      	klm_id=$("#klm_id").val();
      	klm_usr_id=$("#klm_usr_id").val();
      	klm_usr_nama=$("#klm_usr_nama").val();

		kon=confirm("Anda Yakin Sudah Selesai?? Pastikan Data Klaim Benar");
		if(kon==true){
			if($.trim(klm_id)==""||$.trim(klm_usr_id)==""||$.trim(klm_usr_nama)==""){

      			alert("Data Masih Ada Yang Kosong!!");
      		}else{
      			// alert(svc_id+"/"+svc_usr_nama+"/"+svc_usr_id+"/"+svc_mbl_nopol+"/"+svc_mbl_id+"/"+svc_mk_nama+"/"+svc_mk_id+"/"+svc_km);
      			// alert(svc_form);
      			$.ajax({
		   			url:"pro_transaksi_klaim.php?pro=selesai",
					type:"get",
					data:"klm_id="+klm_id+"&klm_total="+klm_total,
					cache:false,
					success:function(html){
						// alert(html)
			      		$("#klm_view").hide('slow');
			      		klm_faktur();
					}
		   		});	//end ajax
      		}//end if 2
		} //end if awal     		
	}//end function
// =================================================================================================file lap_servis
// ambil data mobil di laporan servis
function lap_svs_mbl_copy(mbl_id,mbl_nopol){
	$("#lap_svs_mbl_id").val(mbl_id);
	$("#lap_svs_mbl").val(mbl_nopol);

}//end
// ambil data ategori di laporan servis
function lap_svs_ktg_copy(ktg_id,ktg_nama){
	$("#lap_svs_ktg_id").val(ktg_id);
	$("#lap_svs_ktg").val(ktg_nama);

}//end


// =================================================================================file laporan barang/php
function lap_brg_ktg_copy(ktg_id,ktg_nama){
	$("#lap_brg_ktg_id").val(ktg_id);
	$("#lap_brg_ktg").val(ktg_nama);

}//end

function lap_brg_copy(brg_id,brg_nama){
	$("#lap_brg_id").val(brg_id);
	$("#lap_brg").val(brg_nama);

}//end

// ====================================================================================file lpa_klaim.php
function lap_klm_mbl_copy(mbl_id,mbl_nopol){
	$("#lap_mbl_id").val(mbl_id);
	$("#lap_mbl_nama").val(mbl_nopol);

}//end