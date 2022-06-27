<?php

function translate_similar_chars($buffer) {
    $single_double = array(
        'Æ' => 'AE',
        'æ' => 'ae'
    );

    $buffer = strtr(
        $buffer,
        $single_double
    );

    $buffer = strtr(
        utf8_decode($buffer),
        utf8_decode('áàâäãåÁÀÂÄÃÅÞþßćčçĆČÇđĐÐéèêëÉÈÊËíìîïÍÌÎÏñÑóòôöõðøÓÒÔÖÕŕŔšŠ$úùûüÚÙÛÜýÿÝžŽØªº¹²³'),
        utf8_decode('aaaaaaAAAAAAbbBcccCCCdDDeeeeEEEEiiiiIIIInNoooooooOOOOOrRsSSuuuuUUUUyyYzZ0ao123')
    );

    $buffer = utf8_encode($buffer);

    return $buffer;
}

function generate_friendly_url($buffer) {
    $buffer = html_entity_decode($buffer);                       // Converte todas as entidades HTML para os seus caracteres
    $buffer = translate_similar_chars($buffer);                  // Converte caracteres que não estão no padrão para representações deles
    $buffer = strtolower($buffer);                               // Converte uma string para minúscula
    $buffer = preg_replace("/[\s]+/", " ", $buffer);             // Comprime múltiplas ocorrências de espaços
    $buffer = preg_replace("/[_]+/", "_", $buffer);              // Comprime múltiplas ocorrências de underscores
    $buffer = preg_replace("/[-]+/", "-", $buffer);              // Comprime múltiplas ocorrências de hífens
    $buffer = preg_replace("/[\/]+/", "-", $buffer);             // Comprime múltiplas ocorrências de barras
    $buffer = preg_replace("/[\\\]+/", "-", $buffer);            // Comprime múltiplas ocorrências de barras invertidas
    $buffer = preg_replace("/[[\s]+]?-[[\s]+]?/", "-", $buffer); // Remove espaços antes e após hífens
    $buffer = preg_replace("/[\s]/", "-", $buffer);              // Converte espaços em hífens
    $buffer = preg_replace("/[_]/", "-", $buffer);               // Converte underscores em hífens
    $buffer = preg_replace("/[\/]/", "-", $buffer);              // Converte barras em hífens
    $buffer = preg_replace("/[\\\]/", "-", $buffer);             // Converte barras invertidas em hífens
    $buffer = preg_replace("/[^a-z0-9_-]/", "", $buffer);      // Remove caracteres que não estejam no padrão
    
    return $buffer;
}