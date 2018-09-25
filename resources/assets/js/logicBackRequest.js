import Parser from './functionHelpers/parseDate'
import EventBus from './PubSub';
import splitDate from './functionHelpers/splitDate'
import db from './firebase/index'

class LogicBackRequest {
    requestReserveSeats(date, space) {
        let arrOfSeats = $('.seat-reserved');
        let targetDate = Parser.parseDateForBack(date);
        let fireDate = splitDate(date);
        let allSeats  = $('.seats-block td');

        $.each(space, (index) => {
            let id = Number(space[index].id);

            for (let i = 0; i < arrOfSeats.length; i++) {
                arrOfSeats[i].className = 'seat';      // make all unreserve
            }
            $.ajax({
                url: '/reservation/showReserve',
                method: 'get',
                dataType: 'json',
                data: {'date': targetDate, 'id': id},
            }).done(pushReserveSeats);


            function pushReserveSeats(props) {

                let seatsArray = $('.seat');
                let reservedArray = props.reservedSeats;
                for (let i = 0; i < seatsArray.length; i++) {
                    for (let j = 0; j < reservedArray.length; j++) {
                        if (Number(seatsArray[i].innerText) === reservedArray[j]) {
                            db.ref('days').child(fireDate).child(reservedArray[j]).set('seat-reserved');
                        }
                    }
                }
                EventBus.publish('reservation/showReserveSeats', {
                    'seats': seatsArray,
                    'price': props.price,
                    'fireDate': fireDate,
                    'date': date
                })
            }
        })

    }
}

export default new LogicBackRequest();