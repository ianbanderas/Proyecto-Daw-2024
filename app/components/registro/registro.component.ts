import { CommonModule } from '@angular/common';
import { Component, computed, inject } from '@angular/core';
import { FormBuilder, FormGroup, ReactiveFormsModule, ValidationErrors, Validators } from '@angular/forms';
import { Router, RouterLink } from '@angular/router';
import { TranslatePipe } from '@pipes/translate.pipe';
import { IdiomaService } from '@services/idioma.service';
import { UsuarioService } from '@services/usuario.service';
import { BanderaComponent } from '@shared/bandera/bandera.component';
import { LangComponent } from '@shared/lang/lang.component';

@Component({
    selector: 'app-registro',
    standalone: true,
    imports: [RouterLink, ReactiveFormsModule, CommonModule, TranslatePipe,LangComponent, BanderaComponent],
    templateUrl: './registro.component.html',
    styleUrl: './registro.component.scss'
})
export class RegistroComponent {
    private idioma$ = inject(IdiomaService);
    private router = inject(Router);
    private usuario$ = inject(UsuarioService);
    public error: any = []
    public selected = computed(() => this.idioma$.idiomaSelect());

    private fb = inject(FormBuilder);

    public form = this.fb.group({
        nombre: ['', Validators.required],
        password: ['', [Validators.required]],
        confirm: [''],
    },
        {
            validators: this.coincideValue('password', 'confirm')
        }
    )

    coincideValue(campo1: string, campo2: string) {
        return (formGroup: FormGroup): ValidationErrors | null => {
            const valueCampo1 = formGroup.get(campo1)?.value;
            const valueCampo2 = formGroup.get(campo2)?.value;
            if (valueCampo1 !== valueCampo2) {
                formGroup.get(campo2)?.setErrors({ noIgual: true });
                return { noIgual: true };
            }
            formGroup.get(campo2)?.setErrors(null);
            return null;


        }
    }

    submitSignup() {
        return this.usuario$.signUp(this.form.value).subscribe({
            next: (data) => this.handleResponse(data, this.form),
            error: (error) => { this.handleError(error) }
        })
    }

    handleResponse(data: any, registrationForm: any) {
        if (data.statusCode === 200) {
            if(this.idioma$.idiomaSelect() == 1){
                alert(this.idioma$.ENG.get("success"));
            } else {
                alert(this.idioma$.ESP.get("success"));
            }
            registrationForm.reset();
            this.router.navigateByUrl("/login");
        }
    }

    handleError(error: any) {
        console.log(error);
    }

    
    animacionLogo(event: any) {
        const audio = new Audio('assets/comer.wav');
        audio.play();
      for (let i = 1; i < 6; i++) {
        setTimeout(() => {
          event.target["src"] = "http://localhost:4200/assets/logo/dibujo" + ((i) % 5 + 1) + ".png";
        }, 300 * i)
      }
  
    }
}
