import { Component, OnInit, inject } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Plato } from '@interfaces/plato.interface';
import { PlatoService } from '@services/plato.service';
import { RestauranteService } from '@services/restaurante.service';
import { BotonComponent } from '@shared/boton/boton.component';
import { CardPlatoComponent } from '@shared/card-plato/card-plato.component';
import { LangComponent } from '@shared/lang/lang.component';

@Component({
    selector: 'app-platos-list',
    standalone: true,
    imports: [CardPlatoComponent, LangComponent],
    templateUrl: './platos-list.component.html',
    styleUrl: './platos-list.component.scss'
})
export default class PlatosListComponent implements OnInit {
    private route = inject(ActivatedRoute);
    private plato$ = inject(PlatoService);
    private restaurante$ = inject(RestauranteService);

    public _platos: Plato[] = [];
    public platos: Plato[] = [];
    public platosVisibles = 4;
    public paginaActual = 1;
    public spanValues: number[] = [];
    public ultimaPagina?: number;
    
    public idRes?: string;

    ngOnInit(): void {
        this.route.params.subscribe(({ restaurante_id }) => {
            this.idRes = restaurante_id;
            this.plato$.getMenuByIdRestaurante(restaurante_id).subscribe((res: any)=>{
                this._platos=res.plato;
                this.restaurante$.idUsuRest.set(res.restaurantes[0].idUsu)

                this.ultimaPagina = Math.ceil(this._platos.length / this.platosVisibles)
                console.log(this.ultimaPagina)
                for (let index = 1; index <= this.ultimaPagina; index++) {

                    this.spanValues.push(index)
                }
                this.actualizarTabla(1);
                console.log(this.platos);
            })
        });

    }

    actualizarTabla(numero: number) {
        this.paginaActual = numero;
        let primerElemento = (numero - 1) * this.platosVisibles;
        let ultimoElemento = this.platosVisibles * numero;
        this.platos = this._platos.slice(primerElemento, ultimoElemento);
    }

}
