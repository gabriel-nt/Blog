$(document).ready(function() {
    $('.sidenav').sidenav();
    $('.collapsible').collapsible();
    $('.dropdown-trigger').dropdown({
        container: document.body,
        constrainWidth: true,
        coverTrigger: false
    });
    $('.materialboxed').materialbox();
    $('.slider').slider({
        height: 500
    });
    $('input#input_nome,input#input_email').characterCounter();
    $('.scrollspy').scrollSpy({
        scrollOffset: 100,
    });
    setTimeout(() => $('.msg-info').hide(), 5000)
});