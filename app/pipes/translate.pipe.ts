import { Pipe, PipeTransform, inject } from '@angular/core';
import { IdiomaService } from '@services/idioma.service';

@Pipe({
  name: 'translate',
  standalone: true
})
export class TranslatePipe implements PipeTransform {

  private idioma$ = inject(IdiomaService);
  transform(value: string | undefined, idioma: number): string | undefined {
    switch (idioma) {
      case 0:
        return this.idioma$.ESP.get(value);
      case 1:
        return this.idioma$.ENG.get(value);

      default:
        return;
    }

  }

}
