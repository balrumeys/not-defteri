<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>


<script>
    var titleElements = document.querySelectorAll('[title]');
    for (var titleElement of titleElements) {
        var tooltip = new bootstrap.Tooltip(titleElement);
    }
</script>