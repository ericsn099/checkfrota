let openModal = (item) => {
  document.querySelector('.info-modal-user').classList.toggle('abrirModal');
  window.a
}

let fecharModal = () => document.querySelector('.info-modal-user').classList.remove('abrirModal');


let fechar = document.querySelector('.close-modal-info-user i');

let user = document.querySelectorAll('.area-user a');

user.forEach((item) => {
  item.addEventListener('click', (e) => {
    openModal();
  });
});

fechar.addEventListener('click', () => {
  fecharModal();
});

let admArea = document.querySelector('.adm-area');

admArea.map((item, index)=>{
  item.querySelector('a').addEventListener('click', (e)=>{
    e.preventDefault();
  });
});