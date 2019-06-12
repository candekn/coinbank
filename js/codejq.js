
    $(document).ready(function()
    {


        $("#cantidadc").change(function () {
            var cantidad= $("#cantidadc").val();
            var precioc= $("#precioc").val();
            var total = precioc*cantidad
            var comision = total*0.001;
            total = total+comision;
            $("#comision").text("USD$"+comision);
            $("#total").text("USD$"+total);
        })
    });
