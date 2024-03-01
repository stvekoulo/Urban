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
                                                
    document.addEventListener('DOMContentLoaded', function () {
        var sparklineData = [5, 8, 9, 12, 8, 10, 7, 9, 11, 13];

    
        var sparklineOptions = {
            type: 'line',
            data: {
                labels: Array.from({ length: sparklineData.length }, (_, i) => i + 1), // Utiliser des étiquettes numérotées
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