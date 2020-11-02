<?php

require './include/functions.inc.php';

echo saveMessage();

$contentHTML = file_get_contents("view/page.html");

$contentHTML = getValues($contentHTML, "content_page", "naglowek",
    "title", "%title%");
$contentHTML = getValues($contentHTML, "content_page", "pasek_gorny",
    "name", "%name%");
$contentHTML = getValues($contentHTML, "content_page", "pasek_gorny",
    "describe", "%description%");
$contentHTML = getValues($contentHTML, "content_page", "box1",
    "header", "%projects_title%");

$contentHTML = getValuesBox($contentHTML, "./view/listBox1.html", "content_page",
    "box1", "title_project", "%productBox1%", "%title_box1%",
    "%link%", "link_projekt", "%content%", "tresc_projekt");

$contentHTML = getValues($contentHTML, "content_page", "box2",
    "header", "%projects_title2%");

$contentHTML = getValuesBox($contentHTML, "./view/listBox2.html", "content_page",
    "box2", "title_project", "%productBox2%", "%title_box1%",
    "%link%", "link_projekt", "%content%", "tresc_projekt");

$contentHTML = getValues($contentHTML, "content_page", "box3",
    "html", "%html%");

$contentHTML = getValues($contentHTML, "content_page", "box3",
    "css", "%css%");

$contentHTML = getValues($contentHTML, "content_page", "box3",
    "java_script", "%java_script%");

$contentHTML = getValues($contentHTML, "content_page", "box3",
    "php", "%php%");

$contentHTML = getValues($contentHTML, "content_page", "box3",
    "sql", "%sql%");

$contentHTML = getValues($contentHTML, "content_page", "box3",
    "sas", "%sas%");

$contentHTML = getValues($contentHTML, "content_page", "box3",
    "vba", "%vba%");

echo $contentHTML;