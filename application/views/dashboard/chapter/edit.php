<form id="parsley-form" class="form-horizontal" novalidate name="form_edit">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang('Chapter') ?> <?php echo lang('Name') ?></label>
        <input type="text" class="form-control" name="chapter_name" required="required" value="<?php echo $record->chapter_name ?>">
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang('Resto') ?> <?php echo lang('Name') ?></label>
        <input type="text" class="form-control" name="resto_name" required="required" value="<?php echo $record->resto_name ?>">
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <label class="control-label"><?php echo lang('Province') ?> <?php echo lang('Name') ?></label>
        <div class="dropdown">
           <?php echo form_dropdown('province_id', $province, $record->province_id, 'class="form-control province"'); ?>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12" id="regency">
        <label class="control-label"><?php echo lang('Regency') ?> <?php echo lang('Name') ?></label>
        <div class="dropdown">
           <?php echo form_dropdown('regency_id', $regency, $record->regency_id, 'class="form-control regency"'); ?>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <label class="control-label"><?php echo lang('District') ?> <?php echo lang('Name') ?></label>
        <div class="dropdown">
           <?php echo form_dropdown('district_id', $district, $record->district_id, 'class="form-control district"'); ?>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <label class="control-label"><?php echo lang('Village') ?> <?php echo lang('Name') ?></label>
        <div class="dropdown">
           <?php echo form_dropdown('village_id', $village, $record->village_id, 'class="form-control village"'); ?>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang('Lat') ?></label>
        <input type="text" class="form-control" name="lat" required="required" value="<?php echo $record->lat ?>">
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang('Lng') ?></label>
        <input type="text" class="form-control" name="lng" required="required" value="<?php echo $record->lng ?>">
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang('Date') ?></label>
        <input type="text" class="form-control" name="date" required="required" value="<?php echo DATE_FORMAT_($record->date) ?>" onfocus="openDatePicker($(this))">
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
        var link = "<?php echo base_url('chapter/update/'.$record->id) ?>",
            form_selector = "form[name='form_edit']";

        submitForm(null, form_selector, link);
        return false;
    });

    $(".province").on('change', function(){
        $('.regency option').remove();
        $('.district option').remove();
        $('.village option').remove();

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
        $('.district option').remove();
        $('.village option').remove();
        
        var target = '<?php echo base_url('area/get_district') ?>/' + $(this).val();
        let response = sendAjax(target);

        var district = response.district;        
        var mySelect = $('.district');
        mySelect.empty();

        $.each(district, function(val, text) {
            mySelect.append(
                $('<option></option>').val(val).html(text)
            );
        });
    });
    
    $(".district").on('change', function(){
        $('.village option').remove();
        
        var target = '<?php echo base_url('area/get_village') ?>/' + $(this).val();
        let response = sendAjax(target);

        var village = response.village;        
        var mySelect = $('.village');
        mySelect.empty();
        
        $.each(village, function(val, text) {
            mySelect.append(
                $('<option></option>').val(val).html(text)
            );
        });
    });
</script>