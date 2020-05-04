<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-xs-12 col-sm-12 col-md-3 sidebar'>
                <?=$this->render('_left_side')?>
            </div><!-- /.sidebar -->
            <div class='col-xs-12 col-sm-12 col-md-9 rht-col'>
                <div class="detail-block">
                </div>

            </div><!-- /.col -->
            <div class="clearfix"></div>
        </div><!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->

    </div><!-- /.container -->
</div>
<?php


$this->registerJs("


        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
              $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
          }
        }
        
        $('#user-image').change(function() {
          readURL(this);
        });
         $('#blah').click(function() {
        $('#user-image').click();
    });
        
");

?>

