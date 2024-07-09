<?php $render('header'); ?>

<?php
    if(isset($_SESSION['error'])) {
        echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']); // Limpa a mensagem de erro após exibi-la
    }
?>

<div class="form-default centralized-default">

    <h1>Adicionar Novo Aluno</h1>

    <form method="POST" action="<?= $base; ?>/novo">
        <div class="mb-3">
            <div>
                <label class="form-label">
                    Nome
                    <input type="text" name="name" class="form-control" required>
                </label>
            </div>
            
            <div>
                <label class="form-label">
                    Email
                    <input type="email" name="email" class="form-control" required>
                </label>
            </div>

            <div>
                <label class="form-label">
                    Telefone
                    <input type="tel" name="telefone" class="form-control" required pattern="[0-9]{10,}">
                </label>

            </div>

            <div>
                <label class="form-label">
                    Mensalidade
                    <input type="text" name="mensalidade" class="form-control" pattern="[0-9]+">
                </label>
            </div>

            <div>
                <label class="form-label">
                    Senha
                    <input type="password" class="form-control" required minlength="6">
                </label>
            </div>

            <div>
                    <!-- CHECKBOX DINÂMICO -->
                    <?php
                        // Simula a obtenção do status do aluno do banco de dados
                        $aluno['status_aluno'] = 1; // Exemplo: Status do aluno ativo por padrão
        
                        // Verifica o status do aluno para definir se o checkbox deve estar marcado
                        $checked = ($aluno['status_aluno'] == 1) ? 'checked' : '';
                    ?>
                    <label for="checkbox1" class="checkbox-custom">Status do Aluno</label>
                    <input type="checkbox" id="checkbox1" class="checkbox-hidden" <?=$checked;?> data-status="<?=$aluno['status_aluno'];?>">
                </div>
        
                <div style="display: none">
                    <!-- SELECT oculto para sincronização com o checkbox -->
                    <label class="form-label">Status do Aluno
                        <select id="statusSelect" class="form-select" name="status_aluno">
                            <option>Selecione</option>
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </label>
                </div>

            <div>
                <label class="form-label">
                    Observação:
                    <textarea name="observacao" class="form-control"></textarea>
                </label>
            </div>

            <input type="submit" value="Cadastrar" class="btn btn-primary">
        </div>
        
    </form>

</div>


<?php $render('footer'); ?>