//se le asigna un evento al icono del menu para mostrar el menu lateral al momento de dar clic
document.getElementById("icon-menu").addEventListener("click", mostrar_menu);

function mostrar_menu(){//funcion para mostrar el menu lateral en versiones moviles

    //con la clase toggle indicamos que movera el contenido a la derecha y tambien se mostrara el menu lateral
    document.getElementById("move-content").classList.toggle('move-container-all');
    document.getElementById("show-menu").classList.toggle('show-lateral');
}


/*Scroll up */
//asignamos un evento al icono para que cuando demos clic en él, volvamos al inicio de la pagina
document.getElementById("button-up").addEventListener("click", scrollUp);

function scrollUp(){
    var currentScroll=document.documentElement.scrollTop;//creamos una varible que sera igual al top de la pagina
    if(currentScroll>0){//si el desplazamiento es igual a mas de 1px
        window.requestAnimationFrame(scrollUp);//aqui le asignamos una animación
        window.scrollTo(0, currentScroll - (currentScroll/10));//se le asigna la suavidad con la que se desplazará hacia arriba
    }
}

//aqui calculamos el desplazamiento para que el icono aparezca a mas de 300px hacia abajo
buttonUp = document.getElementById("button-up");

window.onscroll = function(){
    var scroll = document.documentElement.scrollTop;
    if(scroll > 300){ //si el desplazamiento es mayor a 300px en el eje Y...
        buttonUp.style.transform="scale(1)";//entonces el icono aparecera
    }
    else{//sino, entonces desaparecera
        buttonUp.style.transform="scale(0)";
    }
}






//Buscador de contenido
//Ejecutando funciones para mostrar y ocultar la barra de busqueda
document.getElementById("icon-search").addEventListener("click", mostrar_buscador);
document.getElementById("cover-ctn-search").addEventListener("click", ocultar_buscador);

//Declarando variables
bars_search =       document.getElementById("ctn-bars-search");
cover_ctn_search =  document.getElementById("cover-ctn-search");
inputSearch =       document.getElementById("inputSearch");
box_search =        document.getElementById("box-search");

//Funcion para mostrar el buscador
function mostrar_buscador(){
    bars_search.style.top = "80px";
    cover_ctn_search.style.display = "block";
    inputSearch.focus();
}

//Funcion para ocultar el buscador
function ocultar_buscador(){
    bars_search.style.top = "-10px";
    cover_ctn_search.style.display = "none";
    inputSearch.value = "";
    box_search.style.display="none";
}




/*Filtrado de busqueda*/
document.getElementById("inputSearch").addEventListener("keyup",buscador_interno);

function buscador_interno(){
    filter = inputSearch.value.toUpperCase();
    li = box_search.getElementsByTagName("li");

    //recorriendo elementos a filtrar mediante los "li"
    for(i=0;i<li.length;i++){
        a=li[i].getElementsByTagName("a")[0];
        textValue=a.textContent || a.innerText;

        if(textValue.toUpperCase().indexOf(filter)>-1){
            li[i].style.display="";
            box_search.style.display="block";

            if(inputSearch.value==""){
                box_search.style.display="none";
            }

        }else{
            li[i].style.display="none";
        }
    }
}

