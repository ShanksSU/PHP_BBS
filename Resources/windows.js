function toggleDialog(show){
    var animationClass = show ? "slipUp" : "slipBottom";
    var animation = function(){
        var ele = document.getElementById("dialog-face");
        ele.className = "dialog-face " + animationClass;
        ele = document.getElementById("dialog");
        ele.className = "dialog-root " + animationClass;
        ele = document.getElementById("dialog-wrapper");
        ele.className = "dialog-wrapper " + animationClass;
    };

    setTimeout(animation, 100);
}

var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})