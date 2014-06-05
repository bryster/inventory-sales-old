<script type="text/javascript">
function doSlide(id){
	timeToSlide = 10; // in milliseconds
	obj = document.getElementById(id);
	if(obj.style.display == "none"){ 
		obj.style.visibility = "hidden";
		obj.style.display = "block";
		height = obj.offsetHeight;
		obj.style.height="0px";
		obj.style.visibility = "visible";
		pxPerLoop = height/timeToSlide;
		slide(obj,0,height,pxPerLoop);
	} else {
	obj.style.display = "none";
	}
}

function slide(obj,offset,full,px){
	if(offset < full){
		obj.style.height = offset+"px";
		offset=offset+px;
		setTimeout((function(){slide(obj,offset,full,px);}),1);
	} else {
		obj.style.height = "auto"; //Can be usefull in updated divs otherwise
//just use full+"px"
	}
}

</script>