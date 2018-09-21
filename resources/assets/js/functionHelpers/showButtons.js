import EventBus from "../PubSub";

export default function  showButtons(from , to, params){
    $('.seats-block_buttons').show();
    $('.datepicker__error-block').hide();
    EventBus.publish('dateRange', {'from': from, 'to': to, 'space': params});
}