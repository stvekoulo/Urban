<!-- App js -->
<script src="{{ asset('admin/assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/app.js') }}"></script>

<script>
    document.getElementById('changeStatusBtn').addEventListener('click', function() {

        fetch('{{ route('status.toggle') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur lors du changement de statut');
                }
                return response.json();
            })
            .then(data => {

                location.reload();
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
    });
</script>

<script>
    var startDateInput = document.getElementById('start_date');
    var endDateInput = document.getElementById('end_date');
    var displayStartDate = document.getElementById('display_start_date');
    var displayEndDate = document.getElementById('display_end_date');


    startDateInput.addEventListener('input', updateDisplayStartDate);
    endDateInput.addEventListener('input', updateDisplayEndDate);


    function updateDisplayStartDate() {
        displayStartDate.textContent = startDateInput.value;
    }


    function updateDisplayEndDate() {
        displayEndDate.textContent = endDateInput.value;
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var sparklineData = [5, 8, 9, 12, 8, 10, 7, 9, 11, 13];


        var sparklineOptions = {
            type: 'line',
            data: {
                labels: Array.from({
                    length: sparklineData.length
                }, (_, i) => i + 1), // Utiliser des étiquettes numérotées
                datasets: [{
                    data: sparklineData,
                    borderColor: '#00aabb',
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    pointRadius: 3,
                    pointBackgroundColor: '#ff0000',
                    pointBorderColor: '#ff0000',
                    pointHoverRadius: 4,
                    pointHoverBackgroundColor: '#00aabb',
                    pointHoverBorderColor: '#00aabb',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                },
                scales: {
                    xAxes: [{
                        display: false,
                    }],
                    yAxes: [{
                        display: false,
                    }],
                },
                tooltips: {
                    enabled: false,
                },
            }
        };

        var ctx = document.getElementById('sparkline1').getContext('2d');


        new Chart(ctx, sparklineOptions);
    });
</script>

@if (Request::is('agent/home'))
    <script>
        $(function() {
            // Données des transactions d'hier et d'aujourd'hui
            var yesterdayTransactions = {{ $servicesPayesYesterday }};
            var todayTransactions = {{ $servicesPayesToday }};

            // Initialisation du graphique en aire
            Morris.Area({
                element: 'morris-area-example',
                data: [{
                        y: 'Hier',
                        a: yesterdayTransactions,
                        b: 0
                    },
                    {
                        y: 'Aujourd\'hui',
                        a: 0,
                        b: todayTransactions
                    },
                ],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Hier', 'Aujourd\'hui'],
                lineColors: ['#4a81d4', '#f1556c'],
                pointFillColors: ['#ffffff'],
                lineWidth: 2,
                resize: true,
                parseTime: false
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.querySelector('.service-table');
            const rows = table.querySelectorAll('tbody tr');
            const previousBtn = document.querySelector('.previous-btn');
            const nextBtn = document.querySelector('.next-btn');
            let currentIndex = 0;
            const pageSize = 5;

            function showPage(pageIndex) {
                const start = pageIndex * pageSize;
                const end = Math.min(start + pageSize, rows.length);

                rows.forEach((row, index) => {
                    row.style.display = (index >= start && index < end) ? '' : 'none';
                });
            }

            showPage(currentIndex);

            previousBtn.addEventListener('click', function() {
                currentIndex = Math.max(0, currentIndex - 1);
                showPage(currentIndex);
            });

            nextBtn.addEventListener('click', function() {
                currentIndex = Math.min(Math.ceil(rows.length / pageSize) - 1, currentIndex + 1);
                showPage(currentIndex);
            });
        });
    </script>
@endif
