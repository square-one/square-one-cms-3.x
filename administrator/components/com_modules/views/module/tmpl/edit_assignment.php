<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	com_modules
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Initiasile related data.
require_once JPATH_ADMINISTRATOR.'/components/com_menus/helpers/menus.php';
$menuTypes = MenusHelper::getMenuLinks();
?>
		<script type="text/javascript">
			window.addEvent('domready', function(){
				validate();
				document.getElements('select').addEvent('change', function(e){validate();});
			});
			function validate(){
				var value	= document.id('jform_assignment').value;
				var list	= document.id('menu-assignment');
				if(value == '-' || value == '0'){
					$$('.jform-assignments-button').each(function(el) {el.setProperty('disabled', true); });
					list.getElements('input').each(function(el){
						el.setProperty('disabled', true);
						if (value == '-'){
							el.setProperty('checked', false);
						} else {
							el.setProperty('checked', true);
						}
					});
				} else {
					$$('.jform-assignments-button').each(function(el) {el.setProperty('disabled', false); });
					list.getElements('input').each(function(el){
						el.setProperty('disabled', false);
					});
				}
			}
		</script>
		<div class="control-group">
			<label id="jform_menus-lbl" class="control-label" for="jform_menus"><?php echo JText::_('COM_MODULES_MODULE_ASSIGN'); ?></label>
			<div id="jform_menus" class="controls">
				<select name="jform[assignment]" id="jform_assignment">
					<?php echo JHtml::_('select.options', ModulesHelper::getAssignmentOptions($this->item->client_id), 'value', 'text', $this->item->assignment, true);?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label id="jform_menuselect-lbl" class="control-label" for="jform_menuselect"><?php echo JText::_('JGLOBAL_MENU_SELECTION'); ?></label>
			<div class="controls">
				<div class="btn-toolbar">
					<div class="btn-group">
						<button class="btn" type="button" class="jform-assignments-button jform-rightbtn" onclick="$$('.chk-menulink').each(function(el) { el.checked = !el.checked; });">
							<i class="icon-adjust"></i> <?php echo JText::_('JGLOBAL_SELECTION_INVERT'); ?>
						</button>
						<button class="btn" type="button" class="jform-assignments-button jform-rightbtn" onclick="$$('.chk-menulink').each(function(el) { el.checked = false; });">
							<i class="icon-ban-circle"></i> <?php echo JText::_('JGLOBAL_SELECTION_NONE'); ?>
						</button>
						<button class="btn" type="button" class="jform-assignments-button jform-rightbtn" onclick="$$('.chk-menulink').each(function(el) { el.checked = true; });">
							<i class="icon-plus-sign"></i> <?php echo JText::_('JGLOBAL_SELECTION_ALL'); ?>
						</button>
					</div>
				</div>
				
				<ul id="menu-assignment" class="thumbnails">
					<?php foreach ($menuTypes as &$type) :
						$count 	= count($type->links);
						$i		= 0;
						if ($count) :
						?>
						<li class="span3">
							<div class="thumbnail">
								<h5><?php echo $type->title;?></h5>
								<?php
								foreach ($type->links as $link) :
									if (trim($this->item->assignment) == '-'):
										$checked = '';
									elseif ($this->item->assignment == 0):
										$checked = ' checked="checked"';
									elseif ($this->item->assignment < 0):
										$checked = in_array(-$link->value, $this->item->assigned) ? ' checked="checked"' : '';
									elseif ($this->item->assignment > 0) :
										$checked = in_array($link->value, $this->item->assigned) ? ' checked="checked"' : '';
									endif;
								?>
									<label class="checkbox small" for="link<?php echo (int) $link->value;?>">
										<input type="checkbox" class="chk-menulink" name="jform[assigned][]" value="<?php echo (int) $link->value;?>" id="link<?php echo (int) $link->value;?>"<?php echo $checked;?>/> 
										<?php echo $link->text; ?>
									</label>
								<?php if ($count > 20 && ++$i == ceil($count/2)) :?>
									<hr />
								<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>