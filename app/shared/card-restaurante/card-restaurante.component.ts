import { Component, Input, computed, inject } from '@angular/core';
import { RouterLink } from '@angular/router';
import { Restaurante } from '@interfaces/restaurante.interface';
import { TranslatePipe } from '@pipes/translate.pipe';
import { IdiomaService } from '@services/idioma.service';
import { LangComponent } from '@shared/lang/lang.component';
import { last } from 'rxjs';

@Component({
    selector: 'card-restaurante',
    standalone: true,
    imports: [RouterLink, TranslatePipe,LangComponent],
    templateUrl: './card-restaurante.component.html',
    styleUrl: './card-restaurante.component.scss'
})
export class CardRestauranteComponent {
    
    private idioma$ = inject(IdiomaService)
    public selected = computed(() => this.idioma$.idiomaSelect())
    @Input()
    public restaurante?: Restaurante;

}
