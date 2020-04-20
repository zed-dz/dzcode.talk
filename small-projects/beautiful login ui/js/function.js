function _(x) {
	return document.getElementById(x);
}function move() {

	if (_('main').style.width == "250px") {

	_('main').style.width= "56px";
	_('main').style.height= "56px";
	_('main').style.borderRadius= "100px";
	_('form').style.display= "none";
	_('img1').style.display= "none";
	_('img2').style.display= "block";
	_('bt').style.width= "56px";
	_('bt').style.height= "56px";
	_('bt').style.borderRadius= "100px";
	_('img2').style.marginLeft= "10px";


	}

	else{
	_('main').style.width= "250px";
	_('main').style.height= "250px";
	_('main').style.borderRadius= "0px";
	_('form').style.display= "block";
	_('img1').style.display= "block";
	_('img1').style.marginLeft= "10px";
	_('img2').style.display= "none";
	_('bt').style.borderRadius= "50px";

	_('main').style.borderBottomRightRadius= "50px";

	_('main').style.borderTopLeftRadius= "50px";
}


}