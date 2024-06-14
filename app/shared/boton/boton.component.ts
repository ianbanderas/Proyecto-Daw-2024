import { Component, Input, computed, inject } from '@angular/core';
import { IdiomaService } from '@services/idioma.service';
import { TranslatePipe } from '@pipes/translate.pipe';

@Component({
  selector: 'shared-boton',
  standalone: true,
  imports: [TranslatePipe],
  template: `
    <button>{{texto|translate:selected()}}</button>
  `,
  styles: `
  button{
    padding: 1rem;
    border-radius: 28px;
    border:none;
    cursor: pointer;
    font-weight: 200;
    background-color: var(--celeste);
    color: var(--marron);
   
  }
  `
})
export class BotonComponent {
  @Input()
  public texto: string | undefined;

  private idioma$ = inject(IdiomaService)
  public selected = computed(() => this.idioma$.idiomaSelect())

}
