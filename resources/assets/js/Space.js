import EventBus from './PubSub';

class Space {
  constructor() {

    EventBus.subscribe('count/seats', this.drawSeats)
  }

  drawSeats(data) {
    let temp = '3 1';
    $.each(data.seats, (index)=>{
      ($('.space-select') ||$('.place-select') || $('.city-select')).change(()=>{
        $('.seats-block').empty();
      });
      let number_of_seats = data.seats[index].number_of_seats;
console.log(number_of_seats);

    let table = document.createElement('table');
    for (let i = 0; i < number_of_seats/5; i++) {
      let col = document.createElement('tr');
      for (let j = 0; j < 5; j++) {
        let row = document.createElement('td');
        row.innerText = `${j} ${i}`;
        row.className = `seat`;
        col.appendChild(row)
      }
      table.appendChild(col)
    }
    document.getElementsByClassName('seats-block')[0].appendChild(table);

    $('.seats-block').click((event)=>{
      event.target.className = 'seat-clicked';
      console.log(event.target.innerText)
    })

    })

    let form = $('.seats-block').table;
    console.log(form);
    for(let i =0;i<6;i++){
      for(let j=0;j<5;j++){

      }
    }
  }
}

export default Space;