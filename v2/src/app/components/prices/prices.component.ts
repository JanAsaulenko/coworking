import { Component } from '@angular/core';
import {IPrices} from "./prices";

@Component({
    selector: 'prices',
    templateUrl: './prices.component.html',
     styleUrls: ['./prices.component.css']
})
export class PricesComponent {
  title: string = 'Вартість';
  priceDay: IPrices[] = [{
    "priceId":1,
    "duration": 1 +'день',
    "amount": 90 +'грн',
  },
    {
      "priceId":2,
      "duration": 5 +'днів',
      "amount": 320 +'грн',
    },
    {
      "priceId":3,
      "duration": 10 +'днів',
      "amount": 600 +'грн',
    }
  ];
}
