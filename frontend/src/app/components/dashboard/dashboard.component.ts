// src/app/components/dashboard/dashboard.component.ts

import { Component, OnInit } from '@angular/core';
import { BlockchainService } from '../../services/blockchain.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css'],
})
export class DashboardComponent implements OnInit {
  chain: any[] = [];
  chainLength: number = 0;

  constructor(private blockchainService: BlockchainService) {}

  ngOnInit(): void {
    this.loadChain();
  }

  loadChain(): void {
    this.blockchainService.getChain().subscribe(
      (data) => {
        this.chain = data.chain;
        this.chainLength = data.length;
      },
      (error) => {
        console.error('Error fetching blockchain:', error);
      }
    );
  }
}
