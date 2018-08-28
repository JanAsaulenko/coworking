import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { RouterModule } from '@angular/router';

import { AppComponent } from './app.component';
import {PricesComponent} from '../../../../test/_V2_test/prices/prices.component';
import { WelcomeComponent } from './components/main/welcome.component';

@NgModule({
  declarations: [
    AppComponent,
    PricesComponent,
    WelcomeComponent],
  imports: [
    BrowserModule,
    RouterModule.forRoot([
      { path: 'welcome', component: WelcomeComponent },
      { path: '', redirectTo: 'welcome', pathMatch: 'full' },
      { path: '**', redirectTo: 'welcome', pathMatch: 'full' }
    ]),
  ],
  providers: [],
  bootstrap: [ AppComponent ]
})
export class AppModule { }
