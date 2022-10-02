
let openModalDemanda = () =>{
 document.querySelector('.modal-demanda').classList.add('abrirModal');
    document.querySelector('.menu-lateral').classList.remove('abriMenu');
    document.querySelector('.button-close').classList.remove('marginLeft');
    document.querySelector('.button-close').classList.remove('botao-active');
}

let fecharModalDemanda = () => document.querySelector('.modal-demanda').classList.remove('abrirModal');

document.querySelector('#addDemanda').addEventListener('click', ()=>{
    openModalDemanda();
    
});

document.querySelector('.close-modal-demanda i').addEventListener('click', fecharModalDemanda);






