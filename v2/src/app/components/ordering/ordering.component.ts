import { Component, OnInit, NgModule } from '@angular/core';
import { City } from '../../interfaces/city';
import {OrderingService} from "../../services/ordering.service";

export class CitySelect {
    cities: Array<City>;
    curentCityId: number
}



@Component({
  selector: 'app-ordering',
  templateUrl: './ordering.component.html',
  styleUrls: ['./ordering.component.css']
})


export class OrderingComponent implements OnInit {
    cities: any =[];
    places: any =[];
    spaces: any =[];

    public curentCityId: any = 0;
    public curentPlaceId: any = 0;
    public curentSpaceId: any = 0;

  constructor( private orderingService: OrderingService) { }

  ngOnInit() {

      this.orderingService.getAllCity().subscribe(
          (cities: any) => {
              this.cities = cities;
          },
          (err) => {
          }
      );
  }

  onSelectCity(id:any){
    this.places = [];
    this.curentPlaceId = 0;
    this.spaces = [];
    this.curentSpaceId = 0;


        this.orderingService.getPlaces(id).subscribe(
          (res: any) =>{
                this.places = res.map((item:any )=>{
                    return{
                        id: item.palce_id,
                        address: item.address,
                        name: item.name
                    }
                });
                },
            (err) =>{
          });
    }

    onSelectPlace(id:any){
        this.spaces = [];
        this.curentSpaceId = 0;
        this.orderingService.getSpaces(id).subscribe(
            (res: any) => {
                this.spaces = res.map((item:any)=>{
                    return{
                        id: item.id,
                        name: item.name
                    }
                })
            },
            (err) =>{
            });
    }

}
