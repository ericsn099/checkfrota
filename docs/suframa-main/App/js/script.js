

let abrirMenuLateral = () => {
  let menu = document.querySelector('.menu-lateral');
  menu.classList.toggle("abriMenu");


  let botao = document.querySelector('.button-close ');
  botao.classList.toggle("marginLeft");
  botao.classList.toggle('botao-active');
}


let botaoLateral = document.querySelector('.button-close .icon i');

botaoLateral.addEventListener('click', () => {
  abrirMenuLateral();
});



/*Menus */

let opcoes = document.querySelectorAll('.menu-option ');



opcoes.forEach((item) => {
  item.addEventListener('click', (e) => {
    document.querySelector('.menu-option.active').classList.remove('active');
    item.classList.add('active');
  });
});




/* big Modal Foto */

let abrirModalDeFotoGrande = (e) => {
  document.querySelector('.modal-big-foto').classList.add('close-big-modal-foto');
}

let fecharModalDeFotoGrande = () => document.querySelector('.modal-big-foto').classList.remove('close-big-modal-foto');

/*Abrindo Modal */
document.querySelector('.user-avatar img').addEventListener('click', () => {
  abrirModalDeFotoGrande();
});

/*Fechando Modal */

document.querySelector('.close-big-foto-modal i').addEventListener('click', () => {
  fecharModalDeFotoGrande();
});



