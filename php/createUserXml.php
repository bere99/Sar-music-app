<?php

    $file=fopen("file:{$url}","r");
    fclose($file);
    $email=$_GET['email'];
    $url="{$email}.xml";
    $objetoXML=new XMLWriter();
    $objetoXML->openURI($url);
    $objetoXML->setIndent(true);
    $objetoXML->set_indent_string("\t");
    $objetoXML->startElement("user");
    $objetoXML->startElement("userinfo");
    $objetoXML->writeElement("name", $email);
    $objetoXML->endElement();
    $objetoXML->startElement("playlists");
    $objetoXML->endElement();
    $objetoXML->endElement();
    $objetoXML->endDocument();
?>