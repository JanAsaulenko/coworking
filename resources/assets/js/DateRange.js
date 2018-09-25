import EventBus from './PubSub';
import Observable from './Observer';
import Parser from './functionHelpers/parseDate';
import splitDate from './functionHelpers/splitDate';
import LogicBackRequest from './logicBackRequest';
import drawForm from './actions/drawForm'
import db from './firebase/index'
import findChooseDates from './actions/findChooseDates'

class DateRange {
    constructor() {
        EventBus.subscribe('dateRange', this.makeRange)
    }

    makeRange(data) {
        let {space} = data;
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
                let seatsAll = $('.seats-block td')
                db.ref('days').remove(); //clear dates  when  dates (from || to) are changing
                const buttonTable = $('.seats-block_buttons');
                buttonTable.empty();
                for (let i = 0; i < range.length; i++) {
                    let ref = db.ref('days');
                    let dateId = splitDate(range[i]);
                    ref = ref.child(dateId);
                    ref.set(range[i]);
                        for (let i = 0; i < seatsAll.length; i++) {
                            seatsAll[i].className= 'seat'
                            db.ref('days').child(dateId).child(seatsAll[i].innerText).set(seatsAll[i].className)
                        }
                    let button = $(`<button type="button" class='seats-block-button'>${range[i]}</button>`);
                    buttonTable.append(button);
                    findChooseDates(range);
                }
            };
        }

        Observable.addObserver(new CreateForm());
        Observable.addObserver(new MakeButtons());
        Observable.sendData(range);


        $('.seats-block-button').on('click', (event) => {
            let seatsArray = $('.seat-block-table td');
            for (let i = 0; i < seatsArray.length; i++) {
                seatsArray[i].className = 'seat';
            }

            LogicBackRequest.requestReserveSeats(event.target.innerText, space)
        })
    }
}

export default DateRange