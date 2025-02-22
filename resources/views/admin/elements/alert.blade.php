<div class="card-body">
    @if (session('success'))
        <div id="success-message" class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div id="error-message" class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
</div>


<script>
    $(document).ready(function() {
        // Fade out the success message after 3 seconds
        setTimeout(function() {
            $('#success-message').fadeOut('slow');
        }, 3000);

       
        setTimeout(function() {
            $('#error-message').fadeOut('slow');
        }, 3000);
    });
</script>