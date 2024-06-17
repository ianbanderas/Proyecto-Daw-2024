import { Injectable, signal } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class IdiomaService {

  private idiomaList = ["ES", "EN"];
  public idiomaSelect = signal(0);
  public ESP = new Map;
  public ENG = new Map;


  get nextIdioma() {
    this.idiomaSelect.update(value => (value + 1) % this.idiomaList.length)
    return this.idiomaSelect();
  }

  constructor() {
    this.fillEsp();
    this.fillEng();


  }

  fillEsp() {
    this.ESP.set("add", "añadir");
    this.ESP.set("addPla", "Añadir Plato");
    this.ESP.set("Already registered?", "¿Ya registrado?");
    this.ESP.set("category", "Categoría");
    this.ESP.set("city", "Ciudad");
    this.ESP.set("Comment", "Comentario");
    this.ESP.set("Confirm Password", "Confirmar Contraseña");
    this.ESP.set("delete", "Borrar");
    this.ESP.set("Desc", "Descripción");
    this.ESP.set("Forgot your password?", "¿Olvidó su contraseña?");
    this.ESP.set("home", "Inicio");
    this.ESP.set("language", "idioma ES");
    this.ESP.set("Log in", "Entrar");
    this.ESP.set("logOut", "salir");
    this.ESP.set("menu", "Ver menú");
    this.ESP.set("Name", "Nombre");
    this.ESP.set("NameRes", "Restaurante");
    this.ESP.set("NameUsu", "Usuario:");
    this.ESP.set("newpass", "Nueva Contraseña");
    this.ESP.set("Next Page", "Avanzar Pag.");
    this.ESP.set("Password", "Contraseña");
    this.ESP.set("Previous Page", "Retroceder Pag");
    this.ESP.set("profile", "perfil");
    this.ESP.set("Register", "Registrarse");
    this.ESP.set("Remember me", "Recuerdame");
    this.ESP.set("resPass", "Cambiar Contraseña");
    this.ESP.set("see", "Ver Plato");
    this.ESP.set("wrong user or password", "Usuario o contraseña incorrectos");
    this.ESP.set("confirmDelete", "¿Seguro que quiere borrarlo?");
    this.ESP.set("addRest", "Añadir Restaurante");
    this.ESP.set("Obligatorio", "*Este campo es obligatorio.");
    this.ESP.set("coincide", "*Las contraseñas no coinciden");
    this.ESP.set("noRest", "No hay restaurantes en la zona");
    this.ESP.set("newPla", "Crear Plato");
    this.ESP.set("selectPla", "Seleccionar Plato");
    this.ESP.set("rate", "Valoración");
    this.ESP.set("nameDish", "Nombre del plato");
    this.ESP.set("descDish", "Descripción del plato");
    this.ESP.set("noRes", "No tiene restaurantes registrados");
    this.ESP.set("success", "Registro completado.");
    this.ESP.set("goLog", "Click aquí para ir al login.");
    this.ESP.set("admin", "Soy admin");
    this.ESP.set("reset", "borrar filtros");
    this.ESP.set("noPla", "No hay platos en este restaurante.");
    this.ESP.set("upPla", "Actualizar plato");
    this.ESP.set("delRes", "Se borró el restaurante");
    this.ESP.set("delPla", "Se borró el plato");
    this.ESP.set("nosuccess", "usuario ya registrado");


  }

  fillEng() {

    this.ENG.set("add", "add")
    this.ENG.set("addPla", "Add Dish")
    this.ENG.set("Already registered?", "Already registered?")
    this.ENG.set("category", "Category")
    this.ENG.set("city", "City")
    this.ENG.set("Comment", "Comment")
    this.ENG.set("Confirm Password", "Confirm PassWord")
    this.ENG.set("delete", "Delete")
    this.ENG.set("Desc", "Description")
    this.ENG.set("Forgot your password?", "Forgot your password")
    this.ENG.set("home", "Home")
    this.ENG.set("language", "language EN")
    this.ENG.set("Log in", "Log in")
    this.ENG.set("logOut", "log out")
    this.ENG.set("menu", "menu")
    this.ENG.set("Name", "Name")
    this.ENG.set("NameRes", "Restaurant")
    this.ENG.set("NameUsu", "User:")
    this.ENG.set("newpass", "New Password")
    this.ENG.set("Next Page", "Next Page")
    this.ENG.set("Password", "Password")
    this.ENG.set("Previous Page", "Previous Page")
    this.ENG.set("profile", "profile")
    this.ENG.set("Register", "Register")
    this.ENG.set("Remember me", "Remember me")
    this.ENG.set("resPass", "Change Password")
    this.ENG.set("see", "View")
    this.ENG.set("wrong user or password", "wrong user or password")
    this.ENG.set("confirmDelete", "Are you sure want to delete?");
    this.ENG.set("addRest", "Add Restaurant");
    this.ENG.set("Obligatorio", "*This is required");
    this.ENG.set("coincide", "*Passwords don't match");
    this.ENG.set("noRest", "There are no restaurants in the area");
    this.ENG.set("newPla", "Create Dish");
    this.ENG.set("selectPla", "Select Dish");
    this.ENG.set("rate", "Rate");
    this.ENG.set("nameDish", "Dish Name");
    this.ENG.set("descDish", "Dish description");
    this.ENG.set("noRes", "You haven't registered restaurants");
    this.ENG.set("success", "Registration Success!");
    this.ENG.set("goLog", "Please click here to login!.");
    this.ENG.set("admin", "I'm admin");
    this.ENG.set("reset", "reset filters");
    this.ENG.set("noPla", "There are no dishes in the restaurants");
    this.ENG.set("upPla", "Update dish");
    this.ENG.set("delRes", "Restaurant was deleted.");
    this.ENG.set("delPla", "Dishe was deleted.");
    this.ENG.set("nosuccess", "user already registered");

  }

  getText(key: string) {
    if (this.idiomaSelect() == 0) {
      return this.ESP.get(key);
    }
    return this.ENG.get(key);
  }
}
