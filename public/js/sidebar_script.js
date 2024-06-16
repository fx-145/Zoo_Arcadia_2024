
//agit sur la sidebar: collapsable
$('#menu-toggle').click(function() {
    $('#sidebar').toggleClass('collapsed');
});

document.addEventListener('DOMContentLoaded', function() {
    var navLinks = document.querySelectorAll('.sidebar .nav-link');
    var subMenuLinks = document.querySelectorAll('.sidebar .nav-item ul li a');

    function setActiveLink() {
        navLinks.forEach(function(link) {
            if (link.href === window.location.href) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
        subMenuLinks.forEach(function(link) {
            if (link.href === window.location.href) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    }

    setActiveLink();

    navLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            navLinks.forEach(function(nav) { nav.classList.remove('active'); });
            subMenuLinks.forEach(function(sub) { sub.classList.remove('active'); });
            link.classList.add('active');
        });
    });

    subMenuLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            subMenuLinks.forEach(function(sub) { sub.classList.remove('active'); });
            navLinks.forEach(function(nav) { nav.classList.remove('active'); });
            link.classList.add('active');
        });
    });
});