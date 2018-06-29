var TableDatatablesEditable = function () {
	
		//Global Variable for cell id
		var content="";
		var newRow="";
		
    var handleTable = function () {

        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }
			
            oTable.fnDraw();
        }

        function editRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[2] + '">';
            jqTds[3].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[3] + '">';
			jqTds[4].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[4] + '">';
			jqTds[5].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[5] + '">';
			jqTds[6].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[6] + '">';

		
            jqTds[7].innerHTML = '<a class="edit" href="">Save</a>';
            jqTds[8].innerHTML = '<a class="cancel" href="">Cancel</a>';
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
			oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
			oTable.fnUpdate(jqInputs[5].value, nRow, 5, false);
			oTable.fnUpdate(jqInputs[6].value, nRow, 6, false);
            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 7, false);
            oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 8, false);
            oTable.fnDraw();
			//value of each cell
			id=jqInputs[3].value;
			content=jqInputs;
        }

        function cancelEditRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
			oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
			oTable.fnUpdate(jqInputs[5].value, nRow, 5, false);
			oTable.fnUpdate(jqInputs[6].value, nRow, 6, false);

            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 7, false);
            oTable.fnDraw();
        }

        var table = $('#sample_editable_1');

        var oTable = table.dataTable({

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // set the initial value
            "pageLength": 20,

            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ], // set first column as a default sort by asc
			
			buttons: [
                { extend: 'print',
									customize: function ( win ) {
										$(win.document.body)
											.css( 'font-size', '10pt' )
											.prepend(
												'<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
											);
					 
										$(win.document.body).find( 'table' )
											.addClass( 'compact' )
											.css( 'font-size', 'inherit' );
									},
								 className: 'btn dark btn-outline' },
                { extend: 'pdf', className: 'btn green btn-outline' },
                { extend: 'csv', className: 'btn purple btn-outline ' }
            ],
			
			"dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            


        });

        var tableWrapper = $("#sample_editable_1_wrapper");

        var nEditing = null;
        var nNew = false;

        $('#sample_editable_1_new').click(function (e) {
            e.preventDefault();

            if (nNew && nEditing) {
                if (confirm("Previose row not saved. Do you want to save it ?")) {
                    saveRow(oTable, nEditing); // save
                    $(nEditing).find("td:first").html("Untitled");
                    nEditing = null;
                    nNew = false;

                } else {
                    oTable.fnDeleteRow(nEditing); // cancel
                    nEditing = null;
                    nNew = false;
                    
                    return;
                }
            }

            var aiNew = oTable.fnAddData(['', '', '', '', '','', '', '', '']);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            editRow(oTable, nRow);
            nEditing = nRow;
            nNew = true;
			newRow ="1";
        });
	/*	
		 //Row index detrmination
		 function getRow(){
			var table = $('#sample_editable_1').DataTable();
			var myFunc = $('#sample_editable_1 tbody').on( 'click', 'tr', function () {
			var rowNumber=table.row( this ).index();
			cellId = document.getElementById("sample_editable_1").rows[rowNumber+1].cells[0].innerHTML;
		 } )}	
			*/
        table.on('click', '.delete', function (e) {
            e.preventDefault();

            if (confirm("Are you sure to delete this row ?") == false) {
                return;
            }

            var nRow = $(this).parents('tr')[0];
			var rowIndex = $(this).parents("tr:first")[0].rowIndex;
			cellId = document.getElementById("sample_editable_1").rows[rowIndex].cells[0].innerHTML;
            oTable.fnDeleteRow(nRow);
           //alert("Deleted! Do not forget to do some ajax to sync with backend :)");
			//alert(cellId);
	
			var xmlobj = new XMLHttpRequest();
			xmlobj.open("Get", "lib/delete.php?q=" + cellId, true);
					xmlobj.onreadystatechange=function(){
						if(xmlobj.readyState==4 && xmlobj.status==200){
							document.getElementById("response").innerHTML=xmlobj.responseText;
						}
					}
		    xmlobj.send();	
        });

        table.on('click', '.cancel', function (e) {
            e.preventDefault();
            if (nNew) {
                oTable.fnDeleteRow(nEditing);
                nEditing = null;
                nNew = false;
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

		
		
		/*
		Edit Function
		 ********
		 */
        table.on('click', '.edit', function (e) {
            e.preventDefault();
             nNew = false;
            
            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* Editing this row and want to save it */
                saveRow(oTable, nEditing);
                nEditing = null;
                //alert("Updated! Do not forget to do some ajax to sync with backend :)");
				
				id=content[0].value;
				barcode=content[1].value;
				name=content[2].value;
				quantity=content[3].value;
				new_price=content[4].value;
				old_price=content[5].value;
				description=content[6].value;
				var arr=new Array(id,barcode,name,quantity,new_price,old_price,description,newRow);
				//alert(newRow);
				
				/*
				Ajax Function ***
				*************
				*/
				var xmlobj = new XMLHttpRequest();
				xmlobj.open("Get", "lib/edit.php?q=" + JSON.stringify(arr), true);
					xmlobj.onreadystatechange=function(){
						if(xmlobj.readyState==4 && xmlobj.status==200){
							document.getElementById("response").innerHTML=xmlobj.responseText;
						}
					}
					xmlobj.send();
					
			} else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
			newRow = "2";
        });
    }

    return {

        //main function to initiate the module
        init: function () {
            handleTable();
        }

    };

}();

jQuery(document).ready(function() {
    TableDatatablesEditable.init();
});