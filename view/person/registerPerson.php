<?php include __DIR__ . '/../inicio-html.php'; ?>

<h1>
  <?= $title ?>
</h1>

<form action="" method="POST">

  <div class="mb-3">
    <label for="nomeCurso" class="form-label">Nome do Curso</label>
    <input type="text" class="form-control" id="nomeCurso" name="nomeCurso" autofocus>
  </div>

  <div class="mb-3">
    <label for="chCurso" class="form-label">CH Curso</label>
    <input type="number" class="form-control" id="chCurso" step="1" min="1" max="5000" name="chCurso">
  </div>

  <div class="mb-3">
    <button type="submit" class="btn btn-primary" id="btnSalvar">Salvar</button>
  </div>

</form>

<?php include __DIR__ . '/../fim-html.php'; ?>