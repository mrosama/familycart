$(function ()
{
    'use strict';
// Launch plugin
    $("#range").ionRangeSlider({
        type: "double",
        min: 0,
        max: 1000,
        from: 200,
        to: 500,
        grid: true
    });
// Saving it's instance to var
    var slider = $("#range").data("ionRangeSlider");

    // ========================= Hide Placeholder On Form Focus =========================w
    $('[placeholder]').focus(function ()
    {
        $(this).attr('data-text', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');

    }).blur(function () {
        $(this).attr('placeholder', $(this).attr('data-text'));
    });
});



function add_to_cart(product_id)
{
    var lang = $('#lang').val();
    $.ajax({
        url: $('#base_url').val() + '/' + lang + '/addToCart',
        dataType: 'json',
        data: {p_id: product_id},
    })
            .done(function (data) {
                console.log(data);
                if (data == '')
                {
                    $('#getShoppingContent').empty();
                    if (lang == 'en')
                        $('#getShoppingContent').html('Cart is empty');
                    else
                        $('#getShoppingContent').html('سلة المشتريات فارغة');
                } else if (data['empty_qty_msg'])
                {
                    alert(data['empty_qty_msg']);
                } else
                {
                    if (lang == 'en')
                        alert('Product has been added to the basket');
                    else
                        alert('تم اضافة المنتج الى السلة');
                    $("#cart").load(location.href + " #cart");
                    $.each(JSON.parse(data), function (i, val)
                    {
                        if (lang == 'en')
                            var product = '< li >< a href = "#" >< p > < img src = "assets/img/products/img-(1).jpg" alt = "prod-img" class = "bask-img" >' + val.name_en + '< /p>' + '< p > 120 S.R < /p>< /a>< /li>';
                        else
                            var product = '< li >< a href = "#" >< p > < img src = "assets/img/products/img-(1).jpg" alt = "prod-img" class = "bask-img" >' + val.name + '< /p>' + '< p > 120 ر.س < /p>< /a>< /li>';
                        $('getShoppingContent').append(product);
                    });
                }
            })
            .fail(function () {
                console.log('add to cart error');
            });
}
function add_to_colors_cart(product_id, color_size_id)
{
    var lang = $('#lang').val();
    $.ajax({
        url: $('#base_url').val() + '/' + lang + '/addToColorCart',
        dataType: 'json',
        data: {p_id: product_id, color_size_id: color_size_id},
    })
            .done(function (data) {
                console.log(data);
                if (data == '')
                {
                    $('#getShoppingContent').empty();
                    if (lang == 'en')
                        $('#getShoppingContent').html('Cart is empty');
                    else
                        $('#getShoppingContent').html('سلة المشتريات فارغة');
                } else if (data['empty_qty_msg'])
                {
                    alert(data['empty_qty_msg']);
                } else
                {
                    if (lang == 'en')
                        alert('Product has been added to the basket');
                    else
                        alert('تم اضافة المنتج الى السلة');
                    $("#cart").load(location.href + " #cart");
                    $.each(JSON.parse(data), function (i, val)
                    {
                        if (lang == 'en')
                            var product = '< li >< a href = "#" >< p > < img src = "assets/img/products/img-(1).jpg" alt = "prod-img" class = "bask-img" >' + val.name_en + '< /p>' + '< p > 120 S.R < /p>< /a>< /li>';
                        else
                            var product = '< li >< a href = "#" >< p > < img src = "assets/img/products/img-(1).jpg" alt = "prod-img" class = "bask-img" >' + val.name + '< /p>' + '< p > 120 ر.س < /p>< /a>< /li>';
                        $('getShoppingContent').append(product);
                    });
                }
            })
            .fail(function () {
                console.log('add to cart error');
            });
}


function add_to_seller_cart(product_id, seller_id)
{
    var lang = $('#lang').val();
    $.ajax({
        url: $('#base_url').val() + '/' + lang + '/addToSellerCart',
        dataType: 'json',
        data: {p_id: product_id, s_id: seller_id},
    })
            .done(function (data) {
                console.log(data);
                if (data == '')
                {
                    $('#getShoppingContent').empty();
                    if (lang == 'en')
                        $('#getShoppingContent').html('Cart is empty');
                    else
                        $('#getShoppingContent').html('سلة المشتريات فارغة');
                } else if (data['empty_qty_msg'])
                {
                    alert(data['empty_qty_msg']);
                } else
                {
                    if (lang == 'en')
                        alert('Product has been added to the basket');
                    else
                        alert('تم اضافة المنتج الى السلة');
                    $("#cart").load(location.href + " #cart");
                    $.each(JSON.parse(data), function (i, val)
                    {
                        if (lang == 'en')
                            var product = '< li >< a href = "#" >< p > < img src = "assets/img/products/img-(1).jpg" alt = "prod-img" class = "bask-img" >' + val.name_en + '< /p>' + '< p > 120 S.R < /p>< /a>< /li>';
                        else
                            var product = '< li >< a href = "#" >< p > < img src = "assets/img/products/img-(1).jpg" alt = "prod-img" class = "bask-img" >' + val.name + '< /p>' + '< p > 120 ر.س < /p>< /a>< /li>';
                        $('getShoppingContent').append(product);
                    });
                }
            })
            .fail(function () {
                console.log('add to cart error');
            });
}

function get_product(product_id, offer_id)
{
    var lang = $('#lang').val();
    $.ajax({
        url: $('#base_url').val() + '/getProduct',
        dataType: 'json',
        data: {product_id: product_id, offer_id: offer_id},
    })
            .done(function (data) {
                //alert(data['product_rate_count']);
                if (data == '')
                {

                } else
                {
                    if (lang == 'en')
                    {
                        $('#modal_title').html(data.product_name_en);
                        $('#modal_offer').html(data.offer_name_en);
                    } else
                    {
                        $('#modal_title').html(data.product_name_ar);
                        $('#modal_offer').html(data.offer_name_ar);
                    }
                    $('#rate_number_modal').html(data.product_rate_count);
                    $('#discount_price_modal').html(data.product_discount_price);
                    $('#zoom_03').attr('src', $('#base_url').val() + '/images/products/' + data.product_image);
                    $("#add_to_cart").attr("onclick", 'add_to_cart(' + data.product_id + ')');
                    $("#product_page_modal").attr("href", $('#base_url').val() + '/' + lang + '/product/' + data.product_id);
                    $("#buy_now_modal").attr("href", $('#base_url').val() + '/' + lang + '/buy_now/' + data.product_id);
                    if (data.product_original_price)
                    {
                        $('#original_price_modal').html(data.product_original_price);
                        var save_price = data.product_original_price - data.product_discount_price;
                        var percent_price = (((data.product_original_price - data.product_discount_price) / (data.product_original_price)) * 100);
                        if ($('#lang').val() == 'en') {
                            $('#saved').html(' save ' + save_price + ' SR ' + ' ( ' + percent_price.toFixed(0) + ' % ) ');
                        } else
                        {
                            $('#saved').html('وفر ' + save_price + ' س.ر ' + ' ( ' + percent_price.toFixed(0) + ' % ) ');
                        }
                    } else
                    {
                        $('#saved').hide();
                        $('#original_price_modal').hide();
                    }


                    // stars model
                    if (data.product_rate_count == 0)
                    {
                        var stars = '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><strong>0.0</strong></li>';
                        $('#stars_model').html(stars);
                    } else if (data.product_rate_count < 2000)
                    {
                        var stars = '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><strong> 1.0 </strong></li>';
                        $('#stars_model').html(stars);
                    } else if (data.product_rate_count > 2000 && data.product_rate_count < 4000)
                    {
                        var stars = '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><strong> 2.0 </strong></li>';
                        $('#stars_model').html(stars);
                    } else if (data.product_rate_count > 4000 && data.product_rate_count < 6000)
                    {
                        var stars = '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><strong> 3.0 </strong></li>';
                        $('#stars_model').html(stars);
                    } else if (data.product_rate_count > 6000 && data.product_rate_count < 8000)
                    {
                        var stars = '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star-o"></i></li>' +
                                '<li><strong> 4.0 </strong></li>';
                        $('#stars_model').html(stars);
                    } else if (data.product_rate_count > 8000 && data.product_rate_count < 10000)
                    {
                        var stars = '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><i class="fa fa-star"></i></li>' +
                                '<li><strong> 5.0 </strong></li>';
                        $('#stars_model').html(stars);
                    }
                    $('#gallery_01').empty();
                    if (data['images'])
                    {
                        var i = 0;
                        $.each(data['images'], function (i, val)
                        {
                            if (i == 0)
                                var p_image = '<a  href="#" class="elevatezoom-gallery active" data-update="" data-image=" ' + $('#base_url').val() + '/images/products/' + val + ' " data-zoom-image=" ' + $('#base_url').val() + '/images/products/' + val + ' "><img src=" ' + $('#base_url').val() + '/images/products/' + val + ' " alt="product images "/></a>';
                            else
                                var p_image = '<a  href="#" class="elevatezoom-gallery" data-update="" data-image=" ' + $('#base_url').val() + '/images/products/' + val + ' " data-zoom-image=" ' + $('#base_url').val() + '/images/products/' + val + ' "><img src=" ' + $('#base_url').val() + '/images/products/' + val + ' " alt="product images "/></a>';
                            $('#gallery_01').append(p_image);
                        });
                    }
                }
            })
            .fail(function () {
                console.log('add to cart error');
            });
}

$('select[id="country_id"]').change(function (event) {
    var country_id = $(this).val();
    $.ajax({
        url: $('#base_url').val() + '/getCities',
        data: {country_id: country_id},
    })
            .done(function (data) {
                $('select[id="city_id"]').empty();
                if (JSON.parse(data) == '')
                {
                    if ($('#lang').val() == 'en') {
                        var empty = "There are no cities of this state";
                    } else
                    {
                        var empty = "لا يوجد مدن لهذه الدولة";
                    }
                    $('select[id="city_id"]').html('<option selected disabled>' + empty + '</option>');
                } else
                {
                    var name;
                    if ($('#lang').val() == 'en') {
                        $('select[id="city_id"]').html('<option selected disabled> Please select city....</option>');
                    } else
                    {
                        $('select[id="city_id"]').html('<option selected disabled> من فضلك اختر  المدينة....</option>');
                    }
                    $.each(JSON.parse(data), function (i, val)
                    {
                        if ($('#lang').val() == 'en') {
                            name = val.name_en;
                        } else {
                            name = val.name_ar;
                        }
                        $('select[id="city_id"]').append("<option value=" + val.id + ">" + name + "</option>");
                    });
                }
            })
            .fail(function () {
                console.log("error");
            })
            .always(function () {
                console.log("complete");
            });
});


$('select[id="quantity"]').change(function (event) {
    var qty = $(this).val();
    var product_id = $(this).parent().find('#product_id').attr('value');
    var rowId = $(this).parent().find('#rowId').attr('value');
    $.ajax({
        url: $('#base_url').val() + '/updateQuantity',
        data: {rowId: rowId, qty: qty},
    })
            .done(function (data) {
                console.log(data);
                $("#cart").load(location.href + " #cart");
                $("#cart_sum").load(location.href + " #cart_sum");
                $("#product_num").load(location.href + " #product_num");
            })
            .fail(function () {
                console.log("error");
            })
            .always(function () {
                console.log("complete");
            });
});
$('#have_pass').click(function () {
    if ($('#have_pass').is(":checked"))
    {
        $("#user_login").show();
        $("#visitor_login").hide();
    } else
    {
        $("#user_login").hide();
        $("#visitor_login").show();
    }
});

$('#gift').click(function () {
    var chargeValue = $('#chargeValue').val();
    if ($('#gift').is(":checked"))
    {
        $('#have_gift').show();
        $.ajax({
            url: $('#base_url').val() + '/AddGiftToCart',
            dataType: 'json',
        })
                .done(function (data) {
                    console.log(data);
                    if (chargeValue)
                    {
                        var total = Number(data.val) + Number(chargeValue);
                        $('#total_with_gift').html(total);
                    } else
                    {
                        $('#total_with_gift').html(data.val);
                    }
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
    } else
    {
        $('#have_gift').hide();
        $.ajax({
            url: $('#base_url').val() + '/RemoveGiftFromCart',
            dataType: 'json',
        })
                .done(function (data) {
                    console.log(data);
                    if (chargeValue)
                    {
                        var total = Number(data.val) + Number(chargeValue);
                        $('#total_with_gift').html(total);
                    } else
                    {
                        $('#total_with_gift').html(data.val);
                    }
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
    }
});
$('#fastCharge').click(function () {
    var chargeValue = $('#chargeValue').val();
    if ($('#fastCharge').is(":checked"))
    {
        $('#fast_charge').show();
        $.ajax({
            url: $('#base_url').val() + '/addFastChargeToCart',
            dataType: 'json',
        })
                .done(function (data) {
                    console.log(data);
                    location.reload();

                    //$('#total_with_gift').html(data.val);
//                    if (chargeValue)
//                    {
//                        var total = Number(data.val) + Number(chargeValue);
//                        $('#total_with_gift').html(total);
//                    } else
//                    {
//                        $('#total_with_gift').html(data.val);
//                    }
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
    } else
    {
        $('#fast_charge').hide();
        $.ajax({
            url: $('#base_url').val() + '/removeFastChargeFromCart',
            dataType: 'json',
        })
                .done(function (data) {
                    console.log(data);
                    location.reload();
                    //$('#total_with_gift').html(data.val);
//                    if (chargeValue)
//                    {
//                        var total = Number(data.val) + Number(chargeValue);
//                        $('#total_with_gift').html(total);
//                    } else
//                    {
//                        $('#total_with_gift').html(data.val);
//                    }
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
    }
});
function PrintDiv() {

    var divToPrint = document.getElementById('divToPrint');
    var popupWin = window.open();
    popupWin.document.open();
    popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
    popupWin.document.close();
}



function shippingEdit()
{
    $('#show_mobile').hide();
    $('#edit_mobile').show();
    $('#show_city').hide();
    $('#edit_city').show();
    $('#show_country').hide();
    $('#edit_country').show();
    $('#show_address').hide();
    $('#edit_address').show();
    $('#show_name').hide();
    $('#edit_name').show();
}