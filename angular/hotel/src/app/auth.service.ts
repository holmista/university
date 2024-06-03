import { Injectable } from '@angular/core';
import { RegistrationFormData } from '../types/RegistrationForm';
import { LoginFormData } from '../types/LoginForm';
import { HttpClient } from '@angular/common/http';
import {Helper} from "../app/helper";

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  constructor(private http: HttpClient) {  }
  public static readonly loginRoute = "/account/login"
  public static readonly registerRoute = "/account/register"

  public register(data:RegistrationFormData){
    data.avatar = "string"
    data.gender = +data.gender
    const fullUrl = Helper.resolveFullEndpoint(AuthService.registerRoute)
    return this.http.post(fullUrl, data);
  }

  public login(data:LoginFormData){
    const fullUrl = Helper.resolveFullEndpoint(AuthService.loginRoute)
    return this.http.post(fullUrl, data);
  }
}
