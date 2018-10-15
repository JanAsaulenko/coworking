<<<<<<< HEAD
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
=======

import { NgModule } from '@angular/core';
import {MatButtonModule, MatCheckboxModule} from '@angular/material';
import {MatFormFieldModule} from '@angular/material/form-field';
import {MatInputModule} from '@angular/material';
import {MatCardModule} from '@angular/material/card';


@NgModule({
    imports: [MatButtonModule,
        MatFormFieldModule,
        MatInputModule,
        MatCheckboxModule,
        MatCardModule,
        ],
    exports: [MatButtonModule,
        MatFormFieldModule,
        MatInputModule,
        MatCheckboxModule,
        MatCardModule,
      ],
})
export class MaterialModule { }
>>>>>>> remotes/origin/dev
