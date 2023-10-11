<?php include __DIR__ . '/../header.php'; ?>

<h1>
    <?= $title ?>
</h1>

<a href="/contact/register" class="btn btn-primary mb-3">Cadastrar Contato</a>

<section id="personList">
    <table class="table">
        <thead class="bg-dark text-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">id</th>
                <th scope="col">Tipo</th>
                <th scope="col">Descrição</th>
                <th scope="col">Pessoa</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</section>

<?php include __DIR__ . '/../footer.php'; ?>