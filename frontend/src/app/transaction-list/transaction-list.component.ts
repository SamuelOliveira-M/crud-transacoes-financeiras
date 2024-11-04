import { Component, OnInit } from '@angular/core';
import { Transaction } from '../models/transaction.model';
import { NgFor } from '@angular/common';
import { FormsModule } from '@angular/forms'; 
import { FilterByTypePipe } from '../filter-by-type.pipe';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router'; // Importe o Router

@Component({
  selector: 'app-transaction-list',
  standalone: true,
  imports: [NgFor, FormsModule, FilterByTypePipe],
  templateUrl: './transaction-list.component.html',
  styleUrls: ['./transaction-list.component.css']
})
export class TransactionListComponent implements OnInit {
  transactions: Transaction[] = [];
  selectedType: string = ''; // Variável para armazenar o valor do filtro de tipo

  constructor(private http: HttpClient, private router: Router) {} // Injetando o HttpClient e o Router

  ngOnInit(): void {
    this.fetchTransactions(); // Chamando o método para buscar as transações
  }

  fetchTransactions(): void {
    const apiUrl = 'http://127.0.0.1:8000/api/transactions'; // URL da API
    
    this.http.get<{ status: boolean; data: Transaction[]; message: string }>(apiUrl).subscribe({
      next: (response) => {
        if (response.status) {
          this.transactions = response.data; // Atualizando a lista de transações com os dados recebidos
        } else {
          console.error('Erro ao buscar transações:', response.message); // Mensagem de erro se status for false
        }
      },
      error: (error) => {
        console.error('Erro ao buscar transações:', error); // Tratamento de erro
      }
    });
  }

  deleteTransaction(id: number): void {
    const apiUrl = `http://127.0.0.1:8000/api/transaction/${id}`; // URL da API para deletar
    
    this.http.delete<{ status: boolean; message: string }>(apiUrl).subscribe({
      next: (response) => {
        if (response.status) {
          // Remove a transação da lista localmente após a exclusão bem-sucedida
          this.transactions = this.transactions.filter(transaction => transaction.id !== id);
          console.log('Transação deletada com sucesso');
        } else {
          console.error('Erro ao deletar transação:', response.message);
        }
      },
      error: (error) => {
        console.error('Erro ao deletar transação:', error); // Tratamento de erro
      }
    });
  }

  editTransaction(id: number) {
    this.router.navigate([`/edit-transaction/${id}`]); // Navega para a rota de edição
  }
}
