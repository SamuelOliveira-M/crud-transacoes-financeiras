// src/app/pipes/filter-by-type.pipe.ts
import { Pipe, PipeTransform } from '@angular/core';
import { Transaction } from '../app/models/transaction.model';

@Pipe({
  name: 'filterByType',
  standalone: true // Torna o pipe standalone
})
export class FilterByTypePipe implements PipeTransform {
  transform(transactions: Transaction[], selectedType: string): Transaction[] {
    if (!selectedType) {
      return transactions;
    }
    return transactions.filter(transaction => transaction.tipo === selectedType);
  }
}
