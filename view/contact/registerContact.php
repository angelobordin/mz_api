<?php include __DIR__ . '/../header.php'; ?>

<h1>
    <?= $title ?>
</h1>

<form method="POST">
    <div class="row">

        <div class="form-group col-12 col-md-4">
            <label for="tipo">Tipo</label>
            <select class="form-select" id="tipo" name="tipo">
                <option value="maca">Telefone</option>
                <option value="banana">E-mail</option>
            </select>
        </div>

        <div class="form-group col-12 col-md-8">
            <label for="person_id">Pessoa</label>
            <select class="form-select" id="person_id" name="person_id">
                <option value="maca">Telefone</option>
                <option value="banana">E-mail</option>
            </select>
        </div>

        <div class="form-group col-12">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" placeholder="Descrição" rows="3"></textarea>
        </div>

    </div>

    <div class="form-group mt-3">
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
</form>

<?php include __DIR__ . '/../footer.php'; ?>