$(document).ready(function(){ 

$("#jumlah_hari").hide();
$("#jumlah_harii2").hide();

function jumharshow(i,o,j) // i = #datepicker3 atau #check_in ; o = #datepicker4 atau #check_out; j = #jumlah_hari/#jumlah_hari2 
{
	var a = $(i).val();a = a.split('/');
	var b = $(o).val();
	if (b!='')
	{
		b = b.split('/');
		var CI = new Date(a[2]+'-'+a[0]+'-'+a[1]);
		var CO = new Date(b[2]+'-'+b[0]+'-'+b[1]);
		var s = new Date(CI).getTime();
		var z = new Date(CO).getTime();
		x = z-s;
		x = x/86400000;
		$(j).val(x+' hari');
		$(j).show(); 
	} else $(j).hide(); 
}

function nilaitanggal(t, b)
{
	t.setDate(t.getDate()+b);
	t.setHours(7); t.setMinutes(0); t.setSeconds(0); t.setMilliseconds(0);
	bln = t.getMonth()+1; thn = t.getFullYear(); hr = t.getDate();
	b2 = Number(bln); h2 = Number(hr);
	if(b2<10) bln = '0'+ bln; if(h2<10) hr = '0'+ hr;
	return bln+'/'+hr+'/'+thn;
}

function gantiCI(i,o,j)
{
		var a = $(i).val();
		a = a.split('/');
		var tgl_ci = new Date(a[2]+'-'+a[0]+'-'+a[1]);
		var sekarang  = new Date();
		sekarang.setHours(7); sekarang.setMinutes(0); 
		sekarang.setSeconds(0); sekarang.setMilliseconds(0);
		var c_tgl_co = tgl_ci;
		if (tgl_ci<sekarang)
		{
			swal("","Tanggal Check in tidak boleh kurang dari hari ini","error");
			$(i).val(nilaitanggal(sekarang,0));
			c_tgl_co = sekarang;
		}
		$(o).val(nilaitanggal(c_tgl_co,1));jumharshow(i,o,j);
}

	
function gantiCO(i,o,j)
{
		if ($(i).val()!="")
		{
			var a = $(i).val();a = a.split('/');
			var b = $(o).val();b = b.split('/');
			var CI = new Date(a[2]+'-'+a[0]+'-'+a[1]);
			var CO = new Date(b[2]+'-'+b[0]+'-'+b[1]);
			if (CO<=CI)
			{
			swal("Tanggal Check Out tidak valid","Pilih tanggal setelah check in","error");			
			$(o).val("");
			}
		}
		else 
		{
			swal("","Isi terlebih dahulu check in","error");
			$(o).val("");
		}
		jumharshow(i,o,j);
	
}	
    $("#datepicker3").change(function(){
		gantiCI("#datepicker3","#datepicker4","#jumlah_hari");
	});
	
    $("#check_in").change(function(){
		gantiCI("#check_in","#check_out","#jumlah_harii2");
	});	
	
	$("#datepicker4").change(function(){
       gantiCO("#datepicker3","#datepicker4","#jumlah_hari");
	});

	$("#check_out").change(function(){
       gantiCO("#check_in","#check_out","#jumlah_harii2");
	});
	
	
});
