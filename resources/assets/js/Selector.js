import EventBus from './PubSub'

class Selector {
  constructor(place, settings, spaceSelect) {
    this.placeID = place;
    this.settings = settings;
    this.spaceSelect = spaceSelect;
  }


  requestSelect() {
    let dates = {...this.settings};
    let selector = this.placeID;
    let spaceSelect = this.spaceSelect;
    spaceSelect.select2({
      placeholder: "Оберіть простір...",
      width: "100%"
    });
    selector.change((event) => {
      let target = event.target.value;
      $.ajax({
        url: dates.url,
        method: dates.method,
        dataType: dates.type,
        data: {id: target},
        success: function (data) {
          let holidays = ["2018-08-30","2018-08-29","2018-08-16"];
          EventBus.publish('selector', {holidays: holidays});
          if (data === '') {
            spaceSelect.select2({
              placeholder: "Доступних місць немає",
              width: "100%",
            })
          }
          else {
            spaceSelect
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
    spaceSelect.select2({
      placeholder: "Оберіть простір...",
      width: "100%"
    });
    $.ajax({
      url: dates.url,
      method: dates.method,
      dataType: dates.type,
      data: {id: placeID},
      success: function (data) {
        if (data === '') {
          spaceSelect.select2({
            placeholder: "Доступних місць немає",
            width: "100%",
          })
        }
        else {
          spaceSelect
            .append("<option></option>");
          $.each(data, function (index) {
            spaceSelect.append("<option value='" + data[index].id + "'>" + data[index].text + "</option>");
          })
        }
      }
    })
  }

  request() {
    if (this.placeID[0] === undefined) {
      return 0
    }
    else if (this.placeID[0].tagName === 'INPUT') {
      this.requestInput()
    }
    else if (this.placeID[0].tagName === 'SELECT') {
      this.requestSelect();
    }
  }

}


export default Selector;