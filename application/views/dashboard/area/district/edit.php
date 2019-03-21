<form id="parsley-form" class="form-horizontal" novalidate name="form_edit">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <label class="control-label"><?php echo lang('Province') ?> <?php echo lang('Name') ?></label>
        <div class="dropdown">
           <?php echo form_dropdown('province_id', $province, null, 'class="form-control province"'); ?>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12" id="regency">
        <label class="control-label"><?php echo lang('Regency') ?> <?php echo lang('Name') ?></label>
        <div class="dropdown">
           <?php echo form_dropdown('regency_id', array(), null, 'class="form-control regency"'); ?>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang('District') ?> <?php echo lang('ID') ?></label>
        <?php
            $new_id = substr($record->id, strlen($record->regency_id), strlen($record->id));
        ?>
        <input type="text" class="form-control" name="id" required="required" value="<?php echo $new_id ?>">
        <input type="hidden" name="old_id" value="<?php echo $record->id ?>">
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang('Province') ?> <?php echo lang('Name') ?></label>
        <input type="text" class="form-control" name="name" required="required" value="<?php echo $record->name ?>">
    </div>
    <div class="clearfix"></div>
    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <button type="submit" value="upload" class="btn btn-success"><i class="fas fa-save"></i> <?php echo lang('Update') ?></button>
        </div>
    </div>
</form>
<script>
    // To Validate Form
    $("#parsley-form").parsley().on('field:validated',function(){}).on('form:submit', function(){
        var link = "<?php echo base_url('area/update_district/'.$record->id) ?>",
            form_selector = "form[name='form_edit']";

        submitForm(null, form_selector, link);
        return false;
    });

    $(".province").on('change', function(){
        $("#regency").show();
        
        var target = '<?php echo base_url('area/get_regency') ?>/' + $(this).val();
        let response = sendAjax(target);

        var regency = response.regency;
        
        var mySelect = $('.regency');
        mySelect.empty();
        
        $.each(regency, function(val, text) {
            mySelect.append(
                $('<option></option>').val(val).html(text)
            );
        });    
    });
</script>