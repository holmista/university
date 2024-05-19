import { DailyTourPlan } from "./TourPlan";

export type Tour = {
  id: number;
  previewPictureUrl: string;
  startDate: Date;
  amountOfRegsteredPeople: number;
  location: string;
  excerpt: string;
  price: number;
  rating: number;
  reviewsAmount: number;
  description: string;
  destination: string;
  departure: string;
  departureTime: Date;
  returnTime: Date;
  dressCode: string;
  notIncluded: string[];
  included: string[];
  gallery: string[];
  tourPlan: DailyTourPlan[];
  availableTicketsAmount: number
}
