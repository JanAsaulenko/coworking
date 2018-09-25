import {Component, OnInit} from '@angular/core';
import {IPrices} from "./prices";
import {PricesService} from "../../services/prices.service";

@Component({
    selector: 'prices',
    templateUrl: './prices.component.html',
     styleUrls: ['./prices.component.css']
})
export class PricesComponent implements OnInit {
  title: string = 'Вартість';
  prices = [];



  constructor(
    private pricesService: PricesService) {

  }

  ngOnInit() {
    this.pricesService.getPrices().subscribe(
      (res: any) => {
        this.prices = res.map((price)=>{
          return {
            ...price
            // ,
            // latitude: Number(place.latitude),
            // longitude: Number(place.longitude)
          }
        });
        console.log(this.prices);

      },
      (err) => {

      }
    );
  }


}
