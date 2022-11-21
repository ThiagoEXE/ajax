<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

</head>

<body>
    <form>
        <div>
            <select id="status">
            <option default>Selecione a Ação</option>
              <option value="Aprovado">Aprovado</option>
              <option value="Reprovado">Reprovado</option>
              <option value="Em Seleção">Em Seleção</option>
              <option value="Cadastrado">Cadastrado</option>
            </select>
            <input type="checkbox" data-email="thiago@teste.com" id="status_ckeck" class="conjunto_check">
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $("#status").on('change', function() {
                var contador = 0;
                var selecionados = [];
                $.each($("input[class='conjunto_check']:checked"), function() {
                    selecionados.push({
                        email: $(this).attr("data-email")
                    });
                    contador = contador + 1;
                });
                if (contador > 0) {
                    if (confirm('Confirma a mudança: ' + this.value + ' ?')) {
                        $.ajax({
                            type: "POST",
                            url: "processa.php",
                            cache: false,
                            data: {
                                action: "insere_acoes",
                                status: this.value,
                                lista: selecionados
                            },
                            dataType: "json",
                            success: function(dataresult) {
                                alert('Passou');
                                console.log(dataresult);

                            },
                            error: function(erro) {
                                console.log(erro);
                            },
                            complete: function(data, textStatus, jqXHR) {
                                //location.reload();
                            }
                        });
                    }
                }
                this.value = 'Selecione a Ação';
            });
        });
    </script>
</body>

</html>