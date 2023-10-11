<?php include __DIR__ . '/../header.php'; ?>

<h1>
  <?= $title ?>
</h1>

<a href="/person/register" class="btn btn-primary mb-3">Cadastrar Pessoa</a>

<section id="personList">
  <table class="table">
    <thead class="bg-dark text-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">CPF</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
</section>

<?php include __DIR__ . '/../footer.php'; ?>