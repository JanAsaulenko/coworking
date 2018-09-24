import db from '../firebase/index'

export default function drawSeats(data,seatsArray) {

    db.ref('days').child(data).once('value').then((el) => {
        for (let i = 1; i <seatsArray.length+1; i++) {
            console.log(i)
            el.val().forEach((name, index) => {
                if(i===index){
                    seatsArray[i-1].className = name
                }
            })
        }
    })
}