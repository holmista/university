import { TestBed } from '@angular/core/testing';
import { CanActivateFn } from '@angular/router';

import { tourExistsGuard } from './tour-exists.guard';

describe('tourExistsGuard', () => {
  const executeGuard: CanActivateFn = (...guardParameters) => 
      TestBed.runInInjectionContext(() => tourExistsGuard(...guardParameters));

  beforeEach(() => {
    TestBed.configureTestingModule({});
  });

  it('should be created', () => {
    expect(executeGuard).toBeTruthy();
  });
});
