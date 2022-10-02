let cont = 0;

let like = document.querySelector('.like');
let qtd = document.querySelector('.qtd-like');

if (like) {
    like.addEventListener('click', () => {
        if (qtd.classList.contains('qtd-like-on')) {
            cont++;
            qtd.classList.remove('qtd-like-on');
            qtd.innerHTML = cont;
            like.querySelector('i').style.color = "#396eea";
        } else {
            qtd.classList.add('qtd-like-on');
            like.querySelector('i').style.color = "#000";
            cont--;
            qtd.innerHTML = '';
        }
    });
}

/* Comentario */

let comentario = document.querySelector('.comentario');

if(comentario){
    comentario.addEventListener('click', ()=>{
       if(document.querySelector('.comentar').classList.contains('comentario-off')){
        closeComentario();
       }else{
         openComentario();
       }
    }); 
}

 let openComentario = ()=> document.querySelector('.comentar').classList.add('comentario-open');
 let closeComentario = ()=> document.querySelector('.comentar').classList.remove('comentario-open');

 const enviar = (e)=>{
     e.preventDefault();
     alert('Calma ai patrão');
 }
 /*Area menu lateral */


 let menuLateral = document.querySelector('.menu .menu-icon');

 const abriMenu =()=> document.querySelector('aside ').classList.add('abrirMenuLateral');
 const fecharMenu =()=> document.querySelector('aside').classList.remove('abrirMenuLateral');

 menuLateral.addEventListener('click', ()=>{
     if(document.querySelector('aside ').classList.contains('abrirMenuLateral')){
         fecharMenu();
     }else{
         abriMenu();
     }
 });    