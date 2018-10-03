import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { catchError, tap, map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class ContactsService {
 private contactUrl = '/api/getallplaces';

  constructor(
      private http: HttpClient
  ) { }

  getContacts() {
      return this.http.get(this.contactUrl)
    // return [{ marker: { lat: 49.229065, long: 28.425729} }]
  }


    postUser(user ) {
        return this.http.post( this.contactUrl,user.map(res=>res.json()));
        // return [{ marker: { lat: 49.229065, long: 28.425729} }]
    }

}
