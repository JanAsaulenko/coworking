import EventBus from './PubSub'

/**
 * Represents class Selector
 * @constructor
 * @param {array} place  -  where  we take dates for ajax request
 * @param {array} setting - configs for ajax
 * @param {array} spaceSelect - in this array we will  mount  our options
 */
class Selector {
  constructor(place, settings, spaceSelect) {
    this.placeID = place;
    this.settings = settings;
    this.spaceSelect = spaceSelect;
  }

  request() {
    if (this.placeID[0] === undefined) {
      return 0
    }
    else if (this.placeID[0].tagName === 'INPUT') {
      let dates = {...this.settings};
      let placeID = this.placeID.val();
      let spaceSelect = this.spaceSelect;
      requestInput();

      function requestInput() {
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
    }
    else if (this.placeID[0].tagName === 'SELECT') {
      let dates = {...this.settings};
      let selector = this.placeID;
      let spaceSelect = this.spaceSelect;
      requestSelect();

      function requestSelect() {
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
                  if (data[index].address !== undefined) {
                    EventBus.publish('selector', {holidays: data[index].completelyReservedDays});
                    spaceSelect.append("<option value='" + data[index].id + "'>" + data[index].address + "</option>");
                  }
                  else {
                    EventBus.publish('selector', {holidays: data[index].completelyReservedDays});
                    spaceSelect.append("<option value='" + data[index].id + "'>" + data[index].text + "</option>");
                  }
                })
              }
            }
          })
        })
      }
    }
  }


}


export default Selector;