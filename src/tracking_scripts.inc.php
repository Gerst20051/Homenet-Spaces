<?php if (!@fsockopen("www.google.com", 80, $errno, $errstr, 10)) { ?>
<!-- Begin tracking scripts -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
var pageTracker = _gat._getTracker("UA-4975864-2");
pageTracker._initData();
pageTracker._trackPageview();
</script>
<!-- End tracking scripts -->
<?php
}

// keep this space here for source code spacing
?>