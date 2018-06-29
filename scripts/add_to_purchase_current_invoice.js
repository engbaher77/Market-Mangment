function currentPurchaseInvoice(id,price){
var invoiceId =id;
var old_price = price;
var x = prompt("ضع الكميه", "1");
var newPrice = prompt("الاجمالى", old_price);
//var num1 = parseInt(x);
//var num2 = parseInt(newPrice);
var array = new Array(invoiceId,x,newPrice);

	//alert (newPrice);
	//alert (invoiceId);
	
	var xmlobj = new XMLHttpRequest();
			xmlobj.open("Get", "lib/current_purchase_invoice.php?q=" + JSON.stringify(array), true);
					xmlobj.onreadystatechange=function(){
						if(xmlobj.readyState==4 && xmlobj.status==200){
							document.getElementById("response").innerHTML=xmlobj.responseText;
						}
					}
		    xmlobj.send();

	var delayInMilliseconds = 1000; //1 second

		setTimeout(function() {
		//your code to be executed after 1 second
  			$( "#current_invoice" ).load( "index.php #current_invoice" );

		}, delayInMilliseconds);	
document.getElementById("searchFilter").focus();				
			
}
