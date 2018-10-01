import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { RouterModule } from '@angular/router';
import { AgmCoreModule } from '@agm/core';

import { AppComponent } from './app.component';
import {PricesComponent} from './components/prices/prices.component';
import { WelcomeComponent } from './components/main/welcome.component';
import { ContactsComponent } from './components/contacts/contacts.component';
import { HeaderComponent } from './components/header/header.component';



@NgModule({
  declarations: [
    AppComponent,
    PricesComponent,
    ContactsComponent,
    WelcomeComponent,
    HeaderComponent,
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    AgmCoreModule.forRoot({
      apiKey: 'AIzaSyAI4IFg_krZ3BflXLNIHCNKocu23lXGV7E'
    }),
    RouterModule.forRoot([
      { path: 'welcome', component: WelcomeComponent },
      { path: 'prices', component: PricesComponent },
      { path: 'contacts', component: ContactsComponent },
      { path: 'header', component: HeaderComponent },
      { path: '', redirectTo: 'welcome', pathMatch: 'full' },
      { path: '**', redirectTo: 'welcome', pathMatch: 'full' }
]),
],
  providers: [],
  bootstrap: [ AppComponent ]
})
export class AppModule { }