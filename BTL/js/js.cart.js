function updown(key,id,price){
	id1 = "quantity"+id;
	id2 = 'price'+id;
	if(key=="down" && document.getElementById(id1).value > 1){
		document.getElementById(id1).value --;
		var number = document.getElementById(id1).value;
		 document.getElementById(id2).innerHTML = Intl.NumberFormat().format(number*price)+"Đ";
	}
	if(key=="up"){
		document.getElementById(id1).value ++;
		var number = document.getElementById(id1).value;
		 document.getElementById(id2).innerHTML = Intl.NumberFormat().format(number*price) +"Đ";
	}
	var id = id;
	var sl = document.getElementById(id1).value;
	var f = "id=" + id + "&type=edit&sl=" + sl;
	//alert(f);
	var _url = "ajax/ajax.cart.php?"+f;
	$.ajax({
		url: _url,
		data: f,
		cache: false,
		context: document.body,
		success: function(data) {
			$("#mini-cart").html(data);
			document.getElementById('thanhtien').value = document.getElementById('total_cart').value;
			document.getElementById('tong').innerHTML = "Tổng: "+Intl.NumberFormat().format(document.getElementById('total_cart').value)+"Đ";
		}
	});
	
};