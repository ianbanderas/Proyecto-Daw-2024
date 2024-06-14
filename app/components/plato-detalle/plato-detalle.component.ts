import { CommonModule } from '@angular/common';
import { Component, Input, inject } from '@angular/core';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { Plato } from '@interfaces/plato.interface';
import { IdiomaService } from '@services/idioma.service';
import { PlatoService } from '@services/plato.service';
import { RestauranteService } from '@services/restaurante.service';
import { BotonComponent } from '@shared/boton/boton.component';

@Component({
  selector: 'app-plato-detalle',
  standalone: true,
  imports: [BotonComponent, RouterLink],
  templateUrl: './plato-detalle.component.html',
  styleUrl: './plato-detalle.component.scss'
})
export default class PlatoDetalleComponent {
  private plato$ = inject(PlatoService);
  private restaurante$ = inject(RestauranteService);
  private idioma$ = inject(IdiomaService);
  private router = inject(Router);
  public idUsuRes = this.restaurante$.idUsuRest();
  public idUsuario = JSON.parse(localStorage.getItem('usuario')!).idUsu || 0;

  public plato: Plato = {
    idPla: 0,
    nombre: '',
    descripcion: ''
  };
  public estrellas: Boolean[] = [];
  public idPla?: string;
  public idRes?: string;
  private route = inject(ActivatedRoute);

  constructor() {
    this.route.params.subscribe(({ plato_id, rest_id }) => {
      this.idPla = plato_id;
      this.idRes = rest_id;
      this.plato$.getPlatoById(plato_id).subscribe((res) => {
        this.plato = res.plato;
        this.plato!.comentario = res.comentario;

        for (let i = 0; i < 10; i++) {
          this.estrellas.push(Boolean(i < res.valoracion));
        }
      })
    })
  }

  deletePlato() {
    if (confirm(this.idioma$.getText('confirmDelete'))) {

      this.plato$.deletePlato(Number(this.idRes), Number(this.idPla)).subscribe({
        next: (data) => {
            alert(this.idioma$.getText('delPla'))
            this.router.navigateByUrl("/menu/" + this.idRes);

        }
    })
    }
  }
}
