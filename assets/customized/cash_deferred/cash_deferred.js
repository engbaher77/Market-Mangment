function cash_deferred(){
			var cash_style =document.getElementById("cash");
			var deferred_style =document.getElementById("deferred");
			var vendor_customer_style = document.getElementById("vendor_customer")

			if(cash_style.checked){
				vendor_customer_style.style.visibility = "hidden";
			}

			else{
				vendor_customer_style.style.visibility = "visible";
			}
}
