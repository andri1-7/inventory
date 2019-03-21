<form id="parsley-form" class="form-horizontal" novalidate name="form_add">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang('Chapter') ?> <?php echo lang('Name') ?> <span class="required">*</span></label>
        <input type="text" class="form-control" name="chapter_name" required="required">
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang('Resto') ?> <?php echo lang('Name') ?> <span class="required">*</span></label>
        <input type="text" class="form-control" name="resto_name" required="required">
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <label class="control-label"><?php echo lang('Province') ?> <?php echo lang('Name') ?> <span class="required">*</span></label>
        <div class="dropdown">
           <?php echo form_dropdown('province_id', $province, null, 'class="form-control province"'); ?>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12" style="display:none" id="regency">
        <label class="control-label"><?php echo lang('Regency') ?> <?php echo lang('Name') ?> <span class="required">*</span></label>
        <div class="dropdown" >
           <?php echo form_dropdown('regency_id', array(), null, 'class="form-control regency"'); ?>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12" style="display:none" id="district">
        <label class="control-label"><?php echo lang('District') ?> <?php echo lang('Name') ?> <span class="required">*</span></label>
        <div class="dropdown">
           <?php echo form_dropdown('district_id', array(), null, 'class="form-control district"'); ?>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12" style="display:none" id="village">
        <label class="control-label"><?php echo lang('Village') ?> <?php echo lang('Name') ?> <span class="required">*</span></label>
        <div class="dropdown">
           <?php echo form_dropdown('village_id', array(), null, 'class="form-control village"'); ?>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang('Lat') ?> <span class="required">*</span></label>
        <input type="text" class="form-control" name="lat" required="required">
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang('Lng') ?> <span class="required">*</span></label>
        <input type="text" class="form-control" name="lng" required="required">
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang('Date') ?> <span class="required">*</span></label>
        <input type="date" class="form-control" name="date" required="required">
    </div>
    <div class="clearfix"></div>
    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <button type="submit" value="upload" class="btn btn-success"><i class="fas fa-save"></i> <?php echo lang('Save') ?></button>
        </div>
    </div>
</form>
<script>
    $("#parsley-form").parsley().on('field:validated',function(){}).on('form:submit', function(){
        var link = "<?php echo base_url('chapter/create') ?>",
            form_selector = "form[name='form_add']";

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

    $(".regency").on('change', function(){
        $("#district").show();
        
        var target = '<?php echo base_url('area/get_district') ?>/' + $(this).val();
        let response = sendAjax(target);

        var district = response.district;
        
        var mySelect2 = $('.district');
        mySelect2.empty();
        
        $.each(district, function(val, text) {
            mySelect2.append(
                $('<option></option>').val(val).html(text)
            );
        });
    });
    
    $(".district").on('change', function(){
        $("#village").show();
        
        var target = '<?php echo base_url('area/get_village') ?>/' + $(this).val();
        let response = sendAjax(target);

        var village = response.village;
        
        var mySelect2 = $('.village');
        mySelect2.empty();

        $.each(village, function(val, text) {
            mySelect2.append(
                $('<option></option>').val(val).html(text)
            );
        });
    });

</script>