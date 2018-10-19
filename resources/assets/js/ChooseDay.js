import db from './firebase/index';
import splitDate from './functionHelpers/splitDate';
import LogicBackRequest from './logicBackRequest';
import paintSeat from './actions/paintSeat'

export default function chooseDayByButton(space, event) {

    let fireDate = splitDate(event.innerText);
    let allSeats = $('.seat');
    let id = space.id;
    let seatsArray = $('.seat-block-table td');
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
                console.log(el.val());
                Object.keys(el.val()).map((seat) => {
                    let seatClicked = 'seat-clicked';
                    paintSeat(allSeats, seat, seatClicked)
                })
            })
        }

    });
    LogicBackRequest.requestReserveSeats(event.innerText, id, fireDate)
}