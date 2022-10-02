

let modalCadUser = () => {
    document.querySelector('.modal-add-user').classList.toggle('abriCadUser');
    document.querySelector('.menu-lateral').classList.remove('abriMenu');
    document.querySelector('.button-close').classList.remove('marginLeft');
    document.querySelector('.button-close').classList.remove('botao-active');
    
}

let closeModalCadUser = () => document.querySelector('.modal-add-user').classList.remove('abriCadUser');



document.querySelector('#addUsuario').addEventListener('click', ()=>{
    modalCadUser();
});



document.querySelector('.close-modal-user i').addEventListener('click', ()=>{
    closeModalCadUser();
    limparCampos();
});


let limparCampos = ()=>{
    let nome = document.querySelector('#nome_user').value = '';
    let cpf = document.querySelector('#cpf').value = '';
    let login = document.querySelector('#login').value = '';
    let senha = document.querySelector('#senha').value = '';
}