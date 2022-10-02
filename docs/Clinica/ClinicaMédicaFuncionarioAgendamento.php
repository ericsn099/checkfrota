<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <title>ClinicaJesusNaCausa</title>
</head>
<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: Roboto, sans-serif;}
    a:link {text-decoration: none;}
</style>
                            
<body class="w3-light-green">
    <div class="w3-card-4 w3-display-topmiddle">
        <div class="w3-container w3-green w3-center">
          <a href="ClinicaMédica.html"><h2>Agendamento</h2></a>
        </div>
        <form class="w3-card-4 w3-container " style="width: 500px;" action="/action_page.php">
        <p>
          <label for="CPF" class="w3-text-white"><b>Localizar Paciente</b></label>
          <input type="text" name="CPF" id="CPF" placeholder="CPF" class="w3-input w3-border w3-sans-serif w3-round-xlarge"></input></p>
        <p>      
          <label class="w3-text-white"><b>Paciente</b></label>
            <select id="cars" class="w3-input w3-border w3-sans-serif w3-round-xlarge" name="last" type=""></p>
              <option value=""></option>
            </select>
        <p>      
          <label class="w3-text-white"><b>Médico</b></label>
            <select id="cars" class="w3-input w3-border w3-sans-serif w3-round-xlarge" name="last" type=""></p>
              <option value=""></option>
            </select>
        <p>      
          <label class="w3-text-white"><b>Especialidade</b></label>
            <select id="cars" class="w3-input w3-border w3-sans-serif w3-round-xlarge" name="last" type=""></p>
              <option value=""></option>
            </select>
        <p>      
          <label class="w3-text-white"><b>Data de Nascimento</b></label>
          <input class="w3-input w3-border w3-sans-serif w3-round-xlarge" name="last" type="date"></p>
          <p>
          <button class="w3-btn w3-green w3-round-xlarge">Register</button></p>
        </form>
    </div>
</body>
</html>