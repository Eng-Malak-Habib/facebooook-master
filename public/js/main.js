document.getElementById('sidebar').addEventListener('click', function(e){
    document.body.classList.add("open");
})
document.getElementById('close').addEventListener('click', function(e){
    document.body.classList.remove("open");
})
