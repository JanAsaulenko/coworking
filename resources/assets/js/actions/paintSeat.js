export default function paintSeat(allSeats, target) {
    let newAllSeats = $('.seat-block-table td');
    for (let i = 0; i < newAllSeats.length; i++) {
        let targetString = target.toString();
        if (newAllSeats[i].innerText === targetString) {
            if (arguments[2]) {
                newAllSeats[i].className = arguments[2];
            }
            else {
                console.log('' +
                    'NO ARGUMENTS');
            }
        }
    }
}