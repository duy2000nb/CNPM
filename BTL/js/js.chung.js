// xóa giỏ hàng
function deletecart(id){
var f = "id=" + id + "&type=delete";
var _url = "ajax/ajax.cart.php?"+f;
$.ajax({
	url: _url,
	data: f,
	cache: false,
	context: document.body,
	success: function(data) {
		$("#mini-cart").html(data);
	}
});
};
	


