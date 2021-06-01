<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="js/the-datepicker.min.js"></script>
<script>
    const input = document.getElementsByClassName('custom-date');
    console.log(input);
    //let datepicker = new Array();
    for(i = 0 ; i < input.length ; i++){
        let datepicker = new TheDatepicker.Datepicker(input[i]);
        datepicker.render();
        datepicker.options.setInputFormat('d-m-Y');
        datepicker.options.setDropdownItemsLimit(1950, 2025);
        datepicker.options.setShowDeselectButton();
        datepicker.options.setShowCloseButton();
        datepicker.options.setShowResetButton();
        datepicker.options.setTitle("Date of Birth");
    }
    
    

</script>
<script>    
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }
</script>


</body>
</html>