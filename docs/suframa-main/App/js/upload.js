/*Upload de foto de perfil */

let photo = document.querySelector('.img-perfil img');
let file = document.querySelector('#avatar');

photo.addEventListener('click', () => {
    file.click();
});


file.addEventListener('change', (event)=>{
   let reader = new FileReader();

   reader.onload = () => {
     photo.src = reader.result;
   }
   
   reader.readAsDataURL(file.files[0]);
});