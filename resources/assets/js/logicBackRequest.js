import Parser from './functionHelpers/parseDate'
import EventBus from './PubSub';

class LogicBackRequest {
    requestReserveSeats(date, space) {
        let arrOfSeats = $('.seat-reserved');
        let targetDate = Parser.parseDateForBack(date);

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
                console.log(props)
                /*TODO  take request from backend . render reserve seats*/
                // EventBus.publish('reservation/showReserveSeats', {
                //     'seats': props.reservedSeats,
                //     'price': props.price,
                //     'space': space,
                //     'date': targetDate,
                //     'fireDate': date
                // })
            })
        })

    }
}

export default new LogicBackRequest();