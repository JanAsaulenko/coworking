import EventBus from './PubSub'
class ReserveSeats {
  constructor() {
    EventBus.subscribe('reservation/reserveSeats', this.reserveSeats)
  }

  reserveSeats(data) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: '/reservation/reserveSeats',
      method: 'post',
      dataType:'json',
      data: {'date': data},
      success:function (json) {
          // Output the HTML
          document.open();
          document.write( json.html);
          document.close();
        }
    })
  }
  }

export default ReserveSeats