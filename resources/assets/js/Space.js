import EventBus from './PubSub';

class Space {
  constructor() {
    EventBus.subscribe('count/seats', this.drawSeats);
    EventBus.subscribe('reserve/seats', this.reserveSeats);
  }

  reserveSeats(data) {
    let date = data.date;
    let i = function () {
      let dates = data;
      return {
        date:function () {
          console.log(dates.date)
        },
        id:function () {
          $.each(dates.id_space, (index)=>{
            console.log(dates.id_space[index].id)
          })

        }
      }
    };
   let m  = i();
m.date();
m.id();
// $.ajax({
//   url:'',
//   method:'get',
//   dataType:'json',
//   data:{'date':date}
// })
  }

  drawSeats(data) {
    $.each(data.seats, (index) => {
      ($('.space-select') || $('.place-select') || $('.city-select')).change(() => {
        $('.seats-block').empty();
      });
      let number_of_seats = data.seats[index].number_of_seats;

      let table = document.createElement('table');
      for (let i = 0; i < number_of_seats / 5; i++) {
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

      $('.seats-block').click((event) => {
        event.target.className = 'seat-clicked';
      })
    })


  }
}

export default Space;