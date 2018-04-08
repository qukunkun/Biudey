<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '地图';
// $this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">

</style>

<form id="region-form" role="form">
    <div class="row">

        <div class="col-lg-3">
            <div class="col-lg-3"><label>省</label></div>
            <div class="col-lg-9">
                <select class="selectpicker show-tick form-control" name="Province" id="Province" data-live-search="true">
                    <option value="">==请选择==</option>
                </select>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="col-lg-3"><label>市</label></div>
            <div class="col-lg-9">
                <select class="selectpicker show-tick form-control" name="City" id="City" data-live-search="true">
                    <option value="">==请选择==</option>
                </select>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="col-lg-3"><label>县/区</label></div>
            <div class="col-lg-9">
                <select class="selectpicker form-control" multiple data-live-search="true"  name="Village" id="Village"   data-actions-box="true" data-live-search="true">
                    <option value="">==请选择==</option>
                </select>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="col-lg-12">
                <button type="button" id="submit" class="btn btn-default">确定</button>
            </div>
        </div>

    </div>
</form>

<script>
    $('#submit').click(function() {
        var params = {};
        params.province = $("#Province").val();
        params.city = $("#City").val();
        params.village = $("#Village").val();
        $.ajax({
            type: 'POST',
            url: '/dihu/get_region',
            data: params,
            success: function (data) {

            }
        })
    })
</script>

<script>
    $(function () {
        //默认绑定省
        ProviceBind();
        //绑定事件
        $("#Province").change( function () {
            CityBind();
        })

        $("#City").change(function () {
            VillageBind();
        })

    })

    function Bind(str) {
        alert($("#Province").html());
        $("#Province").val(str);
    }

    function ProviceBind() {
        //清空下拉数据
        $("#Province").html("");
        var str = "<option value=''>==请选择==</option>";
        $.ajax({
            type: "POST",
            url: "/dihu/getaddress",
            data: { "parentId": "0"},
            dataType: "JSON",
            async: false,
            success: function (data) {
                //从服务器获取数据进行绑定
                $.each(data.data, function (i, item) {
                    str += "<option value=" + item.id + ">" + item.area_name + "</option>";
                })
                //将数据添加到省份这个下拉框里面
                $("#Province").append(str);
            },
            error: function () {alert("Error"); }
        });

    }

    function CityBind() {
        var provice = $("#Province").val();
        //判断省份这个下拉框选中的值是否为空
        if (provice == "") {
            return;
        }
        $("#City").html("");
        var str = "<option value=''>==请选择==</option>";
        $.ajax({
            type: "POST",
            url: "/dihu/getaddress",
            data: { "parentId": provice},
            dataType: "JSON",
            async: false,
            success: function (data) {
                //从服务器获取数据进行绑定
                $.each(data.data, function (i, item) {
                    str += "<option value=" + item.id + ">" + item.area_name + "</option>";
                })
                //将数据添加到省份这个下拉框里面
                $("#City").append(str);
                $('.selectpicker').selectpicker('refresh');
            },
            error: function () { alert("Error"); }
        });
    }

    function VillageBind() {
        var provice = $("#City").val();
        //判断市这个下拉框选中的值是否为空
        if (provice == "") {
            return;
        }
        $("#Village").html("");
        var str = "<option value=''>==请选择==</option>";
        //将市的ID拿到数据库进行查询，查询出他的下级进行绑定
        $.ajax({
            type: "POST",
            url: "/dihu/getaddress",
            data: { "parentId": provice},
            dataType: "JSON",
            async: false,
            success: function (data) {
                //从服务器获取数据进行绑定
                $.each(data.data, function (i, item) {
                    str += "<option value=" + item.id + ">" + item.area_name + "</option>";
                })
                //将数据添加到省份这个下拉框里面
                $("#Village").append(str);
                $('.selectpicker').selectpicker('refresh');
            },
            error: function () { alert("Error"); }
        });
    }
</script>


