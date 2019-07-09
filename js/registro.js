'use strict'

const next = document.getElementsByClassName("next")
const prev = document.getElementsByClassName("prev")
const eachForm = document.getElementsByClassName("paso")

// esta variable se usará en handleNext y handleSubmit
const formulario = {}

function handleNext(i, event){
    eachForm[i].style.display = "none"
    const inputs = eachForm[i].getElementsByTagName("input")

    for(let k = 0 ; k < inputs.length; k++){
        let name = inputs[k].name
        let value = inputs[k].value

        if(name === "dniFront" || name === "dniBack" ){
            formulario[name] = inputs[k].files[0]
            break
        }

        formulario[name] = value
    }

    const nextElement = i + 1
    eachForm[nextElement].style.display = "block"
}

function handleBack(i, event){
    eachForm[i+1].style.display = "none"

    const prevElement = i
    eachForm[prevElement].style.display = "block"
}

for(let i = 0; i < next.length ; i++){
    next[i].addEventListener("click", handleNext.bind(this, i))
}

for(let i = 0; i < prev.length; i++){
    prev[i].addEventListener("click", handleBack.bind(this, i))
}

// submit form
const form = document.getElementById("formularioRegistro")
const button = document.getElementById("submitButton")

function handleSubmit(event){
    const data = new FormData()
    const keys = Object.keys(formulario)

    keys.forEach( e => {
        data.append(e, formulario[e])
    })

    const resp = fetch("http://virtualhost/coinbank/registrarUsuario.php", {
        // headers: { "Content-type": "multipart/form-data" }, // it's not necessary when use FormData
        method: "post",
        body: data
    })
    
    resp.then(response => response.json())
        .then(data => {
            console.log(data)
        })
}

button.addEventListener("click", handleSubmit)