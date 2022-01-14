const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre', ],
        datasets: [{
            label: 'Utilisateur enregistrés',
            data: [100, 90, 30, 50, 20, 30, 50, 10, 80, 150, 200, 60],
            backgroundColor: [
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
            ],
            borderColor: [
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const ctx2 = document.getElementById('myChart2').getContext('2d');
const myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre', ],
        datasets: [{
            label: 'Avis positif',
            data: [25, 50, 40, 50, 90, 30, 70, 25, 35, 10, 20, 60],
            backgroundColor: [
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
            ],
            borderColor: [
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
                'rgba(85,107,47,0.2)',
            ],
            borderWidth: 1,
            stack: 0,
        }, {
            label: 'Avis négatif',
            data: [-25, -15, -8, -35, -20, -45, -10, -25, -5, -10, -2, -8],
            backgroundColor: [
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
            ],
            borderColor: [
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
                'rgba(255,0,0,0.2)',
            ],
            borderWidth: 1,
            stack: 0,
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});