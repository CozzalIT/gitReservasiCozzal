$(document).ready(function(){ 

function nilaitanggal(t, b)
{
	t.setDate(t.getDate()+b);
	t.setHours(7); t.setMinutes(0); t.setSeconds(0); t.setMilliseconds(0);
	bln = t.getMonth()+1; thn = t.getFullYear(); hr = t.getDate();
	b2 = Number(bln); h2 = Number(hr);
	if(b2<10) bln = '0'+ bln; if(h2<10) hr = '0'+ hr;
	return bln+'/'+hr+'/'+thn;
}


    $("#datepicker3").change(function(){
		var a = $("#datepicker3").val();
		a = a.split('/');
		var tgl_ci = new Date(a[2]+'-'+a[0]+'-'+a[1]);
		var sekarang  = new Date();
		sekarang.setHours(7); sekarang.setMinutes(0); 
		sekarang.setSeconds(0); sekarang.setMilliseconds(0);
		var c_tgl_co = tgl_ci;
		if (tgl_ci<sekarang)
		{
			swal("","Tanggal Check in tidak boleh kurang dari hari ini","error");
			$("#datepicker3").val(nilaitanggal(sekarang,0));
			c_tgl_co = sekarang;
		}
		$("#datepicker4").val(nilaitanggal(c_tgl_co,1));
    });
	
	$("#datepicker4").change(function(){
		if ($("#datepicker3").val()!="")
		{
			var a = $("#datepicker3").val();a = a.split('/');
			var b = $("#datepicker4").val();b = b.split('/');
			var CI = new Date(a[2]+'-'+a[0]+'-'+a[1]);
			var CO = new Date(b[2]+'-'+b[0]+'-'+b[1]);
			if (CO<=CI)
			{
			swal("Tanggal Check Out tidak valid","Pilih tanggal setelah check in","error");			
			$("#datepicker4").val("");
			}
		}
		else 
		{
			swal("","Isi terlebih dahulu check in","error");
			$("#datepicker4").val("");
		}
    });
});
