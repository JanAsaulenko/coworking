import db from '../firebase/index';
import drawSeats from "./drawReserveSeats";
class SeatClick {
    action(event, fireDate, id) {
        const hash = sessionStorage.getItem('hash');
        let target = event.target;

        if (target.className=== 'seat') {
            target.className = 'seat-clicked';
            db.ref(fireDate).child(id).child(event.target.innerText).set({hash:hash,seat:event.target.innerText})
    }
        else if (target.className=== 'seat-clicked') {
            target.className = 'seat';
            db.ref(fireDate).child(id).child(event.target.innerText).remove()
        }
    };
}

export default new SeatClick()