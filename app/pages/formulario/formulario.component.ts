import { CommonModule } from '@angular/common';
import { AfterViewInit, Component, ViewChild, computed, inject } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { TranslatePipe } from '@pipes/translate.pipe';
import { IdiomaService } from '@services/idioma.service';
import { BanderaComponent } from '@shared/bandera/bandera.component';
import { LangComponent } from '@shared/lang/lang.component';


@Component({
    standalone: true,
    imports: [RouterOutlet, TranslatePipe, LangComponent, BanderaComponent, CommonModule],
    template: `
    
<!--    <div class="container" [ngStyle]="{'background': 'url(assets/fondo.png)'}">
-->


    <div class="container">
    <video [muted]="'muted'" autoplay  id="myVideo">
        <source src='assets/fondo.mp4' type="video/mp4">  
    </video>
        <router-outlet/>
    </div>
`,
    styleUrl: './formulario.component.scss'
})
export class FormularioComponent {

    private idioma$ = inject(IdiomaService);
    public idioma = 0;

    public selected = computed(() => this.idioma$.idiomaSelect());
}
