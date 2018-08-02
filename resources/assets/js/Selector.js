import EventBus from './PubSub'
class Selector {
  constructor(place, settings,spaceSelect) {
    this.placeID = place;
    this.settings = settings;
    this.spaceSelect = spaceSelect;
  }

  request(){

    if(this.placeID[0].tagName ==='INPUT'){
      this.requestInput()
    }
    else if(this.placeID[0].tagName ==='SELECT'){
     this.requestSelect()
    }

  }
requestSelect(){

    let dates = {...this.settings};
    let selector = this.placeID;
    let spaceSelect = this.spaceSelect;
    selector.change((event)=>{
      let target = event.target.value;
      $.ajax({
        url:dates.url,
        method:dates.method,
        dataType:dates.type,
        data:{id:target},
        success: function (data) {

          EventBus.publish('selector', {url:data});
          if(data==='') {
            spaceSelect.select2({
              placeholder: "Доступних місць немає",
              width: "100%",
            })
          }
          else{
            spaceSelect.select2({
              placeholder: "Оберіть простір...",
              width: "100%"
            })
              .append("<option></option>").empty();
            $.each(data, function (index) {
              spaceSelect.append("<option value='" + data[index].id + "'>" + data[index].text + "</option>");
            })
          }
        }
      })
    })
}
  requestInput() {
    let dates = {...this.settings};
    let placeID = this.placeID.val();
    let spaceSelect = this.spaceSelect;

    $.ajax({
      url: dates.url,
      method:dates.method,
      dataType: dates.type,
      data: {id: placeID},
      success: function (data) {
        if(data==='') {
        spaceSelect.select2({
            placeholder: "Доступних місць немає",
            width: "100%",
          })
        }
        else{
          spaceSelect.select2({
            placeholder: "Оберіть простір...",
            width: "100%"
          })
          .append("<option></option>").empty();
          $.each(data, function (index) {
            spaceSelect.append("<option value='" + data[index].id + "'>" + data[index].text + "</option>");
          })
        }
      }
    })
  }
}


export default Selector;