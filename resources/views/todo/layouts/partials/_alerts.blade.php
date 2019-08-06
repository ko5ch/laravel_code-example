@if (session('success'))
    <script>
        $.growl({
            title: "Success",
            message: "{{ session('success') == 200 ? 'You successfully perform this action' : session('success') }}"
        });
    </script>
@endif