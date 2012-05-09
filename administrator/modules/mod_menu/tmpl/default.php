<?php
/**
 * @package     Square One
 * @link        www.squareonecms.org
 * @copyright   Copyright 2011 Square One and Open Source Matters. All Rights Reserved.
 */

// No direct access.
defined('_JEXEC') or die;

?>

<ul id="menu" class="nav<?php if ($disabled) echo ' disabled'; ?>">
<?php
foreach ($list as $i => &$item) :
	$class = array();
	if ($item->id == $active_id) {
		$class[] = 'current';
	}

	if (($item->parent || $item->type == 'menus') && $item->level == 1 && !$disabled) {
		$class[] = 'dropdown';
	}
    
    if ($disabled) {
		$class[] = 'disabled';
	}
    
    if ($item->type == 'separator') {
        $class[] = 'separator';
    }

	echo '<li class="'.implode(' ', $class).'">';

	// Render the menu item.
    if ($disabled) {
        require JModuleHelper::getLayoutPath('mod_menu', 'default_disabled');
    }
	elseif ($item->level == 1)
	{
		require JModuleHelper::getLayoutPath('mod_menu', 'default_toggle');
	}
    else 
    {
        switch ($item->type) :
            case 'separator':
            case 'url':
            case 'component':
            case 'menus':
            case 'placeholder' : 
                require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
                break;

            default:
                require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
                break;
        endswitch;
    }

	// The next item is deeper.
	if ($item->deeper) {
		echo '<ul class="dropdown-menu">';
	}
	// The next item is shallower.
	elseif ($item->shallower) {
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else {
		echo '</li>';
	}
endforeach;
?></ul>
