import { Component } from '@angular/core';
import {PricesService} from "./components/prices/prices.service";

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  providers: [ PricesService ]
})
export class AppComponent {
  title = 'CoWorking';
}

