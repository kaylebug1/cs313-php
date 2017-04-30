<?php echo "<h2><ul class='list-inline navbar navbar-default '>
	<li class='active'><a href='home.php'>Home</a></li>
	<li><a href='assign.php'>Assignments</a></li>
</ul></h2>";?>
<script>
var stuff = document.querySelector('.navbar-default');
var items = stuff.getElementsByTagName('a');

for(var i=0; i < items.length; i++){
	items[i].addEventListener('click', function() { chosen(items[i])}, false);
}

function chosen(items){
	var hasClass = items.getAttribute('class');
	if(hasClass == 'active') {
		items.setAttribute('class', 'active');
	}
}
</script>