import { Injectable, inject } from '@angular/core';
import { TokenService } from './token.service';
import { BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private token$ = inject(TokenService);
  private loggedIn = new BehaviorSubject<boolean>(this.token$.loggedIn());
  public authStatus = this.loggedIn.asObservable();

  changeAuthStatus(value: boolean) {
    this.loggedIn.next(value);
  }
}
