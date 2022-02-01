<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function limpar($string)
{
	$table = array(
        '/'=>'', '('=>'', ')'=>'',
    );
    // Traduz os caracteres em $string, baseado no vetor $table
    $string = strtr($string, $table);
	$string= preg_replace('/[,.;:`´^~\'"]/', '', iconv('UTF-8','ASCII//TRANSLIT',$string));
	$string= strtolower($string);
	$string= str_replace(" ", "-", $string);
	$string= str_replace("---", "-", $string);
	return $string;
}

function postadoem($string)
{
    $dias_semana = array("Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado");
    $meses = array(
        '01' => "Janeiro",
        '02' => "Fevereiro",
        '03' => "Março",
        '04' => "Abril",
        '05' => "Maio",
        '06' => "Junho",
        '07' => "Julho",
        '08' => "Agosto",
        '09' => "Setembro",
        '10' => "Outubro",
        '11' => "Novembro",
        '12' => "Dezembro"
    );

    $dia_sem = date('w', strtotime($string));
    $dia = date('d', strtotime($string));
    $mes_num = date('m', strtotime($string));
    $ano = date('Y', strtotime($string));
    $hora = date('H:i', strtotime($string));

    return $dias_semana[$dia_sem] . ', ' . $dia . ' de ' . $meses[$mes_num] . ' de ' . $ano . ' ' . $hora;
}