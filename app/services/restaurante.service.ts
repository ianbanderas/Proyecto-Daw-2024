import { HttpClient } from '@angular/common/http';
import { Injectable, inject, signal } from '@angular/core';
import { Restaurante } from '@interfaces/restaurante.interface';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class RestauranteService {


  private http = inject(HttpClient);
  public idUsuRest = signal<number>(0);


  getRestaurantes(): Observable<Restaurante[]> {
    return this.http.get<Restaurante[]>('http://127.0.0.1:8000/api/restaurante');
  }

  getRestaurantesByIdUsu(idUsu: number) {
    console.log("Actualizando usuario restaurante: ", idUsu)
    this.idUsuRest?.set(idUsu);
    return this.http.get<Restaurante[]>('http://127.0.0.1:8000/api/restaurante/' + idUsu);
  }

  createRestaurante(restaurante: any) {
    return this.http.post('http://127.0.0.1:8000/api/restaurante/', restaurante);
  }

  deleteRestauranteById(idRestaurante: number) {
    return this.http.get('http://127.0.0.1:8000/api/restaurante/borrar/' + idRestaurante);
  }

  createPlatoValorado(valoracion: any) {
    return this.http.post('http://127.0.0.1:8000/api/valorar/', valoracion);
  }

  updatePlatoValorado(valoracion: any, idRest: number, idPla: number) {
    return this.http.put('http://127.0.0.1:8000/api/restaurante/' + idRest + '/' + idPla, valoracion);
  }
}
