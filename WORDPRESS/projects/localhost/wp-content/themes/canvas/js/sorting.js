/* SORTING */ 

jQuery(function(){
	if (jQuery('.fs_blog_module').size() > 0) {
  		var $container = jQuery('.fs_blog_module');
	} else {
		var $container = jQuery('.fs_grid_portfolio');
	}
	if (jQuery('.grid_style').size() > 0) {
		$container.isotope({
			itemSelector : '.element',
			layoutMode : 'fitRows'
		});
	} else {
		$container.isotope({
			itemSelector : '.element'
		});	
	}
    
  var $optionSets = jQuery('.optionset'),
	  $optionLinks = $optionSets.find('a');

  $optionLinks.click(function(){
	var $this = jQuery(this);
	// don't proceed if already selected
	if ( $this.parent('li').hasClass('selected') ) {
	  return false;
	}
	var $optionSet = $this.parents('.optionset');
	$optionSet.find('.selected').removeClass('selected');
	$optionSet.find('.fltr_before').removeClass('fltr_before');
	$optionSet.find('.fltr_after').removeClass('fltr_after');
	$this.parent('li').addClass('selected');
	$this.parent('li').next('li').addClass('fltr_after');
	$this.parent('li').prev('li').addClass('fltr_before');

	// make option object dynamically, i.e. { filter: '.my-filter-class' }
	var options = {},
		key = $optionSet.attr('data-option-key'),
		value = $this.attr('data-option-value');
	// parse 'false' as false boolean
	value = value === 'false' ? false : value;
	options[ key ] = value;
	if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
	  // changes in layout modes need extra logic
	  changeLayoutMode( $this, options )
	} else {
	  // otherwise, apply new options
	  $container.isotope(options);	  
	}	
	return false;	
  });

	if (jQuery('.fs_blog_module').size() > 0) {
		jQuery('.fs_blog_module').find('img').load(function(){
			$container.isotope('reLayout');
		}); 	
	} else {
		jQuery('.fs_grid_portfolio').find('img').load(function(){
			$container.isotope('reLayout');
		}); 	
	}	
});

jQuery(window).load(function(){		
	if (jQuery('.fs_blog_module').size() > 0) {
		jQuery('.fs_blog_module').isotope('reLayout');
		setTimeout("jQuery('.fs_blog_module').isotope('reLayout')", 500);
	} else {
		jQuery('.fs_grid_portfolio').isotope('reLayout');
		setTimeout("jQuery('.fs_grid_portfolio').isotope('reLayout')", 500);
		setupGrid();
	}
});
jQuery(window).resize(function(){
	if (jQuery('.fs_blog_module').size() > 0) {
		jQuery('.fs_blog_module').isotope('reLayout');
	} else {
		jQuery('.fs_grid_portfolio').isotope('reLayout');
		setupGrid();
	}	
});