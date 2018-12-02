<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ORÇAMENTO - PDF</title>
  </head>
  <body>
    <div style="text-align: right">
      Situação do Orçamento: {{ $orcamento->status() }}. &nbsp;
      Impresso em: {{ date('d/m/Y') }}
    </div>
    <table border="1px solid gray" style="width: 100%;">
      <tr>
        <th colspan="2" style="background-color: #e6e6e6;">EMPRESA</th>
      </tr>
      <tr>
        <td> <b>AI Service - Lanternagem e Pintura</b> </td>
        <td> <b>CNPJ:</b> 00.000.000/0000-00 </td>
      </tr>
      <tr>
        <td colspan="2"> <b>Endereço:</b> Endereço fictício... </td>
      </tr>
      <tr>
        <td> <b>CEP:</b> 72600-000 </td>
        <td> <b>Telefones:</b> (61) 0000-0000 / (61) 90000-0000 </td>
      </tr>
      <tr>
        <td colspan="2"> <b>Email:</b> ai-service@email.com </td>
      </tr>
      <tr>
        <th colspan="2" style="background-color: #e6e6e6;">ORÇAMENTO Nº 00{{ $orcamento->id }}</th>
      </tr>
      <tr>
        <td> <b>Responsável:</b> {{ $orcamento->getResponsavel->name }} </td>
        <td> <b>Data de Geração:</b> {{ date('d/m/Y', strtotime($orcamento->created_at)) }} </td>
      </tr>
      <tr>
        <th colspan="2" align="center" style="background-color: #e6e6e6;">Dados do Cliente</th>
      </tr>
      <tr>
        <td> <b>Nome:</b> {{ $orcamento->getVeiculo->getCliente->nome }} </td>
        <td> <b>CPF:</b> {{ $orcamento->getVeiculo->getCliente->cpf }} </td>
      </tr>
      <tr>
        <td> <b>Telefone:</b> {{ $orcamento->getVeiculo->getCliente->telefone }} </td>
        <td> <b>E-mail:</b> {{ $orcamento->getVeiculo->getCliente->email }} </td>
      </tr>
      <tr>
        <th colspan="2" align="center" style="background-color: #e6e6e6;">Dados do Veículo</th>
      </tr>
      <tr>
        <td> <b>Modelo:</b> {{ $orcamento->getVeiculo->modelo }} </td>
        <td> <b>Fabricante:</b> {{ $orcamento->getVeiculo->fabricante }} </td>
      </tr>
      <tr>
        <td> <b>Placa:</b> {{ $orcamento->getVeiculo->placa }} </td>
        <td> <b>Ano de Fabricação:</b> {{ $orcamento->getVeiculo->ano }} </td>
      </tr>
      <tr>
        <td colspan="2"> <b>Cor:</b> {{ $orcamento->getVeiculo->cor }} </td>
      </tr>
      <tr>
        <th colspan="2" align="center" style="background-color: #e6e6e6;">Descrição do(s) Serviços(s)</th>
      </tr>
    </table>
    <table border="1px solid gray" style="width: 100%;">
      <thead>
        <tr>
          <th width="80%">Descrição</th>
          <th>Valor (R$)</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orcamento->getItens as $item)
        <tr>
          <td>{{ $item->descricao }} </td>
          <td align="right">{{ number_format($item->valor, 2, ',', '.') }} </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <table border="1px solid gray" style="width: 100%;">
      <tr>
        <th width="80%" align="right">Desconto:</th>
        <th align="right">{{ number_format($orcamento->desconto, 2, ',', '.') }}</th>
      </tr>
      <tr>
        <th width="80%" align="right">TOTAL:</th>
        <th align="right">{{ number_format($orcamento->valor_total, 2, ',', '.') }}</th>
      </tr>
    </table>
    <table border="1px solid gray" style="width: 100%;">
      <tr>
        <td align="center"><br>_______________________________________<br>Assinatura do cliente</td>
        <td align="center"><br>_______________________________________<br>Assinatura do responsável</td>
      </tr>
    </table>
  </body>
</html>
