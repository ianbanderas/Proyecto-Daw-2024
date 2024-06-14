import { HttpClient } from '@angular/common/http';
import { Injectable, inject } from '@angular/core';
import { Ciudad } from '@interfaces/ciudad.interface';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class CiudadService {
  
  private http = inject(HttpClient);

  getCiudades(): Observable<Ciudad[]>{
    return this.http.get<Ciudad[]>('http://127.0.0.1:8000/api/ciudad');
  }
  
}
