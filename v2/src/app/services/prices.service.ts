import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse } from '@angular/common/http';



@Injectable({
  providedIn: 'root'
})
export class PricesService {
  private pricesUrl = '/api/getallprices';

  constructor(
    private http: HttpClient
  ) { }

  getPrices() {
    return this.http.get(this.pricesUrl)
    // return [{ marker: { lat: 49.229065, long: 28.425729} }]
  }



}
