import { Component } from '@angular/core';
import { Input } from '@angular/core';
import { ToursService } from '../tours.service';
import { Tour } from '../../types/Tour';
import { Router } from '@angular/router';
import { TourHeaderComponent } from '../tour-header/tour-header.component';
import { BookTourComponent } from '../book-tour/book-tour.component';
import { RouterOutlet } from '@angular/router';

@Component({
  selector: 'app-tour-page',
  standalone: true,
  imports: [TourHeaderComponent, BookTourComponent, RouterOutlet],
  templateUrl: './tour-page.component.html',
  styleUrl: './tour-page.component.css'
})
export class TourPageComponent {
  @Input()
  set id(tourId: string) {
    this.tour = this.toursService.getTourById(+tourId);
  }

  public tour: Tour|undefined;

  constructor(private toursService: ToursService, private router: Router) {}

  ngOnInit() {
    if(!this.tour){
      this.router.navigate(['/not-found']);
    }
  }
}
