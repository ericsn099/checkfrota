let abrirModal = () => document.querySelector('.modal').style.display = "flex";
let fecharModal = () => document.querySelector('.modal').style.display = "none";
setTimeout(() => {
    abrirModal();
    clearTimeout();
}, 0)

setTimeout(() => {
    fecharModal();
    window.location.replace("./exibirMotoristas.php?checar=");
}, 1000)