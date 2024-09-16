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
