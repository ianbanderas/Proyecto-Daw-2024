import { Routes } from '@angular/router';
import { LoginComponent } from '@components/login/login.component';
import { RegistroComponent } from '@components/registro/registro.component';
import { FormularioComponent } from '@pages/formulario/formulario.component';
import { PostLogService } from '@services/canActive/post-log.service';
import { PreLogService } from '@services/canActive/pre-log.service';

export const routes: Routes = [
    {
        path: "",
        canActivate: [PreLogService],
        children: [
            {
                path: 'login', component: FormularioComponent,
                children: [
                    { path: '', component: LoginComponent }
                ]
            },
            {
                path: 'registro', component: FormularioComponent,
                children: [
                    { path: '', component: RegistroComponent }
                ]
            },
            {
                path:'',
                redirectTo: 'login',
                pathMatch: 'full'
            }
        ]
    },
    {
        path: "",
        canActivate: [PostLogService],
        children: [
            {
                path: '',
                loadComponent: () => import('./pages/principal/principal.component')
                    .then(({ PrincipalComponent }) => PrincipalComponent),
                children: [
                    { path: 'restaurantes', loadComponent: () => import('./components/restaurantes-list/restaurantes-list.component') },
                    { path: 'plato/form/:restaurante_id', loadComponent: () => import('./components/add-plato/add-plato.component') },
                    { path: 'plato/update/:restaurante_id/:plato_id', loadComponent: () => import('./components/up-plato/up-plato.component') },
                    { path: 'opciones', loadComponent: () => import('./components/opciones/opciones.component') },
                    { path: 'menu/:restaurante_id', loadComponent: () => import('./components/platos-list/platos-list.component') },
                    { path: 'plato/:rest_id/:plato_id', loadComponent: () => import('./components/plato-detalle/plato-detalle.component') },
                    { path: '**', redirectTo: 'restaurantes' },
                ]
            },
        ]
    },
    {
        path: '**',
        redirectTo: ''
    }
];
