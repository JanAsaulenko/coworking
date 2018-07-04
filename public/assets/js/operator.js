$(document).ready(function(){

// DATATABLE INIT
     $('#orders-table').removeClass('hidden');
     var table = $('#orders-table').DataTable({
     	"order": [[ 0, "desc" ]],		//sorting order
     	"pageLength": 15,				//pagination size
     	"columnDefs": [{"targets": [ 9 ], "visible": false}] //hiding StatusID column
     });

// TABLE FILTER VIA CHECKBOX STATUS
	var regStr = "[12345]";	//regular expression to filter table via checkbox status
     $("input[type='checkbox']").click(function() {			
		var regArr = regStr.split('');	//convert regString to regArray
		if (this.checked) {
			regArr[this.name] = this.name;	//changing regular epression in array
		} 
		else{
			regArr[this.name] = 0;	//changing regular epression in array
		}
		regStr = regArr.toString().replace(/,/g,'');	//convert regArray back to regString
		table.column(9).search(regStr, true).draw();	//filtering table	
	});

//AJAX X-CSRF-TOKEN INIT
	$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

// MODAL BOX
	$(document).on("click", "#orders-table td", function(){
		var orderID = $(this).parents('tr').find('td:first').text();
		var bookingID = $(this).parents('tr').find('td').eq(8).text();
		$("#order-num").text(orderID);
		$.ajax({
			url:'operator/showorder',
			method:'post',
			dataType: "json",
			data:{"reservation_id" : orderID, "bookingfacts_id" : bookingID},
			success: function (data) {
				$('.filled').remove();
					var row = $("#empty-row").clone();
					row.removeClass("hidden").removeAttr('id').addClass('filled');
					row.find('.DOname').text(data.name);
					row.find('.DOphone').text(data.phone);
					row.find('.DOemail').text(data.email);
					$("#empty-row").after(row);
				$("#myModal").modal();
			}
		});	
	})

//CHANGING ORDER STATUS
	$(document).on("click", ".modal-footer button", function(){
		var action = this.value;
		var orderID = $("#order-num").text();
		if (action == 'print'){	
			alert('PRINT' + orderID);
		}
		else{
			$.ajax({
				url:'operator/updateorder',
				method:'post',
				data:{"reservation_id" : orderID, 'status_id' : action},
				success: function (answer) {
					if (answer != "OK") alert (answer);
					else{
						$("#myModal").modal("hide");
						location.reload();
					}
				}
			});
		}
	});
});