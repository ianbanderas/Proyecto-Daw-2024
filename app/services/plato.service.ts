import { HttpClient} from '@angular/common/http';
import { Injectable, inject } from '@angular/core';
import { Plato } from '@interfaces/plato.interface';

@Injectable({
  providedIn: 'root'
})
export class PlatoService {

  private http = inject(HttpClient);

  getMenuByIdRestaurante(idRes:number){
    return this.http.get<any[]>('http://127.0.0.1:8000/api/_menu/'+ idRes);
  }

  getPlatoById(idPla:number){
    return this.http.get<any>('http://127.0.0.1:8000/api/plato/'+ idPla);
  }

  
  getPlatoActualizadoById(idPla:number, idRes:number){
    return this.http.get<any>('http://127.0.0.1:8000/api/plato/'+ idPla + '/' + idRes);
  }

  getAllPlatos(){
    return this.http.get<any>('http://127.0.0.1:8000/api/platos');
  }
  createPlato(plato: any){
    return this.http.post('http://127.0.0.1:8000/api/plato', plato);
  }
  
  updatePlato(plato: any, idPla: number){
    return this.http.put('http://127.0.0.1:8000/api/plato/' + idPla, plato);
  }

  deletePlato(idRes: number, idPla: number){
    return this.http.delete('http://127.0.0.1:8000/api/plato/' + idRes + "/" + idPla);
  }

  constructor() { }
}
