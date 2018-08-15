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
    let from = $('.fromdate');
    from.datepicker("destroy");
   from.datepicker({
      firstDay:1,
      minDate:new Date(),
      onSelect:function (event) {
        $.each(params.id_place, (index)=>{
          let id = params.id_place[index].id;
          $('.from').val(event);
          $.ajax({
            url:'/reservation/showReserve',
            method:'get',
            dataType: 'json',
            data: {'date': event, 'id': id },
            success:(props)=>{
              EventBus.publish('showReserveSeats', {'seats': props.reservedSeats, 'space':params.id_place, 'date':event})
            }
          });
          EventBus.publish('/reservation/showReserveSeats',{'date':event, 'id_space':params.id_place});
        })
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