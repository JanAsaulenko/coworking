import Selector from './Selector'
import DataPicker from './DataPicker'
import Space from './Space'
import Seet from  './Seet'
import ReserveSeats from './ReserveSeats';
import DateRange from './DateRange';

$(document).ready(function () {

  const city = $('.city-select');
  const places = $('.place-select');
  const placeSelector = new Selector(city, {
    url: '/reservation/getPlaces',
    method: 'get',
    dataType: 'json'
  }, places);
  placeSelector.request();


    const choosePlace = new Selector(places,
      { url: '/reservation/choosePlace',
      method: 'get',
      dataType: 'json'});
    choosePlace.choose();


  const spaces = $('.space-select');
  const spaceSelector = new Selector(places, {
    url: '/reservation/getSpaces',
    method: 'get',
    dataType: 'json',
  }, spaces);
  spaceSelector.request();

  const chooseSpace = new Selector(spaces, {
      url:'/reservation/chooseSpace',
      method: 'get',
      dataType: 'json',});
  chooseSpace.choose();



  const from = $('.fromdate');
  const to = $('.todate');
  const reservationDataPicker = new DataPicker();
  reservationDataPicker.getDays(from,to);

  const space = new Space();
  const seet = new Seet();
  const reserve = new ReserveSeats();
  const range  = new DateRange()
});






// //ADD ROW TO TABLE
//   let rows = $("#reserv-table").attr("datarows");
//   $(".add-row").click(function () {
//     rows++;
//     console.log(rows);

// let testClone = $('#reserv-table').find('tr:last').clone();
// console.log(testClone);
// testClone.find('td:first').text(rows);				//change row number
// testClone.find('input:first').attr("placeholder", "Введіть ім'я клієнта №"+rows);	//change placeholder
//
// function changeNumber (i, old){		// change input and selectors names	and id's
// 	if (old !== undefined)
// 		return old.replace( old.replace(/\D+/g,""), rows);
// 	return old;
// }
// testClone.find('input, select').attr("id", changeNumber);	// change input and selectors id's
// testClone.find('input, select').attr("name", changeNumber);	// change input and selectors names
// testClone.closest('tr').find('.promo-code-input').attr('disabled', 'true').val("").css("background","#ebebe4");
// testClone.find('input').removeClass('hasDatepicker'); 		// delete hasDatepicker class
//
// //new datapickers init
// testClone.find(".fromdate").each(function(){
// 	let from = $(this);
// 	from.datepicker({
// 		defaultDate: 0,
// 		changeMonth: true,
// 		numberOfMonths: 1,
// 		minDate: 0
// 	});
// 	from.parent().parent().find('.todate').on("change", function() {
// 		from.datepicker( "option", "maxDate", getDate( this ))} );
// });
// testClone.addClass('promo-code-input');
// testClone.find(".todate").each(function(){
// 	let to = $(this);
// 	to.datepicker({
// 		defaultDate: 0,
// 		changeMonth: true,
// 		numberOfMonths: 1,
// 		minDate: 0
// 	});
// 	to.parent().parent().find('.fromdate').on("change", function() {
// 		to.datepicker( "option", "minDate", getDate( this ))} );
// });

// testClone.appendTo('#reserv-table');	//adding new row

// getPrice();
// return false;
//   })
// })


//
// // //DELETE TABLE-ROW BUTTON
//   $(document).on("click", ".del-row", function(){
//     if ($(".del-row").length === 1)
//       alert("Хоча б одна строка має лишитись!");
//     else
//       $(this).parents('tr').remove();
//     a = [];
//     clearAll();
//     getPrice();
//     return false;
//   } );
//
//
//
//
//
// // //PRICE AJAX
// 	$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });
// 	let totalSumm = 0;
//
// 	function getPrice(){
//         let x = $("form").serializeArray();
//         $.ajax({
// 			url: 'calculate',
// 			method: 'post',
// 			data: x,
// 			success: function(data){
// 				totalSumm = 0;
// 				let i = 0;
// 				$('.pricetd').each(function(){
// 					let summ = data[i++];
// 					totalSumm += summ;
// 					$(this).text(summ);
// 				});
// 				$(".total-sum").text(totalSumm + " грн.");
// 			}
// 		});
// 		return false;
//     }
//
//     function isValidCodes(elem,resolve,reject) {
//         let ajax = new Promise(function (res,rej) {
//             $.ajax({
//                 url: 'checkCode',
//                 method: 'get',
//                 data: {
//                     code: $(elem).val()
//                 },
//                 success: function (isValid) {
//                     if (isValid == "1"){
//                         res();
//                         $(elem).css("background", "#e2fddf");
//                     } else if( $(elem).val() !== ''){
//                         rej();
//                         $(elem).css("background", "#fddfdf");
//                     }
//                 }
//             });
//         });
//
//         ajax.then(res => {
//         	if (resolve)
//         	    resolve();
//         },rej => {
//             if (reject)
//                 reject();
//             })
//         }
//
//     getPrice();
// 	$('#reserv-table').change(function(e){
//         $("select option:selected[value='6']").closest('tr').find('.promo-code-input').removeAttr('disabled');
// 		getPrice();
// 		let elems = $('tr .promo-code-input');
// 		for (let k = 0; k < elems.length; k++) {
// 			a[k] = $(elems[k]).val();
// 			isValidCodes(elems[k]);
// 		}
// 		for (let m = 0; m < a.length; m++){
// 			for (let n = 0; n < a.length; n++){
// 				if (a[m] == a[n] && a[m]!="" && m != n) {
// 					clearAll();
// 				}
// 			}
// 		}
// 	});
//
// 	function clearAll() {
// 		let elems = $('tr .promo-code-input');
// 		for (let k=0; k < elems.length; k++){
// 			$(elems[k]).val("").css("background", "white");
// 		}
// 		getPrice();
// 	}
//
//  //PROMOCODES INPUT
// 	let valuePromoCod = 6;
//
// 	$(document).on("change", "select", function(){
// 		if (this.value == valuePromoCod)
// 			$(this).closest('tr').find('.promo-code-input').removeAttr('disabled').css("background","white");
// 		else
// 			$(this).closest('tr').find('.promo-code-input').attr('disabled', 'true').val("").css("background","#ebebe4");
// 	});
//
//
// 	let a = new Array();
//
// 	$('#reserv-done-btn').click(function(){
//         let elements = $('tr .promo-code-input');
//         for(let i = 0; i < elements.length; i++){
//         	if ( !$(elements[i]).prop("disabled")  ) {
// 				function reject(){
//                     $('form').submit()
// 				}
// 				function resolve() {
// 					alert('enter valid date')
//                 }
//                 isValidCodes(elements,reject,resolve);
//             }
//             else $('form').submit()
//         }
//     })
// });