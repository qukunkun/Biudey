<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '地图';
// $this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">

</style>
<form id="release-form" class="form-horizontal" role="form" action="/dihu/do_release" enctype="multipart/form-data" method="post">
    <div class="row ">
        <div class="col-lg-4  form-group">
            <label class="col-sm-3 control-label">省份</label>
            <div class="col-lg-9">
                <select class="selectpicker show-tick form-control" name="province" id="Province" data-live-search="true">
                        <option value="">==请选择==</option>
                </select>
            </div>
        </div>

        <div class="col-lg-3 form-group">
            <label class="col-sm-3 control-label">城市</label>
            <div class="col-lg-9">
                <select class="selectpicker show-tick form-control" name="city" id="City" data-live-search="true">
                    <option value="">==请选择==</option>
                </select>
            </div>
        </div>
        <div class="col-lg-5 form-group">
            <label class="col-sm-3 control-label">县/区</label>
            <div class="col-lg-9">
<!--                <select class="selectpicker form-control" multiple data-live-search="true"  name="village[]" id="Village"   data-actions-box="true" data-live-search="true">-->
                    <select class="selectpicker show-tick form-control"  name="village" id="Village"  data-live-search="true">
                    <option value="">==请选择==</option>
                </select>
            </div>
        </div>
    </div>

    <?php if(isset($data['province']) && isset($data['city']) && isset($data['village'])): ?>
        <input id="province_v" type="hidden" value="<?=$data['province']?>">
        <input id="city_v" type="hidden" value="<?=$data['city']?>">

    <?php endif; ?>

    <div class="row">
        <div class="col-lg-12 form-group">
            <label class="col-lg-1 control-label">详细地址:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="address" name="address" value="<?php echo isset($data['address'])?$data['address']:''; ?>" placeholder="请输入详细地址">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 form-group">
            <label class="col-lg-1 control-label">名称:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($data['title'])?$data['title']:''; ?>" placeholder="请输入名称" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 form-group">
            <label class="col-lg-1 control-label">联系人:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="contact_user" name="contact_user" value="<?php echo isset($data['contact_user'])?$data['contact_user']:''; ?>" placeholder="请输入您的称呼">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 form-group">
            <label class="col-lg-1 control-label">联系电话:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="<?php echo isset($data['contact_phone'])?$data['contact_phone']:''; ?>" placeholder="请输入联系电话">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 form-group">
            <label class="col-lg-1 control-label">传图:</label>
            <div class="col-lg-10">
                <div class="file-loading">
                    <input id="images" name="images[]" type="file" multiple>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 form-group">
            <label class="col-lg-1 control-label">适宜种植:</label>
            <div class="col-lg-10">
                <select class="selectpicker form-control" multiple data-live-search="true"  name="seeds[]" id="seeds"   data-actions-box="true" data-live-search="true">
<!--                <select class="selectpicker form-control"  name="seeds" id="seeds"  data-live-search="true">-->
                    <option value="">==请选择==</option>
                    <?php foreach($seeds as $key=>$value): ?>
                        <option value="<?= $value['id']?>"> <?= $value['name']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <?php if(isset($data['seeds'])): ?>
        <input id="seeds_v" type="hidden" value="<?=$data['seeds']?>">
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-12 form-group">
            <label class="col-lg-1 control-label">种植月份:</label>
            <div class="col-lg-1">
                <select class="selectpicker show-tick form-control" name="start_month" id="start_month" data-live-search="true">
                    <option value="">月</option>
                    <?php for($i=1;$i<13;$i++): ?>
                        <option value="<?= $i ?>"> <?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="col-lg-1 form-mid">-</div>

            <div class="col-lg-1">
                <select class="selectpicker show-tick form-control" name="end_month" id="end_month" data-live-search="true">
                    <option value="">月</option>
                    <?php for($i=1;$i<13;$i++): ?>
                        <option value="<?= $i ?>"> <?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 form-group">
            <label class="col-lg-1 control-label">面积:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="area" name="area" value="<?php echo isset($data['area'])?$data['area']:''; ?>" placeholder="请输入面积（平方米）">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 form-group">
            <label class="col-lg-1 control-label">价格:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="price" name="price" value="<?php echo isset($data['price'])?$data['price']:''; ?>" placeholder="请输入金额">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 form-group">
            <label class="col-lg-1 control-label">描述:</label>
            <div class="col-lg-10">
                <textarea class="form-control" id="describe" name="describe" rows="8"></textarea>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-3 col-lg-offset-4">
            <button type="reset" id="reset" onclick="reset()" class="btn btn-success pull-left">重置</button>
            <button type="submit" id="submit" class="btn btn-primary pull-right">发布</button>
        </div>
    </div>
</form>

<script>
    //图片上传 Bootstrap FileInput
    $("#images").fileinput({
        theme : "fa",
        language: "zh",
        uploadUrl: "/dihu/do_release", //上传文件路径
        maxFileCount: 6,
        maxFileSize: 500,
//        allowedPreviewTypes: 'image',
//        allowedFileTypes: 'jpg', //接收的文件后缀，如[‘jpg’, ‘gif’, ‘png’],不填将不限制上传文件后缀类型
        showUpload: false, //是否显示上传按妞
        showCaption: true, //是否显示浏览按钮
        showClose: false, //是否显示关闭按钮
        layoutTemplates:{
            actionUpload:'',
        },
        initialPreview: [
            "<img src='http://img.xmiles.cn/slotmachine/20151014/10coupon-v2.png' class='file-preview-image' />",
            "<img src='http://img.xmiles.cn/slotmachine/20151014/5coupon-v2.png' class='file-preview-image' />",
        ],
    });

    //种子多选回写
    var seeds_v=$('#seeds_v').val();
    var arr=seeds_v.split(',');
    $('#seeds').selectpicker('val', arr);

    //重置填写
    function reset(){
        $('#release-form').data('bootstrapValidator').resetForm(true); //去除验证插件的提示信息

        $(':input').attr("value",'');
        $("select.selectpicker").each(function(){
            $(this).selectpicker('val',$(this).find('option:first').val());    //重置bootstrap-select显示
        });
    }

</script>



<script>
    $(function () {
        //默认绑定省
        ProviceBind();
        CityBind();
        VillageBind();
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
                var province_sel = $('#province_v').val();
                var is_sel = "";
                //从服务器获取数据进行绑定
                $.each(data.data, function (i, item) {
                    if( province_sel == item.id){
                        str += "<option selected='selected' value=" + item.id + ">" + item.area_name + "</option>";
                    }else{
                        str += "<option value=" + item.id + ">" + item.area_name + "</option>";

                    }

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
                var city_sel = $('#city_v').val();
                var is_sel = "";
                //从服务器获取数据进行绑定
                $.each(data.data, function (i, item) {
                    if( city_sel == item.id){
                        str += "<option selected='selected' value=" + item.id + ">" + item.area_name + "</option>";
                    }else{
                        str += "<option value=" + item.id + ">" + item.area_name + "</option>";
                    }

                })
                //将数据添加到省份这个下拉框里面
                $("#City").append(str);
                $('.selectpicker').selectpicker('refresh');
            },
            error: function () { alert("Error"); }
        });
    }

    function VillageBind() {
        var city = $("#City").val();
        //判断市这个下拉框选中的值是否为空
        if (city == "") {
            return;
        }
        $("#Village").html("");
        var str = "";
        //将市的ID拿到数据库进行查询，查询出他的下级进行绑定
        $.ajax({
            type: "POST",
            url: "/dihu/getaddress",
            data: { "parentId": city},
            dataType: "JSON",
            async: false,
            success: function (data) {
                var village_sel = $('#village_v').val();
                var is_sel = "";
                //从服务器获取数据进行绑定
                $.each(data.data, function (i, item) {
                    if( village_sel == item.id){
                        str += "<option selected='selected' value=" + item.id + ">" + item.area_name + "</option>";
                    }else{
                        str += "<option value=" + item.id + ">" + item.area_name + "</option>";
                    }
                })
                //将数据添加到省份这个下拉框里面
                $("#Village").append(str);
                $('.selectpicker').selectpicker('refresh');
            },
            error: function () { alert("Error"); }
        });
    }
</script>



<script>
    /*自动验证 bootstrapValidator 配置项：assets/AppAsset.php -> statics/css/bootstrapValidator.css  statics/js/bootstrapValidator.js
     $(document).ready(function() {
        $('#release-form').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                province: {
                    validators: {
                        notEmpty: {
                            message: '省份不能为空'
                        }
                    }
                },
                city: {
                    validators: {
                        notEmpty: {
                            message: '城市不能为空'
                        }
                    }
                },
                village: {
                    validators: {
                        notEmpty: {
                            message: '县/区不能为空'
                        }
                    }
                },

                detail_address: {
                    validators: {
                        notEmpty: {
                            message: '详细地址不能为空'
                        }
                    }
                },

                contact_user: {
                    validators: {
                        notEmpty: {
                            message: '联系人不能为空'
                        }
                    }
                },

                contact_phone: {
                    validators: {
                        notEmpty: {
                            message: '联系电话不能为空'
                        },
                        // regexp: {
                        //     regexp: /^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\\d{8}$/,
                        //     message: '请添加正确的电话号码'
                        // }
                    }
                },
/*
                seeds: {
                    validators: {
                        notEmpty: {
                            message: '适宜种植不能为空'
                        }
                    }
                },

                start_month: {
                    validators: {
                        notEmpty: {
                            message: '种植开始月份不能为空'
                        }
                    }
                },

                end_month: {
                    validators: {
                        notEmpty: {
                            message: '种植结束月份不能为空'
                        }
                    }
                },

                area: {
                    validators: {
                        notEmpty: {
                            message: '面积不能为空'
                        },
                        regexp: {
                            regexp: /^(0|[1-9][0-9]{0,9})(\.[0-9]{1,2})?$/,
                            message: '请添加正确的数据格式'
                        }
                    }
                },

                title: {
                    validators: {
                        notEmpty: {
                            message: '名称不能为空'
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: '用户名长度必须在6到30之间'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: '用户名由数字字母下划线和.组成'
                        }
                    }
                },

                price: {
                    validators: {
                        notEmpty: {
                            message: '价格不能为空'
                        },
                        regexp: {
                            regexp: /^(0|[1-9][0-9]{0,9})(\.[0-9]{1,2})?$/,
                            message: '请添加正确的数据格式'
                        }
                    }
                },
            }
        });

    });
*/
</script>


<script>
    /*
        //启用自动验证及操作
        $('#release-form').bootstrapValidator('validate');
        if ($("#release-form").data('bootstrapValidator').isValid()) {//获取验证结果，如果成功，执行下面代码
            alert("验证成功后的操作");
        }
    */
</script>




