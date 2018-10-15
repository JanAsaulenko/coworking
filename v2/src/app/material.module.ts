import {NgModule} from '@angular/core';

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

  MatInputModule
  // MatDatepickerInput
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
    MatInputModule
    // MatDatepickerInput
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
    MatInputModule
    // MatDatepickerInput
  ]
})
export class MaterialModule {
}
