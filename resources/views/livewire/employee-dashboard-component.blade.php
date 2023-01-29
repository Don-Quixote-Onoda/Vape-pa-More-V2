<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <h1>Dashboard Component</h1>
    <button type="button" class="btn btn-secondary sample-log">Click Me!</button>


    <script>

        $(document).ready(function() {
            $('.sample-log').on('click', function(e) {
                e.preventDefault();
                console.log('its working');
            });
        });

    </script>
</div>
