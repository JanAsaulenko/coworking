import EventBus from './PubSub';
import Strategy from './Strategy'
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
            function calculator(price) {
                let seatArray = $('.seat-clicked');
                let sum = price;
                let result = 0;
                for (let i = 0; i < seatArray.length; i++) {
                    result += sum;
                }
                return `Сума Вашого замовлення:${result}грн`;
            }


            function Calculation() {
                this.sum = $('.sum');
                $('.sumInfo').remove();
                this.result = document.createElement('p');
                this.result.setAttribute('class', 'sumInfo');
                this.sum.append(this.result);
                this.reserve = function () {};
            };

            function CalculationPlus() {
                Calculation.apply(this, arguments);

                this.reserve = function (price) {
                $('.sumInfo').text(price)
                }
            }


            // function CalculationPlus() {
            //     this.reserve = function (price) {
            //         let sum = $('.sum');
            //         sum.empty();
            //         let textNode = document.createTextNode(price);
            //         console.log(textNode)
            //         sum.append(textNode);
            //     }
            // }


            Strategy.addStrategy(new CalculationPlus());
            $('.seats-block').on('click', () => {
                Strategy.method(calculator(priceForDay));
            });
            $('.form-reserve__input-button-close').on('click', () => {
                Strategy.method(calculator(priceForDay));
            });


            let inputCounter = 0;
            $('.seat-block-table').on('click', (event) => {

                if (event.target.className === "seat-reserved") {
                    return {}
                }
                else if (event.target.className === "seat-clicked") {
                    return {}
                }

                else if (event.target.className === 'seat') {
                    event.target.className = "seat-clicked";


                    /*TODO create function which split data and use it like a key fro firebase.*/
                    function splitDate(date) {
                        date = date.split('.');
                        return arr = date.join('');
                    }

                    let ref = db.ref('users');
                    ref = ref.child('2018121234');
                    ref.set('ldldl');


                    function removeX(string) {
                        if (string.indexOf('X')) {
                            string = string.substring(0, string.length - 1);
                            return string
                        }
                    }

                    let li = document.createElement('li');
                    li.className = "form_data-list_item";
                    let textNode = document.createTextNode(event.target.innerText);
                    li.appendChild(textNode);

                    let button = document.createElement('button');
                    button.setAttribute('type', 'button');
                    button.addEventListener('click', (event) => {
                        let setReserved = $('.seat-clicked');
                        for (let i = 0; i < setReserved.length; i++) {
                            if (setReserved[i].innerText === removeX(event.path[1].innerText)) {
                                setReserved[i].className = 'seat';
                                event.path[1].remove()
                            }
                        }
                    });
                    button.setAttribute('class', `form-reserve__input-button-close form-reserve__input-button-close--${event.target.innerText}`);
                    let buttonText = document.createTextNode('X');
                    button.appendChild(buttonText);
                    li.append(button);
                    targetList.append(li);
                }

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