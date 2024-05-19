import { Component, Input } from '@angular/core';
import { Tour } from '../../types/Tour';
import { ToursService } from '../tours.service';
import { ActivatedRoute } from '@angular/router';
import { NgFor } from '@angular/common';

@Component({
  selector: 'app-tour-info',
  standalone: true,
  imports: [NgFor],
  templateUrl: './tour-info.component.html',
  styleUrl: './tour-info.component.css'
})
export class TourInfoComponent {
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
