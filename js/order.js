/**
 * Created by User on 21.04.2016.
 */
Order = []


Order.OrderPay = function ()
{
    $('#payButton').button('loading');
    var agreement = parseInt($("#agreement").val());

    if(agreement==0)
    {
        $('.infostext.error').css('color','#bd1e2c');
        $('#payButton').button('reset');
    }
    else
    {
        $.get(
            "ajax-order.html",
            {
                //log1:1,
                action: "Commit"
            },
            function (data) {
                if(data.error==0)
                {
                    //window.location.href = "/thx.html";
                }
                else
                {
                    $('#payButton').button('reset');
                }


            }, "json"
        ); //$.get  END
    }
}