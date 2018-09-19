import EventBus from './PubSub';
import db from './firebase/index'
class Seet {
    constructor() {
        EventBus.subscribe('seat/block', this.putDates_Into_FlowingForm)
    }

    putDates_Into_FlowingForm(props) {

        $.each(props.data, (index) => {
            const priceForDay = props.prices[1].amount;
            const spaceID = props.data[index].place_id;

            let block_with_form = $('.block_with_form');
            let form_with_seats = $('.form-reserve');

            let targetDate = props.date.toString();
            let targetList = document.getElementById(targetDate);

        /*TODO calculating the sum of reserve*/
            // function calculator(price) {
            //   let seatArray = $('.seat-clicked');
            //   let sum = price;
            //   let result = 0;
            //   for (let i = 0; i < seatArray.length; i++) {
            //     result += sum;
            //   }
            //   return `Сума Вашого замовлення:${result}грн`;
            // }


            // $('.seats-block').on('click', () => {
            //   $('.sum')[0].innerHTML = calculator(priceForDay);
            // });
            // form_with_seats.on('click', () => {
            //   $('.sum')[0].innerHTML =  calculator(priceForDay);
            // });

            // props.seat.target.className = 'seat-clicked';

            let inputCounter = 0;
            $('.seat-block-table').on('click', (event) => {

                console.log(event.target.className)
                if (event.target.className === "seat-reserved") {
                    console.log('уже зарезервировано');
                }
                else if (event.target.className === "seat-clicked") {
                    console.log('уже занимали');
                }

                else if (event.target.className === 'seat') {
                    event.target.className = "seat-clicked";
                    console.log('eventTarget', event.target.innerText);

/*TODO create function which split data and use it like a key fro firebase.*/
                    function splitDate(date){
                        date = date.split('.');
                        return arr = date.join('');
                    }

                    let ref = db.ref('users');
                    ref = ref.child('2018121234');
                    ref.set('ldldl');




                    let li = document.createElement('li');
                    li.className= "form_data-list_item";
                    let textNode = document.createTextNode(event.target.innerText);
                    li.appendChild(textNode);

                    let button = document.createElement('button');
                    button.setAttribute('type', 'button');
                    button.setAttribute('class', `form-reserve__input-button-close form-reserve__input-button-close--${event.target.innerText}`);

                    let buttonText = document.createTextNode('X');
                    button.appendChild(buttonText);
                    li.append(button);
                    targetList.append(li);

                }

                // let input = $(`<input class='form-reserve__input form-reserve__input--${inputCounter}'>`).val(data.target.innerText);

                // let inputButtonBlock = $(`<div class="form-reserve__input-button-block form-reserve__input-button-block--${inputCounter}"></div>`).append(input, inputClose);
                // inputButtonBlock.css({'display': 'flex', 'flex-direction': 'row'});
                // form_with_seats.append(inputButtonBlock);
                // inputButtonBlock.fadeIn();
                //
                $(`.form-reserve__input-button-close--${inputCounter}`).on('click', (event) => {
                  // let clickedSeat = $('.seat-clicked');
                  //
                  // for (let i = 0; i < clickedSeat.length; i++) {
                  //     console.log(clickedSeat[i])
                  //   if (clickedSeat[i].innerHTML === event.target.previousSibling.value) {
                  //     clickedSeat[i].className = 'seat';
                  //     event.target.parentElement.remove();
                  //   }
                  // }
                });
                inputCounter++;
            });


            //
            // $('.form__button').on('click',()=>{
            //   let authInfo = $("input[name]");
            //     for(let i=0;i<authInfo.length;i++){
            //       if(!authInfo[i].value){
            //        alert(`Пропущено ${authInfo[i].placeholder}`);
            //       }
            //     }
            //   const name = $("input[name |='name']").val();
            //   const email = $("input[name |='email']").val();
            //   const telephone = $("input[name |='telephone']").val();
            //   const dateFrom = $('.from').val();
            //   const dateTo = $('.to').val();
            //   let arrOfReservedSeats = $('.form-reserve__input-button-block');
            //   let reserveSeetsArray = [];
            //     let sumOrder = $('.sum');
            //   $.each(sumOrder, (index)=>{
            //     let fullSumString = sumOrder[index].innerHTML;
            //     let fullSum  = ()=>{
            //       let strArray = fullSumString.split('');
            //       let value = "";
            //       for(let i=0;i<strArray.length;i++){
            //         if($.isNumeric(strArray[i])){
            //           value+=strArray[i]
            //         }
            //       }
            //       return value
            //     };
            //   $.each(arrOfReservedSeats, (index)=>{
            //     reserveSeetsArray.push(arrOfReservedSeats[index].childNodes[0].value);
            //   });
            //   if(reserveSeetsArray && spaceID && name && email && telephone && dateFrom && fullSum()) {
            //     EventBus.publish('reservation/reserveSeats',{'spaceId':spaceID, 'reserveSeetsArray':reserveSeetsArray,'dateFrom':dateFrom, 'dateTo':dateTo, 'fullSum':fullSum(), userInfo:{'name':name,'email':email, 'telephone':telephone} })
            //   }
            //   });
            // });


        })
    }
}


export default Seet