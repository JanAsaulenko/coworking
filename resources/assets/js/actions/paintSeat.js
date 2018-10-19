export default function paintSeat(allSeats, target) {

    for (let i = 0; i < allSeats.length; i++) {
        if (allSeats[i].innerText === target) {
            if (arguments[2]) {
                allSeats[i].className = arguments[2];
            }
        }
    }
}