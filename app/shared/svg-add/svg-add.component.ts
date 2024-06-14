import { Component } from '@angular/core';

@Component({
  selector: 'svg-add',
  standalone: true,
  imports: [],
  template: `
  <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3 10C3 8.34315 4.34315 7 6 7H14C15.6569 7 17 8.34315 17 10V18C17 19.6569 15.6569 21 14 21H6C4.34315 21 3 19.6569 3 18V10Z" stroke="var(--marron)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M10 14V11M10 14V17M10 14H13M10 14H7" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M7 3L18 3C19.6569 3 21 4.34315 21 6L21 17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`
})
export class SvgAddComponent {

}
