function run(){
    var prev=$(".gore-dole li:first-child");
    prev.slideUp(function(){
        $(this).appendTo(this.parentNode).slideDown();
    })
}
window.setInterval(run,3000);