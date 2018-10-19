import EventBus from './PubSub'


class ReserveSeats {
    constructor() {
        EventBus.subscribe('reservation/reserveSeats', this.reserveSeats)
    }


    reserveSeats(data) {
        //
        // $('.form_button-next').on('click',()=> {
        // $('.block_with_form').addClass("block_with_form-big");
        //
        //         $('.form').addClass('form-small');
        //         $('.select-block__datapicker-block').css('flex-direction', 'column')
;
            // $('.form__button').on('click', () => {
            //     let authInfo = $("input[name]");
            //     for (let i = 0; i < authInfo.length; i++) {
            //         if (!authInfo[i].value) {
            //             alert(`Пропущено ${authInfo[i].placeholder}`);
            //         }
            //     }
            // });
            // const name = $("input[name |='name']").val();
            // const email = $("input[name |='email']").val();
            // const telephone = $("input[name |='telephone']").val();
            // const dateFrom = $('.from').val();
            // const dateTo = $('.to').val();
            // const reserveSeetsArray  = $('.db_info-downpad_block');
           // if(reserveSeetsArray && spaceID && name && email && telephone && dateFrom && fullSum()) {
                //     EventBus.publish('reservation/reserveSeats',{'spaceId':spaceID, 'reserveSeetsArray':reserveSeetsArray,'dateFrom':dateFrom, 'dateTo':dateTo, 'fullSum':fullSum(), userInfo:{'name':name,'email':email, 'telephone':telephone} })
                //   }
        // })
        //   $.ajaxSetup({
        //     headers: {
        //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        //   });
        //   $.ajax({
        //     url: '/reservation/reserveSeats',
        //     method: 'post',
        //     dataType:'json',
        //     data: {'date': data},
        //     success:function (json) {
        //         // Output the HTML
        //         document.open();
        //         document.write( json.html);
        //         document.close();
        //       }
        //   })
        // }
    }
}

export default ReserveSeats