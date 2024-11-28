// src/app/components/mining/mining.component.ts

import { Component } from '@angular/core';
import { BlockchainService } from '../../services/blockchain.service';

@Component({
  selector: 'app-mining',
  templateUrl: './mining.component.html',
  styleUrls: ['./mining.component.css'],
  standalone: false
})
export class MiningComponent {
  message: string = '';
  isMining: boolean = false;

  constructor(private blockchainService: BlockchainService) {}

  mineBlock(): void {
    this.isMining = true;
    this.message = 'Mining in progress...';
    this.blockchainService.mineBlock().subscribe(
      (data) => {
        this.isMining = false;
        this.message = data.message;
      },
      (error) => {
        this.isMining = false;
        console.error('Error mining block:', error);
        this.message = 'An error occurred while mining the block.';
      }
    );
  }
}
