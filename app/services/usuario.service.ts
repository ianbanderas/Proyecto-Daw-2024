import { HttpClient } from '@angular/common/http';
import { Injectable, inject, signal } from '@angular/core';
import { Usuario } from '@interfaces/usuario.interface';

@Injectable({
  providedIn: 'root'
})
export class UsuarioService {
  private http = inject(HttpClient);
  public usuario = signal<Usuario|null>(null);
  constructor() {
    if(localStorage.getItem('usuario') && this.usuario() == null){
       this.usuario.update( () => JSON.parse(String(localStorage.getItem('usuario'))))

    }
   }

  signUp(data: any) {
    return this.http.post('http://127.0.0.1:8000/api/signup', data);
  }

  login(data: any) {
    return this.http.post('http://127.0.0.1:8000/api/login', data);
  }

  getUsuByName(nombre: string) {
    return this.http.get('http://localhost:8000/api/usuario/' + nombre);
  }

  changePassword(idUsu: number, newPass: string){
    return this.http.post('http://localhost:8000/api/password/' + idUsu +'?_method=PUT', {password: newPass})
  }
}
