import EventBus from './PubSub';
import splitDate from './functionHelpers/splitDate';
import drawSeats from './actions/drawSeats';
import SeatClick from './actions/SeatClick';
import findChooseSeats from './actions/findChooseSeats';


class Space {
    constructor() {
        EventBus.subscribe('reservation/drawSeats', this.drawSeats);
        EventBus.subscribe('reservation/showReserveSeats', this.showReserveSeats);
        this.findChooseSeats = findChooseSeats.bind(this)
    }


    showReserveSeats(dates) {
        let seatsArray = dates.seats;
        let fireDate = dates.fireDate;
        let target_date = dates.date;
        let arrOfPrices = dates.price;
        let table = $(".seat-block-table");
        let arrOfSeats = $('.seat');
        drawSeats(fireDate, seatsArray);

        arrOfSeats.unbind('click');
        arrOfSeats.on('click', (event) => {
            SeatClick.action(event, fireDate);
            drawSeats(fireDate, arrOfSeats);
            findChooseSeats(splitDate(fireDate));
        })
    }


    drawSeats(data) {
        $.each(data.seats, (index) => {
            ($('.space-select') || $('.place-select') || $('.city-select')).change(() => {
                $('.seats-block').empty();
            });
            let number_of_seats = data.seats[index].number_of_seats;
            let count = 1;
            let table = document.createElement('table');
            table.className = "seat-block-table";
            for (let i = 0; i < number_of_seats / 5; i++) {
                let col = document.createElement('tr');
                for (let j = 0; j < 5; j++) {
                    let row = document.createElement('td');
                    row.className = `seat`;
                    row.innerText = count.toString();
                    col.appendChild(row);
                    count++;
                }
                table.appendChild(col)
            }
            document.getElementsByClassName('seats-block')[0].appendChild(table);
        })
    }
}

export default Space;