function currentInvoice(id,Price){
var invoiceId =id;
var Price = Price;

var x = prompt("ضع الكميه", "1");
var newPrice = prompt ("الاجمالي" , (Price*x));
var num1 = parseInt(x);
var array = new Array(invoiceId,num1,newPrice);

	//alert (num1);
	//alert (invoiceId);
	//alert (new_price);
	
	var xmlobj = new XMLHttpRequest();
			xmlobj.open("Get", "lib/current_invoice.php?q=" + JSON.stringify(array), true);
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

