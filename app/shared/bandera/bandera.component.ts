import { AfterViewInit, Component, ViewChild, inject } from '@angular/core';
import { IdiomaService } from '@services/idioma.service';

@Component({
  selector: 'bandera',
  standalone: true,
  imports: [],
  template: '<canvas id="canvas" #canvas (click)="cambiarIdioma()"></canvas>',
  styleUrl: './bandera.component.scss'
})
export class BanderaComponent implements AfterViewInit {
  @ViewChild('canvas', { static: true })
  public canvas: any;
  public context: any;

  private idioma$ = inject(IdiomaService);

  ngAfterViewInit(): void {
    this.canvas = document.getElementById('canvas');
    this.context = this.canvas.getContext('2d');

    this.pintarBandera();
  }

  cambiarIdioma() {
    this.idioma$.nextIdioma;
    this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);

    this.pintarBandera();
  }

  pintarBandera() {
    if (this.idioma$.idiomaSelect() == 1) {
      this.pintarBanderaInglesa();
    } else {
      this.pintarBanderaHispana();
    }
  }

  pintarBanderaInglesa() {
    this.context.fillStyle = 'blue';
    this.context.fillRect(0, 0, 300, 150);

    this.context.lineWidth = 30;
    this.context.strokeStyle = 'white';
    this.context.beginPath();
    this.context.moveTo(0, 0);
    this.context.lineTo(this.canvas.width, this.canvas.height);
    this.context.moveTo(this.canvas.width, 0);
    this.context.lineTo(0, this.canvas.height);
    this.context.stroke();

    this.context.lineWidth = 5;
    this.context.strokeStyle = 'rgb(210, 46, 46)';
    this.context.beginPath();
    this.context.moveTo(0, 0);
    this.context.lineTo(this.canvas.width, this.canvas.height);
    this.context.moveTo(this.canvas.width, 0);
    this.context.lineTo(0, this.canvas.height);
    this.context.stroke();

    this.context.lineWidth = 50;
    this.context.strokeStyle = 'white';
    this.context.beginPath();
    this.context.moveTo(this.canvas.width / 2, 0);
    this.context.lineTo(this.canvas.width / 2, this.canvas.height);
    this.context.stroke();


    this.context.lineWidth = 40;
    this.context.strokeStyle = 'white';
    this.context.beginPath();
    this.context.moveTo(0, this.canvas.height / 2);
    this.context.lineTo(this.canvas.width, this.canvas.height / 2);
    this.context.stroke();


    this.context.lineWidth = 30;
    this.context.strokeStyle = 'rgb(210, 46, 46)';
    this.context.beginPath();
    this.context.moveTo(this.canvas.width / 2, 0);
    this.context.lineTo(this.canvas.width / 2, this.canvas.height);
    this.context.stroke();


    this.context.lineWidth = 20;
    this.context.strokeStyle = 'rgb(210, 46, 46)';
    this.context.beginPath();
    this.context.moveTo(0, this.canvas.height / 2);
    this.context.lineTo(this.canvas.width, this.canvas.height / 2);
    this.context.stroke();

  }

  pintarBanderaHispana() {
    this.context.fillStyle = 'rgb(210, 46, 46)';
    this.context.fillRect(0, 0, 300, 50);

    this.context.fillStyle = 'rgb(255, 255, 64)';
    this.context.fillRect(0, 50, 300, 50);

    this.context.fillStyle = 'rgb(210, 46, 46)';
    this.context.fillRect(0, 100, 300, 50);
  }
}
