import EventBus from './PubSub';
import Observable from './Observer';
import Parser from './functionHelpers/parseDate';
import chooseDayByButton from './ChooseDay';
import drawForm from './actions/drawForm'
import Constants from './constants/constants';
import buttonLoading from './actions/ButtonLoading'
// import findChooseDates from "./findChooseDates";
import makeOneActiveButton from './actions/MakeOneActiveButton';

class DateRange {
    constructor() {
        EventBus.subscribe('dateRange', this.makeRange)
    }

    makeRange(data) {
        let {space} = data;
        let seatsButtonsBlock = $('.seats-block_buttons');
        let from = Parser.parseDateForRange(data.from);
        let to = Parser.parseDateForRange(data.to);

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

        let range = diapasone(from, to); // divide into array dates


        function CreateForm() {
            this.notify = function (range) {
                drawForm(range)
            }
        }


        function MakeButtons() {
            this.notify = function (range) {
                let seatsAll = $('.seats-block td');
                const buttonTable = $('.seats-block_buttons');
                buttonTable.empty();
                for (let i = 0; i < range.length; i++) {
                    for (let i = 0; i < seatsAll.length; i++) {
                        seatsAll[i].className = Constants.FREE_SEAT;
                    }
                    let button = $(`<button type="button" class='seats-block-button'><span>${range[i]}</span></button>`);
                    buttonTable.append(button);
                }
            };
        }

        Observable.addObserver(new CreateForm());
        Observable.addObserver(new MakeButtons());
        Observable.sendData(range);
        seatsButtonsBlock.unbind();


        seatsButtonsBlock.on('click', (event) => {
            makeOneActiveButton(event);
            let counter = {
                currentCount: 20,
                getNext: function () {
                    return this.currentCount += 5;
                }
            };

            let height = 20;
            let button = event.target.parentElement;
            button.style.height = `${height}px`;

            for (let i in space) {
                if (!space.hasOwnProperty(i)) continue;
                chooseDayByButton(space[i], event.target);
                let timer = setInterval(checkInaction, 5000, event.target, timer);

                function checkInaction(date) {
                    let targetDate = document.getElementsByClassName(`db_info-downpad_block-list_${date.innerText}`);
                    if (targetDate[0].children.length === 0) {
                        let height = counter.getNext.call(counter);
                        let siblingHeight = (date.parentElement.nextSibling) ? date.parentElement.nextSibling.clientHeight : date.parentElement.previousSibling.clientHeight;
                        if (height > siblingHeight) {
                            console.log('limit');
                            let dataForRemove = document.getElementsByClassName(`db_info-downpad_block-list_${date.innerText}`)[0];
                            dataForRemove.remove();
                            clearInterval(timer)
                        }
                        else {
                            buttonLoading(date, height)
                        }
                    }
                    else {
                        clearInterval(timer)
                    }
                }
            }
        })
    }
}

export default DateRange