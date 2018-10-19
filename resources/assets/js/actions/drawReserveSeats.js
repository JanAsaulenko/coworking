import db from '../firebase/index'

export default function drawSeats(seatsArray,seatsReserve) {
    for (let el = 0; el < seatsArray.length; el++) {
        seatsArray[el].className = 'seat'
    }

    for(let i=0;i<seatsArray.length;i++){
        for(let j=0;j<seatsReserve.length;j++){
            if(Number(seatsArray[i].innerText)===seatsReserve[j]){
                seatsArray[i].className = 'seat-reserved'
            }
        }
    }
}