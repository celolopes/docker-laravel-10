/* globals Chart:false */

const ctx = document.getElementById("myChart").getContext('2d');

// Mapear os dados para o formato necessário para o gráfico
const labels = vendasData.map(venda => venda.produto_nome);
const data = vendasData.map((venda) => venda.total_vendas); // Assumindo que há um campo 'valor' nas vendas

// Criar o gráfico
new Chart(ctx, {
    type: "bar",
    data: {
        labels: labels,
        datasets: [{
            label: "# de Vendas",
            data: data,
            borderWidth: 1,
        }],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});
