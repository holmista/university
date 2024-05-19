import { Component, Output, EventEmitter } from '@angular/core';
import { SearchTours } from '../../types/SearchTours';
import { FormsModule } from '@angular/forms';


@Component({
  selector: 'app-plan-your-trip',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './plan-your-trip.component.html',
  styleUrl: './plan-your-trip.component.css'
})
export class PlanYourTripComponent {
  @Output() searchToursEvent = new EventEmitter<SearchTours>();

  public searchTour = ''
  public whereTo = ''
  public date = ''
  public priceFrom = null
  public priceTo = null

  public doSearch(){
    let searchObject: SearchTours = {
      searchExcerpt: this.searchTour.length > 0 ? this.searchTour : null,
      searchLocation: this.whereTo.length > 0 ? this.whereTo : null,
      searchDate: this.date.length > 0 ? new Date(this.date) : null,
      searchPriceFrom: this.priceFrom,
      searchPriceTo: this.priceTo
    }

    this.searchToursEvent.emit(searchObject)
  }
}
