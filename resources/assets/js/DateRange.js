import EventBus from './PubSub';
import Observer from './Observer';
import Observable from './Observer';
import db from './firebase/index'

class DateRange {
    constructor() {
        EventBus.subscribe('dateRange', this.makeRange)
    }

    makeRange(data) {
        let {space} = data;

        function parseDate(date) {
            let newDate = date.split(".");
            let month = newDate[0];
            let day = newDate[1];
            newDate[0] = newDate[2];
            newDate[2] = month;
            newDate[1] = day;
            let result = newDate.join('-');
            return result
        }

        function diapasone(from, to) {
            let arr = [];
            from = from.split(/-|\./);
            to = to.split(/-|\./);
            from = new Date(from [0], from[2] - 1, from [1]);
            to = new Date(to[0], to[2] - 1, to[1]);
            for (; from <= to;) {
                arr.push((from.getDate() + "." + (from.getMonth() + 1) + "." + from.getFullYear()).replace(/(^|\.)(?=\d\.)/g, "$10"));
                from.setDate(from.getDate() + 1);
            }
            return arr
        }

        let range = diapasone(data.from, data.to); // divide into array dates

        function CreateForm() {
            this.notify = function (range) {
                let block_with_form = $('.block_with_form');
                let resultBlock = $('.result');
                if (block_with_form.is(':visible')) return;

                for (let i = 0; i < range.length; i++) {
                    let dropDown = $(`<div class="dropDown"></div>`);
                    let dropDownLink = $(`<a href="#">${range[i]}</a>`);
                    dropDown.append(dropDownLink)

                    let dataList = document.createElement('ul');
                    dataList.setAttribute("id", range[i]);
                    dataList.setAttribute("class", "form_data-list");
                    dropDown.append(dataList);
                    resultBlock.append(dropDown);
                    block_with_form.append(resultBlock);
                }

                block_with_form.css({
                    'display': 'flex',
                    'flex-direction': 'column',
                    'position': 'relative',
                    "top": '14px'
                });
                block_with_form.animate({left: '0%'}, 1000);

                /*TODO Check  hide button for form window*/
                $('.nav_button-hide').on('click', () => {
                    block_with_form.css({
                        'display': 'none',
                        'flex-direction': 'column',
                        'position': 'relative',
                        "left": '140%'
                    });
                    block_with_form.animate({left: '0%'}, 1000);
                });

                /*TODO Check  close button for  form window*/

                $('.nav_button-close').on('click', (event) => {
                    if (!block_with_form.is(':visible')) return;
                    block_with_form.css({
                        'display': 'none',
                        'flex-direction': 'column',
                        'position': 'relative',
                        "left": '140%'
                    });
                    block_with_form.animate({left: '0%'}, 1000);
                    $('.form-reserve__input-button-block').remove();
                    let clickedSeat = $('.seat-clicked');
                    $('.sum').empty();
                    for (let i = 0; i < clickedSeat.length; i++) {
                        clickedSeat[i].className = 'seat';
                        inputCounter = 0;
                    }
                });

            };
        }
        function splitDate(date) {
            date = date.split('.');
            let arr = date.join('');
            return arr
        }

        function MakeButtons() {
            this.notify = function (range) {
                const buttonTable = $('.seats-block_buttons');
                buttonTable.empty();

                for (let i = 0; i < range.length; i++) {
                    let ref = db.ref('days');
                   let dateId = splitDate(range[i]);
                   ref = ref.child(dateId);
                   ref.set(range[i]);
                    let button = $(`<button type="button" class='seats-block-button'>${range[i]}</button>`);
                    buttonTable.append(button);
                }
            }
        }

        Observable.addObserver(new CreateForm());
        Observable.addObserver(new MakeButtons());
        Observable.sendData(range);


        $('.seats-block-button').on('click', (event) => {
            let targetDate = event.target.innerText;
            let dateForBack = parseDate(targetDate);
            let arrOfSeats = $('.seat-reserved');
            for (let i = 0; i < arrOfSeats.length; i++) {
                arrOfSeats[i].className = 'seat';
            }

            $.each(space, (index) => {
                let id = space[index].id;
                id = Number(id);

                let promise = $.ajax({
                    url: '/reservation/showReserve',
                    method: 'get',
                    dataType: 'json',
                    data: {'date': dateForBack, 'id': id},
                }).done((props) => {
                    EventBus.publish('reservation/showReserveSeats', {
                        'seats': props.reservedSeats,
                        'price': props.price,
                        'space': space,
                        'date': targetDate,
                        'fireDate': splitDate(targetDate)
                    })
                })
                    .fail((error) => {
                        console.log(error)
                    });
            })
        })
    }
}

export default DateRange