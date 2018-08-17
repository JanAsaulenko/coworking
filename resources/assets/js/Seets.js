import EventBus from './PubSub';

class Seet{
  constructor(){
    EventBus.subscribe('seat/block', this.createForm)
  }
  createForm(props){
    console.log(props)
  }
}

