import { Component, Input } from '@angular/core';
import { Tour } from '../../types/Tour';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ReactiveFormsModule} from '@angular/forms';
import { NgIf } from '@angular/common';

@Component({
  selector: 'app-book-tour',
  standalone: true,
  imports: [ReactiveFormsModule, NgIf],
  templateUrl: './book-tour.component.html',
  styleUrl: './book-tour.component.css'
})
export class BookTourComponent {
  @Input() tour: Tour|undefined;

  public bookingForm: FormGroup;
  public hasErrors = false

  constructor(private formBuilder: FormBuilder) {
    this.bookingForm = this.formBuilder.group({
      name: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      confirmEmail: ['', [Validators.required, Validators.email]],
      phone: ['', [Validators.required]],
      date: ['', [Validators.required]],
      numberOfTickets: ['', Validators.required],
      message: ['']
    }, { validators: this.emailMatchValidator });
  }

  emailMatchValidator(formGroup: FormGroup) {
    const email = formGroup.get('email');
    const confirmEmail = formGroup.get('confirmEmail');

    if (email && confirmEmail && email.value !== confirmEmail.value) {
      confirmEmail.setErrors({ emailMismatch: true });
    } else {
      confirmEmail?.setErrors(null);
    }
  }

  public onSubmit(){
    this.bookingForm.touched
    if (this.bookingForm.valid) {
      const formData = this.bookingForm.value;
      console.log(formData);
      this.bookingForm.reset();
    }
  }
}
