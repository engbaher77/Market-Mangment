function inventory_confirm(invoiceOrder,invoiceNumber){

var array = new Array(invoiceOrder,invoiceNumber);
		alert (invoiceOrder);
		//alert (invoiceNumber);
	
	
	if (confirm('تأكيد العمليه')) {
    // Save it!
		var xmlobj = new XMLHttpRequest();
			xmlobj.open("Get", "../lib/done_cancel_inventory.php?q=" + JSON.stringify(array), true);
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
//document.getElementById("searchFilter").focus();		
		
	else {
    // Do nothing!
		}	
    

}
document.getElementById("searchFilter").focus();
