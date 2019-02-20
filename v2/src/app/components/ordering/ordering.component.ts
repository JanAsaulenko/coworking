import {Component, OnInit, NgModule} from '@angular/core';
import {City} from '../../interfaces/city';
import {OrderingService} from "../../services/ordering.service";
import {MatDatepickerInputEvent} from "@angular/material";
// import {moment} from 'moment/moment';
import * as moment from 'moment'
import DateTimeFormat = Intl.DateTimeFormat;
import {forEach} from "@angular/router/src/utils/collection";
import {isSame} from "ngx-bootstrap/chronos/utils/date-compare";

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
  disalble: boolean = true;
}

export class DateSelect {
  fullReservedDates: Array<any> = [];
  checkFullReservedDatesBySpace: boolean = false;
  disable: boolean = true;
  value:any = null;

  Filter = (d: Date): boolean => {
    const wDay = d.getDay();
    let res = 0;
    let dateNaw = moment(new Date()).format('YYYY-MM-DD');
    let someDay = moment(d).format("YYYY-MM-DD");
    this.fullReservedDates.forEach(function (item: any) {
      if (moment(someDay).isSame(item)) res++;
    });
    if ((wDay == 0) || (wDay == 6) || (moment(d).isBefore(dateNaw))) res++;
    if (res == 0) {
      return true
    } else {
      return false
    }
  }
}


@Component({
  selector: 'app-ordering',
  templateUrl: './ordering.component.html',
  styleUrls: ['./ordering.component.css']
})

export class OrderingComponent implements OnInit {
  citySelect: PlaceSelect = new PlaceSelect();
  placeSelect: PlaceSelect = new PlaceSelect();
  spaceSelect: PlaceSelect = new PlaceSelect();
  dateSelect: DateSelect = new DateSelect();

  constructor(private orderingService: OrderingService) {
  }

  ngOnInit() {
    this.citySelect.disalble = true;
    this.orderingService.getAllCity().subscribe(
      (cities: any) => {
        this.citySelect.options = cities;
        if (this.citySelect.options.length > 0) {
          this.citySelect.disalble = false;
        }
      },
      (err) => {
      }
    );
  }

  onSelectCity() {
    this.placeSelect = new PlaceSelect();
    this.spaceSelect = new PlaceSelect();
    this.dateSelect = new DateSelect();

    this.orderingService.getPlaces(Number(this.citySelect.value)).subscribe(
      (res: any) => {
        this.placeSelect.options = res.map((item: any) => {
          return {
            value: item.palce_id,
            viewValue: item.address
          }
        });
        if (this.placeSelect.options.length > 0) {
          this.placeSelect.disalble = false;
        }
      },
      (err) => {
      });
  }

  onSelectPlace() {
    this.spaceSelect = new PlaceSelect();
    this.dateSelect = new DateSelect();

    this.orderingService.getSpaces(Number(this.placeSelect.value)).subscribe(
      (res: any) => {
        this.spaceSelect.options = res.map((item: any) => {
          return {
            value: item.space_id,
            viewValue: item.name
          }
        });
        if (this.spaceSelect.options.length > 0) {
          this.spaceSelect.disalble = false;
        }
      },
      (err) => {
      });
  }

  onSelectSpace() {
    this.dateSelect = new DateSelect();


    this.orderingService.getFullReservedDatesBySpace(Number(this.spaceSelect.value)).subscribe(
      (respons: any) => {
        this.dateSelect.fullReservedDates = respons.completelyReservedDays;
        this.dateSelect.checkFullReservedDatesBySpace = true;
        this.dateSelect.disable = false;
      },
      (err) => {
      }
    );
  }

  onSelectDate(event: MatDatepickerInputEvent<Date>) {
    console.log('Було вибрано дату -- ', moment(event.value).format("YYYY-MM-DD"));
  }
}
