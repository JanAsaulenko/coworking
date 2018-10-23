import db from './firebase/index';
import splitDate from './functionHelpers/splitDate';
import LogicBackRequest from './logicBackRequest';
import paintSeat from './actions/paintSeat';
import  Constants from './constants/constants'

export default function chooseDayByButton(space, event) {

    let fireDate = splitDate(event.innerText);
    let allSeats = $('.seat');
    let id = space.id;
    let hash = sessionStorage.getItem('hash');
    let seatsArray = $('.seat-block-table td');
    for (let i = 0; i < seatsArray.length; i++) {
        seatsArray[i].className = Constants.FREE_SEAT;
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
                            paintSeat(allSeats, key, Constants.RESERVE_BY_YOURSELF)
                        }
                        else {
                            paintSeat(allSeats, key, Constants.RESERVE_BY_FOREIGN)
                        }
                    }
                }
            })
        }

    });
    LogicBackRequest.requestReserveSeats(event.innerText, id, fireDate)
}