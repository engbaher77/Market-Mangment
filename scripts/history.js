function history(table_id,record_id){
	
			//close history_pages
			if(table_id=="CC" && record_id == "0"){
										window.close("./history.php", "الفواتير السابقه", "height=600,width=600");
										window.close("./history_perview_purchases.php", "الفواتير السابقه", "height=600,width=600");
										window.close("./history_perview_sells.php", "الفواتير السابقه", "height=600,width=600");
														//alert(table_id);

			}
			
			
			
			
			
			
			
			//close history_perview_purchases
			else if(table_id=="CP" && record_id == "0"){
										window.open("./history.php?q=P", "الفواتير السابقه", "height=600,width=600");
			}

			
			//Open Old_purchases invoice sheet
			else if(table_id=="P" && record_id == "0"){
										window.open("./pages/history.php?q=P", "الفواتير السابقه", "height=600,width=900");
			}
			
			//open specific invoice from purchases invoices
			else if(table_id == "PV"){
				window.location = './history_perview_purchases.php?q=' + record_id;
				//alert (table_id);
			
			}
			
			
			
			
			
			
			
			//close history_perview_sells
			else if(table_id=="CS" && record_id == "0"){
										window.open("./history.php?q=S", "الفواتير السابقه", "height=600,width=600");
			}	
			
			//Open Old_Sells invoice sheet
			else if(table_id=="S" && record_id == "0"){
										window.open("./pages/history.php?q=S", "الفواتير السابقه", "height=600,width=900");
			}
			
			//open specific invoice from sells invoices
			else if(table_id == "SV"){
				//alert(table_id);
				window.location = './history_perview_sells.php?q=' + record_id;
			
			}
			
			
			
			
			
			//Open vendor-customer-payments sheet
			else if(table_id=="vcp" && record_id == "0"){
										window.open("./pages/history.php?q=vcp", "الفواتير السابقه", "height=600,width=900");
			}
						
}



function history_delete_record(table_id,record_id){
	
if (confirm('تأكيد العمليه')) {
	var array = new Array(table_id,record_id);
		var xmlobj = new XMLHttpRequest();
			xmlobj.open("Get", "../lib/history_delete_record.php?q=" + JSON.stringify(array), true);
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
	//alert(table_id);
	//alert(record_id);
		
}