class Observable{
  constructor(){
    this.observers=[];
  }
  addObserver(obs){
   this.observers.push(obs);
  }
  sendData(data){
    for(let i=0;i<this.observers.length;i++){
      this.observers[i].notify(data);
    }
  }
}


export default new Observable();
