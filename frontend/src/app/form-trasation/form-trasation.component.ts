import { Component, OnInit } from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  ReactiveFormsModule,
  Validators,
} from '@angular/forms';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { ActivatedRoute } from '@angular/router';
import { Transaction } from '../models/transaction.model';

@Component({
  selector: 'app-form-transaction',
  standalone: true,
  imports: [ReactiveFormsModule],
  templateUrl: './form-trasation.component.html',
  styleUrls: ['./form-trasation.component.css']
})
export class FormTransactionComponent implements OnInit {
  userForm!: FormGroup;
  apiUrl: string = 'http://127.0.0.1:8000/api/transaction';
  transactionId!: number;

  constructor(
    private formBuilder: FormBuilder, 
    private http: HttpClient,
    private route: ActivatedRoute
  ) {
    this.userForm = this.formBuilder.group({
      tipo: ['', Validators.required],
      valor: ['', [Validators.required]],
      categoria_nome: ['', [Validators.required, Validators.maxLength(255)]],
    });
  }

  ngOnInit() {
    this.transactionId = Number(this.route.snapshot.paramMap.get('id'));
    if (this.transactionId) {
      this.loadTransaction(this.transactionId);
    }
  }

  loadTransaction(id: number) {
    const apiUrl = `${this.apiUrl}/${id}`;
    this.http.get<{ status: boolean; data: Transaction }>(apiUrl).subscribe({
      next: (response) => {
        if (response.status) {
          const transaction = response.data;
          this.userForm.patchValue({
            tipo: transaction.tipo,
            valor: transaction.valor,
            categoria_nome: transaction.categoria.nome
          });
        } else {
          console.error('Erro ao buscar transação.');
        }
      },
      error: (error) => {
        console.error('Erro ao buscar transação:', error);
      }
    });
  }

  submitForm() {
    if (this.userForm.valid) {
      const transactionData = this.userForm.value;
      const headers = new HttpHeaders({ 'Content-Type': 'application/json' });

      if (this.transactionId) {
        this.http.put(`${this.apiUrl}/${this.transactionId}`, transactionData, { headers }).subscribe({
          next: (response) => {
            console.log('Transação atualizada com sucesso:', response);
            this.userForm.reset();
          },
          error: (error) => {
            console.error('Erro ao atualizar a transação:', error);
          }
        });
      } else {
        this.http.post(this.apiUrl, transactionData, { headers }).subscribe({
          next: (response) => {
            console.log('Transação criada com sucesso:', response);
            this.userForm.reset();
          },
          error: (error) => {
            console.error('Erro ao salvar a transação:', error);
          }
        });
      }
    }
  }
}
