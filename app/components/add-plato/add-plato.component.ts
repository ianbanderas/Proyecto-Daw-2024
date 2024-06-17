import { CommonModule } from '@angular/common';
import { Component, OnInit, computed, inject } from '@angular/core';
import { FormBuilder, ReactiveFormsModule, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { TranslatePipe } from '@pipes/translate.pipe';
import { IdiomaService } from '@services/idioma.service';
import { PlatoService } from '@services/plato.service';
import { RestauranteService } from '@services/restaurante.service';
import { BotonComponent } from '@shared/boton/boton.component';
import { LangComponent } from '@shared/lang/lang.component';

@Component({
  selector: 'app-add-plato',
  standalone: true,
  imports: [ReactiveFormsModule, CommonModule, BotonComponent, LangComponent, TranslatePipe],
  templateUrl: './add-plato.component.html',
  styleUrl: './add-plato.component.scss'
})
export default class AddPlatoComponent implements OnInit {
  private fb = inject(FormBuilder);
  private route = inject(ActivatedRoute);
  private idioma$ = inject(IdiomaService);
  public selected = computed(() => this.idioma$.idiomaSelect());
  private plato$ = inject(PlatoService);
  private restaurante$ = inject(RestauranteService);

  public allPlatos: any[] = [];
  public idRestaurante = 0;
  public seleccionarExistente = false;

  public form = this.fb.group({
    nombre: ['', Validators.required],
    descripcion: ['', Validators.required],
    valoracion: [0, Validators.required],
    comentario: ['', Validators.required],
    idPla: [0]
  })

  ngOnInit(): void {
    this.route.params.subscribe(({ restaurante_id }) => {
      this.idRestaurante = Number(restaurante_id);
    });
    this.plato$.getAllPlatos().subscribe({
      next: (platos: any) => {
        this.allPlatos = platos;
      }
    })
  }

  cambiarModoPlato() {
    if (this.seleccionarExistente) {
      this.form.controls.nombre.reset();
      this.form.controls.descripcion.reset();

    }
    this.seleccionarExistente = !this.seleccionarExistente;
  }

  crearPlato() {
    const plato = {
      nombre: this.form.value.nombre,
      descripcion: this.form.value.descripcion
    };
    this.plato$.createPlato(plato).subscribe({
      next: (plato_creado: any) => {
        const pla_res = {
          idRes: this.idRestaurante,
          idPla: plato_creado.idPla,
          valoracion: this.form.value.valoracion,
          comentario: this.form.value.comentario
        }
        this.restaurante$.createPlatoValorado(pla_res).subscribe({
          next: () => {
            alert("Se creó con éxito.");
            this.form.reset();
          },
         error: () => this.handleError()
        });
      },
         error: () => this.handleError()
        
    });
  }
  handleError() {
    console.log('mal')
    this.form.controls.nombre.reset();
    if (this.idioma$.idiomaSelect() == 1) {
      alert(this.idioma$.ENG.get("nosuccesspla"));
    } else {
      alert(this.idioma$.ESP.get("nosuccesspla"));
    }
  }

  valorarPlato() {
    const pla_res = {
      idRes: this.idRestaurante,
      idPla: this.form.value.idPla,
      valoracion: this.form.value.valoracion,
      comentario: this.form.value.comentario
    }
    this.restaurante$.createPlatoValorado(pla_res).subscribe({
      next: () => {
        alert("Se creó con éxito.");
        this.form.reset();
      },
      error: (e) => console.log(e)
    });
  }

  rellenarFormulario(platoSelect: any) {
    const plato_seleccionado = this.allPlatos.find(plato => plato.idPla == platoSelect.value);
    this.form.controls.idPla.setValue(plato_seleccionado.idPla);
    this.form.controls.nombre.setValue(plato_seleccionado.nombre);
    this.form.controls.descripcion.setValue(plato_seleccionado.descripcion);
  }
}
