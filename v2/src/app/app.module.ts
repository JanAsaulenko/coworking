import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { RouterModule } from '@angular/router';
import { AgmCoreModule } from '@agm/core';

import { AppComponent } from './app.component';
import {PricesComponent} from './components/prices/prices.component';
import { WelcomeComponent } from './components/main/welcome.component';
import { ContactsComponent } from './components/contacts/contacts.component';
import { PlacesComponent } from './components/places/places.component';
import { OrderingComponent } from './components/ordering/ordering.component';
import {FormsModule} from "@angular/forms";

@NgModule({
  declarations: [
    AppComponent,
    PricesComponent,
    ContactsComponent,
    WelcomeComponent,
    PlacesComponent,
    OrderingComponent
  ],
  imports: [
    BrowserModule,FormsModule,
    HttpClientModule,
    AgmCoreModule.forRoot({
      apiKey: 'AIzaSyAI4IFg_krZ3BflXLNIHCNKocu23lXGV7E'
    }),
    RouterModule.forRoot([
      { path: 'welcome', component: WelcomeComponent },
      { path: 'prices', component: PricesComponent },
      { path: 'contacts', component: ContactsComponent },
      { path: 'places', component: PlacesComponent },
        { path: 'ordering', component: OrderingComponent },
        { path: '', redirectTo: 'welcome', pathMatch: 'full' },
      { path: '**', redirectTo: 'welcome', pathMatch: 'full' }
]),
],
  providers: [],
  bootstrap: [ AppComponent ]
})
export class AppModule { }
