import EventBus from './PubSub'

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
      showButtonPanel: true,
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
        from.datepicker("option", "dateFormat", "dd.mm.yy")
      });
    to.datepicker({
      firstDay: 1,
      defaultDate: 0,
      changeMonth: true,
      showAnim: 'slideDown',
      showButtonPanel: true,
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
        to.datepicker("option", "dateFormat", "dd.mm.yy")
      })
  }

  getChoseReserve(params) {
    let holidays = params.holiday;
    $('.fromdate').datepicker("destroy");
    $('.fromdate').datepicker({
      firstDay:1,
      minDate:new Date(),
      onSelect:function (event) {
          EventBus.publish('reserve/seats',{'date':event, 'id_space':params.id_place});
      },
      beforeShowDay:function (date) {
        let day = date.getDay();
        if(day === 0 || day === 6 ){
          return [false , 'markholiday']
        }
        else{
          let formattedDays = jQuery.datepicker.formatDate('yy-mm-dd',date);
          if(holidays.indexOf(formattedDays) === -1){
            return [true, '']
          }
          else{
            return [false, 'markholiday']
          }
        }
      }
    });



      // $('.fromdate').datepicker({
      //   firstDay: 1,
      //   minDate: new Date(),
      //   onSelect: function (event) {
      //     console.log(event);
      //     EventBus.publish('reserve/seats', {'data': event, 'id': id_space});
      //     $('.from').val(event)
      //   },
      //   beforeShowDay: function (date) {
      //     let day = date.getDay();
      //     if (day === 0 || day === 6) {
      //       return [false, 'markholiday']
      //     }
      //     else {
      //       let formattedDays = jQuery.datepicker.formatDate('yy-mm-dd', date);
      //       if (holidays.indexOf(formattedDays) === -1) {
      //         return [true, '']
      //       }
      //       else {
      //         return [false, 'markholiday']
      //       }
      //     }
      //   }
      // });

  }

}
export default DataPicker