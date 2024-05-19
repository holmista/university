import { Component } from '@angular/core';
import { Tour } from '../../types/Tour';
import { ToursService } from '../tours.service';
import { TourPreviewComponent } from '../tour-preview/tour-preview.component';
import { PlanYourTripComponent } from '../plan-your-trip/plan-your-trip.component';
import { NgFor } from '@angular/common';
import { SearchTours } from '../../types/SearchTours';

@Component({
  selector: 'app-tours-page',
  standalone: true,
  imports: [TourPreviewComponent, PlanYourTripComponent, NgFor],
  templateUrl: './tours-page.component.html',
  styleUrl: './tours-page.component.css'
})
export class ToursPageComponent {
  public tourPreviews: Tour[] = []

  constructor(private toursService: ToursService) {
    this.tourPreviews = toursService.getPreviewTours()
  }

  public handleSearch(searchObject: SearchTours){
    let filteredTourPreviews = this.toursService.getPreviewTours()

    if(searchObject.searchExcerpt){
      filteredTourPreviews = filteredTourPreviews.filter(tour => tour.excerpt.includes(searchObject.searchExcerpt as string)) // dumb typescript
    }

    if(searchObject.searchLocation){
      filteredTourPreviews = filteredTourPreviews.filter(tour => tour.location.includes(searchObject.searchLocation as string))
    }

    if(searchObject.searchDate){
      filteredTourPreviews = filteredTourPreviews.filter(tour => this.isSameDate(tour.startDate, searchObject.searchDate as Date))
    }

    if(searchObject.searchPriceFrom){
      filteredTourPreviews = filteredTourPreviews.filter(tour => tour.price >= (searchObject.searchPriceFrom ?? 0))
    }

    if(searchObject.searchPriceTo){
      filteredTourPreviews = filteredTourPreviews.filter(tour => tour.price <= (searchObject.searchPriceTo ?? Number.POSITIVE_INFINITY))
    }

    this.tourPreviews = filteredTourPreviews
  }

  private isSameDate(date1: Date, date2: Date) {
    return (
      date1.getFullYear() === date2.getFullYear() &&
      date1.getMonth() === date2.getMonth() &&
      date1.getDate() === date2.getDate()
    );
  }
}
