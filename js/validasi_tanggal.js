$(document).ready(function(){ 

$("#jumlah_hari").hide();
$("#jumhar2_div").hide();
$("#price_div").hide();
$("#datepicker3").val("");
$("#datepicker4").val("");
$("#check_in").val("");
$("#check_out").val("");
$("#apartemen").val("");
$("#unit").val("");
$(".number1").val("");

function getdatebyval(dt){ //dt adalah nama id dari elemen
	var a = $(dt).val();a = a.split('/');
	return new Date(a[2]+'-'+a[0]+'-'+a[1]);
}

function selisihtanggal(i,o){ // i dan o adalah nama id dari elemen
	var CI = getdatebyval(i);
	var CO = getdatebyval(o);
	var s = new Date(CI).getTime();
	var z = new Date(CO).getTime();	
	x = z-s;
	return x/86400000;
}

function jumharshow(i,o,j) // i = #datepicker3 atau #check_in ; o = #datepicker4 atau #check_out; j = #jumlah_hari/#jumlah_hari2 
{
	var b = $(o).val();
	if (b!='')
	{
		x = selisihtanggal(i,o);
		$(j).val(x+' hari');
		if(i=="#check_in") 
		$("#jumhar2_div").show();
		$(j).show(); 
	} else {
		if(i=="#datepicker3") $(j).hide();
		else $("#jumhar2_div").hide();
	} 
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

function showharga(){
	var a = getdatebyval("#check_in");
	var b = a.getDay();
	var price;
	var id =  $("#unit").val().split("*");
	if(b==0 || b==6)
		price = id[2];
	else
		price = id[1];
	$("#price").val(price);
	$("#price_div").show();	
}

function gantiCI(i,o,j)
{
		var tgl_ci = getdatebyval(i);
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
			var CI = new getdatebyval(i);
			var CO = new getdatebyval(o);
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

function ubahco(ci,co,juhar){
	jumhar = Number($(juhar).val());
	if ($(ci).val()==""){
		$(juhar).hide();
		if(ci=="#check_in") 
		$("#jumhar2_div").hide();
	} else {
		var CI = getdatebyval(ci);
		$(co).val(nilaitanggal(CI,jumhar));		
	}
}

function totext(obj, id){
	var a = obj.value;
	if(a=="") {
		if(id=="jumlah_hari")
			a = selisihtanggal("#datepicker3","#datepicker4");
		else 
			a = selisihtanggal("#check_in","#check_out");
	} 
	obj.type = 'Text';
	obj.value = a+' hari';
}

function tonumber(obj){
	var a = obj.value;
	var i = a.length;
	var res ='';
	for(j=0;j<i-5;j++){
		res = res+a[j];
		z = Number(res);
	}
	obj.type = 'Number';
	obj.value = z;
}

// end of function

//event jquery
//unit changer
$("#unit").change(function(){
	if($("#check_in").val()!="" && this.value!="0"){
		showharga();
	}
	else 
		$("#price_div").hide();
});

//date picker changer

    $("#datepicker3").change(function(){
		gantiCI("#datepicker3","#datepicker4","#jumlah_hari");
	});
	
    $("#check_in").change(function(){
		gantiCI("#check_in","#check_out","#jumlah_harii2");
		if($("#unit").val()!="" && $("#unit").val()!="0"){
			showharga();
		}
	});	
	
	$("#datepicker4").change(function(){
       gantiCO("#datepicker3","#datepicker4","#jumlah_hari");
	});

	$("#check_out").change(function(){
       gantiCO("#check_in","#check_out","#jumlah_harii2");
	});

//jumlah hari movement

	$("#jumlah_hari").hover(function(){
    	tonumber(this);
	},
		function(){
			totext(this, this.id);
	});

	$("#jumlah_harii2").hover(function(){
    	tonumber(this);
	},
		function(){
			totext(this, this.id);
	});

	$("#jumlah_harii2").touchstart(function(){
       tonumber(this);
	});	

	$("#jumlah_harii2").touchend(function(){
       totext(this, this.id);
	});

//jumlahhari changer

	$("#jumlah_hari").change(function(){
       ubahco("#datepicker3","#datepicker4","#jumlah_hari");
	});

	$("#jumlah_hari").keyup(function(){
       if(this.value!='')
       	ubahco("#datepicker3","#datepicker4","#jumlah_hari");
	});	

	$("#jumlah_harii2").change(function(){
       ubahco("#check_in","#check_out","#jumlah_harii2");
	});

	$("#jumlah_harii2").keyup(function(){
       if(this.value!='')
       	ubahco("#check_in","#check_out","#jumlah_harii2");
	});	
	
});
