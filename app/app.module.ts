import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { LocationStrategy, HashLocationStrategy } from '@angular/common';

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
    providers: [
        {provide: LocationStrategy,
            useClass: HashLocationStrategy}
    ],
    bootstrap: [ AppComponent ]
})
export class AppModule { }
