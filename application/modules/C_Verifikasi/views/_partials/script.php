<script type="text/javascript">


	function save()
	{
		var data = $("#formSertifikat").serialize()
		console.log(data)
		store('<?= base_url("C_InputSertifikat/save") ?>', 'It will be saved!',data)
	}

	function get_data(id){
		$.ajax({
			type:"post",
			url: "<?=base_url("C_InputSertifikat/getRow") ?>",
			data: {id : id },
			success:function(data){
				dtl = JSON.parse(data)
				console.log(dtl)
				$.each(dtl,function(i,val){
					$('#sertifikat_id').val(id)
					$('#alamat_lengkap').val(val.alamat_lengkap)
					$('#kode_standar').val(val.kode_standar)
					$('#ea_code').val(val.ea_code)
					$('#kode_sales').val(val.kode_sales)
					$('#nama_perusahaan').val(val.nama_perusahaan)
					$('#jumlah_karyawan').val(val.jumlah_karyawan)
					$('#status').val(val.status)
					$('#tanggal_terbit').val(val.tanggal_terbit)
					
					// $('#kode_standar [value='+ val.kode_standar  +'').attr('selected','selected');
					// $('#ea_code [value='+ val.ea_code  +'').attr('selected','selected');
					// $('#kode_sales [value='+ val.kode_sales  +'').attr('selected','selected');
					$('#scope').val(val.scope)
				})
			}
		})
	}

	function _delete(id)
	{
		data = {id : id}
		deleted('<?= base_url("C_InputSertifikat/deleted") ?>', data);
	}


	$('.close, .close_btn, .btn-add').click(function(){
		$(this).closest('.modal').find('input,textarea,select').val('').end().find("input[type=checkbox], input[type=radio]").prop("checked", "").end()
	})


</script>