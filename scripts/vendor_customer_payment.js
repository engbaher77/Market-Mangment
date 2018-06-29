
function vendor_customer_payment(id){
var vendor_customer_id = id;
var vendor_customer_payment_value = document.getElementById("payment_value").value;
var dateval = document.getElementById("dateval").value;


	alert (vendor_customer_payment_value);
	alert (vendor_customer_id);
	
	if (confirm('تأكيد العمليه')) {
		
		var table_order = "D";
		var array = new Array(vendor_customer_id,vendor_customer_payment_value,dateval,table_order);

    // Save it!
		var xmlobj = new XMLHttpRequest();
			xmlobj.open("Get", "lib/done_cancel_current_vendor_customer_payment.php?q=" + JSON.stringify(array), true);
				xmlobj.onreadystatechange=function(){
					if(xmlobj.readyState==4 && xmlobj.status==200){
						document.getElementById("response").innerHTML=xmlobj.responseText;
					}
				}
				xmlobj.send();

		/*	
			var delayInMilliseconds = 1000; //1 second

			setTimeout(function() {
			//your code to be executed after 1 second
				//$( "#current_invoice" ).load( "index.php #current_invoice" );
				location.reload();
			}, delayInMilliseconds);
			*/
			

	}
	
	else {
    // Do nothing!
		}	
		

	
}