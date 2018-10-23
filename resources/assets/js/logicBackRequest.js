import Parser from './functionHelpers/parseDate'
import EventBus from './PubSub';
import splitDate from './functionHelpers/splitDate'
import db from './firebase/index'

class LogicBackRequest {
    requestReserveSeats(date, spaceId) {
        let arrOfreserveSeats = $('.seat-reserved');
        let targetDate = Parser.parseDateForBack(date);
        let fireDate = splitDate(date)
        let seatsArray = $('.seat');
        let id = spaceId;

        for (let i = 0; i < arrOfreserveSeats.length; i++) {
            arrOfreserveSeats[i].className = 'seat';      // make all unreserve
        }
        $.ajax({
            url: '/reservation/showReserve',
            method: 'get',
            dataType: 'json',
            data: {'date': targetDate, 'id': id},
        }).done(pushReserveSeats);

        function pushReserveSeats(props) {
            // let reservedArray = props.reservedSeats;
            // for (let i = 0; i < seatsArray.length; i++) {
            //     for (let j = 0; j < reservedArray.length; j++) {
            //         if (Number(seatsArray[i].innerText) === reservedArray[j]) {
            //             console.log(reservedArray[j])
            //             // db.ref('days').child(fireDate).child(reservedArray[j]).set('seat-reserved');
            //         }
            //     }
            // }






            // setInterval(function fireRequest() {
            //     db.ref(fireDate).once('value').then((el) => {
            //         if (el.val()) {
            //             // console.log('data', el.val());
            //             db.ref(fireDate).child(id).once('value').then((el) => {
            //                 if (el.val) {
            //                     let collection = el.val();
            //                   for(let key in collection){
            //                       // console.log(collection[key], key);
            //
            //                       if(collection[key] === hash){
            //                           // console.log('sovpalo' , seatsArray, key);
            //                           // for(let i =0;i<seatsArray.length;i++){
            //                           //
            //                           //     if(seatsArray[i].innerText===key){
            //                           //         seatsArray[i].className = 'seat-clicked'
            //                           //     }
            //                           // }
            //                       }
            //                       else{
            //                           for(let i =0;i<seatsArray.length;i++){
            //
            //                               if(seatsArray[i].innerText===key){
            //                                   seatsArray[i].className = 'seat-reserved'
            //                               }
            //                           }
            //                       }
            //                   }
            //                 }
            //                 else {
            //                     // console.log('no id')
            //                 }
            //             })
            //         }
            //         else {
            //             // console.log('nos')
            //         }
            //     })
            // }, 4000);
            EventBus.publish('reservation/showReserveSeats', {
                'id': id,
                'seats': seatsArray,
                'price': props.price,
                'fireDate': fireDate,// change to fireDate
                'date': date,
                'reserveSeats': props.reservedSeats
            })
        }
    }
}

export default new LogicBackRequest();