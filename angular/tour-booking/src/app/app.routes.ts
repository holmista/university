import { Routes } from '@angular/router';
import { ToursPageComponent } from './tours-page/tours-page.component';
import { NotFoundPageComponent } from './not-found-page/not-found-page.component';
import { TourPageComponent } from './tour-page/tour-page.component';
import { TourInfoComponent } from './tour-info/tour-info.component';
import { TourPlanComponent } from './tour-plan/tour-plan.component';
import { tourExistsGuard } from './guards/tour-exists.guard';

export const routes: Routes = [
  {path: "tours", component: ToursPageComponent},
  {path: "not-found", component: NotFoundPageComponent},
  {path: "tour/:id", component: TourPageComponent, canActivateChild:[tourExistsGuard],
    children: [
      {path: "", redirectTo: "information", pathMatch: "full",},
      {path: "information", component: TourInfoComponent},
      {path: "plan", component: TourPlanComponent},
    ]
  },
  // match any route and to display 404
  {path: "**", redirectTo: "not-found"}
];
