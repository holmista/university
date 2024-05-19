import { Component } from '@angular/core';
import { RouterLink } from '@angular/router';
import { Router, ChildActivationEnd } from '@angular/router';

@Component({
  selector: 'app-tour-header',
  standalone: true,
  imports: [RouterLink],
  templateUrl: './tour-header.component.html',
  styleUrl: './tour-header.component.css'
})
export class TourHeaderComponent {

  public activeRoute!: string;

  constructor(private router: Router) {
    this.router.events.subscribe(event => {
      if (event instanceof ChildActivationEnd) {
        const url = this.router.url;
        this.activeRoute = url.split("/")[3];
      }
    });
  }

  public isActive(name: string): boolean {
    return this.activeRoute === name;
  }

}
