@extends('layouts.app')

@section('content')
<style>
    label {
        margin-top: 5px;
        color: #808080;
    }

</style>

<div class="container">


    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Erro!</strong> Por favor lembre-se de incluir as fotos da casa através do botão abaixo<br><br>
    </div>
    @endif

    @if (!isset($house))
    <div class="w-100 p-3">
        <input form="house-info" id="uploadFile" name="uploadFile[]" type="file" multiple accept="image">
    </div>
    @endif

    <div class="w-100 p-3 row justify-content-center">
        <form class="needs-validation ml-5" novalidate role="form" style="min-width: 100%;" id="house-info" action="{{ isset($house)? route('admin.update', $house->id):route('admin.store') }}"
            enctype="multipart/form-data" method="POST">
            @if(isset($house))
                @method('PUT')
            @endif                
            @csrf
        <div class="form-row">
        <div class="col">

                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ isset($house) ? $house->title:'' }}" required>
                    <div class="invalid-feedback">
                        Por favor escreva um título para o anúncio
                    </div>
                    <label for="price">Preço</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="0" value="{{ isset($house) ?  number_format($house->price, 2, '.', ''):'' }}" required>
                    <div class="invalid-feedback">
                        Por insira um preço
                    </div>
                    <div class="form-row">
                        <div class="col">

                            <label for="rooms">Quartos</label>
                            <input type="number" class="form-control" name="rooms" id="rooms" placeholder="1" value="{{ isset($house) ? $house->rooms :1 }}">
                        </div>

                        <div class="col">

                            <label for="bathrooms">Banheiros</label>
                            <input type="number" class="form-control" name="bathrooms" id="bathrooms" placeholder="1" value="{{ isset($house) ? $house->bathrooms :1 }}">
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="garage">Garagem:</label>

                            <select value="0" class="form-control" name="garage" id="garage">
                                <option value="1">Sim</option>
                                <option value="0" {{ isset($house)&&$house->garage==0 ? 'selected'  : '' }}>Não</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="recreation">Área para lazer:</label>
                            <select class="form-control" name="recreation" id="recreation">
                                <option value="1">Sim</option>
                                <option value="0" {{ isset($house)&&$house->recreation==0 ? 'selected'  : '' }}>Não</option>
                            </select>
                        </div>
                    </div>
                    <label for="description">Descrição</label>
                    <textarea class="form-control" name="description" id="description" rows="3" required>{{ isset($house) ? $house->description :'' }}</textarea>
                    <div class="invalid-feedback">
                        Por favor escreva uma descrição para o anúncio
                    </div>
                </div>

                <button class="btn btn-secondary" type="submit">{{ isset($house)?'Atualizar':'Enviar' }}</button>
            
        </div>
        <div class="col">

            <label for="cep">CEP</label>
            <input type="text" class="form-control" name="cep" id="cep" value="{{ isset($house) ? $house->address->first()->cep:'' }}" required>
            <div class="invalid-feedback">
                Por favor digite o CEP da casa
            </div>
            <label for="logradouro">Logradouro</label>
            <input type="text" class="form-control" name="logradouro" id="logradouro" value="{{ isset($house) ? $house->address->first()->logradouro:'' }}" required>
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" name="bairro" id="bairro" value="{{ isset($house) ? $house->address->first()->bairro:'' }}" required>
            <label for="localidade">Cidade</label>
            <input type="text" class="form-control" name="localidade" id="localidade" value="{{ isset($house) ? $house->address->first()->localidade:'' }}" required>
            <label for="uf">UF</label>
            <input type="text" class="form-control" name="uf" id="uf" value="{{ isset($house) ? $house->address->first()->uf:'' }}" required>

        </div>
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
                        "/json/", 
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

<script>
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>
@endsection
