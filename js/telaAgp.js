

//filtro para não digitar letras e simbolos
function FilterInput(event) {
    var keyCode = ('which' in event) ? event.which : event.keyCode;

    isNotWanted = (keyCode == 69 || keyCode == 101 || keyCode == 107 || keyCode == 109 || keyCode == 187 || keyCode == 189 || keyCode == 38 || keyCode == 40);
    return !isNotWanted;
};

function handlePaste(e) {
    var clipboardData, pastedData;

    // Get pasted data via clipboard API
    clipboardData = e.clipboardData || window.clipboardData;
    pastedData = clipboardData.getData('Text').toUpperCase();

    if (pastedData.indexOf('E') > -1) {
        //alert('found an E');
        e.stopPropagation();
        e.preventDefault();
    }
};

$(document).ready(function () {
    load_data1();
    load_data2();
    load_data3();

    function load_data1(sl_placa) {
        $.ajax({
            url: "../ajax/cmtelaAgpFrota.php",
            method: "POST",
            data: {
                sl_placa: sl_placa
            },
            success: function (data) {
                $('#sl_placa').html(data);
            }
        });
    }

    function load_data2(sl_reboque) {
        $.ajax({
            url: "../ajax/cmtelaAgpSemiReboque.php",
            method: "POST",
            data: {
                sl_reboque: sl_reboque
            },
            success: function (data) {
                $('#sl_reboque').html(data);
            }
        });
    }

    function load_data3(sl_motorista) {
        $.ajax({
            url: "../ajax/cmtelaAgpMotorista.php",
            method: "POST",
            data: {
                sl_motorista: sl_motorista
            },
            success: function (data) {
                $('#sl_motorista').html(data);
            }
        });
    }
});

let abrirCamera = () => document.querySelector('.container-camera').style.display = "flex";
let fecharCamera = () => document.querySelector('.container-camera').style.display = "none";

let fecharCheck = () => document.querySelector('.container-check').style.display = "none";
let abreCheck = () => document.querySelector('.container-check').style.display = "flex";

let fecharForm = () => document.querySelector('.container-form').style.display = "none";
let abreForm = () => document.querySelector('.container-form').style.display = "flex";

let fecharLabel = () => document.getElementById('foto').style.display = "none";
let abreLabel = () => document.getElementById('foto').style.display = "flex";

document.getElementById("foto").addEventListener("click", foto);
document.getElementById("fecha").addEventListener("click", foto);

function foto(event) {
    if (event.target.id === "foto") {
        abrirCamera();
        fecharLabel();
        fecharCheck();
        fecharForm();
        openCamera();
    } else if (event.target.id === "fecha") {
        fecharCamera();
        abreLabel();
        abreCheck();
        abreForm();
        closeCamera();
    }
}

document.getElementById("rotate").addEventListener("click", openCameraRear);

function openCamera(event) {
    //Ask the User for the access of the device camera and microphone
    navigator.mediaDevices.getUserMedia({
        video: {
            facingMode: {
                exact: fm,
            }
        }
    })
        .then(mediaStream => {
            // The received mediaStream contains both the 
            // video and audio media data
            const video = document.querySelector('#video');
            video.srcObject = mediaStream;
            video.play();
            // make the received mediaStream available globally
            receivedMediaStream = mediaStream;
        })
}
var fm = "user";

function openCameraRear(event) {
    closeCamera();
    if (fm == "environment") {
        fm = "user";
    } else if (fm = "user") {
        fm = "environment"
    }
    //Ask the User for the access of the device camera and microphone
    navigator.mediaDevices.getUserMedia({
        video: {
            facingMode: fm
        }
    })
        .then(mediaStream => {
            // The received mediaStream contains both the 
            // video and audio media data
            const video = document.querySelector('#video');
            video.srcObject = mediaStream;
            video.play();
            // make the received mediaStream available globally
            receivedMediaStream = mediaStream;
        })
}


const closeCamera = () => {
    receivedMediaStream.getTracks().forEach(mediaTrack => {
        mediaTrack.stop();
    });
}

function capture() {
    var canvas = document.getElementById('canvas');
    var video = document.getElementById('video');
    canvas.width = 265;
    canvas.height = 360;
    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
    document.getElementById("fotoV").innerHTML = canvas.toDataURL();
    window.alert("FOTO CAPTURADA")
}

document.querySelector('#capture').addEventListener('click', function (e) {
    capture();
})

//assinatura

var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
    backgroundColor: 'rgba(255, 255, 255, 0)',
    penColor: 'rgb(0, 0, 0)'
});


var saveButton = document.getElementById('cadastrar');
var cancelButton = document.getElementById('clear');

saveButton.addEventListener("click", function (event) {
    if (signaturePad.isEmpty()) {
        alert("Faça sua assinatura.");
    } else {
        var dataURL = signaturePad.toDataURL();
        //download(dataURL, "signature.png");
        //alert(dataURL);
        $("#sig").val(dataURL);
    }
});

cancelButton.addEventListener('click', function (event) {
    signaturePad.clear();
});