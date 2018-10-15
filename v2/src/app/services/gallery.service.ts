import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http';
import { of } from 'rxjs';

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
    private galleyUrl = '/api/getGalley';

    constructor(
        private http: HttpClient
    ) { }

    getGalleryImages() {
        return of(galleryPlaces)
    }
}
