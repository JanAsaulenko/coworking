import EventBus from './PubSub';

class Seet {
  constructor() {
    EventBus.subscribe('seat/block', this.createForm)
  }

  createForm(props) {
    const priceforDay = props.prices[1].amount;
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


    $('.close').on('click', () => {
      block_with_form.css({'display': 'none', 'flex-direction': 'column', 'position': 'relative', "left": '140%'});
      block_with_form.animate({left: '0%'}, 1000);
    });
    $('.seats-block').on('click', () => {
      $('.sum')[0].innerHTML = calculator(priceforDay);
    });
    form_with_seats.on('click', () => {
      $('.sum')[0].innerHTML =  calculator(priceforDay);
    });

    props.seat.target.className = 'seat-clicked';
    if (block_with_form.is(':visible')) return;
    block_with_form.css({'display': 'flex', 'flex-direction': 'column', 'position': 'relative', "left": '-140%'});
    block_with_form.animate({left: '0%'}, 1000);

    let inputCounter = 0; //counter for input stylish
    let input = $(`<input class="form-reserve__input form-reserve__input--${inputCounter}">`).val(event.target.innerText);
    let inputClose = $(`<button class="form-reserve__button-close form-reserve__button__close--${inputCounter}">X</button>`);
    let inputButtonBlock = $(`<div class="form-reserve__input-button-block ${inputCounter}"></div>`).append(input, inputClose);
    inputButtonBlock.css({'display': 'flex', 'flex-direction': 'row'});
    form_with_seats.append(inputButtonBlock);
    inputButtonBlock.fadeIn();

    $('td').click((data) => {
      if(data.target.className === 'seat-reserved'){
        console.log('уже зарезервировано');
        return
      }
      else if (data.target.className === 'seat-clicked') {
        console.log('уже занимали');
        return
      }
      inputCounter++;
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
      })
    });
  }
}


export default Seet