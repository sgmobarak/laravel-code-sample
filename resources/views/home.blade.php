@extends('layouts.master')
@section('title', strtoupper($title))
@section('content')
<div class="starter-template">
    <h1>Products</h1>
    <div id="formProduct">
        <form id="frmProductSave" class="form-inline" 
              action="{{route("post.json.save.product")}}">
            <fieldset>
                <div class="form-group">
                    <label for="inputTitle">Title</label>
                    <br/>
                    <input type="text" class="form-control" 
                           id="inputTitle" name="inputTitle" 
                           placeholder="e.g. Apple iPod" required />
                </div>
                <div class="form-group">
                    <label for="inputStock">Stock</label>
                    <br/>
                    <input type="text" class="form-control" 
                           id="inputStock" name="inputStock"
                           placeholder="e.g. 25" required />
                </div>
                <div class="form-group">
                    <label for="inputUnitPrice">Unite Price</label>
                    <br/>
                    <input type="text" class="form-control" 
                           id="inputUnitPrice" name="inputUnitPrice" 
                           placeholder="e.g. 99.99" required />
                </div>
                <div class="form-group">
                    <label>&nbsp;</label>
                    <br/>
                    <button id="btnSave" type="submit" 
                            class="btn btn-default">Save</button>
                </div>
            </fieldset>
        </form>
    </div>
    <h4 class="lead">Total <span id="itemsCounter">0</span> Found</h4>
    <div id="productList">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Create Time</th>
                    <th>Title</th>
                    <th class="text-right">Stock</th>
                    <th class="text-right">Price</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody id="tbodyProductList">

            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ajaxComplete(function (event, xhr, settings) {
        var _token = xhr.responseJSON.csrfToken;
        $('meta[name="csrf-token"]').attr('content', _token);
        $('input[name="_token"]').val(_token);
    });
    var urlProducts = '<?php echo route('get.json.products'); ?>';
    var markup = "<tr>\n\
                    <td>${formatDate(formattedDate)}</td>\n\
                    <td>${title}</td>\n\
                    <td class=\"text-right\">${accounting.formatMoney(stock)}</td>\n\
                    <td class=\"text-right\">${accounting.formatMoney(price)}</td>\n\
                    <td class=\"text-right\">${accounting.formatMoney(total)}</td>\n\
                </tr>";
    /* Compile the markup as a named template */
    $.template("productRow", markup);
    function formatDate(date) {
        return date;
    }

    function getProducts() {
        $.ajax({
            dataType: "json",
            url: urlProducts,
            success: function (data) {
                /* Get the products array from the data */
                var items = data.items;

                $("#itemsCounter").html(items.length);
                /* Remove current items */
                $("#tbodyProductList").empty();
                /* Render the template items */
                $.tmpl("productRow", items)
                        .appendTo("#tbodyProductList");
            },
            error: function () {
                alert('Error while loading record')
            }
        });
    }

    getProducts();
    $("#frmProductSave").submit(function () {
        var form = $(this);
        var fields = form.find('fieldset');
        var handler = $("#btnSave");

        var d = {};
        d.title = $("#inputTitle").val();
        d.stock = $("#inputStock").val();
        d.unitPrice = $("#inputUnitPrice").val();

        handler.html("Saving...");
        fields.attr('disabled', true);
        var jqxhr = $.ajax({
            type: "post",
            dataType: "json",
            url: form.attr('action'),
            data: d,
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                $("#inputTitle").val("");
                $("#inputStock").val("");
                $("#inputUnitPrice").val("");
                //alert('Record saved successfully');
                getProducts();
            },
            error: function () {
                alert('Error while saving record');
            },
            complete: function () {
                handler.html("Save");
                fields.attr('disabled', false);
            }
        });

        return false;
    });
</script>
@stop