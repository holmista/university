import { CanActivateFn } from '@angular/router';
import { ToursService } from '../tours.service';
import { inject } from '@angular/core';
import { Router } from '@angular/router';

// assumes this will be called for child routes only

export const tourExistsGuard: CanActivateFn = (route, state) => {
  const toursService = inject(ToursService);
  const router = inject(Router);
  const tourId = route?.parent?.paramMap.get('id');
  if(!tourId){
    router.navigate(['/not-found']);
    return false;
  }
  const tour = toursService.getTourById(+tourId);
  if(!tour){
    router.navigate(['/not-found']);
    return false;
  }
  return true;
};
