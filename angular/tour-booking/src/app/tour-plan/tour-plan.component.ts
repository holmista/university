import { Component, Input } from '@angular/core';
import { NgFor } from '@angular/common';
import { Tour } from '../../types/Tour';
import { ToursService } from '../tours.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-tour-plan',
  standalone: true,
  imports: [NgFor],
  templateUrl: './tour-plan.component.html',
  styleUrl: './tour-plan.component.css'
})
export class TourPlanComponent {
  public tourId = '';

  public tour: Tour;

  constructor(private toursService: ToursService, private route: ActivatedRoute) {
    this.tour = this.toursService.getTourById(+this.tourId) as Tour;
  }

  ngOnInit(): void {
    this.route?.parent?.paramMap.subscribe(params => {
      this.tourId = params.get('id') as string;
    });
  }
}
