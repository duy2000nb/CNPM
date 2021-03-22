  function addcart(id,price){
			
		if(document.getElementById("size").value =="")
		{
			alert("Ban chua dien size");
			document.getElementById("size").focus();
			return;
		}
		
		if(document.getElementById("color").value =="")
		{
			alert("Ban chua dien mau");
			document.getElementById("color").focus();
			return;
		}
		var id = id;
		var price = price;
		//alert(price);
		var sl = document.getElementById("quantity").value;
		var size = document.getElementById("size").value;
		var color = document.getElementById("color").value;
		
		
		var f = "id=" + id + "&type=add&sl=" + sl+'&size=' + size + '&color='+color+'&price='+price;
		//alert(f);
		var _url = "ajax/ajax.cart.php?"+f;
		$.ajax({
			url: _url,
			data: f,
			cache: false,
			context: document.body,
			success: function(data) {
				$("#mini-cart").html(data);
				alert("Thêm thành công vào giỏ hàng");
			}
		});
	}
	function zoom(id){
		// lấy dữ liệu hình ảnh
		var data= document.getElementById(id).getAttribute("src")
		// hiển thị ảnh được chọn
		image.src = data;
		// active
	}
	function updown(key){
		if(key=="down" && document.getElementById("quantity").value > 1){
			document.getElementById("quantity").value --;
		}
		if(key=="up"){
			document.getElementById("quantity").value ++;
		}
		
	}