import { BotonComponent } from '@shared/boton/boton.component';
import { CommonModule } from '@angular/common';
import { Component, computed, inject } from '@angular/core';
import { FormBuilder, ReactiveFormsModule, Validators } from '@angular/forms';
import { IdiomaService } from '@services/idioma.service';
import { RestauranteService } from '@services/restaurante.service';
import { RouterLink } from '@angular/router';
import { TranslatePipe } from '@pipes/translate.pipe';
import { UsuarioService } from '@services/usuario.service';
import { Ciudad } from '@interfaces/ciudad.interface';
import { CiudadService } from '@services/ciudad.service';
import { LangComponent } from '@shared/lang/lang.component';
import { SvgDeleteComponent } from '@shared/svg-delete/svg-delete.component';
import { SvgAddComponent } from '@shared/svg-add/svg-add.component';

@Component({
    selector: 'app-opciones',
    standalone: true,
    imports: [
        ReactiveFormsModule,
        CommonModule,
        BotonComponent,
        LangComponent,
        RouterLink,
        TranslatePipe,
        SvgDeleteComponent,
        SvgAddComponent],
    templateUrl: './opciones.component.html',
    styleUrl: './opciones.component.scss'
})
export default class OpcionesComponent {

    private usuario$ = inject(UsuarioService);
    private restaurante$ = inject(RestauranteService);
    private ciudad$ = inject(CiudadService);
    private idioma$ = inject(IdiomaService);
    public selected = computed(() => this.idioma$.idiomaSelect());


    private fb = inject(FormBuilder);
    public agregarRestaurante: boolean = false;
    public cambiarPassword: boolean = false;
    public restaurantes: any[] = [];
    public tablaRestaurantes: any[] = [];
    public restaurantesVisibles = 5;
    public paginaActual = 1;
    public ultimaPagina?: number;
    public spanValues: number[] = [];
    public ciudades: Ciudad[] = [];
    public categorias: string[] = [];

    formRestaurante = this.fb.group({
        idCiu: [0, [Validators.required, Validators.min(1)]],
        nombre: ['', Validators.required],
        categoria: ['0', [Validators.required, Validators.minLength(2)]],
        idUsu: [this.usuario$.usuario()?.idUsu]
    })

    formPassword = this.fb.group({
        password: ['', Validators.required]
    })

    constructor() {
        if (!this.usuario$.usuario()) {
            const usuFromLocal = JSON.parse(String(localStorage.getItem('usuario')));
            this.usuario$.usuario.update(() => usuFromLocal)
        }

        this.restaurante$.getRestaurantes().subscribe(res => {
            this.categorias = res.map((restaurante) => { return restaurante.categoria })
            this.categorias = this.categorias.filter((categoria, index) => this.categorias.indexOf(categoria) === index)
        })

        this.ciudad$.getCiudades().subscribe(res => { this.ciudades = res })

        this.cargarRestaurantes();
    }

    actualizarTabla(numero: number) {
        this.paginaActual = numero;
        let primerElemento = (numero - 1) * this.restaurantesVisibles;
        let ultimoElemento = this.restaurantesVisibles * numero;
        this.tablaRestaurantes = this.restaurantes.slice(primerElemento, ultimoElemento);
    }

    confirmarBorrar(txt: string, idRestaurante: number) {
        if (confirm(this.idioma$.getText(txt))) {
            this.borrarRestaurante(idRestaurante);
            this.cargarRestaurantes();
        }
    }

    cargarRestaurantes() {
        this.restaurante$.getRestaurantesByIdUsu(this.usuario$.usuario()!.idUsu).subscribe({
            next: (data) => {
                this.restaurantes = data;
                this.ultimaPagina = Math.ceil(this.restaurantes.length / this.restaurantesVisibles)
                this.spanValues = [];
                this.paginaActual = 1;
                for (let index = 1; index <= this.ultimaPagina; index++) {
                    this.spanValues.push(index)
                }
                this.tablaRestaurantes = this.restaurantes.slice(0, this.restaurantesVisibles)
            }
        })
    }

    borrarRestaurante(idRestaurante: number) {
        console.log(idRestaurante);
        this.restaurante$.deleteRestauranteById(idRestaurante).subscribe({
            next: () => {
                alert(this.idioma$.getText('delRes'));
            },
            error: (e) => console.log(e),
            complete: () => console.log("Terminó.")
        })
    }

    crearRestaurante() {
        this.restaurante$.createRestaurante(this.formRestaurante.value)
            .subscribe({
                next: (data) => {
                    this.formRestaurante.reset({ idCiu: 0, categoria: '0' });
                    this.cargarRestaurantes();
                    this.agregarRestaurante = false;
                },
                error: (e) => console.log(e)
            })
    }

    changePassword() {
        this.usuario$.changePassword(this.usuario$.usuario()!.idUsu, String(this.formPassword.controls['password'].value)).subscribe({
            next: (data) => {
                alert("Se cambió correctamente la contraseña.");
                this.cambiarPassword = false;
                this.formPassword.reset();
            },
            error: (e) => alert("No se pudo cambiar la contraseña."),
        })
    }

    nombreCiudad(idCiu: number) {
        return this.ciudades.find(ciudad => ciudad.idCiu == idCiu)?.nombre;
    }

    vuelta8000() {
        window.location.href = 'http://localhost:8000';
    }
}
