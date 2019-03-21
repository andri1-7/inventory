<form id="parsley-form" class="form-horizontal" novalidate name="form_edit">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang('Name') ?> <span class="required">*</span></label>
        <input type="text" class="form-control" name="dept_name" value="<?php echo $record->dept_name ?>" required="required">
    </div>
    <div class="clearfix"></div>
    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> <?php echo lang('button_update') ?></button>
        </div>
    </div>
</form>
<script>
    // To Validate Form
    $("#parsley-form").parsley().on('field:validated',function(){}).on('form:submit', function(){
        var link = "<?php echo base_url('department/update/'.$record->id) ?>",
            form_selector = "form[name='form_edit']";

        submitForm(null, form_selector, link);
        return false;
    });
</script>