(function(document) {
	'use strict';
	
	
	var LightTableFilter = (function(Arr) {

		var _input;
		var st;
		var searchFilter;

		function _onInputEvent(e) {
			_input = e.target;
			
			//change attributer line
			searchFilter = document.getElementById("searchFilter");
			st =document.getElementById("search_table");
			if(searchFilter.value!=""){
			//st.style.visibility= "visible";
			st.style.display= "block";
			//if(st!=null){st.style.visibility= "visible";}
			//else if(st=""){st.style.visibility= "hidden";}
			}
			else{//st.style.visibility = "hidden";
					st.style.display= "none";
			}
			
			var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filter);
				});
			});
		}

		function _filter(row) {
			var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('light-table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = _onInputEvent;
				});
			}
		};
	})(Array.prototype);
	
	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
			LightTableFilter.init();
		}
	});

})(document);