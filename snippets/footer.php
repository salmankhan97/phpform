<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="js/the-datepicker.js"></script>
<script src="js/clock.js"></script>

<script>
    const input = document.getElementById('floatingDob');
    const datepicker = new TheDatepicker.Datepicker(input);
    datepicker.render();
    datepicker.options.setShowDeselectButton();
    datepicker.options.setDropdownItemsLimit(1900, 2025);
    datepicker.options.setShowCloseButton();
    datepicker.options.setShowResetButton();
    datepicker.options.setInputFormat("d-m-y");
</script>

</body>
</html>