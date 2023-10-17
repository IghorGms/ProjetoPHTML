// Obtém referências para os campos de entrada e saída
const valorContaInput = document.getElementById('valorconta');
const valorCouvertInput = document.getElementById('valorcouvert');
const resultadoOutput = document.getElementById('res');

// Adiciona um ouvinte de eventos de mudança nos campos de entrada
valorContaInput.addEventListener('input', atualizarResultado);
valorCouvertInput.addEventListener('input', atualizarResultado);

// Função para calcular e atualizar o resultado
function atualizarResultado() {
  const valorConta = parseFloat(valorContaInput.value) || 0; // Converte o valor em um número
  const valorCouvert = parseFloat(valorCouvertInput.value) || 0; // Converte o valor em um número

  const total = valorConta + valorCouvert;
  resultadoOutput.textContent = total;
}

// Chama a função inicialmente para calcular o resultado com os valores iniciais
atualizarResultado();
