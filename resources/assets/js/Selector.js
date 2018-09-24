import EventBus from './PubSub';
import clear from './functionHelpers/clear';

class Selector {
    constructor(place, settings, spaceSelect) {
        this.placeID = place;
        this.settings = settings;
        this.spaceSelect = spaceSelect;

    }

    choose() {
        let selector = this.placeID;
        let {url, type, dataType} = this.settings;
        selector.change((event) => {
            clear();
            let target = event.target.value;
            $.ajax({
                url: url,
                type: type,
                dataType: dataType,
                data: {id: target},
                success: (data) => {
                    if (data.spaces) {
                        EventBus.publish('chooseSpace', {
                            'holiday': data.completelyReservedDays,
                            'id_place': data.spaces
                        });
                        EventBus.publish('reservation/drawSeats', {'seats': data.spaces});
                        return
                    }
                    EventBus.publish('chooseSpace', {'holiday': data.completelyReservedDays});
                }
            })
        })
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
            $('.seats-block').empty();
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
                spaceSelect.append().empty();
                spaceSelect.select2({
                    placeholder: "Оберіть простір...",
                    width: "100%"
                });
                selector.change((event) => {
                    $('.seats-block').empty();
                    clear();
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
                                spaceSelect.append(`<option></option>`).empty();
                                spaceSelect.append(`<option  selected="selected" disabled>Оберіть простір...</option>`);
                                $.each(data, function (index) {
                                    spaceSelect.append(`<option value=${data[index].id}>${data[index].text}</option>`);
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