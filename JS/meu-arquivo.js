document.getElementById('mostrarOpcoes').addEventListener('change', function() {
    var opcoes = document.getElementById('opcoes');
    if (this.checked) {
      opcoes.style.display = 'block';
    } else {
      opcoes.style.display = 'none';
    }
  });
  