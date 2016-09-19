import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent }  from './app.component';
import { HomeComponent } from './home/home.component';
import { AboutUsComponent } from './about_us/about_us.component';
import { routing }       from './app.routing';

@NgModule({
  imports: [
      BrowserModule,
      routing
  ],
  declarations: [
      AppComponent,
      HomeComponent,
      AboutUsComponent
  ],
  bootstrap: [ AppComponent ]
})
export class AppModule { }
