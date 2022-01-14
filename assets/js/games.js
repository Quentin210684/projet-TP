let logic = document.getElementById('logic');
// j'appelle ma variable en utilisant getElementById
logic.onmouseenter = () => {
    // onmouseenter me permet qu'au passage de la souris a variable change de source
    logic.setAttribute('src', 'assets/img/gif/logic gif.gif')
}
logic.onmouseleave = () => {
    // onmouseleave me permet que lorsque la souris sorte l'image reprenne sa source initiale.

    logic.setAttribute('src', 'assets/img/page jeux 1logic.jpg')

}

let dark = document.getElementById('dark');

dark.onmouseenter = () => {
    dark.setAttribute('src', 'assets/img/gif/darkest.gif')
}
dark.onmouseleave = () => {
    dark.setAttribute('src', 'assets/img/page jeux 2 dd.jpg')

}

let graveyard = document.getElementById('graveyard');

graveyard.onmouseenter = () => {
    graveyard.setAttribute('src', 'assets/img/gif/graveyard.gif')
}
graveyard.onmouseleave = () => {
    graveyard.setAttribute('src', 'assets/img/page jeux 3.jpg')

}

let rebel = document.getElementById('rebel');

rebel.onmouseenter = () => {
    rebel.setAttribute('src', 'assets/img/gif/rebel.gif')
}
rebel.onmouseleave = () => {
    rebel.setAttribute('src', 'assets/img/page jeux 4.jpg')

}

let ruined = document.getElementById('ruined');

ruined.onmouseenter = () => {
    ruined.setAttribute('src', 'assets/img/gif/ruined-kings-braum.gif')
}
ruined.onmouseleave = () => {
    ruined.setAttribute('src', 'assets/img/page jeux 5.jpg')

}

let dysm = document.getElementById('dysm');

dysm.onmouseenter = () => {
    dysm.setAttribute('src', 'assets/img/gif/dysm.gif')
}
dysm.onmouseleave = () => {
    dysm.setAttribute('src', 'assets/img/page jeux 6.jpg')

}