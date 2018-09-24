import Parser from './functionHelpers/parseDate'
import EventBus from './PubSub';
import splittDate from './functionHelpers/splitDate'

class LogicBackRequest {
    requestReserveSeats(date, space) {
        let arrOfSeats = $('.seat-reserved');
        let targetDate = Parser.parseDateForBack(date);
        let fireDate = splittDate(date);
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
            }).done((props) => {
                EventBus.publish('reservation/showReserveSeats', {
                    'seats': props.reservedSeats,
                    'price': props.price,
                    'fireDate': fireDate,
                    'date': date
                })
            })
        })

    }
}

export default new LogicBackRequest();