import { Component, OnInit, NgModule } from '@angular/core';
import { City } from '../../interfaces/city';
import {OrderingService} from "../../services/ordering.service";
import {MatDatepickerInputEvent} from "@angular/material";
// import {moment} from 'moment/moment';
import * as moment from 'moment'
import DateTimeFormat = Intl.DateTimeFormat;

export class CitySelect {
    cities: Array<City>;
    curentCityId: number
}



export interface iSelectItem {
    value: string;
    viewValue: string;
}
export class PlaceSelect {
    options: Array<iSelectItem> = [];
    value: string = "";
    disalble:boolean = true;
}
export class DateSelect {
  fullReservedDates:Array<any> =['2018-10-20'];

  disable:boolean =  false;

  Filter = (d: Date): boolean => {
    const day = d.getDay();
    // console.log(d);
    if (moment(d).isBefore(new Date().setHours(0, 0, 0, 0))) return false;

    return day !== 0 && day !== 6;
  }
}



@Component({
  selector: 'app-ordering',
  templateUrl: './ordering.component.html',
  styleUrls: ['./ordering.component.css']
})

export class OrderingComponent implements OnInit {
    citySelect:PlaceSelect = new PlaceSelect();
    placeSelect:PlaceSelect = new PlaceSelect();
    spaceSelect:PlaceSelect = new PlaceSelect();
    dateSelect:DateSelect = new DateSelect();
    // filter = new DatepickerFilterExample();

  constructor( private orderingService: OrderingService) { }
  ngOnInit() {
    this.citySelect.disalble = true;
      this.orderingService.getAllCity().subscribe(
          (cities: any) => {
              this.citySelect.options = cities;
                  if(this.citySelect.options.length>0){
                      this.citySelect.disalble = false;
                  }
              },
          (err) => {
          }
      );
  }

  onSelectCity(){
    this.placeSelect = new PlaceSelect();
    this.spaceSelect = new PlaceSelect();
    this.dateSelect = new DateSelect();
      this.orderingService.getPlaces( Number(this.citySelect.value) ).subscribe(
          (res: any) =>{
                this.placeSelect.options = res.map((item:any )=>{
                    return{
                        value: item.palce_id,
                        viewValue: item.address
                    }
                });
                if(this.placeSelect.options.length>0){
                    this.placeSelect.disalble = false;
                }
                },
            (err) =>{
          });
    }
    onSelectPlace(){
        this.spaceSelect = new PlaceSelect();
        this.dateSelect = new DateSelect();

      this.orderingService.getSpaces(Number(this.placeSelect.value)).subscribe(
            (res: any) => {
                this.spaceSelect.options = res.map((item:any)=>{
                    return{
                        value: item.space_id,
                        viewValue: item.name
                    }
                });
                if (this.spaceSelect.options.length>0){
                    this.spaceSelect.disalble = false;
                }
            },
            (err) =>{
            });
    }
    onSelectSpace(){
      this.dateSelect.disable = false;
      console.log(this.spaceSelect.value);
    }
    onSelectDate(event: MatDatepickerInputEvent<Date>){
      console.log(event.value);
      console.log(moment(event.value).format("YYYY-MM-DD HH:mm:ss"));
      console.log(this.dateSelect.Filter);
    }
}
