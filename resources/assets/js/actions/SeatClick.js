import db from '../firebase/index';
class SeatClick {
    action(event , fireDate) {
        if (event.target.className === 'seat') {
            db.ref('days').child(fireDate).child(event.target.innerText).set('seat-clicked')
    }
        else if (event.target.className === 'seat-clicked') {
            db.ref('days').child(fireDate).child(event.target.innerText).set('seat');
        }
    };
}

export default new SeatClick()