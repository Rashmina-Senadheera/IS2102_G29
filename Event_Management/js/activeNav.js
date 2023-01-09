const activeNav = window.location.pathname;

const navLinks = document.querySelectorAll('.sidebar li a').forEach(link => {
    if(link.href.includes(`${activeNav}`)){
        link.classList.add('active1');
    }
})