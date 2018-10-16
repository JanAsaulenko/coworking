
import {NgModule} from '@angular/core';
import {MatTabsModule} from '@angular/material/tabs';
import {
  MatButtonModule,
  MatMenuModule,
  MatToolbarModule,
  MatIconModule,
  MatCardModule,
  MatCheckboxModule,
  MatFormFieldModule,
  MatSelectModule,
  MatDatepickerModule,
  MatNativeDateModule,
  MatInputModule,
  // MatTabsModule
} from '@angular/material';

@NgModule({
  imports: [
    MatButtonModule,
    MatMenuModule,
    MatToolbarModule,
    MatIconModule,
    MatCardModule,
    MatButtonModule,
    MatCheckboxModule,

    MatSelectModule,
    MatDatepickerModule,
    MatNativeDateModule, MatFormFieldModule,
    MatInputModule,
    MatTabsModule
  ],
  exports: [
    MatButtonModule,
    MatMenuModule,
    MatToolbarModule,
    MatIconModule,
    MatCardModule,
    MatButtonModule,
    MatCheckboxModule,

    MatSelectModule,
    MatDatepickerModule,
    MatNativeDateModule, MatFormFieldModule,
    MatInputModule,
    MatTabsModule
  ]
})
export class MaterialModule {
}
