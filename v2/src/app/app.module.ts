import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { RouterModule } from '@angular/router';
import { AgmCoreModule } from '@agm/core';

import { AppComponent } from './app.component';
import { WelcomeComponent } from './components/main/welcome.component';
import { ContactsComponent } from './components/contacts/contacts.component';

@NgModule({
  declarations: [
    AppComponent,
    WelcomeComponent,
    ContactsComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    AgmCoreModule.forRoot({
      apiKey: 'AIzaSyAI4IFg_krZ3BflXLNIHCNKocu23lXGV7E'
    }),
    RouterModule.forRoot([
      { path: 'welcome', component: WelcomeComponent },
      { path: 'contacts', component: ContactsComponent },
      { path: '', redirectTo: 'welcome', pathMatch: 'full' },
      { path: '**', redirectTo: 'welcome', pathMatch: 'full' }
    ]),
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
