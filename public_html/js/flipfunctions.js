/*
 * Function to flip an image (with a width expressed as a percentage) to show a text reverse side.
 * Uses jquery.flip. 
 * rl  ... right to left
 * col ... hex colour
 * id .... String to identify the box being flipped 
 * 
 * Sets the box height to that of the original image. Could lead to some odd effects 
 * if the page is resized while the reverse side is showing. Can't think of a way around this 
 * at the moment.
 * Flipping images with defined fixed widths is fairly trivial, the difficult part of this 
 * is caused by wanting the imgage to be responsive to page size changes, and to be flippable, 
 * and to have text (with clickable link) on the reverse).
 * 
 */
function flipControlFlip(rl, col, event, id){
	var flipbox = '#' + id + 'box';
	console.log(flipbox);
	var control = '#' + id + 'control';
	var reverse = '#' + id + 'reverse';
	
	var detail = control + ' ' + 'a.view-detail';
	var image = control + ' ' + 'a.view-image';
	
	//Set the css height here to ensure that the reverse side is the same height as the image.
	$(flipbox).css('height', $(flipbox).height());
	$(flipbox).css('overflow', 'auto');
	
	$(flipbox).flip({
		direction: rl,
		color: col,
		content: $(reverse).html()
	});
	
	//The default speed for jquery.flip is 500. We need this to display just after the flip.
	setTimeout(function(){
		$(detail).hide();
		$(image).show();
		}, 1000);
	
	event.preventDefault ? event.preventDefault()
			: event.returnValue = false;
	
};
/*
 * Function to reverse the image flip. Resets the css height back to auto.
 */
function flipControlRevert(event, id){
	
	var flipbox = '#' + id + 'box';
	var control = '#' + id + 'control';
	var detail = control + ' ' + 'a.view-detail';
	var image = control + ' ' + 'a.view-image';
	
	
	$(flipbox).revertFlip();
	
	//The default speed for jquery.flip is 500. We need this to display just after the flip.
	setTimeout(function(){$(flipbox).css('overflow', '');}, 998);
	setTimeout(function(){$(flipbox).css('height', 'auto');}, 999);
	setTimeout(function(){
		$(image).hide();
		$(detail).show();
		}, 1000);
	
	
	event.preventDefault ? event.preventDefault()
			: event.returnValue = false;
	
};
