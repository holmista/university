import { Component } from '@angular/core';
import {MatGridListModule} from '@angular/material/grid-list';
import {MatCardModule} from '@angular/material/card';
import { RouterLink } from '@angular/router';
import { NgFor } from '@angular/common';
import { Room } from '../../types/Room';
import { RoomsService } from '../rooms.service';
import { map } from 'rxjs';

@Component({
  selector: 'app-rooms-page',
  standalone: true,
  imports: [MatGridListModule, MatCardModule, RouterLink, NgFor],
  templateUrl: './rooms-page.component.html',
  styleUrl: './rooms-page.component.css'
})
export class RoomsPageComponent {
  public rooms: Room[] = []

  public constructor(private roomsService:RoomsService) {
    this.roomsService.getAllRooms().pipe(
      map((rooms: Room[]) => {
        return rooms.map(room => {
          // room.images = [
          //   'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af',
          //   'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267',
          //   'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688'
          // ];
          room.coverImage = 'https://images.unsplash.com/photo-1598928636135-d146006ff4be';
          return room;
        });
      })
    ).subscribe({
      next: (rooms: Room[]) => {
        this.rooms = rooms;
      },
      error: (error) => {
        console.log("error", error);
      }
    });
  }
}
