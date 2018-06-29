function func(){
	
	
	//variables
	var massege;
	var amount = document.getElementById("id_id").value;
	
	
	//conditions
	if(amount==="0"){massege = "enter number bigger than zero";}
	else if(amount < 0){massege = "You are doing a fetal mistake";}
	else if(amount >1000){massege = "You are going so far";}
	else if(isNaN(amount)){massege = "This is not number dude";}
	else if(amount===""){massege = "Enter an ID";}
	
			
	else{
	
			
	
	
				var arr=new Array(amount);
				alert(arr);
				/*
				Ajax Function ***
				*************
				*/
				var xmlobj = new XMLHttpRequest();
				xmlobj.open("Get", "pages/dashboard_content.php?q=" + JSON.stringify(arr), true);
					xmlobj.onreadystatechange=function(){
						if(xmlobj.readyState==4 && xmlobj.status==200){
							document.getElementById("response").innerHTML=xmlobj.responseText;
						}
					}
					xmlobj.send();
					alert("sent");
		}

//results
			document.getElementById("massege").innerHTML = massege;		
}