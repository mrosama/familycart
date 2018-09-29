$('select[id="section_id"]').change(function (event) {
    $.ajax({
        url: $('#base_url').val() + '/getBranches',
        data: {id: $(this).val()},
    })
            .done(function (data) {
                $('select[id="branch_id"]').empty();
                if (JSON.parse(data) == '')
                {
                    var empty = "لا يوجد اقسام فرعية لهذا القسم";
                    $('select[id="branch_id"]').html('<option selected disabled>' + empty + '</option>');
                } else
                {
                    $('select[id="branch_id"]').html('<option selected disabled> من فضلك اختر القسم الفرعي</option>');
                    $.each(JSON.parse(data), function (i, val)
                    {
                        $('select[id="branch_id"]').append("<option value=" + val.id + ">" + val.name_ar + "</option>");
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


$('select[id="branch_id"]').change(function (event) {

    $.ajax({
        url: $('#base_url').val() + '/getTypes',
        data: {id: $(this).val()},
    })
            .done(function (data) {
                $('select[id="type_id"]').empty();
                if (JSON.parse(data) == '')
                {
                    var empty = "لا يوجد  انواع لهذا الفرع";
                    $('select[id="type_id"]').html('<option selected disabled>' + empty + '</option>');
                } else
                {
                    $('select[id="type_id"]').html('<option selected disabled> من فضلك اختر النوع </option>');
                    $.each(JSON.parse(data), function (i, val)
                    {
                        $('select[id="type_id"]').append("<option value=" + val.id + ">" + val.name_ar + "</option>");
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


$('select[id="type_id"]').change(function (event) {
    $.ajax({
        url: $('#base_url').val() + '/getBrands',
        data: {id: $(this).val()},
    })
            .done(function (data) {
                $('select[id="brand_id"]').empty();
                if (JSON.parse(data) == '')
                {
                    var empty = "لا يوجد ماركات مضافة مسبقا ";
                    $('select[id="brand_id"]').html('<option selected disabled>' + empty + '</option>');
                } else
                {
                    $('select[id="brand_id"]').html('<option selected disabled> من فضلك اختر الماركة </option>');
                    $.each(JSON.parse(data), function (i, val)
                    {
                        $('select[id="brand_id"]').append("<option value=" + val.id + ">" + val.name_ar + "</option>");
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


$('#more_colors').click(function (event) {
    var color_id = $('#color_id').val();
    if (color_id == "")
    {
        alert('يجب اختيار اللون الاساسي اولا !');
        return false;
    }
    $.ajax({
        url: $('#base_url').val() + '/getColors',
    })
            .done(function (data) {
                console.log(data);
                if (JSON.parse(data) == '')
                {
                } else
                {
                    var color_new = '<div class="form-group"><label class="control-label col-md-3"> </label><div class="col-md-6"><select name="more_colors[]" class="form-control"><option selected disabled> من فضلك اختر اللون </option>';
                    $.each(JSON.parse(data), function (i, val)
                    {
                        color_new += '<option value=' + val.id + '>' + val.name_ar + '</option>';
                    });
                    color_new += '</select></div></div>';
                    $('#more_colors_place').append(color_new);
                }
            })
            .fail(function () {
                console.log("error");
            })
            .always(function () {
                console.log("complete");
            });
});

$('#more_sizes').click(function (event) {
    var size_id = $('#size_id').val();
    if (size_id == "")
    {
        alert('يجب اختيار الحجم الاساسي اولا !');
        return false;
    }
    $.ajax({
        url: $('#base_url').val() + '/getSizes',
    })
            .done(function (data) {
                console.log(data);
                if (JSON.parse(data) == '')
                {
                } else
                {
                    var size_new = '<div class="form-group"><label class="control-label col-md-3"> </label><div class="col-md-6"><select name="more_sizes[]" class="form-control"><option selected disabled> من فضلك اختر الحجم </option>';
                    $.each(JSON.parse(data), function (i, val)
                    {
                        size_new += '<option value=' + val.id + '>' + val.name + '</option>';
                    });
                    size_new += '</select></div></div>';
                    $('#more_sizes_place').append(size_new);
                }
            })
            .fail(function () {
                console.log("error");
            })
            .always(function () {
                console.log("complete");
            });
});


$('.delete_color').click(function (event) {

    if (confirm("هل انت متاكد من عملية الحذف?")) {
        $.ajax({
            url: $('#base_url').val() + '/deleteProductColor',
            data: {product_color_id: $(this).val()},
        })
                .done(function (data) {
                    console.log(data);
                    $("#extra_colors").load(location.href + " #extra_colors");
                })
    }
    return false;

});

$('.delete_size').click(function (event) {
    alert($(this).val());
});



$('#addMoreImages').click(function (event) {
    var moreFile = '<input type="file" name="more_images[]" /><br>';
    $('#more_images').append(moreFile);
});



$('#color').click(function () {
    if ($('#color').is(":checked"))
    {
        $('#color_id').show();
    } else
    {
        $('#color_id').hide();
    }
});
$('#size').click(function () {
    if ($('#size').is(":checked"))
    {
        $('#size_id').show();
    } else
    {
        $('#size_id').hide();
    }
});