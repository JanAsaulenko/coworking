import EventBus from './PubSub';
import drawSeats from './actions/drawReserveSeats';
import drawListItem from './actions/drawListItem';
import SeatClick from './actions/SeatClick';
import findChooseDate from './actions/findChooseDates';
import findChooseSeats from './actions/findChooseSeats';
import paintSeat from './actions/paintSeat';
import Constants from './constants/constants';
import db from './firebase/index';

class Space {
    constructor() {
        EventBus.subscribe('reservation/drawSeats', this.drawSeats);
        EventBus.subscribe('reservation/showReserveSeats', this.showReserveSeats);
        this.findChooseSeats = findChooseSeats.bind(this)
    }

    showReserveSeats(dates) {
        let seatsArray = dates.seats;
        let seatsReserve = dates.reserveSeats;
        let fireDate = dates.fireDate;
        let targetDate = dates.date;
        findChooseDate(targetDate);
        let table = $('.seat-block-table');
        let id = dates.id;
        let hash = sessionStorage.getItem('hash');
        drawSeats(seatsArray, seatsReserve);
        table.unbind('click');
        table.on('click', (event) => {
            let arrayOfClicked = $('.seat-clicked');
            drawListItem(event, targetDate , arrayOfClicked);
            SeatClick.action(event, fireDate, id);
        });
        let commRef = db.ref(fireDate).child(id);
        commRef.on('child_added', function(data) {
            if(data.val().hash === undefined) return 0;
            else {
                if(hash !== data.val().hash){
                    let enemy = Constants.RESERVE_BY_FOREIGN
                    paintSeat(seatsArray, data.val().seat, enemy)
                }
            }

        });
    }


    drawSeats(data) {
        let placeForTable = document.getElementsByClassName('seats-block')[0];
        $.each(data.seats, (index) => {
            ($('.space-select') || $('.place-select') || $('.city-select')).change(() => {
                $('.seats-block').empty();
                $('.seats-block_buttons').empty();
                let sides = $('.turn');
                for (let i = 0; i < sides.length; i++) {
                    sides[i].value = "";
                }
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
            placeForTable.appendChild(table)
        })
    }
}

export default Space;