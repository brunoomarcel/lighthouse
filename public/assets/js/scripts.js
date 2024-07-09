document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('checkbox1');
    const select = document.getElementById('statusSelect');

    // Atualiza o select com base no status inicial do checkbox ao carregar a página
    select.value = checkbox.checked ? '1' : '0';

    // Define a função para atualizar o select com base no estado do checkbox
    function updateSelect() {
        select.value = checkbox.checked ? '1' : '0';
    }

    // Atualiza o select quando o checkbox é alterado
    checkbox.addEventListener('change', function() {
        updateSelect();
    });
});