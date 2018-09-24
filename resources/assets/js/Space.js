import EventBus from './PubSub';
import db from './firebase/index'
import splitDate from './functionHelpers/splitDate'

class Space {
    constructor() {
        EventBus.subscribe('reservation/drawSeats', this.drawSeats);
        EventBus.subscribe('reservation/showReserveSeats', this.showReserveSeats);
    }


    showReserveSeats(dates) {
        let seatsReserve = dates.seats;
        let fireDate = dates.fireDate;
        let target_date = dates.date;
        let arrOfPrices = dates.price;
        let table = $(".seat-block-table");
        let arrOfSeats = $('.seat');
        //
        // db.ref('days').child(fireDate).child('checked').once('value').then((el) => {
        //     let checkedArray = el.val();
        //     if (checkedArray === null) {
        //         console.log('yek')
        //     }
        //     else {
        //         console.log(checkedArray)
        //         for(let i=0;i<arrOfSeats.length;i++) {
        //             Object.keys(checkedArray).map(el => {
        //                 if(arrOfSeats[i].innerText == el)
        //                 {
        //                     arrOfSeats[i].className = 'seat-clicked'
        //                 }
        //             })
        //         }
        //
        //     }
        //
        //
        // });
        //
        //
        // let tdArray = $('.seat-block-table td');
        // for (let i = 0; i < tdArray.length; i++) {
        //
        //     tdArray[i].className = 'seat'
        // }
        //
        //
        for (let i = 0; i < arrOfSeats.length; i++) {
            for (let j = 0; j < seatsReserve.length; j++) {
                if (Number(arrOfSeats[i].innerText) === seatsReserve[j]) {
                    arrOfSeats[i].className = 'seat-reserved';
                    let reserveDate = splitDate(arrOfSeats[i].innerText);
                    db.ref('days').child(fireDate).child('seatReserve').child(reserveDate).set(Number(arrOfSeats[i].innerText));
                }
            }
        }
        //
        // $('.seats-block').append(table);
        // table.click((event) => {
        //     EventBus.publish('seat/block', {
        //         'data': dates.space,
        //         'seat': event,
        //         'date': target_date,
        //         'prices': arrOfPrices,
        //         'fireDate': fireDate
        //     });
        // })
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
                    row.innerText = `${count++}`;
                    row.className = `seat`;
                    col.appendChild(row)
                }
                table.appendChild(col)
            }
            document.getElementsByClassName('seats-block')[0].appendChild(table);
        })
    }
}

export default Space;