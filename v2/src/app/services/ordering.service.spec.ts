import { TestBed, inject } from '@angular/core/testing';

import { OrderingService } from './ordering.service';

describe('OrderingService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [OrderingService]
    });
  });

  it('should be created', inject([OrderingService], (service: OrderingService) => {
    expect(service).toBeTruthy();
  }));
});
