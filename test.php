<?php

include_once("php/utils.php");
include_once("php/cms.php");

$post = CMS::getBlogPost(91);

$body = $post['body'];

echo UTILS::fromParagraphHtmlToString($body);



?>