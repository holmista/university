import { Injectable } from '@angular/core';
import { Helper } from './helper';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Room } from '../types/Room';

@Injectable({
  providedIn: 'root'
})
export class RoomsService {

  constructor(private httpClient:HttpClient) { }
  public static readonly getAllRoomsRoute = "/roomtypes/getall"

  public getAllRooms(): Observable<Room[]>{
    const fullUrl = Helper.resolveFullEndpoint(RoomsService.getAllRoomsRoute)
    return this.httpClient.get<Room[]>(fullUrl);
  }
}
