// src/app/services/blockchain.service.ts

import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

const API_URL = 'http://localhost:5000'; // Replace with your Flask backend URL if different

@Injectable({
  providedIn: 'root',
})
export class BlockchainService {
  constructor(private http: HttpClient) {}

  // Get the full blockchain
  getChain(): Observable<any> {
    return this.http.get(`${API_URL}/get_chain`);
  }

  // Mine a new block
  mineBlock(): Observable<any> {
    return this.http.get(`${API_URL}/mine_block`);
  }

  // Add a new transaction
  addTransaction(sender: string, receiver: string, amount: number): Observable<any> {
    const transaction = { sender, receiver, amount };
    return this.http.post(`${API_URL}/add_transaction`, transaction);
  }

  // Check if the blockchain is valid
  isValid(): Observable<any> {
    return this.http.get(`${API_URL}/is_valid`);
  }

  // Connect nodes
  connectNodes(nodes: string[]): Observable<any> {
    const data = { nodes };
    return this.http.post(`${API_URL}/connect_node`, data);
  }

  // Replace chain
  replaceChain(): Observable<any> {
    return this.http.get(`${API_URL}/replace_chain`);
  }
}
