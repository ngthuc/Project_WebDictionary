<?php
if (isset($_GET['id'])) {
$word = $dicM->findWord($_GET['id']);}
?>

<div id="infoStudent" class="modal text-left" tabindex="-1" role="dialog" aria-labelledby aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Information</h4>
            </div>
            <div class="modal-body ">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Word</label>
                        <span class="form-control-static"><?php echo $word->getWord(); ?></span>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Types</label>
                        <span class="form-control-static"><?php echo $word->getTypes(); ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Meaning</label>
                        <span class="form-control-static"><?php echo $word->getMeaning(); ?></span>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Description</label>
                        <span class="form-control-static"><?php echo $word->getDescription(); ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Lesson</label>
                        <span class="form-control-static"><?php echo $word->getLesson(); ?></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>