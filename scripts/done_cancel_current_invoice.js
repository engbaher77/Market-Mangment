function done_cancel_current_invoice(id){
var invoiceOrder =id;
var dateval = document.getElementById("dateval").value;
var cash = document.getElementById("cash").checked;
var deferred = document.getElementById("deferred").checked;
var vendor_customer_name = $( "#vendor_customer_name option:selected" ).text();
var vendor_customer_id = $( "#vendor_customer_name option:selected" ).attr('value');
var array = new Array(invoiceOrder,dateval,cash,deferred,vendor_customer_name,vendor_customer_id);

	alert (vendor_customer_id);
	
	if (confirm('تأكيد العمليه')) {
    // Save it!
		var xmlobj = new XMLHttpRequest();
			xmlobj.open("Get", "lib/done_cancel_current_invoice.php?q=" + JSON.stringify(array), true);
				xmlobj.onreadystatechange=function(){
					if(xmlobj.readyState==4 && xmlobj.status==200){
						document.getElementById("response").innerHTML=xmlobj.responseText;
					}
				}
				xmlobj.send();

			
			var delayInMilliseconds = 1000; //1 second

			setTimeout(function() {
			//your code to be executed after 1 second
				//$( "#current_invoice" ).load( "index.php #current_invoice" );
				location.reload();
			}, delayInMilliseconds);
			
			

	}
	
	else {
    // Do nothing!
		}	
		
    
document.getElementById("searchFilter").focus();	
}
	
