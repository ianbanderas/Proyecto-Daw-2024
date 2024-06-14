import { Component, Input, computed, inject, input } from '@angular/core';
import { TranslatePipe } from '@pipes/translate.pipe';
import { IdiomaService } from '@services/idioma.service';

@Component({
  selector: 'shared-lang',
  standalone: true,
  imports: [TranslatePipe],
  template: `
  <span>{{ texto | translate:selected()}}</span>
  `
})
export class LangComponent {
  @Input({required:true})
  public texto: string = '';
  private idioma$ = inject(IdiomaService);
  public selected = computed(() => this.idioma$.idiomaSelect());

}
