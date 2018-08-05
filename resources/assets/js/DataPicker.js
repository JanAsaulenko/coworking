import EventBus from './PubSub'

class DataPicker {
  constructor() {
    EventBus.subscribe('selector', this.getReservationDays);
    EventBus.subscribe('chooseSpace', this.getChoseReserve);
    // EventBus.subscribe('selectorInput', this.selectorInput);
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
      });
  }


  getReservationDays(params) {
    let holidays = params.holidays;
    if (!holidays || holidays === undefined) {
      return
    }
    else

      $('.fromdate').datepicker(
        {
          firstDay: 1,
          defaultDate: 0,
          changeMonth: true,
          showAnim: 'slideDown',
          showButtonPanel: true,
          minDate: new Date(),
          beforeShowDay: function (date) {
            let day = date.getDay();
            if (day === 0 || day === 6) { // mark red and block if  it is sunday or saturday
              return [false, 'markholiday']
            }
            else {
              let formattedDate = jQuery.datepicker.formatDate('yy-mm-dd', date);   // convert  date  into  type -> (yy-mm-dd)
              if (holidays.indexOf(formattedDate) === -1) { // find   them in array . if (-1) - return [true] else return false and with style.
                return [true, ''];
              }
              else {
                return [false, 'markholiday'];
              }
            }
          }
        }).on('change', () => {
        $('.fromdate').datepicker("option", "dateFormat", "dd.mm.yy"); //setter

        $('.todate').datepicker(
          {
            defaultDate: 0,
            changeMonth: true,
            firstDay: 1,
            minDate: new Date(),
            beforeShowDay: function (date) {
              let day = date.getDay();
              if (day === 0 || day === 6) {
                return [false, 'markholiday'];
              }
              else {
                let formateDate = jQuery.datepicker.formatDate('yy-mm-dd', date);
                if (holidays.indexOf(formateDate) === -1) {
                  return [true, '']
                }
                else {
                  return [false, 'markholiday'];
                }
              }

            }
          }).on('change', () => {
          $('.todate').datepicker("option", "dateFormat", "dd.mm.yy");
        })
      });
  }


  getChoseReserve(params) {

    let holidays = params.holiday.completelyReservedDays;
    if (!holidays || holidays === undefined) {
      return
    }
    else

    $('#banner').on('change', () => {
      $('.fromdate').datepicker("destroy");
      $('.fromdate').datepicker({
        firstDay:1,
        minDate:new Date(),
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
      })
    });

  }





selectorInput(params){
  let holidays = params.holidays;
  if (!holidays || holidays === undefined) {
    return
  }
  else

    $('.fromdate').datepicker(
      {
        firstDay: 1,
        defaultDate: 0,
        changeMonth: true,
        showAnim: 'slideDown',
        showButtonPanel: true,
        minDate: new Date(),
        beforeShowDay: function (date) {
          let day = date.getDay();
          if (day === 0 || day === 6) { // mark red and block if  it is sunday or saturday
            return [false, 'markholiday']
          }
          else {
            let formattedDate = jQuery.datepicker.formatDate('yy-mm-dd', date);   // convert  date  into  type -> (yy-mm-dd)
            if (holidays.indexOf(formattedDate) === -1) { // find   them in array . if (-1) - return [true] else return false and with style.
              return [true, ''];
            }
            else {
              return [false, 'markholiday'];
            }
          }
        }
      }).on('change', () => {
      $('.fromdate').datepicker("option", "dateFormat", "dd.mm.yy"); //setter

      $('.todate').datepicker(
        {
          defaultDate: 0,
          changeMonth: true,
          firstDay: 1,
          minDate: new Date(),
          beforeShowDay: function (date) {
            let day = date.getDay();
            if (day === 0 || day === 6) {
              return [false, 'markholiday'];
            }
            else {
              let formateDate = jQuery.datepicker.formatDate('yy-mm-dd', date);
              if (holidays.indexOf(formateDate) === -1) {
                return [true, '']
              }
              else {
                return [false, 'markholiday'];
              }
            }

          }
        }).on('change', () => {
        $('.todate').datepicker("option", "dateFormat", "dd.mm.yy");
      })
    });
}





}
export default DataPicker