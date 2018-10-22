import db from './firebase/index';
import splitDate from './functionHelpers/splitDate';
import LogicBackRequest from './logicBackRequest';
import paintSeat from './actions/paintSeat';


import isObject from "../../../public/gentelella_m/vendors/moment/src/lib/utils/is-object";

export default function chooseDayByButton(space, event) {

    let fireDate = splitDate(event.innerText);
    let allSeats = $('.seat');
    let id = space.id;
    let hash = sessionStorage.getItem('hash');
    let seatsArray = $('.seat-block-table td');
    let RESERVE_BY_FOREIGN = 'seat-reserved';
    let RESERVE_BY_YOURSELF='seat-clicked';
    for (let i = 0; i < seatsArray.length; i++) {
        seatsArray[i].className = 'seat';
    }
    let promise = db.ref(fireDate).once('value');
    promise.then((el) => {
        if (!el.val()) {
            db.ref(fireDate).child(id).set({
                date: event.innerText
            }).catch((error) => {
                console.log('error', error)
            })
        }
        else {
            db.ref(fireDate).child(id).once('value').then((el) => {
                for (let key in el.val()) {

                    if (key === 'date') {
                        return 0;
                    }
                    else {
                        if (hash === el.val()[key].hash) {
                            paintSeat(allSeats, key, RESERVE_BY_YOURSELF)
                        }
                        else {
                            paintSeat(allSeats, key, RESERVE_BY_FOREIGN)
                        }
                    }
                }
                // Object.keys(el.val()).map((seat) => {
                //     if (seat === 'date') return 0;
                //     else {
                //         console.log(seat)
                //         let seatClicked = 'seat-clicked';
                //         paintSeat(allSeats, seat, seatClicked)
                //     }
                // })
            })
        }

    });
    LogicBackRequest.requestReserveSeats(event.innerText, id, fireDate)
}