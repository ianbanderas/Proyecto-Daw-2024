import { AfterViewInit, Component, ViewChild, inject } from '@angular/core';
import { Router, RouterLink, RouterLinkActive } from '@angular/router';
import { AuthService } from '@services/auth.service';
import { IdiomaService } from '@services/idioma.service';
import { TokenService } from '@services/token.service';
import { BanderaComponent } from '@shared/bandera/bandera.component';
import { BotonComponent } from '@shared/boton/boton.component';

@Component({
    selector: 'shared-navbar',
    standalone: true,
    imports: [BotonComponent, RouterLink, RouterLinkActive, BanderaComponent],
    templateUrl: './navbar.component.html',
    styleUrl: './navbar.component.scss'
})
export class NavbarComponent {
    private idioma$ = inject(IdiomaService);
    private token$ = inject(TokenService);
    private auth$ = inject(AuthService);
    private router = inject(Router);

    public idioma = 0;

    logout() {
        this.token$.remove();
        localStorage.removeItem('usuario');
        this.auth$.changeAuthStatus(false);
        this.router.navigateByUrl('/login');
    }

}
