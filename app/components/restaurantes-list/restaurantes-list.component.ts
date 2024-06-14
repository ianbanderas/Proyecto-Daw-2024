import { CardRestauranteComponent } from '@shared/card-restaurante/card-restaurante.component';
import { Ciudad } from '@interfaces/ciudad.interface';
import { CiudadService } from '@services/ciudad.service';
import { CommonModule } from '@angular/common';
import { Component, computed, inject } from '@angular/core';
import { FormBuilder, ReactiveFormsModule } from '@angular/forms';
import { IdiomaService } from '@services/idioma.service';
import { Restaurante } from '@interfaces/restaurante.interface';
import { RestauranteService } from '@services/restaurante.service';
import { TranslatePipe } from '@pipes/translate.pipe';
import { LangComponent } from '@shared/lang/lang.component';

@Component({
    selector: 'app-restaurante-list',
    standalone: true,
    imports: [CommonModule, CardRestauranteComponent, ReactiveFormsModule, TranslatePipe,LangComponent],
    templateUrl: './restaurantes-list.component.html',
    styleUrl: './restaurantes-list.component.scss'
})
export default class RestauranteListComponent {

    private idioma$ = inject(IdiomaService)
    public fb = inject(FormBuilder);
    public selected = computed(() => this.idioma$.idiomaSelect());
    public form = this.fb.group({
        categoria: [0],
        ciudad: [0]
    })

    public _restaurantes: Restaurante[] = [];
    public ciudades: Ciudad[] = [];
    public categorias: string[] = [];

    public spanValues: number[] = [];
    public restaurantesVisibles = 6;
    public ultimaPagina?: number;
    public paginaActual = 1;
    public restaurantesCargados: Restaurante[] = [];
    public restaurantes: Restaurante[] = [];

    constructor(private restaurante$: RestauranteService, private ciudad$: CiudadService) {
        this.restaurante$.getRestaurantes().subscribe(res => {
            //1 Se cogen todos los restarurantes
            this._restaurantes = res;
            this.restaurantesCargados = res;
            //2 Se hace un subconjunto con los que se van a ver.
            this.restaurantes = res.slice(0, this.restaurantesVisibles);
            //3 Se calcula la última página, para controlar el botón "Siguiente Página"
            // this.ultimaPagina = Math.ceil(this._restaurantes.length / this.restaurantesVisibles);
            // //4 Se pinta un número por cada página.
            // for (let index = 1; index <= this.ultimaPagina; index++) {
            //     this.spanValues.push(index)
            // }
            this.actualizarIndices(res);
            this.rellenarSelects(res);
        })
    }

    rellenarSelects(restauranteList: any) {
        //5 Se sacan las categorías de los restaurantes, para el select.
        this.categorias = restauranteList.map((restaurante: any) => { return restaurante.categoria })
        //6 Se filtran para que no estén repetidas
        this.categorias = this.categorias.filter((categoria, index) => this.categorias.indexOf(categoria) === index)
        //7 Se cogen todas las ciudades, para el select.
        this.ciudad$.getCiudades().subscribe(res => { this.ciudades = res })
    }

    actualizarIndices(restaurante: any) {
        this.ultimaPagina = Math.ceil(restaurante.length / this.restaurantesVisibles)
        this.spanValues = [];
        this.paginaActual = 1;
        for (let index = 1; index <= this.ultimaPagina; index++) {
            this.spanValues.push(index)
        }
    }

    actualizarRestaurantes(event: any) {
        //1 Se comprueba el criterio que filtrará.
        const filtro = event.target.name;

        //2 Se limpia el campo que no está filtrando y se filtra.
        if (filtro === 'categoria') {
            this.form.controls['ciudad'].reset(0)
            this.restaurantesCargados = this._restaurantes.filter((restaurante) => restaurante.categoria === String(this.form.controls['categoria'].value))
        }
        if (filtro === 'ciudad') {
            this.form.controls['categoria'].reset(0)
            this.restaurantesCargados = this._restaurantes.filter((restaurante) => restaurante.idCiu == this.form.controls['ciudad'].value)
        }
        //3 Se actualizan los indices en base a los restaurantes cargados.
        this.actualizarIndices(this.restaurantesCargados);
        //4 Se crea un subgrupo con los restaurantes que se verán.
        this.restaurantes = this.restaurantesCargados.slice(0, this.restaurantesVisibles)
    }

    actualizarTabla(numero: number) {
        this.paginaActual = numero;
        let primerElemento = (numero - 1) * this.restaurantesVisibles;
        let ultimoElemento = this.restaurantesVisibles * numero;
        this.restaurantes = this.restaurantesCargados.slice(primerElemento, ultimoElemento);
    }

    reset() {
        this.form.controls['categoria'].reset(0)
        this.form.controls['ciudad'].reset(0)
        this.restaurantesCargados = this._restaurantes;
        this.restaurantes = this.restaurantesCargados.slice(0, this.restaurantesVisibles)
        this.actualizarIndices(this.restaurantesCargados);
    }
}
