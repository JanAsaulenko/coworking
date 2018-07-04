$(document).ready(function(){

//DELETE TABLE-ROW BUTTON
    $(document).on("click", ".del-row", function(){
        if ($(".del-row").length == 1)
            alert("Хоча б одна строка має лишитись!");
        else
            $(this).parents('tr').remove();
        getPrice();
        return false;
    } );

//DATAPICKERS
    var rows = $("#reserv-table").attr("datarows");
    var dateFormat = "dd.mm.yy";

    function getDate( element ) {
        var date;
        try {
            date = $.datepicker.parseDate( dateFormat, element.value );
        } catch( error ) {
            date = null;
        }
        return date;
    }

    $(".fromdate").each(function(){
        var from = $(this);
        from.datepicker({
            defaultDate: 0,
            changeMonth: true,
            numberOfMonths: 1,
            minDate: 0
        });
        from.parent().parent().find('.todate').on("change", function() {
            from.datepicker( "option", "maxDate", getDate( this ))} );
    });

    $(".todate").each(function(){
        var to = $(this);
        to.datepicker({
            defaultDate: 0,
            changeMonth: true,
            numberOfMonths: 1,
            minDate: 0
        });
        to.parent().parent().find('.fromdate').on("change", function() {
            to.datepicker( "option", "minDate", getDate( this ))} );
    });

//ADD ROW TO TABLE
    $(".add-row").click(function(){
        rows++;
        var testClone = $('#reserv-table tr:last').clone();
        testClone.find('td:first').text(rows);				//change row number
        testClone.find('input:first').attr("placeholder", "Введіть ім'я клієнта №"+rows);	//change placeholder

        function changeNumber (i, old){		// change input and selectors names	and id's
            if (old != undefined)
                return old.replace( old.replace(/\D+/g,""), rows);
            return old;
        }
        testClone.find('input, select').attr("id", changeNumber);	// change input and selectors id's
        testClone.find('input, select').attr("name", changeNumber);	// change input and selectors names
        testClone.find('input').removeClass('hasDatepicker'); 		// delete hasDatepicker class

        //new datapickers init
        testClone.find(".fromdate").each(function(){
            var from = $(this);
            from.datepicker({
                defaultDate: 0,
                changeMonth: true,
                numberOfMonths: 1,
                minDate: 0
            });
            from.parent().parent().find('.todate').on("change", function() {
                from.datepicker( "option", "maxDate", getDate( this ))} );
        });

        testClone.find(".todate").each(function(){
            var to = $(this);
            to.datepicker({
                defaultDate: 0,
                changeMonth: true,
                numberOfMonths: 1,
                minDate: 0
            });
            to.parent().parent().find('.fromdate').on("change", function() {
                to.datepicker( "option", "minDate", getDate( this ))} );
        });

        testClone.appendTo('#reserv-table');	//adding new row
        getPrice();
        return false;
    });

//PRICE AJAX
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });
    var totalSumm = 0;

    function getPrice(){
        var x = $("form").serializeArray();

        $.ajax({
            url: '/calculate',
            method: 'post',
            data: x,
            success: function(data){
                totalSumm = 0;
                var i = 0;
                $('.pricetd').each(function(){
                    console.log(data);
                    var summ = data[i++];
                    totalSumm += summ;
                    $(this).text(summ);
                });
                $(".total-sum").text(totalSumm + " грн.");
            }
        });
        return false;
    }
    getPrice();

    $('#reserv-table').change(function(e){
        getPrice();
    });

//PROMOCODES INPUT
    $("select option:selected[value='6']").closest('tr').find('.promo-code-input').removeAttr('disabled');

    $(document).on("change", "select", function(){
        if (this.value == 6)
            $(this).closest('tr').find('.promo-code-input').removeAttr('disabled');
        else
            $(this).closest('tr').find('.promo-code-input').attr('disabled', 'true').val("");
    });

});/**
 * Created by Виталий on 26.04.2017.
 */
