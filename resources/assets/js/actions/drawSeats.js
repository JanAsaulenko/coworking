import db from '../firebase/index'

export default function drawSeats(data, seatsArray) {
    for (let el = 0; el < seatsArray.length; el++) {
        seatsArray[el].className = 'seat'
    }
    db.ref('days').child(data).once('value').then((el) => {
        for (let i = 1; i < seatsArray.length + 1; i++) {
            el.val().forEach((name, index) => {
                if (i === index) {
                    seatsArray[i - 1].className = name
                }
            })
        }
    })
}