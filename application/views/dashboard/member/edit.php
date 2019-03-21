<form id="parsley-form" class="form-horizontal" novalidate name="form_edit">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang('Name') ?> <span class="required">*</span></label>
        <input type="text" class="form-control" name="name" value="<?php echo $record->name ?>" required="required">
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang('NoIdCard') ?><span class="required">*</span></label>
        <input type="text" class="form-control" name="idcard_no" value="<?php echo $record->idcard_no ?>" required="required">
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang('Username') ?> <span class="required">*</span></label>
        <input type="text" class="form-control" name="username" value="<?php echo $record->username ?>" required="required">
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang('Password') ?> <span class="required">*</span></label>
        <input type="password" class="form-control" name="passwd">
        <input type="hidden" class="form-control" name="old_passwd" value="<?php echo $record->passwd ?>">
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang('AttachmentId') ?><span class="required">*</span></label>
        <input type="text" class="form-control" name="attachment_id" value="<?php echo $record->attachment_id ?>" required="required">
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
            <label class="control-label"><?php echo lang('Department') ?><span class="required">*</span></label>
            <div class="dropdown">
                <?php echo form_dropdown('dept_id', $department,$record->dept_id, 'class="form-control" required="required"'); ?>
            </div>
        </div>
    <div class="clearfix"></div>
    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> <?php echo lang('Update') ?></button>
        </div>
    </div>
</form>
<script>
    // To Validate Form
    $("#parsley-form").parsley().on('field:validated',function(){}).on('form:submit', function(){
        var link = "<?php echo base_url('member/update/'.$record->mm_id) ?>",
            form_selector = "form[name='form_edit']";

        submitForm(null, form_selector, link);
        return false;
    });
</script>