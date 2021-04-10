<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="js/the-datepicker.min.js"></script>
<script src="js/clock.js"></script>
<script>
    const input = document.getElementById('floatingDob');
    const datepicker = new TheDatepicker.Datepicker(input);
    datepicker.render();
    datepicker.options.setInputFormat('j-F-Y');
    datepicker.options.setDropdownItemsLimit(1950, 2025);
    datepicker.options.setShowDeselectButton();
    datepicker.options.setShowCloseButton();
    datepicker.options.setShowResetButton();
    datepicker.options.setTitle("Date of Birth");

</script>


</body>
</html>