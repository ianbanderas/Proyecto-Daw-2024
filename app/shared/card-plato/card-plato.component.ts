import { Component, Input, computed, inject } from '@angular/core';
import { RouterLink } from '@angular/router';
import { Plato } from '@interfaces/plato.interface';
import { TranslatePipe } from '@pipes/translate.pipe';
import { IdiomaService } from '@services/idioma.service';
import { LangComponent } from '@shared/lang/lang.component';

@Component({
    selector: 'card-plato',
    standalone: true,
    imports: [RouterLink, TranslatePipe,LangComponent],
    templateUrl: './card-plato.component.html',
    styleUrl: './card-plato.component.scss'
})
export class CardPlatoComponent {

    private idioma$ = inject(IdiomaService);
    public selected = computed(()=>this.idioma$.idiomaSelect());

    @Input()
    public plato?: Plato;
    @Input()
    public idRes? = '';
}
