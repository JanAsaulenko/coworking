import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { catchError, tap, map , of} from 'rxjs/operators';

// Temporary mock data (gallery images)
const galleryPlaces = [
    {
        placeName: 'Test',
        capacity: 40,
        city: 'Vinnytsia',
        address: 'Vaschuka 20',
        img: ''
    },

]

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

  getGalleryImages() {

  }


  postUser(user ) {
     return this.http.post( this.contactUrl,user.map(res=>res.json()));
    // return [{ marker: { lat: 49.229065, long: 28.425729} }]
  }

}
