@extends('admin.layout.master')

@section('content')
<div class="container-fluid">
	@include('admin.partials.breadcrumb')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="text-left form-group col-xl-12">
                        <button class="btn btn-primary" id="print" type="button">
                            {{ __('Print') }}
                            <i class="fa fa-print" aria-hidden="true"></i>
                        </button>
                    </div>
                    <form id="dataview" >
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <b>Pharmaxx, Inc.</b><br>
                                30590 Cochise Circle, Murrieta, CA 92563
                                <br> Tel. (951) 599-8010;
                            </div>
                            <div class="col-sm-6 row">
                                <label for="ipd" class="col-sm-2 col-form-label">IPD</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="ipd"  placeholder="IPD">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 text-center">
                            <h4>Customer Request</h4>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="product" class="col-sm-2 col-form-label">Product *</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="product" title="{{ __('Product') }}">
                                    <option value="">{{ __('None') }}</option>
                                    @foreach ($data['products'] as $product)
                                    <option value="{{ $product->name }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="customer" class="col-sm-2 col-form-label">Customer *</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="customer" title="{{ __('Customer') }}">
                                    <option value="">{{ __('None') }}</option>
                                    @foreach ($data['customers'] as $customer)
                                    <option value="{{ $customer->full_name }}">{{ $customer->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="manufatureby" class="col-sm-2 col-form-label">Manufature by:</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="manufatureby">
                                    <option value="Pharmaxx">Pharmaxx</option>
                                    <option value="I.P.D (Ampharco USA)">I.P.D (Ampharco USA)</option>
                                    <option value="Exxelife">Exxelife</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">Address:</label>
                            <div class="col-sm-8">
								<textarea name="address" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="po" class="col-sm-2 col-form-label">P.O.</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="po">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="formula" class="col-sm-2 col-form-label">Formula</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="formula" title="{{ __('Customer') }}">
                                    <option value="">{{ __('None') }}</option>
                                    @foreach ($data['formulas'] as $formula)
                                    <option value="{{ $formula->name }}">{{ $formula->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="revision" class="col-sm-2 col-form-label">Revision</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="revision">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="date" class="col-sm-2 col-form-label">Date *</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control date" name="date">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 text-center">
                            <h5>Specification</h5>
                            </div>
                        </div>
                        <div class="row form-group ">
                            <label for="date" class="col-sm-2 col-form-label">Dosage form:*</label>
                            <div class="col-sm-4">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="softgel" class="form-check-input">Softgel
                                    </label>
                                    </div>
                                    <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="tablet" class="form-check-input">Tablet
                                    </label>
                                    </div>
                                    <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox"  name="hardcapsule" class="form-check-input">Hardcapsule
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="size" class="col-sm-2 col-form-label">Size/Type</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="size">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="color" class="col-sm-2 col-form-label">Color/Logo</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="color">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="filling" class="col-sm-2 col-form-label">Filling Wt</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="filling">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">Order * </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="order">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                            <h5>Formulary Specification</h5>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="wtmg">
                            </div>
                            <label for="wtmg" class="col-sm-2 col-form-label">Wt (mg) </label>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-8">
                                <select class="form-control" name="ingredient"  title="Choose Ingredient">
                                    <option value="">None</option>
                                    <optgroup label="Active">
                                    @foreach ($data['ingredients'] as $ingredient)
                                    @if ($ingredient->inactive == 0)
                                        <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                    @endif
                                    @endforeach
                                    </optgroup>
                                    <optgroup label="InActive">
                                    @foreach ($data['ingredients'] as $ingredient)
                                    @if ($ingredient->inactive == 1)
                                        <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                    @endif
                                    @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <a href="javascript:;" id="add-ingredient" title="Add Ingredient" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Add</a>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-10">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Ingredients *</th>
                                            <th>per Serving *</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-active">
                                    </tbody>
                                    <tbody id="data-inactive">
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                            <h5>Comments or Additional Instructions</h5>
                            </div>
                        </div>
						 <div class="row form-group">
                            <div class="col-sm-8">
                                <select class="form-control" name="comment"  title="Choose Comment">
                                    <option value="">None</option>
                                    @foreach ($data['comments'] as $comments)
                                        <option value="{{ $comments->id }}">{{ $comments->content }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <a href="javascript:;" id="add-comment" title="Add Comment" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Add</a>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-10">
                                <table class="table table-bordered">
                                    <tbody id="data-comments">
                                    </tbody>
                                   
                                </table>
                            </div>
                            
                        </div>
                    </form>
                    <form id="dataprint" class="d-none">
                        <div style="display: flex;">
                            <div style="margin-right: 12rem; width: 18rem;">
                                <b>Pharmaxx, Inc.</b><br>
                                    30590 Cochise Circle, Murrieta, CA 92563
                                    <br> Tel. (951) 599-8010;
                            </div>
                            <div>
                                <b>IPD: <span class="ipdprint"></span></b>
                            </div>
                        </div>
                        <div >
                            <div style="text-align: center">
								<h4>Customer Request</h4>
                            </div>
                        </div>
                        <div >
                            <div >Product: <span class="productprint"></span> </div>
                        </div>
                        <div >
                            <div>Customer: <span class="customerprint"></span></div>
                        </div>
                        <div>
                            <div>Manufature by: <span class="manufaturebyprint"></span> </div> 
                        </div>
                        <div>
                            <div >Address: <span class="addressprint"></span> </div>
                        </div>
                        <div >
                            <div>P.O.: <span class="poprint"></span> </div> 
                        </div>
                        <div >
                            <div>Formula: <span class="formulaprint"></span> </div> 
                        </div>
                        <div>
                            <div >Revision: <span class="revisionprint"></span> </div>
                        </div>
                        <div >
                            <div >Date: <span class="dateprint"></span> </div>
                        </div>
                        <div >
                            <div style="text-align: center">
                            <h5>Specification</h5>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div>Dosage form: </div>
                            <div>
                                <input type="checkbox" name="softgelprint" >Softgel
                            </div>
                            <div>
                                <input type="checkbox" name="tabletprint">Tablet
                            </div>
                            <div>
                                <input type="checkbox" name="hardcapsuleprint">Hardcapsule
                            </div>
                        </div>
                        <div>
                            <div>Size/Type: <span class="sizeprint"></span> </div>
                        </div>
                        <div>
                            <div>Color/Logo: <span class="colorprint"></span> </div>
                        </div>
                        <div>
                            <div>Filling Wt: <span class="fillingprint"></span></div> 
                        </div>
                        <div>
                            <div >Order: <span class="orderprint"></span> </div>
                        </div>
                        <div>
                            <div >
                            <h5>Formulary Specification</h5>
                            </div>
                        </div>
                        <div>
                            <div></div>
                            <div><span class="wtmgprint"></span> Wt (mg) </div>
                        </div>
                        <div>
                            <div>
                                <table style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Ingredients *</th>
                                        <th>per Serving *</th>
                                    </tr>
                                    </thead>
                                    <tbody id="data-active-print">
                                    </tbody>
                                    <tbody id="data-inactive-print">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            <div>
                            <h5>Comments or Additional Instructions</h5>
                            </div>
                        </div>
                        <div>
                            <div>
                                <table style="width: 100%">
                                    <tbody id="data-comments-print">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function() {
        var formDataView = $("#dataview");
        var formDataPrint = $("#dataprint");
        var dataIng =  {!! json_encode($data['ingredients']->toArray()) !!}; 
        var dataTableIng = [];
		var dataComments =  {!! json_encode($data['comments']->toArray()) !!}; 
        var dataTableComments = [];

		/* Init datetime */
        $('.date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10)
        });

        $("#print").click(function(){
            setDataIntoFormPrint();
        });

		/* Process table ingredient */
        $("#add-ingredient").click(function(){
            var ingredient = formDataView.find("select[name=ingredient]").val();

            if (ingredient == "") {
                toastr.error('{{ __('The ingredient not empty.') }}');
               return false;
            }
            
            if (checkItemExistArray(dataTableIng, ingredient)) {
                toastr.error('{{ __('The ingredient exist.') }}');
                return false;
            }

            $.each(dataIng , function(index, item) { 
                if (item.id == ingredient) {
                    dataTableIng.push(item);
                }
            });
            addRowTableIngredients(dataTableIng);
            formDataView.find("select[name=ingredient]").val("");
        });

        $(document).on('click', "a.delingredient", function() {
            var idR = $(this).data('id');
            var arrayTemp = dataTableIng;
            for (var i = 0 ; i < arrayTemp.length; i++) {
                if (arrayTemp[i].id == Number(idR)) {
                    dataTableIng.splice(i, 1);
                }
            }
            addRowTableIngredients(dataTableIng);
        });
		/* end */

		/* Process table Comments*/
		$("#add-comment").click(function(){
            var comment = formDataView.find("select[name=comment]").val();

            if (comment == "") {
                toastr.error('{{ __('The comment not empty.') }}');
               return false;
            }
            
            if (checkItemExistArray(dataTableComments, comment)) {
                toastr.error('{{ __('The comment exist.') }}');
                return false;
            }

            $.each(dataComments , function(index, item) { 
                if (item.id == comment) {
                    dataTableComments.push(item);
                }
            });
            addRowTableComments(dataTableComments);
            formDataView.find("select[name=comment]").val("");
        });

        $(document).on('click', "a.delcomment", function() {
            var idR = $(this).data('id');
            var arrayTemp = dataTableComments;
            for (var i = 0 ; i < arrayTemp.length; i++) {
                if (arrayTemp[i].id == Number(idR)) {
                    dataTableComments.splice(i, 1);
                }
            }
            addRowTableComments(dataTableComments);
        });
		/* end */
    }); 

    var setDataIntoFormPrint = function() {
		var formDataView = $("#dataview");
		var formDataPrint = $("#dataprint");

		var ipd = formDataView.find("input[name=ipd]").val();
		var product = formDataView.find("select[name=product]").val();
		var customer = formDataView.find("select[name=customer]").val();
		var manufatureby = formDataView.find("select[name=manufatureby]").val();
		var address = formDataView.find("textarea[name=address]").val();
		var po = formDataView.find("input[name=po]").val();
		var formula = formDataView.find("select[name=formula]").val();
		var revision = formDataView.find("input[name=revision]").val();
		var date = formDataView.find("input[name=date]").val();

		if ($('input[name=softgel]').is(":checked")) {
            formDataPrint.find('input[name=softgelprint]').attr('checked','checked');
        }
        if ($('input[name=tablet]').is(":checked")) {
			 formDataPrint.find('input[name=tabletprint]').attr('checked','checked');
        }
        if ($('input[name=hardcapsule]').is(":checked")) {
			 formDataPrint.find('input[name=hardcapsuleprint]').attr('checked','checked');
        }
		var size = formDataView.find("input[name=size]").val();
		var color = formDataView.find("input[name=color]").val();
		var filling = formDataView.find("input[name=filling]").val();
		var order = formDataView.find("input[name=order]").val();
		var wtmg = formDataView.find("input[name=wtmg]").val();

		formDataPrint.find(".ipdprint").html(ipd);
		formDataPrint.find(".productprint").html(product);
		formDataPrint.find(".customerprint").html(customer);
		formDataPrint.find(".manufaturebyprint").html(manufatureby);
		formDataPrint.find(".addressprint").html(address);
		formDataPrint.find(".poprint").html(po);
		formDataPrint.find(".formulaprint").html(formula);
		formDataPrint.find(".revisionprint").html(revision);
		formDataPrint.find(".dateprint").html(date);
		formDataPrint.find(".sizeprint").html(size);
		formDataPrint.find(".colorprint").html(color);
		formDataPrint.find(".fillingprint").html(filling);
		formDataPrint.find(".orderprint").html(order);
		formDataPrint.find(".wtmgprint").html(wtmg);

        print("dataprint");
    }
    
    var print = function(elm) {
        var divToPrint=document.getElementById(elm);
        var newWin=window.open('','Print-Window');
        newWin.document.open();
        newWin.document.write('<html><head><style> table th { border: 1px solid #dee2e6; } table td { border: 1px solid #dee2e6; } div span { margin-left: 30px; } </style></head><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
        newWin.document.close();
        setTimeout(function(){newWin.close();},10);
    }

    var addRowTableIngredients = function(data) {
        $("#data-active, #data-inactive, #data-active-print, #data-inactive-print").html("");
        var strActive = "";
        var strInActive = "<tr><th colspan='4'>Inactive Ingredients</th></tr>";
		var strActivePrint = "";
        var strInActivePrint = "<tr><th colspan='4' style='text-align: left'>Inactive Ingredients</th></tr>";

        var num = 1;
        for (var i = 0; i < data.length; i++) {

            if (data[i].inactive == 0) {
                strActive += "<tr><td>" + num  + "</td><td>" + data[i].name + "</td><td>" + data[i].per_serving + "</td><td class='text-center'> <a href='javascript:;' data-id='" + data[i].id + "' class='delingredient' title='Delete Item'><i class='fa fa-lg fa-trash' aria-hidden='true'></i></a> </td></tr>";
                strActivePrint += "<tr><td>" + num  + "</td><td>" + data[i].name + "</td><td>" + data[i].per_serving + "</td></tr>";
                num++;
            }
        }
        for (var i = 0; i < data.length; i++) {
            
            if (data[i].inactive == 1) {
                strInActive += "<tr><td>" + num  + "</td><td>" + data[i].name + "</td><td>" + data[i].per_serving + "</td><td class='text-center'> <a href='javascript:;' data-id='" + data[i].id + "' class='delingredient' title='Delete Item'><i class='fa fa-lg fa-trash' aria-hidden='true'></i></a> </td></tr>"
                strInActivePrint += "<tr><td>" + num  + "</td><td>" + data[i].name + "</td><td>" + data[i].per_serving + "</td></tr>"
                num++;
            }
        }
        $("#data-active").html(strActive);
        $("#data-inactive").html(strInActive);
		$("#data-active-print").html(strActivePrint);
        $("#data-inactive-print").html(strInActivePrint);
    }

	var addRowTableComments = function(data) {
        $("#data-comments, #data-comments-print").html("");
        var str = "";
		var strPrint = "";

        for (var i = 0; i < data.length; i++) {
            str += "<tr><td>" + (i + 1)  + "</td><td>" + data[i].content + "</td><td class='text-center'> <a href='javascript:;' data-id='" + data[i].id + "' class='delcomment' title='Delete Item'><i class='fa fa-lg fa-trash' aria-hidden='true'></i></a> </td></tr>";
            strPrint += "<tr><td>" + (i + 1)  + "</td><td>" + data[i].content + "</td></tr>";
        }
       
        $("#data-comments").html(str);
		$("#data-comments-print").html(strPrint);
    }

    var checkItemExistArray = function(array, id) {
        var res = false;
        $.each(array , function(index, item) { 
            if (item.id == id) {
                res = true;
                return false;
            }
        });
        return res;
    }
</script>
@endsection