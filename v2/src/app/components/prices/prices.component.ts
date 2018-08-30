import { Component } from '@angular/core';

@Component({
    selector: 'prices',
    templateUrl: './prices.component.html',
     styleUrls: ['./prices.component.css']
})
export class PricesComponent {
  title: string = 'Вартість';
  priceDay: sum [] = [{
    "priceId":1,
    "amount": 1 +'день',
    "price": 90 +'грн',
  },
    {
      "priceId":2,
      "amount": 5 +'днів',
      "price": 320 +'грн',
    },
    {
      "priceId":3,
      "amount": 10 +'днів',
      "price": 600 +'грн',
    }
  ];
}
