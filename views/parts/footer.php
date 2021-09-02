
<footer>
    <div class="navfooter">     
      <img src="..\assets\img\rainbow-icon.gif" alt="arc-en-ciel" class="imgfooter">
      <h3>Vive la COGIP !</h3>
      </div>
</footer>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!--        <link rel="stylesheet" href="assets/css/reset.css">-->

<!-- Abdelilah : add for date, please don't delete it -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#invoice_date" ).datepicker({
            defaultDate: "",
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: "yy-mm-dd"
        });
    } );

    function prependF(elem) {
        let val = elem.value;
        if(!val.match(/^F/)) {
            elem.value = "F" + val;
        }
    }
</script>
<!--        Abdelilah : add for date -->

</body>
</html>
