function delete_record(table_id,record_id){
	//alert(table_id);
	//alert(record_id);
	
	var array = new Array(table_id,record_id);

	var xmlobj = new XMLHttpRequest();
			xmlobj.open("Get", "lib/delete_record.php?q=" + JSON.stringify(array), true);
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
			
	
}