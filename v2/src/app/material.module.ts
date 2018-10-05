
import { NgModule } from '@angular/core';
import {MatButtonModule, MatCheckboxModule} from '@angular/material';
import {MatFormFieldModule} from '@angular/material/form-field';
import {MatInputModule} from '@angular/material';



@NgModule({
    imports: [MatButtonModule,
        MatFormFieldModule,
        MatInputModule,
        MatCheckboxModule,
        ],
    exports: [MatButtonModule,
        MatFormFieldModule,
        MatInputModule,
        MatCheckboxModule,
      ],
})
export class MaterialModule { }