document.getElementById('view').addEventListener('mousedown', function () {
    document.getElementById('pass').type = 'text';
});

document.getElementById('view').addEventListener('mouseup', function () {
    document.getElementById('pass').type = 'password';
});

// Para que o password não fique exposto apos mover a imagem.
document.getElementById('view').addEventListener('mousemove', function () {
    document.getElementById('pass').type = 'password';
});

// (IMPORTANTE ESTÁ COM BUG NA HORA DE COLOCAR A SENHA.  A SENHA FICA VISIVEL ATÉ PASSAR O MOUSE POR CIMA, LOGO APÓS FUNCIONA NORMAL)