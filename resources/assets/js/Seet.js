import EventBus from './PubSub';

class Seet {
  constructor() {
    EventBus.subscribe('seat/block', this.createForm)
  }

  createForm(props) {
    $.each(props.data, (index)=>{
      const priceForDay = props.prices[1].amount;
      const spaceID = props.data[index].place_id;

    let block_with_form = $('.block_with_form');
    let form_with_seats = $('.form-reserve');

    function calculator(price) {
      let seatArray = $('.seat-clicked');
      let sum = price;
      let result = 0;
      for (let i = 0; i < seatArray.length; i++) {
        result += sum;
      }
      return `Сума Вашого замовлення:${result}грн`;
    }

    $('.nav_button-hide').on('click', () => {
      block_with_form.css({'display': 'none', 'flex-direction': 'column', 'position': 'relative', "left": '140%'});
      block_with_form.animate({left: '0%'}, 1000);
    });

    $('.seats-block').on('click', () => {
      $('.sum')[0].innerHTML = calculator(priceForDay);
    });
    form_with_seats.on('click', () => {
      $('.sum')[0].innerHTML =  calculator(priceForDay);
    });




    props.seat.target.className = 'seat-clicked';
      if (block_with_form.is(':visible')) return;
      block_with_form.css({'display': 'flex', 'flex-direction': 'column', 'position': 'relative', "top":'14px'});
      block_with_form.animate({left: '0%'}, 1000);

    let inputCounter = 0;

    $('.seat').click((data) => {
console.log('кликнул по тдшке');
      if(data.target.className === 'seat-reserved'){
        console.log('уже зарезервировано');
        return
      }
      else if (data.target.className === 'seat-clicked') {
        console.log('уже занимали');
        return
      }

      let input = $(`<input class='form-reserve__input form-reserve__input--${inputCounter}'>`).val(data.target.innerText);
      let inputClose = $(`<button class="form-reserve__button-close form-reserve__button-close--${inputCounter}" type="button">X</button>`);
      let inputButtonBlock = $(`<div class="form-reserve__input-button-block form-reserve__input-button-block--${inputCounter}"></div>`).append(input, inputClose);
      inputButtonBlock.css({'display': 'flex', 'flex-direction': 'row'});
      form_with_seats.append(inputButtonBlock);
      inputButtonBlock.fadeIn();

      $(`.form-reserve__button-close--${inputCounter}`).on('click', (event) => {

        let clickedSeat = $('.seat-clicked');
        for (let i = 0; i < clickedSeat.length; i++) {
          if (clickedSeat[i].innerHTML === event.target.previousSibling.value) {
            clickedSeat[i].className = 'seat';
            event.target.parentElement.remove();
          }
        }
      });
      inputCounter++;
    });

    $('.form__button').on('click',()=>{
      let authInfo = $("input[name]");
        for(let i=0;i<authInfo.length;i++){
          if(!authInfo[i].value){
           alert(`Пропущено ${authInfo[i].placeholder}`);
          }
        }
      const name = $("input[name |='name']").val();
      const email = $("input[name |='email']").val();
      const telephone = $("input[name |='telephone']").val();
      const dateFrom = $('.from').val();
      const dateTo = $('.to').val();
      let arrOfReservedSeats = $('.form-reserve__input-button-block');
      let reserveSeetsArray = [];
        let sumOrder = $('.sum');
      $.each(sumOrder, (index)=>{
        let fullSumString = sumOrder[index].innerHTML;
        let fullSum  = ()=>{
          let strArray = fullSumString.split('');
          let value = "";
          for(let i=0;i<strArray.length;i++){
            if($.isNumeric(strArray[i])){
              value+=strArray[i]
            }
          }
          return value
        };
      $.each(arrOfReservedSeats, (index)=>{
        reserveSeetsArray.push(arrOfReservedSeats[index].childNodes[0].value);
      });
      if(reserveSeetsArray && spaceID && name && email && telephone && dateFrom && fullSum()) {
        EventBus.publish('reservation/reserveSeats',{'spaceId':spaceID, 'reserveSeetsArray':reserveSeetsArray,'dateFrom':dateFrom, 'dateTo':dateTo, 'fullSum':fullSum(), userInfo:{'name':name,'email':email, 'telephone':telephone} })
      }
      });
    });

      $('.nav_button-close').on('click',(event)=>{
        if (!block_with_form.is(':visible')) return;
        block_with_form.css({'display': 'none', 'flex-direction': 'column', 'position': 'relative', "left": '140%'});
        block_with_form.animate({left: '0%'}, 1000);
        $('.form-reserve__input-button-block').remove();
        let clickedSeat = $('.seat-clicked');
        $('.sum').empty();
        for (let i = 0; i < clickedSeat.length; i++) {
          clickedSeat[i].className = 'seat';
          inputCounter=0;
        }
      });
    })
  }
}


export default Seet