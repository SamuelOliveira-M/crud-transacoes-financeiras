import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormTrasationComponent } from './form-trasation.component';

describe('FormTrasationComponent', () => {
  let component: FormTrasationComponent;
  let fixture: ComponentFixture<FormTrasationComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [FormTrasationComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(FormTrasationComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
