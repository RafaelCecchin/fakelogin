/* Mudar de tela */

function slideTop () {
    document.getElementById('Page1').style = 'margin-top: -100vh; transition-duration: 0.2s;'
    slideBottom()
    selectInputPassword()
}

function slideBottom () {
    setTimeout(function () {
        document.getElementById('Page1').style = 'margin-top: 0vh; transition-duration: 0.2s;'
    }, 120000)
}

/* Desabilitar clique com o botão direito do mouse e seleção */

function disableselect(e){ 
    return false 
} 

function reEnable(){ 
    return true 
} 

document.onselectstart=new Function ("return false") 
document.oncontextmenu=new Function ("return false") 

if (window.sidebar){ 
    document.onmousedown=disableselect 
    document.onclick=reEnable 
}

/* Vizualizar senha */

function hiddenPasswordButton () {
    let array = document.getElementById('user-password').value.split('')
    if (array.length==0) {
        document.getElementById('user-password').style.width = "277px"
        document.getElementById('button-show-password').style.display = "none"
        hiddenPassword()
    }
}

function showPasswordButton () {
    document.getElementById('user-password').style.width = "240px"
    document.getElementById('button-show-password').style.display = "block"
}

let show = false;

function showOrHideenPassword () {
    if (show) {
        hiddenPassword()
    } else {
        showPassword ()
    }
}

function showPassword () {
    document.getElementById('user-password').setAttribute('type','text')
    show = true
    selectInputPassword()
}

function hiddenPassword () {
    document.getElementById('user-password').setAttribute('type','password')
    show = false
    selectInputPassword()
}

/* Mudar mensagens */

function loading() {
    document.getElementById('password').style.display = "none"
    document.getElementById('loading').style.display = "flex"
    setTimeout(forgotPassword, 7000)
    hiddenBottom()
    hiddenCursor()
}

function forgotPassword () {
    document.getElementById('loading').style.display = "none"
    document.getElementById('forgot-password').style.display = "block"
    selectButtonOk()
}

function password() {
    document.getElementById('forgot-password').style.display = "none"
    document.getElementById('password').style.display = "flex"
    clearPassword()
    selectInputPassword()
    showBottom()
}

function clearPassword () {
    document.getElementById('user-password').value=''
    hiddenPasswordButton()
}

/* Selecionar campo automaticamente */

function selectInputPassword () {
    document.getElementById('user-password').focus();
}

function selectButtonOk () {
    document.getElementById('ok-submit').focus();
}

/* Alterar usuário */

function changeUser (num) {
    let newDirectoryPhoto = document.getElementById('user'+num+'-photo').getAttribute('src')
    document.getElementById('user-photo').setAttribute('src', newDirectoryPhoto)
    let newName = "user"+num+"-name"
    document.getElementsByTagName('h3')[0].innerText = document.getElementById(newName).innerText
    clearPassword()
    selectInputPassword()
}

/* Esconder parte de baixo */

function hiddenBottom () {
    document.getElementById('bottom').style.display = "none"
}

function showBottom () {
    document.getElementById('bottom').style.display = "flex"
}

/* Esconder cursor do mouse */

function hiddenCursor () {
    document.getElementsByTagName('body')[0].style.cursor = "none"
}

function showCursor () {
    document.getElementsByTagName('body')[0].style.cursor = "default"
}
