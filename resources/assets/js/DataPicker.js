import EventBus from './PubSub'
import parseDate from './functionHelpers/parseDate';
import compareDates from './functionHelpers/compareDate'

class DataPicker {
    constructor() {
        EventBus.subscribe('chooseSpace', this.getChoseReserve);
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

    getChoseReserve(params) {
        let holidays = params.holiday;
        let from = $('.fromdate');
        from.datepicker("destroy");
        from.datepicker("option", 'dateFormat', "yy-mm-dd");
        from.datepicker({
            firstDay: 1,
            minDate: new Date(),
            onSelect: function (event) {
                let to = $('.to').val();
                let from = parseDate(event);
                $('.from').val(from);
                if (to) {
                    console.log(compareDates(from , to))
                    if(compareDates(from , to)){
                        EventBus.publish('dateRange', {'from': from, 'to': to, 'space': params.id_place});
                    }
                    else{
                        console.log('выбран неправильный диапазон дат')
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
                let to = parseDate(event);
                $('.to').val(to);
                if (from) {
                    console.log(compareDates(from , to))
                    if(compareDates(from , to)){
                        EventBus.publish('dateRange', {'from': from, 'to': to, 'space': params.id_place});
                    }
                    else{
                        console.log('выбран неправильный диапазон дат')
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


    sendData() {

    }


}

export default DataPicker


// / import EventBus from './PubSub'
//
// class DataPicker {
//   constructor() {
//     EventBus.subscribe('chooseSpace', this.getChoseReserve);
//   }
//
//   getDays(from, to) {
//     from.datepicker({
//       firstDay: 1,
//       defaultDate: 0,
//       changeMonth: true,
//       showAnim: 'slideDown',
//       minDate: new Date(),
//       beforeShowDay: function (date) {
//         let day = date.getDay();
//         if (day === 0 || day === 6) {
//           return [false, 'markholiday']
//         }
//         else {
//           return [true, '']
//         }
//       }
//     })
//       .on('change', () => {
//         from.datepicker("option", "dateFormat", "yy-mm-dd")
//       });
//
//     to.datepicker({
//       firstDay: 1,
//       defaultDate: 0,
//       changeMonth: true,
//       showAnim: 'slideDown',
//       minDate: new Date(),
//       beforeShowDay: function (date) {
//         let day = date.getDay();
//         if (day === 0 || day === 6) {
//           return [false, 'markholiday']
//         }
//         else {
//           return [true, '']
//         }
//       }
//     })
//       .on('change', () => {
//         to.datepicker("option", "dateFormat", "yy-mm-dd")
//       })
//
//   }
//
//   getChoseReserve(params) {
//     function parseDate(date) {
//       let newDate = date.split("/");
//       let month = newDate[0];
//       let day = newDate[1];
//       newDate[0] = newDate[2];
//       newDate[2] = day;
//       newDate[1] = month;
//       let result = newDate.join('-');
//       return result
//     }
//
//     let holidays = params.holiday;
//     let from = $('.fromdate');
//     from.datepicker("destroy");
//     from.datepicker("option", 'dateFormat', "yy-mm-dd");
//     from.datepicker({
//       firstDay: 1,
//       minDate: new Date(),
//       onSelect: function (event) {
//         let targetDate = parseDate(event);
//         console.log(targetDate)
//         $('.from').change(()=>{
//           EventBus.publish('logicReservation',{targetDate, params})
//         })
//       },
//       beforeShowDay: function (date) {
//         let day = date.getDay();
//         if (day === 0 || day === 6) {
//           return [false, 'markholiday']
//         }
//         else {
//           let formattedDays = jQuery.datepicker.formatDate('yy-mm-dd', date);
//           if (holidays.indexOf(formattedDays) === -1) {
//             return [true, '']
//           }
//           else {
//             return [false, 'markholiday']
//           }
//         }
//       }
//     });
//
//     let to = $('.todate');
//     to.datepicker("destroy");
//     to.datepicker("option", 'dateFormat', "yy-mm-dd");
//     to.datepicker({
//       minDate: new Date(),
//       firstDay: 1,
//       onSelect: function (event) {
//         let to = parseDate(event);
//         let from = '';
//         $('.from').val() ? from = $('.from').val() : alert('Сначала выберите дату начала');
//         if (from) {
//           EventBus.publish('dateRange', {'from': from, 'to': to})
//         }
//         else {
//           console.log(from, 'undef')
//         }
//       },
//       beforeShowDay: function (date) {
//         let day = date.getDay();
//         if (day === 0 || day === 6) {
//           return [false, 'markholiday']
//         }
//         else {
//           let formattedDays = jQuery.datepicker.formatDate('yy-mm-dd', date);
//           if (holidays.indexOf(formattedDays) === -1) {
//             return [true, '']
//           }
//           else {
//             return [false, 'markholiday']
//           }
//         }
//       }
//     })
//   }
//
// }
//
// export default DataPicker