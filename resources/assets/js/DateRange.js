import EventBus from './PubSub';
import Observable from './Observer';
import Parser from './functionHelpers/parseDate';
import chooseDayByButton from './ChooseDay';
import drawForm from './actions/drawForm'
import findChooseDates from './actions/findChooseDates'

class DateRange {
    constructor() {
        EventBus.subscribe('dateRange', this.makeRange)
    }

    makeRange(data) {
        let {space} = data;
        let seatsBlock = $('.seats-block_buttons');
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
                        seatsAll[i].className = 'seat'
                    }
                    let button = $(`<button type="button" class='seats-block-button'><span>${range[i]}</span></button>`);
                    buttonTable.append(button);
                    // findChooseDates(range);
                }
            };
        }

        Observable.addObserver(new CreateForm());
        Observable.addObserver(new MakeButtons());
        Observable.sendData(range);
        seatsBlock.unbind();
        seatsBlock.on('click', (event) => {
            for (let i in space) {
                if (!space.hasOwnProperty(i)) continue;
                chooseDayByButton(space[i], event.target)
            }
        })
    }
}

export default DateRange