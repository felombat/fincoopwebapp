					<div class="auth-box-w">
			            <div class="logo-w"><a href="index.html"><img alt="" src="img/logo-big.png"></a></div>
			            <h4 class="auth-header"><?= ($app_params['name']); ?></h4>
			            <?php echo Form::open(array('class'=>"m-t", 'role'=>"form", 'action'=>"admin/login")); ?>
			                <div class="form-group">
			                    <label for="">Identifiant</label>
			                    <!-- <input class="form-control" placeholder="Votre identifiant / email " type="text"> -->
			                    <?php echo Form::input('email', Input::post('email'), array('class' => 'form-control', 'placeholder' => 'Email or Username', 'autofocus', 'required'=>"")); ?>

								<?php if ($val->error('email')): ?>
									<span class="control-label"><?php echo $val->error('email')->get_message('You must provide a username or email'); ?></span>
								<?php endif; ?>
			                    <div class="pre-icon os-icon os-icon-user-male-circle"></div>
			                </div>
			                <div class="form-group">
			                    <label for="">Mot de Passe</label>
			                    <!-- <input class="form-control" placeholder="Mot de Passe" type="password"> -->
			                    <?php echo Form::password('password', null, array('class' => 'form-control', 'placeholder' => 'Password')); ?>

								<?php if ($val->error('password')): ?>
									<span class="control-label"><?php echo $val->error('password')->get_message(':label cannot be blank'); ?></span>
								<?php endif; ?>
			                    <div class="pre-icon os-icon os-icon-fingerprint"></div>
			                </div>

			                <?php if (isset($login_error)): ?>
								<div class="error"><?php echo $login_error; ?></div>
							<?php endif; ?>
			                <div class="buttons-w">
			                    <button class="btn btn-primary">Ouvrir ma session</button>
			                    <div class="form-check-inline">
			                        <label class="form-check-label">
			                            <input class="form-check-input" type="checkbox">Se souvenir de moi</label>
			                    </div>
			                </div>
			            <?php echo Form::close(); ?>
			        </div>