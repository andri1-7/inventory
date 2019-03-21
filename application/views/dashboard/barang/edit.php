<form id="parsley-form" class="form-horizontal" novalidate name="form_edit">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label">Nama Barang <span class="required">*</span></label>
        <input type="text" class="form-control" name="nama" value="<?php echo $records->nama ?>" required="required">
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label">Stock Masuk<span class="required">*</span></label>
        <input type="text" class="form-control" name="stock_masuk" value="<?php echo $records->stock_masuk ?>" required="required">
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label">Stock Masuk<span class="required">*</span></label>
        <input type="text" class="form-control" name="stock_keluar" value="<?php echo $records->stock_keluar ?>" required="required">
    </div>
    <!-- <div class="col-md-12 col-sm-12 col-xs-12">
            <label class="control-label"><?php echo lang('Department') ?><span class="required">*</span></label>
            <div class="dropdown">
                <?php echo form_dropdown('dept_id', $department,$record->dept_id, 'class="form-control" required="required"'); ?>
            </div>
        </div> -->
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
        var link = "<?php echo base_url('barang/update/'.$records->id) ?>",
            form_selector = "form[name='form_edit']";

        submitForm(null, form_selector, link);
        return false;
    });
</script>