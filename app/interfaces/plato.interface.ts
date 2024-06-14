export interface Plato {
    idPla: number;
    nombre: string;
    descripcion: string;
    valoracion?: string;
    comentario?: string;
    pivot?: {
        idRes: number;
        idPla: number
    }
}