<!-- App js -->
<script src="{{asset('admin/assets/js/vendor.min.js')}}"></script>
<script src="{{asset('admin/assets/js/app.js')}}"></script>

<script>
    document.getElementById('changeStatusBtn').addEventListener('click', function() {

        fetch('{{ route("status.toggle") }}', {
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




