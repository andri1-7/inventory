<table class="datatable table">
    <thead>
        <tr>
            <th class="no-order" width="40px">#</th>
            <th><?php echo lang('Name') ?></th>
            <th><?php echo lang('NoIdCard') ?></th>
            <th><?php echo lang('AttachmentId') ?></th>
            <th><?php echo lang('DepartmentName') ?></th>
            <th><?php echo lang('JoinDate') ?></th>
            <th class="text-center no-order" width="100px"><?php echo lang('Action') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach (@$records as $ir => $r): ?>
        <tr>
            <td><?php echo $ir+1 ?></td>
            <td><?php echo $r->name ?></td>
            <td><?php echo $r->idcard_no ?></td>
            <td><?php echo $r->attachment_id ?></td>
            <td><?php echo $r->dept_name ?></td>
            <td><?php echo $r->join_date ?></td>
            <td width="150px" class="text-center">
                <div class="btn-group">
                    <button class="btn btn-sm btn-success action_edit" value="<?php echo $r->mm_id ?>"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger action_delete" value="<?php echo $r->mm_id ?>"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<script>
    // Apply Datatable plugin into .datatable
    let myTable = $(".datatable").DataTable({
        dom: 'Brtip',
        columnDefs: [
            { targets: 'no-order', orderable: false }
        ],
        buttons: dtTablesButtons()
    });

    // Remove Previous Buttons
    $(".tableTools-container").html('');
    // Append Datatables buttons into tableTools-container
    myTable.buttons().container().appendTo( $('.tableTools-container') );

    // Edit Button
    $(".action_edit").on('click', function() {
        let target = '<?php echo base_url('member/update') ?>/' + $(this).val();
        let form_edit = sendAjax(target);

        $(".form-action-panel .x_panel .x_content").html(form_edit);
    });

    // Delete Button
    $(".action_delete").on('click', function() {
        if(confirm('<?php echo lang('ConfirmActionDelete') ?>')) {
            let target = '<?php echo base_url('member/delete') ?>/' + $(this).val();
            let response = sendAjax(target, null, '', true);
        } else {
            return false;
        }
    });
</script>