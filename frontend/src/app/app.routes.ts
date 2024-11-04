import { Routes } from '@angular/router';
import { FormTransactionComponent } from './form-trasation/form-trasation.component';
import { TransactionListComponent } from './transaction-list/transaction-list.component';

export const routes: Routes = [
    { path: 'edit-transaction/:id', component: FormTransactionComponent },
    { path: 'transaction-form', component: FormTransactionComponent },
    { path: '', component: TransactionListComponent },
];
