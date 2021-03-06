	</header> <!-- end #header -->


	<div id="page-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 page-sidebar">
					<aside>
						<div class="widget sidebar-widget white-container brown-container links-widget">
							<ul>
								<li><?=anchor('profile_admin/admin_area', 'My Account');?></li>
								<?php foreach($query->result() as $row): ?>
									<?php if($row->admin_username == 'super admin'): ?>
										<li><?=anchor('profile_admin/manage_admins', 'Manage Admins');?></li>
									<?php endif; ?>
								<?php endforeach; ?>
								<li><?=anchor('profile_admin/manage_presets', 'Presets');?></li>
								<li><?=anchor('profile_admin/manage_candidates', 'Manage Applicants');?></li>
								<li><?=anchor('profile_admin/manage_recruiters', 'Manage Recruiters');?></li>
								<li><?=anchor('profile_admin/manage_package', 'Manage Recruiter Packages');?></li>
								<li><?=anchor('profile_admin/manage_toprecruit', 'Manage Top Recruiters');?></li>
								<li><?=anchor('profile_admin/manage_jobs', 'Manage jobs');?></li>
								<li><?=anchor('profile_admin/manage_social', 'Manage Social Media Links');?></li>
								<li><?=anchor('profile_admin/manage_applicantservices', 'Applicants Services');?></li>
								<li><?=anchor('profile_admin/manage_interviewprep', 'Interview Prepping Applicants');?></li>
								<li><?=anchor('profile_admin/manage_stats', 'Statistics');?></li>
								<li><?=anchor('profile_admin/manage_team', 'About Team');?></li>
								<li class="active"><?=anchor('profile_admin/manage_board', 'Board of directors');?></li>
								<li><?=anchor('profile_admin/manage_careers', 'MPS Careers');?></li>
								<li><?=anchor('profile_admin/manage_trainings', 'Trainings');?></li>
								<li><?=anchor('profile_admin/manage_articles', 'Career Hub Articles');?></li>
								<li><?=anchor('profile_admin/manage_testimonies', 'Testimonies');?></li>
								<li><?=anchor('profile_admin/manage_slide', 'Slide Show');?></li>
								<li><?=anchor('profile_admin/manage_contact', 'Contact Info');?></li>
								<li><?=anchor('profile_admin/welcome_message', 'Welcome Message');?></li>
								<li><?=anchor('profile_admin/password_reset', 'Password Reset Message');?></li>
								<li><?=anchor('profile_admin/privacyandterms', 'Privacy, Terms & Conditions');?></li>
							</ul>
						</div>
					</aside>
				</div> <!-- end .page-sidebar -->

				<div class="col-sm-8 page-content">
					<div>
						<?php echo form_open_multipart('profile_admin/board_insert'); ?>
							<h5 class="bottom-line mtm3">Manage Board of Directors
									<span class="pull-right">
										<a href="#" class="btn btn-gray" id='recruiter-desc-edit'>Add to Board</a>
										<input type='submit' class='btn btn-gray' id='recruiter-desc-save' value='Save' />
										<a href="#" class="btn btn-gray" id='recruiter-desc-cancel'>Cancel</a>									
									</span>
							</h5>
								<table id='recruiter-desc-general'>
									<tbody>
										<tr>
											<th>Name</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>										
										<?php foreach($board->result() as $row): ?>
										<tr>
											<td><?=$row->name?></td>
											<td><a href="<?=base_url();?>profile_admin/board_edit/<?=$row->id?>" class="btn btn-gray fa fa-edit" title='Edit'></a></td>
											<td><a href="<?=base_url();?>profile_admin/board_delete/<?=$row->id?>" class="btn btn-gray fa fa-trash-o" title='Delete'></a></td>
										</tr>
										<?php endforeach; ?>																									
									</tbody>
								</table>
								<table id='recruiter-desc-editing'>
									<tbody>
										<tr>
											<td>Name</td>
											<td><?php echo form_input('name', set_value('name'), 'id="name" class="form-control"');?></td>
										</tr>
										<tr>
											<td>Position</td>
											<td><?php echo form_input('position', set_value('position'), 'id="position" class="form-control"');?></td>
										</tr>
										<tr>
											<td>Citation</td>
											<td><?php echo form_textarea('about', set_value('about'), 'id="about" class="form-control"');?>
												<script>
												    CKEDITOR.replace('about');
												</script>
											</td>
										</tr>
										<tr>
											<td>Picture</td>
											<td><?php echo $error; ?><input type="file" name="userfile" /></td>
										</tr>																										
									</tbody>
								</table>
						<?=form_close();?>	
						<?php foreach($query->result() as $row): ?>
								<?php echo form_open('profile_admin/board_overview_insert'); ?>															
								<h5 class="bottom-line mtm3">Change Board Overview<span class="pull-right">
									<input type='submit' class='btn btn-gray' value='Save' id='recruiter-contact-save'/>
									<a href="#" id='recruiter-contact-cancel' class="btn btn-gray">Cancel</a></span></h5>

								<table id='recruiter-contact-normal'>
									<tbody>
										<tr>
											<td>Board Overview</td>											
											<td><a href="#" id='recruiter-contact-edit' class="btn btn-gray">Change overview</a></td>
										</tr>																										
									</tbody>
								</table>

								<table id='recruiter-contact-editing'>
									<tbody>
										<tr>
											<td>Board Overview</td>	
											<?php foreach ($board_overview->result() as $row): ?>
											<td><?php echo form_hidden('id',$row->id);?>
												<?php echo form_textarea('board_overview', set_value('board_overview',$row->board_overview), 'id="board_overview" class="form-control"');?>
												<script>
												    CKEDITOR.replace('board_overview');
												</script>
											</td>
											<?php endforeach; ?>
										</tr>																												
									</tbody>
								</table>
								<?php echo form_close(); ?>							
						<?php endforeach; ?>					
					</div>
				</div>				
			</div>
		</div> <!-- end .container -->
	</div> <!-- end #page-content -->

	