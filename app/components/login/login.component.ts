import { CommonModule } from '@angular/common';
import { AfterViewInit, Component, ViewChild, computed, inject } from '@angular/core';
import { FormBuilder, ReactiveFormsModule, Validators } from '@angular/forms';
import { Router, RouterLink } from '@angular/router';
import { TranslatePipe } from '@pipes/translate.pipe';
import { AuthService } from '@services/auth.service';
import { IdiomaService } from '@services/idioma.service';
import { TokenService } from '@services/token.service';
import { UsuarioService } from '@services/usuario.service';
import { BanderaComponent } from '@shared/bandera/bandera.component';
import { LangComponent } from '@shared/lang/lang.component';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [RouterLink, ReactiveFormsModule, CommonModule, LangComponent, TranslatePipe, BanderaComponent],
  templateUrl: './login.component.html',
  styleUrl: './login.component.scss'
})
export class LoginComponent {
  private usuario$ = inject(UsuarioService);
  private token$ = inject(TokenService);
  private auth$ = inject(AuthService);
  private idioma$ = inject(IdiomaService);
  private router = inject(Router);
  public selected = computed(() => this.idioma$.idiomaSelect());

  private fb = inject(FormBuilder);

  public form = this.fb.group({
    nombre: ['', Validators.required],
    password: ['', Validators.required]
  })


  login() {
    this.usuario$.login(this.form.value).subscribe({
      next: ($token) => {
        this.handleResponse($token);

        this.usuario$.getUsuByName(String(this.form.controls['nombre'].value)).subscribe(
          {
            next: (nuevoUsuario: any) => {
              this.usuario$.usuario.set(nuevoUsuario)
              localStorage.setItem('usuario', JSON.stringify(nuevoUsuario));
                this.router.navigateByUrl("/restaurantes");
              

            }
          }
        );
      },
      error: () => this.handleError()
    });
  }

  handleResponse(data: any) {
    console.log('bien')
    this.token$.handle(data.access_token);
    this.auth$.changeAuthStatus(true);

  }

  handleError() {
    console.log('mal')
    this.form.controls.password.reset();
    if (this.idioma$.idiomaSelect() == 1) {
      alert(this.idioma$.ENG.get("wrong user or password"));
    } else {
      alert(this.idioma$.ESP.get("wrong user or password"));
    }
  }

  goAdmin() {
    window.location.href = 'http://localhost:8000/login';

  }

  animacionLogo(event: any) {
      const audio = new Audio('assets/comer.wav');
      audio.play();
    for (let i = 1; i < 6; i++) {
      setTimeout(() => {
        event.target["src"] = "http://localhost:4200/assets/logo/dibujo" + ((i) % 5 + 1) + ".png";
      }, 400 * i)
    }

  }

}
