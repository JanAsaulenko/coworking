export default function paintSeat(allSeats, target) {
    let newAllSeats = $('.seat-block-table td');
    console.log(newAllSeats);git
    for (let i = 0; i < newAllSeats.length; i++) {
        let targetString=target.toString();
        console.log('newAllSeats', newAllSeats[i].innerText, '---targeet', target )
        if (newAllSeats[i].innerText === targetString) {
            console.log('sovpalo')
            if (arguments[2]) {
                newAllSeats[i].className = arguments[2];
            }
        //     else {
        //         console.log('' +
        //             'NO ARGUMENTS');
        //     }
        // }
        // else {
        //     // console.log(target)
        }
    }
}