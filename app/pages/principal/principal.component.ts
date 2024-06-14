import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { NavbarComponent } from '@shared/navbar/navbar.component';

@Component({
  standalone: true,
  imports: [NavbarComponent, RouterOutlet],
  templateUrl: './principal.component.html',
  styles: `
  .container{
    display:flex;
    justify-content: center;
  }`
})
export class PrincipalComponent {

}
