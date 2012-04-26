<?php

?>

<div id="tabs">
	<ul>
    	<li><a href="#aisis">About Aisis</a></li>
        <li><a href="#aisisGit">Aisis and Git</a></li>
        <li><a href="#aisisAPI">Aisis API</a></li>
    </ul>
    <div id="aisis">
    test text 1
    </div>
    <div id="aisisGit">
    test text
    </div>
    <div id="aisisAPI">
    API
    </div>
</div>

<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
</script>