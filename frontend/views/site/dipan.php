<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '地虎';
// $this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
  
</style>
    <div class="row" style="margin-bottom: 15px;">
        <div class="col-lg-9">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox" >
                    <div class="item active">
                        <img src="/statics/images/scene/img02.jpg" alt="..." >
                        <div class="carousel-caption">
                            <h5>标题1</h5>
                        </div>
                    </div>
                    <div class="item">
                        <img src="/statics/images/scene/img03.jpg" alt="..." >
                        <div class="carousel-caption">
                            <h5>标题3</h5>
                        </div>
                    </div>
                    <div class="item">
                        <img src="/statics/images/scene/img04.jpg" alt="..." >
                        <div class="carousel-caption">
                            <h5>标题4</h5>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        
        <div class="col-lg-3 " style="margin-bottom: 17px; position: relative;">            
            <img src="/statics/images/zoom/zoom01.jpg" class="img-responsive" >
            <span class="col-lg-12" style="position: absolute; top: 0; left: 0;">昨天</span>
        </div>
        <div class="col-lg-3 " style="margin-bottom: 17px; position: relative;"> 
            <img src="/statics/images/zoom/zoom03.jpg" class="img-responsive">
            <span class="col-lg-12" style="position: absolute; top: 0; left: 0;">今天</span>
        </div>   
        <div class="col-lg-3 " style="position: relative;"> 
            <img src="/statics/images/zoom/zoom04.jpg" class="img-responsive">
            <span class="col-lg-12" style="position: absolute; top: 0; left: 0;">明天</span>   
        </div>    

    </div>    

    <div class="row">
        <div class="col-lg-3" style="position: relative;">
            <img src="/statics/images/zoom/zoom01.jpg" class="img-responsive">
            <span class="col-lg-12" style="position: absolute; bottom: 0; left: 0;">浇水</span>
        </div>
        <div class="col-lg-3">
            <img src="/statics/images/zoom/zoom02.jpg" class="img-responsive">
            <span class="col-lg-12" style="position: absolute; top: 0; left: 0;">施肥</span>
        </div>
        <div class="col-lg-3">
            <img src="/statics/images/zoom/zoom03.jpg" class="img-responsive">
            <span class="col-lg-12" style="position: absolute; top: 0; left: 0;">除草</span>
        </div>
         <div class="col-lg-3">
            <img src="/statics/images/zoom/zoom04.jpg" class="img-responsive">
            <span class="col-lg-12" style="position: absolute; top: 0; left: 0;">捉虫</span>
        </div>
    </div>

<script type="text/javascript">
//    $('#carousel_msg').css('display','none');
    $('#carousel_button').click(function(){
        $('#carousel_msg').toggle(500);
    })


</script>


