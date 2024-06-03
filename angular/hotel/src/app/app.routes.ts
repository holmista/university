import { Routes } from '@angular/router';
import { RegisterPageComponent } from './register-page/register-page.component';
import { LoginPageComponent } from './login-page/login-page.component';
import { RoomsPageComponent } from './rooms-page/rooms-page.component';
import { RoomPageComponent } from './room-page/room-page.component';

export const routes: Routes = [
  { path: 'register', component: RegisterPageComponent },
  { path: 'login', component: LoginPageComponent },
  {path: '', redirectTo: '/login', pathMatch: 'full'},
  {path: 'rooms', component: RoomsPageComponent},
  {path: 'room/:id', component: RoomPageComponent},
];
