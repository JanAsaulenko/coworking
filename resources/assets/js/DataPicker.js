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
        from.datepicker("option", "dateFormat", "yy-mm-dd")
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
        to.datepicker("option", "dateFormat", "yy-mm-dd")
      })
  }

  getChoseReserve(params) {
    function parseDate(date){
      let newDate = date.split("/");
      for(let i=0;i<newDate.length; i++){
        let temp = newDate[0];
        newDate[0]= newDate[2];
        newDate[2]=temp;
      }
let result = newDate.join('-');
return result
    }
    let holidays = params.holiday;
    let from = $('.fromdate');
    from.datepicker("destroy");
    // from.on('change',() => {
    //   from.datepicker("option", "dateFormat", "yy-mm-dd")
    // });
    from.datepicker("option",'dateFormat',"yy-mm-dd");
   from.datepicker({
      firstDay:1,
      minDate:new Date(),
      onSelect:function (event) {
           let targetDate = parseDate(event);
        $.each(params.id_place, (index)=>{
          let id = params.id_place[index].id;
          id = Number(id); //??
          $('.from').val(targetDate);
          $.ajax({
            url:'/reservation/showReserve',
            method:'get',
            dataType: 'json',
            data: {'date': targetDate, 'id': id },
            success:(props)=>{
              EventBus.publish('reservation/showReserveSeats', {'seats': props.reservedSeats, 'price':props.price, 'space':params.id_place, 'date':targetDate})
            }
          });

          // EventBus.publish('/reservation/showReserveSeats',{'date':event, 'id_space':params.id_place});
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
  }

}
export default DataPicker