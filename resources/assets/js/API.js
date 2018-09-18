import EventBus from './PubSub';
import Strategy from './Strategy'
 class LogicReservation{
  constructor(){
    EventBus.subscribe('logicReservation',this.logicReservation)
  }


  logicReservation(data){

    function Parent(){}
    Parent.prototype.reserve = function () {};

    function SelectOneItem() {}
    SelectOneItem.prototype = Object.create(Parent.prototype);
    SelectOneItem.prototype.reserve = function (a) {
  let {params, targetDate} = a;

console.log(params,  targetDate)


    };


    
    
    function SelectArrayItems() {
      
    }


    if(typeof (data.event) === 'string') {
      let f = new Strategy();
      f.addStrategy(new SelectOneItem());
      f.method(data)
    }
  }
}
export default LogicReservation