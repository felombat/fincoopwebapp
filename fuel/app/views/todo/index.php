<?php 
use Carbon\Carbon;

Carbon::setLocale('fr');
?>

<!-- 
<h2>Listing <span class='muted'>Todos</span></h2>
<br>
<?php if ($todos): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Created by</th>
			<th>Title</th>
			<th>Description</th>
			<th>Labels</th>
			<th>Status</th>
			<th>Start date</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($todos as $item): ?>		<tr>

			<td><?php echo $item->created_by; ?></td>
			<td><?php echo $item->title; ?></td>
			<td><?php echo $item->description; ?></td>
			<td><?php echo $item->labels; ?></td>
			<td><?php echo $item->status; ?></td>
			<td><?php echo $item->start_date; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('todo/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('todo/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('todo/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Todos.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('todo/create', 'Add new Todo', array('class' => 'btn btn-success')); ?>

</p>
-->

<p>
	<?php echo Html::anchor('todo/create', 'Add new Todo', array('class' => 'btn btn-success')); ?>

</p>

<div class="row">
            <div class="col-lg-6">
                <div class="ibox-content">
                    <h2>TODO List</h2>
                    <div class="todo-form">
                    <?php $action_uri = Uri::create('todo/add'); echo Form::open(array("id"=>'todo-icheck-version',"class"=>"form-horizontal ajax-callable", 'method'=>'post', 'action'=>" $action_uri ")); ?>
                                    <div class="input-group">
                                        <input placeholder="Getting things done ..." name="title" class="form-control input-lg" type="text">
                                        <div class="input-group-btn">
                                            <button class="btn btn-lg btn-primary" type="submit">
                                                Add a ToDo
                                            </button>
                                        </div>
                                    </div>

                                <?php echo Form::close(); ?>
                            </div>
                            <div class="hr-line-dashed"></div>

                     <!-- <small>This is example of task list</small>-->
                    <ul class="todo-list m-t ui-sortable">
                   		 <?php foreach ($todos as $item): ?>	
                        <li>
                            <input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox" value="" <?= ($item->status == 'done') ? "checked": '' ; ?> >
                            <span class="m-l-xs"> <?= $item->title; ?>  </span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> <?= Carbon::createFromTimestamp($item->created_at, 'Europe/Berlin')->diffForHumans() ; ?></small>
                        </li>
                        <?php endforeach; ?>
                         
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <h2>TODO Small version</h2>
                        <div class="todo-form">
                                <?php $action_uri = Uri::create('todo/add'); echo Form::open(array("id"=>'todo-small-version',"class"=>"form-horizontal ajax-callable", 'method'=>'post', 'action'=>" $action_uri ")); ?>
                                    <div class="input-group">
                                        <input placeholder="Getting things done ..." name="title" class="form-control input-lg" type="text">
                                        <div class="input-group-btn">
                                            <button class="btn btn-lg btn-primary" type="submit">
                                                Add a ToDo
                                            </button>
                                        </div>
                                    </div>

                                <?php echo Form::close(); ?>
                            </div>
                            <div class="hr-line-dashed"></div>
                        <small>This is example of small version of todo list</small>
                        <ul class="todo-list m-t small-list ui-sortable">
                        <?php foreach ($todos as $item): ?>
                            <li>
                                <a class="check-link" href="#"><?= ($item->status == 'done') ? '<i class="fa fa-check-square"></i>': '<i class="fa fa-square-o"></i>' ; ?> </a>
                                <span class="m-l-xs <?= ($item->status == 'done') ? "todo-completed": ' ' ; ?> "><?= $item->title; ?></span>
								<small class="label label-primary"><i class="fa fa-clock-o"></i>  <?= Carbon::createFromTimestamp($item->created_at, 'Europe/Berlin')->diffForHumans() ; ?>
								</small>

                            </li>
                             <?php endforeach; ?>
                            <!--<li>
                                <a class="check-link" href="#"><i class="fa fa-check-square"></i> </a>
                                <span class="m-l-xs  todo-completed">Go to shop and find some products.</span>

                            </li>
                            <li>
                                <a class="check-link" href="#"><i class="fa fa-square-o"></i> </a>
                                <span class="m-l-xs">Send documents to Mike</span>
                                <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 mins</small>
                            </li>
                            <li>
                                <a class="check-link" href="#"><i class="fa fa-square-o"></i> </a>
                                <span class="m-l-xs">Go to the doctor dr Smith</span>
                            </li>
                            <li>
                                <a class="check-link" href="#"><i class="fa fa-square-o"></i> </a>
                                <span class="m-l-xs">Plan vacation</span>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>