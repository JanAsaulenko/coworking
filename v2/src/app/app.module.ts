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
import { AgmSnazzyInfoWindowModule } from '@agm/snazzy-info-window';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {MaterialModule} from "./material.module";
import {MatInputModule} from '@angular/material';
import { OrderingComponent } from './components/ordering/ordering.component';
import {FormsModule} from "@angular/forms";

import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {MaterialModule} from './material.module';
import {MAT_DATE_LOCALE} from "@angular/material";


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
      BrowserModule,
      BrowserAnimationsModule,
      HttpClientModule,
      MaterialModule,
      MatInputModule,
    BrowserModule,FormsModule,
    HttpClientModule,
    BrowserAnimationsModule,
    MaterialModule,
    AgmCoreModule.forRoot({
      apiKey: 'AIzaSyAI4IFg_krZ3BflXLNIHCNKocu23lXGV7E'
    }),
      AgmSnazzyInfoWindowModule,
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
  providers: [{provide: MAT_DATE_LOCALE, useValue: 'uk'},],
  bootstrap: [ AppComponent ]
})
export class AppModule { }
