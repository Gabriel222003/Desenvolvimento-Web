var altura = 0
var largura = 0
var vidas = 1
var tempo = 10
var tempoMosca = 1500

var nivel = window.location.search
nivel = String(nivel).replace('?','')
console.log(nivel)

if(nivel === 'dificil'){
    tempoMosca = 1000
    console.log('teste')
}else if(nivel === 'hardcore'){
    tempoMosca = 750
}
console.log(tempoMosca)

function ajuste(){
    altura = window.innerHeight
    largura = window.innerWidth
}

ajuste()

document.getElementById('cronometro').innerHTML = tempo

var cronometro = setInterval(function(){

    if(tempo<0){
        clearInterval(cronometro)
        clearInterval(moscao)
        window.location.href = 'vitoria.html'
    }else{
        document.getElementById('cronometro').innerHTML = tempo
        tempo -= 1
    }
},1000)


var moscao = setInterval(function(){
    criaMosca()
},tempoMosca)

console.log(altura, largura)
function criaMosca(){

    if(document.getElementById('mosca')){
        document.getElementById('mosca').remove()

        if(vidas > 2){
            window.location.href = 'fim_de_jogo.html'
        }else{
        document.getElementById('v' + vidas).src = 'imagens/coracao_vazio.png'
        vidas++
        }
    }

    var eixoX = Math.floor(Math.random() * largura) - 90
    var eixoY = Math.floor(Math.random() * altura) - 90
    eixoX = eixoX < 0 ? 0 : eixoX
    eixoY = eixoY < 0 ? 0 : eixoY

    console.log(eixoY, eixoX)
    console.log(tempoMosca)

    var mosca = document.createElement('img')
    mosca.src = 'imagens/mosca.png'
    mosca.className = tamanhoVariavel() + ' ' + ladoVariavel()
    mosca.id = 'mosca' 
    mosca.style.left = eixoX + 'px'
    mosca.style.top = eixoY + 'px'
    mosca.style.position = 'absolute'
    mosca.onclick= function(){
        this.remove()
    }

    document.body.appendChild(mosca)
}


function tamanhoVariavel(){
    var classe = Math.floor(Math.random() * 3)

    switch(classe){
        case 0:
            return 'mosca1'
        case 1:
            return 'mosca2'
        case 2:
            return 'mosca3'
    }
}

function ladoVariavel(){
    var lado = Math.floor(Math.random() * 2)

    switch(lado){
        case 0:
            return
        case 1:
            return 'gira'
    }
}