import { Injectable } from '@angular/core';
import { Tour } from '../types/Tour';
import { DailyTourPlan } from '../types/TourPlan';

@Injectable({
  providedIn: 'root'
})
export class ToursService {

  private tours: Tour[];

  constructor() {
    this.tours = [];
    this.generateDummyTours(10);
  }

  private generateDummyLocation(){
    const locations = ["Romania", "Slovenia", "Xina", "Bulgaria"]
    return locations[Math.floor(Math.random() * locations.length)];
  }

  private generateDummyExcerpt(){
    const excerpts = ["a lot of horses", "second hand merces", "John xina", "welcome to middle europa!"]
    return excerpts[Math.floor(Math.random() * excerpts.length)];
  }

  private generateDummyTours(amount: number){
    for(let i =0; i<amount; i++){
      let tourPlan1: DailyTourPlan = {
        dayNumber: 1,
        dayTitle: 'Start',
        dayDescription: 'Start of the tour',
        dayBulletPoints: ['This is a dummy bullet point', 'This is another dummy bullet point']
      }
      let tourPlan2: DailyTourPlan = {
        dayNumber: 2,
        dayTitle: 'Visiting sights',
        dayDescription: 'Visiting the most interesting sights in this location',
        dayBulletPoints: ['This is a dummy bullet point', 'This is another dummy bullet point']
      }
      let tourPlan3: DailyTourPlan = {
        dayNumber: 3,
        dayTitle: 'Rounding up',
        dayDescription: 'Finishing the tour and rounding up the experience',
        dayBulletPoints: ['This is a dummy bullet point', 'This is another dummy bullet point']
      }
      const tour:Tour = {
        id: i,
        previewPictureUrl: 'https://picsum.photos/200/300',
        startDate: new Date(),
        amountOfRegsteredPeople: Math.floor(Math.random() * 100),
        location: this.generateDummyLocation(),
        excerpt: this.generateDummyExcerpt(),
        price: Math.floor(Math.random() * 1000),
        rating: Math.floor(Math.random() * 5),
        reviewsAmount: Math.floor(Math.random() * 100),
        description: 'This is a dummy description',
        destination: 'Millishion, Millis',
        departure: 'Sharia, Ranoa',
        departureTime: new Date(new Date().getTime() + 1000 * 60 * 60 * 24 * 2),
        returnTime: new Date(new Date().getTime() + 1000 * 60 * 60 * 24 * 7),
        dressCode: 'casual',
        notIncluded: ['food', 'drinks'],
        included: ['accomodation', 'transport'],
        gallery: [
          'https://picsum.photos/200/300',
          'https://picsum.photos/200/300',
          'https://picsum.photos/200/300',
          'https://picsum.photos/200/300',
          'https://picsum.photos/200/300',
        ],
        tourPlan: [tourPlan1, tourPlan2, tourPlan3],
        availableTicketsAmount: 1000
      }

      this.tours.push(tour);
    }
  }

  public getPreviewTours(): Tour[]{
    return this.tours;
  }

  public getTourById(id: number){
    return this.tours.find(tour => tour.id === id);
  }
}
