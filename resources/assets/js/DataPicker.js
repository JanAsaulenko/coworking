import EventBus from './PubSub'
import Parser from './functionHelpers/parseDate';
import compareDates from './functionHelpers/compareDate'
import errorRange from './functionHelpers/errorRangeMessage';
import showButtons from "./functionHelpers/showButtons";

class DataPicker {
    constructor() {
        EventBus.subscribe('datePicker', this.takeDatesFromDataPicker);
        $('.datepicker__error-block').hide()
    }

    getDays(from, to) {
        from.datepicker({
            firstDay: 1,
            defaultDate: 0,
            changeMonth: true,
            showAnim: 'slideDown',
            minDate: new Date(),
            beforeShowDay: function (date) {
                let day = date.getDay();
                if (day === 0 || day === 6) {
                    return [false, 'markholiday']
                }
                else {
                    return [true, '']
                }
            }
        })
            .on('change', () => {
                from.datepicker("option", "dateFormat", "yy-mm-dd")
            });

        to.datepicker({
            firstDay: 1,
            defaultDate: 0,
            changeMonth: true,
            showAnim: 'slideDown',
            minDate: new Date(),
            beforeShowDay: function (date) {
                let day = date.getDay();
                if (day === 0 || day === 6) {
                    return [false, 'markholiday']
                }
                else {
                    return [true, '']
                }
            }
        })
            .on('change', () => {
                to.datepicker("option", "dateFormat", "yy-mm-dd");
            })
    }



    takeDatesFromDataPicker(params) {
        let holidays = params.holiday;
        let from = $('.fromdate');
        from.datepicker("destroy");
        from.datepicker("option", 'dateFormat', "yy-mm-dd");
        from.datepicker({
            firstDay: 1,
            minDate: new Date(),
            onSelect: function (event) {
                let to = $('.to').val();
                let from = Parser.parseDate(event);
                $('.from').val(from);
                if (to) {
                    if (compareDates(from, to) > 0) {
                        // showButtons(from, to, params.id_place);
                    }
                    else {
                        errorRange('Make less date from')
                    }
                }
                else {
                    console.log('не выбран to')
                }
            },
            beforeShowDay: function (date) {
                let day = date.getDay();
                if (day === 0 || day === 6) {
                    return [false, 'markholiday']
                }
                else {
                    let formattedDays = jQuery.datepicker.formatDate('yy-mm-dd', date);
                    if (holidays.indexOf(formattedDays) === -1) {
                        return [true, '']
                    }
                    else {
                        return [false, 'markholiday']
                    }
                }
            }
        });

        let to = $('.todate');
        to.datepicker("destroy");
        to.datepicker("option", 'dateFormat', "yy-mm-dd");
        to.datepicker({
            minDate: new Date(),
            firstDay: 1,
            onSelect: function (event) {
                let from = $('.from').val();
                let to = Parser.parseDate(event);
                $('.to').val(to);
                if (from) {
                    if (compareDates(from, to) > 0) {
                        showButtons(from, to, params.id_place); //
                    }
                    else {
                        errorRange('Make more date TO')
                    }
                }
                else {
                    console.log('не выбран from')
                }
            },
            beforeShowDay: function (date) {
                let day = date.getDay();
                if (day === 0 || day === 6) {
                    return [false, 'markholiday']
                }
                else {
                    let formattedDays = jQuery.datepicker.formatDate('yy-mm-dd', date);
                    if (holidays.indexOf(formattedDays) === -1) {
                        return [true, '']
                    }
                    else {
                        return [false, 'markholiday']
                    }
                }
            }
        })
    }
}

export default DataPicker

