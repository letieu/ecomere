<?php
require './vendor/autoload.php';

use KubAT\PhpSimple\HtmlDomParser;


$url = "https://www.fahasa.com/sach-trong-nuoc/van-hoc-trong-nuoc/tieu-thuyet.html";
$folder_save = "public/images";
$name_prefix = "/images/_";

$dom = HtmlDomParser::file_get_html($url);

foreach ($dom->find('.ma-box-content') as $productElement) {
   $name = $productElement->find(".p-name-list")[0]->find('a')[0]->title;
   $writer = $productElement->find(".special-price")[0]->find(".price")[0]->plaintext;
   $output = fopen('a.html', 'w');
   fwrite($output, $writer);
   fclose($output);
}
