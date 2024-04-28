const collapseHeader = () => {
    let menu = document.getElementById('menu');
    let display = menu.style.display;
    if (display == 'none'  || display == ''){
        menu.style.display = 'block' ;
    } else {
        menu.style.display = 'none';
    }
}
window.onload = () => {
    console.log()
}
