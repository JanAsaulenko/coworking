import { Component, OnInit } from '@angular/core';
import { ContactsService } from '../../services/contacts.service';

@Component({
  selector: 'app-contacts',
  templateUrl: './contacts.component.html',
  styleUrls: ['./contacts.component.css']

})
export class ContactsComponent implements OnInit {
    mapConfig = {
        lat: 49.229065,
        long: 28.425729
    }
  markers: any =[];
    user={
        name:"",
        email:"",
        theme:"",
        subject:""

    }

  constructor(
      private contactsService: ContactsService
  ) { }

  ngOnInit() {
    this.contactsService.getContacts().subscribe(
        (res: any) => {
            this.markers = res.map((place)=>{
                return {
                    ...place,
                    latitude: Number(place.latitude),
                    longitude: Number(place.longitude)

                }

            });

        },
        (err) => {

        }
    );
  }


}
