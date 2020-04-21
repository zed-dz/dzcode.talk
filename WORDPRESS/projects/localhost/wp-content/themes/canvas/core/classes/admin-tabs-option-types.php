<?php

/**
* Option
*/
abstract class Option_admin_theme
{
	public $params = array();
	
	protected $template = '<div class="admin_mix-tab-control tab_{$ID}">
		<label for="{$ID}">{$NAME}</label>
		<div class="admin_input">
			{$INPUT}
			<span class="help-block">{$DESC}</span>
		</div>
	</div>';
	
	protected $vars = array(
		'{$ID}',
		'{$NAME}',
		'{$INPUT}',
		'{$DESC}'
	);
	
	protected $defaults = array(
		'id'      => '',
		'name'    => '',
		'desc'    => '',
		'default' => ''
	);
	
	protected $value = '';
	protected $def_value = '';
	
	public function __construct(Array $params)
	{
		$this->params = array_merge($this->defaults, $params);
		
		$as_array = (isset($params['as_array']))?$params['as_array']:FALSE;
		$this->def_value = (isset($params['default']) && !empty($params['default']))?$params['default']:'';
		if ($as_array) {
			$temp_value = gt3_get_theme_option($as_array);
			if (isset($temp_value[$params['id']])) {
				$this->value = $temp_value[$params['id']];
			}else{
				$this->value = $def_value;
			}
		}else{
			$this->value = stripslashes(gt3_get_theme_option($params['id'], (isset($params['default']) && !empty($params['default']))?$params['default']:''));
		}
	}
	
	public function render(){
		return str_replace($this->vars, array(
			$this->params['id'],
			$this->params['name'],
			$this->render_control(),
			$this->params['desc']
		), $this->template);
	}
	
	abstract protected function render_control();
}


/**
* Checkbox Option
*/
class CheckboxOption_admin_theme extends Option_admin_theme
{
	protected $template = '<div class="admin_mix-tab-control">
		<div class="admin_input">
			<ul class="inputs-list">
				<li>
					<label>
						{$INPUT}
						<span>{$NAME}</span>
					</label>
				</li>
			</ul>
			<span class="help-block">{$DESC}</span>
		</div>
	</div>';
	
	protected function render_control()
	{
		return '<input type="checkbox" name="'.$this->params['id'].'" id="'.$this->params['id'].'" value="1" '.(!empty($this->value)?'checked="checked"':'').' />';
	}
}


/**
* Color Option
*/
class ColorOption_admin_theme extends Option_admin_theme
{
	protected function render_control()
	{
        if (empty($this->value) && $this->params['not_empty'] == true) {
            $this->value = $this->def_value;
        }

		return '<div class="color_option_admin"><span class="sharp">#</span><input class="medium cpicker admin_textoption type1" maxlength="25" type="text" name="'.$this->params['id'].'" id="'.$this->params['id'].'" '.(!empty($this->value)?'value="'.htmlspecialchars($this->value).'"':'').' /><input disabled="disabled" type="text" class="admin_textoption type1 cpicker_preview" value=""></div>';
	}
}

/**
* Radio Option
*/
class RadioOption_admin_theme extends Option_admin_theme
{
	protected function render_control()
	{
		$control = '';
		foreach ($this->params['options'] as $ind => $val) {
			$control .= '<input type="radio" name="'.$this->params['id'].'" value="'.$ind.'" '.(($this->value == $ind)?'checked="checked"':'').' /> '.htmlspecialchars($val) .'<br />';
		}
		
		return $control;
	}
}


/**
* Sidebar manager
*/
class SidebarManager_admin_theme extends Option_admin_theme
{
	protected function render_control()
	{
        
        $all_sidebars = gt3_get_theme_sidebars_for_admin();
        if (!isset($compile)) {$compile = '';}

        $compile .= '
        <div class="add_new_sidebar">
            <span class="caption">Create sidebar:</span> <input type="text" name="create_new_sidebar" class="admin_create_new_sidebar admin_textoption type3" value="">
            <input type="button" name="create_new_sidebar_btn" class="admin_create_new_sidebar_btn admin_button admin_ok_btn" value="Create">
        </div>
        <div class="admin_sidebars_list">';
        
        foreach ($all_sidebars as $key => $value) {
            $compile .= '
            <div class="admin_sidebar_item">
                <input type="hidden" name="theme_sidebars[]" value="'.$value.'">
                <span class="admin_sidebar_name admin_visual_style1">'.$value.'</span>
                <input type="button" class="admin_delete_this_sidebar admin_img_button cross" name="delete_this_sidebar" value="X">
            </div>';
        }
        
        $compile .= "</div>";
		
		return $compile;
	}
}


/**
* Font selector
*/
class FontSelector_admin_theme extends Option_admin_theme
{
	protected function render_control()
	{
        if (!isset($compile)) {$compile = '';}

        $compile .= '
        <div class="fonts_list">';

        $compile .= '<select style="width:300px;" class="xlarge bg_hover1 fontselector" name="'.$this->params['id'].'" id="'.$this->params['id'].'">';
        $i=0;
        foreach ($this->params['options'] as $key => $val) {
            if ($i==0) {
                $compile .= '<option value="'.htmlspecialchars($this->def_value).'" '.(($this->value == $this->def_value)?'selected="selected"':'').'>Default</option>';
            }
            $compile .= '<option value="'.htmlspecialchars($val).'" '.(($this->value == $val)?'selected="selected"':'').'>'.htmlspecialchars($val).'</option>';
            $i++;
        }
        $compile .= '</select>';

        $compile .= "</div>";
        $compile .= "<div class='font_preview'>The quick brown fox jumps over the lazy dog</div>";
        $compile .= "<div class='clear'></div>";

        return $compile;
	}
}


/**
* Main Description Heading
*/
class DescHeading_admin_theme extends Option_admin_theme
{
	protected function render_control()
	{
		return "<h4>".$this->params['text']."</h4>";
	}
}

/**
* Select Option
*/
class SelectOption_admin_theme extends Option_admin_theme
{
	protected function render_control()
	{
		$control = '<select class="xlarge bg_hover1" name="'.$this->params['id'].'" id="'.$this->params['id'].'">';
		foreach ($this->params['options'] as $val => $name) {
			$control .= '<option value="'.htmlspecialchars($val).'" '.(($this->value == $val)?'selected="selected"':'').'>'.htmlspecialchars($name).'</option>';
		}
		$control .= '</select>';

		return $control;
	}
}

/**
* Text Option
*/
class TextOption_admin_theme extends Option_admin_theme
{
	protected function render_control()
	{
	
		if (isset($this->params['not_empty']) && (empty($this->value) && $this->params['not_empty'] == true)) {
			$this->value = $this->def_value;
		}

        if (isset($this->params['width']) && strlen($this->params['width'])>0) {
            $wstyle = " width:".$this->params['width']." !important; ";
        }

        if (isset($this->params['textalign']) && strlen($this->params['textalign'])>0) {
            $textalign = " text-align:".$this->params['textalign']." !important; ";
        }

        if (!isset($wstyle)) {
            $wstyle = '';
        }
        if (!isset($textalign)) {
            $textalign = '';
        }
		
		return '<input class="xxlarge admin_textoption type1" type="text" style="'.$wstyle.$textalign.'" name="'.$this->params['id'].'" id="'.$this->params['id'].'" '.(!empty($this->value)?'value="'.htmlspecialchars($this->value).'"':'').' />';
	}
}


/**
* Textarea Option
*/
class TextareaOption_admin_theme extends Option_admin_theme
{
	protected function render_control()
	{
	
		if (isset($this->params['not_empty']) && (empty($this->value) && $this->params['not_empty'] == true)) {
			$this->value = $this->def_value;
		}
	
		return '<textarea class="xxlarge admin_textareaoption type1" name="'.$this->params['id'].'" id="'.$this->params['id'].'" rows="5">'.(!empty($this->value)?htmlspecialchars($this->value):'').'</textarea>';
	}
}

/**
* Upload Option
*/
class UploadOption_admin_theme extends Option_admin_theme
{
	protected function render_control()
	{
		$control = '<input class="admin_textoption type2" name="'. $this->params['id'] .'" id="' . $this->params['id'] .'_upload" type="text" value="'. esc_url($this->value) .'" />';
		
		$control .= '<div class="up_btns"><span class="admin_button btn_upload_image admin_ok_btn but_'. $this->params['id'] .'" id="'. $this->params['id'] .'">Upload Image</span>';
		
		if(!empty($this->value)) {
			$hide = '';
		}else{
			$hide = 'hide';
		}
		
		$control .= '<span class="admin_button admin_btn_reset_image admin_danger_btn '. $hide.'" id="reset_' . $this->params['id'] .'" title="' . $this->params['id'] . '">Remove</span>
</div><div class="clear"></div>';
		if(!empty($this->value)){
			$control .= '<a class="admin_uploaded-image" href="'. esc_url($this->value) . '" target="_blank"><img class="admin_option-image" id="image_'. $this->params['id'].'" src="'.esc_url($this->value).'" alt="Uploaded Image" /></a>';
		}
		
		return $control;
	}
}

/**
* Ajax Button Option
*/
class AjaxButtonOption_admin_theme extends Option_admin_theme
{
	protected function render_control()
	{
		return '<script>
			if (typeof window.ajaxButtonData == "undefined") {
				window.ajaxButtonData = {};
			}
			
			window.ajaxButtonData["'. $this->params['id'] .'"] = '. json_encode($this->params['data']) .'
		</script>
		<a class="btn admin_mix_ajax_button admin_button" data-confirm="'. (empty($this->params['confirm'])?0:1) .'" data-id="'. $this->params['id'] .'">'. $this->params['title'] .'</a>
		<img class="ajax_loader_img" style="display: none;" src="'.get_template_directory_uri().'/core/admin/img/ajax_active.gif" alt="active..." />
		<span></span>';
	}
}

?>