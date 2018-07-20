$(document).ready(function(){
  // mascaras
  var cpf = $('.cpf');
  cpf.mask('000.000.000-00');

  var btn_voltar = $('.btn_voltar');
  btn_voltar.click(function(){
    window.history.back();
  });

  var btn_refresh = $('.btn_refresh');
  btn_refresh.click(function() {
    location.reload();
  });
});
