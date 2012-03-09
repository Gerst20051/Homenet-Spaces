<?php
/* parameter array */
$postdata = http_build_query(array(
'command' => 'ADD',
'url' => 'http://74.227.144.91/user_profile.php?id=1',
'domainname' => 'hnsprofile.tk',
'output' => 'TEXT',
'registrantnr' => '7785717',
'token' => 'CszNO6Xf8Jb8mQQ8qc',
'test' => null
)
);

/* options for our call */
$opts = array('http' => array(
'method' => 'POST',
'header' => 'Content-type: application/x-www-form-urlencoded',
'content'  => $postdata
)
);

/* create a context */
$context = stream_context_create($opts);

/* post data to url and retrieve result */
$result = file_get_contents('https://secure.dot.tk/api/freedomain', false, $context);

/* print result */
print $result;
?>