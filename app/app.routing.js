"use strict";
var router_1 = require('@angular/router');
var home_component_1 = require('./home/home.component');
var about_us_component_1 = require("./about_us/about_us.component");
var appRoutes = [
    {
        path: '',
        redirectTo: '/home',
        pathMatch: 'full'
    },
    {
        path: 'home',
        component: home_component_1.HomeComponent
    },
    {
        path: 'about_us',
        component: about_us_component_1.AboutUsComponent
    }
];
exports.routing = router_1.RouterModule.forRoot(appRoutes);
//# sourceMappingURL=app.routing.js.map