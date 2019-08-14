function clickId(id) {
    document.getElementById(id).click()
}

function showUsers(num) {
    if (num==0) {
        document.getElementById('user0').style.display = "block"
        document.getElementById('user1').style.display = "none"
        document.getElementById('user2').style.display = "none"
    } else if (num==1) {
        document.getElementById('user0').style.display = "block"
        document.getElementById('user1').style.display = "block"
        document.getElementById('user2').style.display = "none"
    } else {
        document.getElementById('user0').style.display = "block"
        document.getElementById('user1').style.display = "block"
        document.getElementById('user2').style.display = "block"
    }
}
 
function changeOnOff(status) {
    if (status=="on") {
        document.getElementById('text-on').style.display = "block"
        document.getElementById('text-off').style.display = "none"
        
        document.getElementById('onoff-content').style.backgroundColor = "rgb(255, 60, 60)"
        document.getElementById('on').style.backgroundColor = "rgb(255, 60, 60)"
        document.getElementById('on').style.width = "60%"
        document.getElementById('off').style.backgroundColor = "white"
        document.getElementById('off').style.width = "40%"

        document.getElementById('battery').style.opacity = " 1"
    } else {
        document.getElementById('text-on').style.display = "none"
        document.getElementById('text-off').style.display = "block"

        document.getElementById('onoff-content').style.backgroundColor = "rgb(150, 150, 150)"
        document.getElementById('on').style.backgroundColor = "white"
        document.getElementById('on').style.width = "40%"
        document.getElementById('off').style.backgroundColor = "rgb(150, 150, 150)"
        document.getElementById('off').style.width = "60%"

        document.getElementById('battery').style.opacity = " 0.5"
    }
}