<?php $render('header'); ?>

<section class="centralized-default">

    <h1>Lista de Alunos</h1>
    
    <a class="btn btn-success" href="<?= $base; ?>/novo">Novo Aluno</a>
    
    <div style="overflow-x:auto;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Mensalidade</th>
                    <th scope="col">Status</th>
                    <th scope="col">Observação</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($alunos as $aluno) : ?>
            <tr>
                <?php
                    if($aluno['status_aluno'] == 1) {
                        $aluno['status_aluno'] = 'Ativo';
                    } else {
                        $aluno['status_aluno'] = 'Inativo';
                    }
                ?>
                <td><?= $aluno['id']; ?></td>
                <td><?= $aluno['nome']; ?></td>
                <td><?= $aluno['email']; ?></td>
                <td><?= $aluno['telefone']; ?></td>
                <td>R$ <?= $aluno['mensalidade']; ?></td>
                <td><?= $aluno['status_aluno']; ?></td>
                <td><?= $aluno['observacao']; ?></td>
                <td class="actions-crud">
                    <a class="btn btn-warning" href="<?= $base; ?>/usuario/<?= $aluno['id']; ?>/editar">Editar</a>
                    <a class="btn btn-danger" href="<?= $base; ?>/usuario/<?= $aluno['id']; ?>/excluir" onclick="return confirm('Tem certeza que deseja excluir este aluno?')">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<?php $render('footer'); ?>