@extends('layouts.app')

@section('content')
<style>
    label {
        margin-top: 5px;
        color: #808080;
    }

</style>

<div class="container">
    <div class="w-100 p-3">
        <input form="house-info" id="uploadFile" name="uploadFile[]" type="file" multiple accept="image">
    </div>

    <div class="w-100 p-3 row justify-content-center">
        <div class="col">
            <form style="min-width: 200px;" id="house-info" action="{{ route('casas.store') }}"
                enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" name="title" id="title">
                    <label for="price">Preço</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="0">
                    <div class="form-row">
                        <div class="col">

                            <label for="rooms">Quartos</label>
                            <input type="number" class="form-control" name="rooms" id="rooms" placeholder="0">
                        </div>

                        <div class="col">

                            <label for="rooms">Banheiros</label>
                            <input type="number" class="form-control" name="bathrooms" id="bathrooms" placeholder="0">
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="garage">Garagem:</label>

                            <select class="form-control" name="garage" id="garage">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="recreation">Área para lazer:</label>
                            <select class="form-control" name="recreation" id="recreation">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="form-group form-row">
                    <label for="description">Descrição</label>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>
                <button class="btn btn-secondary" type="submit">Enviar</button>
            
        </div>
        <div class="col">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" name="cep" id="cep">
            <label for="logradouro">Logradouro</label>
            <input type="text" class="form-control" name="logradouro" id="logradouro">
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" name="bairro" id="bairro">
            <label for="localidade">Cidade</label>
            <input type="text" class="form-control" name="localidade" id="localidade">
            <label for="uf">UF</label>
            <input type="text" class="form-control" name="uf" id="uf">

        </div>
    </form>


    </div>
</div>
<script type="text/javascript">
    $(function () {
        $("#rooms, #bathrooms").inputSpinner();
        $('#price').priceFormat({
            prefix: 'R$ ',
            centsSeparator: ',',
            thousandsSeparator: '.'
        });

        $("#uploadFile").fileinput({
            theme: "fa",
            showUpload: false,
            initialPreviewDownloadUrl: false,
            language: "pt-BR",
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            maxFileSize: 15000,

        });



        $("#cep").change(function () {
            numberval = $('#cep').val();
            if (numberval.length == 8) {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "https://viacep.com.br/ws/" + numberval +
                        "/json/", // replace 'PHP-FILE.php with your php file
                    data: {
                        number: numberval
                    },
                    success: function (data) {
                        $('#logradouro').val(data["logradouro"]);
                        $('#bairro').val(data["bairro"]);
                        $('#localidade').val(data["localidade"]);
                        $('#uf').val(data["uf"]);

                    },
                    error: function () {
                        alert('Some error occurred!');
                    }
                });

            }


        });


    });

</script>
@endsection
