import EventBus from './PubSub';

class Space {
  constructor() {
    EventBus.subscribe('reservation/drawSeats', this.drawSeats);
    EventBus.subscribe('reservation/showReserveSeats', this.showReserveSeats);
  }


  showReserveSeats(dates) {

    $.each(dates.space, (index) => {
      let number_of_seats = dates.space[index].number_of_seats;
      let seatsReserve = dates.seats;
      let target_date = dates.date;
      let arrOfPrices = dates.price;
      let table = $(".seat-block-table");
      let arrOfSeats = $('.seat');
      for (let i = 0; i < arrOfSeats.length; i++) {
        for (let j = 0; j < seatsReserve.length; j++) {
          if (Number(arrOfSeats[i].innerText) === seatsReserve[j]) {
            arrOfSeats[i].className = 'seat-reserved';
          }
        }
      }

      $('.seats-block').append(table);
      table.click((event) => {
        EventBus.publish('seat/block', {
          'data': dates.space,
          'seat': event,
          'date': target_date,
          'prices': arrOfPrices
        });
      })
    });
  }

  drawSeats(data) {
    $.each(data.seats, (index) => {
      ($('.space-select') || $('.place-select') || $('.city-select')).change(() => {
        $('.seats-block').empty();


      });
      let number_of_seats = data.seats[index].number_of_seats;
      let count = 1;
      let table = document.createElement('table');
      table.className = "seat-block-table";
      for (let i = 0; i < number_of_seats / 5; i++) {
        let col = document.createElement('tr');
        for (let j = 0; j < 5; j++) {
          let row = document.createElement('td');
          row.innerText = `${count++}`;
          row.className = `seat`;
          col.appendChild(row)
        }
        table.appendChild(col)
      }
      document.getElementsByClassName('seats-block')[0].appendChild(table);
    })
  }
}

export default Space;