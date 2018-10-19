import Selector from './Selector'
import DataPicker from './DataPicker'
import Space from './Space'
import Seet from  './Seet'
import ReserveSeats from './ReserveSeats';
import DateRange from './DateRange';
import db from './firebase/index'
$(document).ready(function () {
  if(!sessionStorage.getItem('hash')){
      let key = db.ref().push().key;
      sessionStorage.setItem('hash',key);
  }

  const city = $('.city-select');
  const places = $('.place-select');
  const placeSelector = new Selector(city, {
    url: '/reservation/getPlaces',
    method: 'get',
    dataType: 'json'
  }, places);
  placeSelector.request();


    const choosePlace = new Selector(places,
      { url: '/reservation/choosePlace',
      method: 'get',
      dataType: 'json'});
    choosePlace.choose();


  const spaces = $('.space-select');
  const spaceSelector = new Selector(places, {
    url: '/reservation/getSpaces',
    method: 'get',
    dataType: 'json',
  }, spaces);
  spaceSelector.request();

  const chooseSpace = new Selector(spaces, {
      url:'/reservation/chooseSpace',
      method: 'get',
      dataType: 'json',});
  chooseSpace.choose();



  const from = $('.fromdate');
  const to = $('.todate');
  const reservationDataPicker = new DataPicker();
  reservationDataPicker.getDays(from,to);

    const space = new Space();
    const range  = new DateRange();
    const reserve = new ReserveSeats();

});





