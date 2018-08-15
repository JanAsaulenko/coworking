import EventBus from './PubSub';

class Space {
  constructor() {
    EventBus.subscribe('count/seats', this.drawSeats);
    EventBus.subscribe('reserve/seats', this.reserveSeats);
    EventBus.subscribe('showReserveSeats', this.showReserveSeats);
  }


  showReserveSeats(dates) {
    $.each(dates.space, (index)=>{
      let number_of_seats = dates.space[index].number_of_seats;
      let seatsArray = dates.seats;
      let target_date = dates.date;

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
      $('.seats-block').empty();
      document.getElementsByClassName('seats-block')[0].appendChild(table);
      const form_with_seats = $('.block_with_form');
      $('.seats-block').click((event) => {
        event.target.className = 'seat-clicked';
        if (form_with_seats.is(':visible')) return;
        form_with_seats.css({'display': 'flex', 'flex-direction': 'column', 'position': 'relative', "left": '-140%'});
        form_with_seats.animate({left: '0%'}, 1000);
        let input = $("<input>").val(event.target.innerText);
        let a = 1; //counter for input stylish
        form_with_seats.append(input);
        $('td').click((data) => {
          if (data.target.className === 'seat-clicked') {
            console.log('уже занимали');
            return
          }
          a++;
          let input = $(`<input class='block_with_form__input' id="${a}">`).val(data.target.innerText);
          form_with_seats.append(input);
          $(`#${a}`).fadeIn();
        })
      })
    })
  }



  reserveSeats(data) {

    let helper = function () {
      let dates = data;
      return {
        date: function () {
          // console.log(dates.date)
        },
        id: function () {
          $.each(dates.id_space, (index) => {
            // console.log(dates.id_space[index].id)
          })

        }
      }
    };
    let seats = helper();
    seats.date();
    seats.id();
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
    })
    //     const form_with_seats = $('.block_with_form');
    //     $('.seats-block').click((event) => {
    //       event.target.className = 'seat-clicked';
    //       if(form_with_seats.is(':visible')) return ;
    //       form_with_seats.css({'display': 'flex',  'flex-direction':'column', 'position': 'relative', "left": '-140%'});
    //     form_with_seats.animate({left: '0%'}, 1000);
    //     let input =$("<input>").val(event.target.innerText);
    //       let a =1;
    //
    //
    //     form_with_seats.append(input);
    //     $('td').click((data)=>{
    //       if(data.target.className === 'seat-clicked'){
    //             console.log('уже занимали')
    //         return
    //       }
    //
    //       a++;
    //       let input =$(`<input class='block_with_form__input' id="${a}">`).val(data.target.innerText);
    //       form_with_seats.append(input);
    //       $(`#${a}`).fadeIn();
    //     })
    //     })
    //   })
    //
    //
  }
}

export default Space;