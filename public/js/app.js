$(document).ready(function(){
  // mascaras
  var cpf = $('.cpf');
  cpf.mask('000.000.000-00');

  var telefone = $('.telefone');
  telefone.mask('(00) 0000-0000');

  var placa = $('.placa');
  placa.mask('AAA-0000');

  var btn_voltar = $('.btn_voltar');
  btn_voltar.click(function(){
    window.history.back();
  });

  var btn_refresh = $('.btn_refresh');
  btn_refresh.click(function() {
    location.reload();
  });

  //inicia datatables
  var dt_table = $('.dt_table');

  dt_table.DataTable({

    "language": {
      "sEmptyTable": "Nenhum registro encontrado",
      "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
      "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
      "sInfoFiltered": "(Filtrados de _MAX_ registros)",
      "sInfoPostFix": "",
      "sInfoThousands": ".",
      "sLengthMenu": "_MENU_ resultados por página",
      "sLoadingRecords": "Carregando...",
      "sProcessing": "Processando...",
      "sZeroRecords": "Nenhum registro encontrado",
      "sSearch": "Pesquisar",
      "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
      },
      "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
      }
    }
  });

  $('body').on('click', '.btn_excluir', function() {
    var href = $(this).data('href');

    swal({
      title: 'Tem certeza?',
      text: "Deseja realmente excluir o cadastro?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sim, excluir!',
      cancelButtonText: 'Não, cancelar!'
    }).then((result) => {
      if (result.value) {
        window.location.href = href;
      }
    });
  });
});

//funções

function maiuscula(campo){
    var m = campo.value.toUpperCase();
    campo.value = m;
}
