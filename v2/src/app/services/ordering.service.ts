import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class OrderingService {
    private getAllCitiesUrl = '/api/getallcities';
    private getPlacesUrl = '/api/getplaces';
    private getSpaceUrl = '/api/getspaces';

    constructor(
        private http: HttpClient
    ) { }

    getAllCity() {
        return this.http.get(this.getAllCitiesUrl);
    }

    getPlaces(id:number){
        if (id != 0 ){
        console.log('getPlaces got not null id params')
        }
        return this.http.get(this.getPlacesUrl,{ params:{ city_id: id.toString() }})
    }

    getSpaces(id:number){
        if (id != 0 ){
            console.log('getPlaces got not null id params')
        }
        return this.http.get(this.getSpaceUrl,{ params:{ place_id: id.toString() }})
    }



}
