import { Component, OnInit, NgModule } from '@angular/core';
import { NgModel} from '@angular/forms';

import {OrderingService} from "../../services/ordering.service";




@Component({
  selector: 'app-ordering',
  templateUrl: './ordering.component.html',
  styleUrls: ['./ordering.component.css']
})
export class OrderingComponent implements OnInit {
    cities: any =[];
    public curentCity: NgModel ;


  constructor( private orderingService: OrderingService) { }

  ngOnInit() {
      this.orderingService.getAllCity().subscribe(
          (res: any) => {
              this.cities = res.map((city)=>{
                  return {
                      ...city
                  }
              });
              console.log(this.cities);
          },
          (err) => {
          }
      );
  }
    onSelect(id:any){
      console.log(id);
      this.cities = null;
    }
}
