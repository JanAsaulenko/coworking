import EventBus from './PubSub'
class DataPicker {
  constructor(){
    EventBus.subscribe('selector',DataPicker.showDate)
  }
  static showDate(params){
    $.each(params.url, (index)=>{
      console.log(params.url[index].text)
    })
  }
  getDate(from, to) {
    $(function () {
      from.datepicker(
        {
          defaultDate: 0,
          changeMonth: true,
          firstDay: 1,
          minDate: new Date()
        }).on('change', () => {
        from.datepicker("option", "dateFormat", "dd.mm.yy");
      });
    });
      $(function(){
        to.datepicker(
        {
          defaultDate: 0,
          changeMonth: true,
          firstDay: 1,
          minDate: new Date()
        }).on('change', () => {
        to.datepicker("option", "dateFormat", "dd.mm.yy");
      })
    });
  }

}

export default DataPicker