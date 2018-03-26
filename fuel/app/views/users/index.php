<?php
/**
 * Created by PhpStorm.
 * User: franck
 * Date: 3/26/18
 * Time: 1:45 AM
 */
?>

<div class="content-box">
    <h2>Listing <span class='muted'>Users</span></h2>
    <br>
    <?php if ($employees): ?>


        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Company </th>
                <th>avatar</th>
                <th>Name</th>
                <th>Userame</th>
                <th>Jobtitle</th>
                <th>email</th>
                <th>group</th>
                <th>last login</th>

                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($employees as $k => $item): ?>
                <tr>

                    <td><?php echo $k; ?></td>
                    <td><?php echo $item->company_id; ?></td>
                    <td>
                        <div class="user-avatar-w img-circle">
                            <?php if(isset($current_employee) AND !empty($current_employee) AND $item->id == $current_employee->id) : ?>
                                <?= Model_Employee::get_avatar($current_employee->id, 64); ?>
                            <?php else:?>
                                <?= Model_Employee::get_avatar($item->id, 64); ?>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td><?php echo @$item->first_name ." ". @$item->last_name; ?></td>
                    <td><?php echo $item->user->username; ?></td>
                    <td><?php echo $item->jobtitle->title; ?></td>
                    <td><?php echo $item->email; ?></td>
                    <td><?php echo $item->user->group; ?></td>
                    <td><?php echo $item->user->last_login; ?></td>

                    <td>
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <?php echo Html::anchor('users/profile/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('contribution/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('contribution/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
                        </div>

                    </td>
                </tr>
            <?php endforeach; ?>	</tbody>
        </table>

    <?php else: ?>
        <p>No Contributions.</p>

    <?php endif; ?><p>
        <?php echo Html::anchor('users/register', 'Add new Employee', array('class' => 'btn btn-success')); ?>

    </p>
</div>
