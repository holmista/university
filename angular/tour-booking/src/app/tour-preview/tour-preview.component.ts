import { Component, Input } from '@angular/core';
import { Tour } from '../../types/Tour';
import { Router } from '@angular/router';

@Component({
  selector: 'app-tour-preview',
  standalone: true,
  imports: [],
  templateUrl: './tour-preview.component.html',
  styleUrl: './tour-preview.component.css'
})

export class TourPreviewComponent {
  @Input() tour!:Tour;

  constructor(private router: Router) {}

  handleTourPreviewClick(id: number){
    this.router.navigate(['/tour', id]);
  }
}
