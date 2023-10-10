<?php include __DIR__ . '/../inicio-html.php'; ?>

<h1>
  <?= $title ?>
</h1>

<form method="POST">
  <div class="row">

    <div class="form-group col-12 col-md-4">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control" name="cpf" id="cpf" required>
    </div>

    <div class="form-group col-12 col-md-8">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="name" id="name" required>
    </div>

  </div>

  <div class="form-group mt-3">
    <button type="submit" class="btn btn-success">Cadastrar</button>
  </div>
</form>

<?php include __DIR__ . '/../fim-html.php'; ?>