/**
 * Created by User on 23.01.2016.
 */


$(function () {
    //  $('[data-toggle="popover"]').popover()

    $('[data-toggle="popover"]').popover()

    $(".phone").mask("+7(999) 999-99-99");
    $(".date_picker").mask("99.99.9999");

    $.datepicker.setDefaults($.extend(
            $.datepicker.regional["ru"])
    );

    // $( ".date_picker" ).datepicker("option", "dateFormat", "mm.dd.yy");
    $( ".date_picker" ).datepicker({changeMonth: true, changeYear: true, yearRange: '1900:2020'});
    // $.datepicker.setDefaults($.datepicker.regional['ru']); // для французского языка


    $('.famlspan').hover(
        function() {
            $('.famlspan').popover('show')
        }, function() {
            $('.famlspan').popover('hide')
        }
    );

    /* $.validate({

     onError : function($form) {
     alert('Validation of form '+$form.attr('id')+' failed!');
     },
     onSuccess : function($form) {
     alert('The form '+$form.attr('id')+' is valid!');
     return false; // Will stop the submission of the form
     },
     onValidate : function($form) {
     return {
     element : $('#some-input'),
     message : 'This input has an invalid value for some reason'
     }
     },
     onElementValidate : function(valid, $el, $form, errorMess) {
     console.log('Input ' +$el.attr('name')+ ' is ' + ( valid ? 'VALID':'NOT VALID') );
     }
     });

     $('input')
     .on('beforeValidation', function() {
     console.log('Input "'+this.name+'" is about to become validated');
     })
     .on('validation', function(evt, valid) {
     console.log('Input "'+this.name+'" is ' + (valid ? 'VALID' : 'NOT VALID'));
     });*/


    /*Фиксация корзины*/
    $(window).scroll(function () {
        var w = window.innerWidth;      

        var wh=(w-1000)/2;
        if ($(this).scrollTop() > 200) {
            $('.cart_div').css('position','fixed');
            $('.cart_div').css('right',(wh+12)+'px');

        } else {
            $('.cart_div').css('position','initial');
        }
    });


})


function Scroll(id) {
    $("html, body").animate({scrollTop: ($('#' + id).offset().top-80)}, 1000);
}


$(function () {
    console.log("ready!");
    /*выбор пакета*/
    $(".prodpocket").click(function () {
        $('.prodpocket').removeClass('active');
        $(this).addClass('active');
        $('.pordform').fadeIn();
        $('.card').attr('pocket', $(this).attr('pocket'));
        $('#pocket').val($(this).attr('pocket'));
        Scroll('prodpocket');
        $(".cart_div").fadeIn();
    });
    $("#agreement").click(function () {

    });


});


/*Маска ввода телефона*/



/*Класс обслуживающий сайт*/
var John = [];

John.ShowCart = function()
{
    var s = $('#productForm').serializeArray();
    console.info(s);
    $.ajax({
        type: 'GET',
        url: 'ajax.html',
        data: s,
        dataType :'json',
            success: function (data) {
                $('.card').html(data.cart);
                $('#tplInsurer').html(data.Insurer);

        },
        error: function (xhr, str) {
            console.info('Возникла ошибка: ' + xhr.responseCode);
        }
    });
}


John.tplInsurer = function()
{
    $.get(
        "ajax.html",
        {
            //log1:1,
            action: "tplInsurer"
        },
        function (data) {
            $('#tplInsurer').html(data);
        }, "html"
    ); //$.get  END*/
}

John.SelectInsurer = function()
{

}

/*При изменение ввода застрахованного*/
John.ChangeInput = function () {

    $('#action').val('AddInsured');
    console.info('ChangeInput');
    /*Собираем данные с формы*/
    John.ShowCart();

}





John.tplInsureInput = function () {
    var id = parseInt($('.insurBox').attr('count'));
    id++;
    $('.insurBox').attr('count', id);
    $('#ins_count').val(id);
    $.get(
        "ajax.html",
        {
            //log1:1,
            action: "tplInsureInput"
            , id: id


        },
        function (data) {
            $(".insurBox").append(data);

            $(".phone").mask("+7(999) 999-99-99");
            $(".date_picker").mask("99.99.99");

            $.datepicker.setDefaults($.extend(
                    $.datepicker.regional["ru"])
            );
            $( ".date_picker" ).datepicker();


        }, "html"
    ); //$.get  END*/
}


John.DeleteInsured = function (id) {
    $('#ins_' + id).remove();
    $.get(
        "ajax.html",
        {
            //log1:1,
            action: "tplCart"


        },
        function (data) {
          John.ShowCart();
        }, "html"
    ); //$.get  END
}


/*Добавить застрахованного*/
John.AddInsured = function () {
    console.info('AddInsured');

    John.tplInsureInput();


    var i_fio = $("#i_fio").val();
    var i_name = $("#i_name").val();
    var i_lastname = $("#i_lastname").val();
    var i_birthday = $("#i_birthday").val();
    var pocket = $('.card').attr('pocket');

    /*
     $.get(
     "ajax.html",
     {
     //log1:1,
     action: "AddInsured"
     ,i_fio: i_fio
     ,i_name: i_name
     ,i_lastname: i_lastname
     ,i_birthday: i_birthday
     ,pocket:pocket

     },
     function (data)
     {
     $(".card").html(data);
     }, "html"
     ); //$.get  END*/

}

/*Добавляет страхующего*/
John.AddU = function () {
    console.info('AddInsured');
    var u_lastname = $("#i_fio").val();
    var u_name = $("#u_name").val();
    var u_surname = $("#u_surname").val();
    var u_birthday = $("#u_birthday").val();

    $.get(
        "ajax.html",
        {
            //log1:1,
            action: "AddU"
            , u_lastname: u_lastname
            , u_name: u_name
            , u_surname: u_surname
            , u_birthday: u_birthday

        },
        function (data) {
            $(".ship-modal").html(data);
        }, "html"
    ); //$.get  END

}

John.ShowList = function () {
    $('.strAddHidden').toggle();
}

/*Показывает корзину*/


/*Добавить того кто срахует*/
John.strUserAdd = function () {

}

/*Подтеврждени переход в commit*/

John.NextStep = function () {
    $('#NextStep').button('loading');
    $('#action').val('NextStep');
    /*Собираем данные с формы*/
    var s = $('#productForm').serializeArray();

    /*Валидация*/

    s.forEach(function(item, i, arr) {
        console.info( i, item  );
    });
    //console.info(s);

    $.ajax({
        type: 'GET',
        url: 'ajax.html',
        data: s,
        success: function (data) {
            window.location.href = "/cart.html"

        },
        error: function (xhr, str) {
            alert('Возникла ошибка: ' + xhr.responseCode);
            $('#NextStep').button('reset');
        }
    });

}


/*Отработка огласия*/
John.Agreement = function()
{
    var agreement = parseInt($("#agreement").val());
    if(agreement==1)
    {
        $('#agreement_img').attr('src','/img/chk-empty.jpg');
        $("#agreement").val(0);
    }
    else
    {
        $('#agreement_img').attr('src','/img/chk-close.jpg');
        $("#agreement").val(1);
    }
}


John.AnoverPerson = function()
{
    $('.strAddHidden').hide();
    $('.AnoverPerson').fadeIn();
    $('#u_lastname').val('');
    $('#u_name').val('');
    $('#u_lastname').val('');
    $('#u_surname').val('');
    $('#u_birthday').val('');
}



John.SelectInsurer  =function(insurer)
{

    $('.srusertoptext').html($('#insurer_'+insurer).html());
    $('#u_lastname').val($("input[name=ins_FIO_"+insurer+"]").val());
    $('#u_name').val($("input[name=ins_name_"+insurer+"]").val());
    $('#u_lastname').val($("input[name=ins_lastname_"+insurer+"]").val());
    $('#u_surname').val($("input[name=ins_lastname_"+insurer+"]").val());
    $('#u_birthday').val($("input[name=ins_birthday_"+insurer+"]").val());
    John.ShowList();
}