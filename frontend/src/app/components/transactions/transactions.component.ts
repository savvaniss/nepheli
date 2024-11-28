// src/app/components/transactions/transactions.component.ts

import { Component } from '@angular/core';
import { BlockchainService } from '../../services/blockchain.service';

@Component({
  selector: 'app-transactions',
  templateUrl: './transactions.component.html',
  styleUrls: ['./transactions.component.css'],
  standalone: false
})
export class TransactionsComponent {
  sender: string = '';
  receiver: string = '';
  amount: number | null = null;
  message: string = '';

  constructor(private blockchainService: BlockchainService) {}

  addTransaction(): void {
    if (!this.sender || !this.receiver || !this.amount) {
      this.message = 'Please fill in all fields.';
      return;
    }

    this.blockchainService.addTransaction(this.sender, this.receiver, this.amount).subscribe(
      (data) => {
        this.message = data.message;
        // Reset form fields
        this.sender = '';
        this.receiver = '';
        this.amount = null;
      },
      (error) => {
        console.error('Error adding transaction:', error);
        this.message = 'An error occurred while adding the transaction.';
      }
    );
  }
}
