<?php
require "vendor/autoload.php";

use Itau\API\Itau;
use Itau\API\BoleCode\BoleCode;

try{
    
    $itau = new Itau(
        "281145a2-fc79-4363-94d3-27dcf4b6af91",
        "1fd112c8-21fd-4040-9002-63c05f77b3aa",
        "acgnet/acgnet.csr",
        "acgnet/acgnet.key"
    );

    #Descomente este trecho caso queira imprimir na tela o JSON da requisição
    $itau->setDebug(true);

    $modo               = BoleCode::ETAPA_TESTE;
    $agencia            = "2419";
    $conta              = "98679";
    $contaDV            = "5";
    $valor              = "100.00";
    $tipoBoleto         = "DS";
    $numeroDocumento    = "3232";
    $nome               = "ANDERSON MAUTONE";
    $tipoPessoa         = "PF";
    $documento          = "30380710803";
    $endereco           = "av engenheiro kuis carlos berrini 1618";
    $numero             = "1618";
    $complemento        = "13B";
    $bairro             = "Cidade Moncoes";
    $cidade             = "SAO PAULO";
    $siglaEstado        = "SP";
    $cep                = "04571000";
    $nossoNumero        = "382938";
    $vencimento         = "2024-02-04";
    $chavePix           = "23250168000150";
    $tipoMulta          = "03";
    $percentualMulta    = "0";    
    $tipoJuros          = "0";
    $percentualJuros    = "0";

    #Explicações dos campos após este exemplo
    $boleCode = new BoleCode (
        $modo, $agencia, $conta, $contaDV, $valor, $tipoBoleto, $numeroDocumento, $nome, $tipoPessoa,
        $documento, $endereco, $numero, $complemento, $bairro, $cidade, $siglaEstado, $cep, $nossoNumero,
        $vencimento, $chavePix, $tipoMulta, $percentualMulta, $tipoJuros, $percentualJuros
    );

    $response = $itau->boleCode($boleCode);

    #Caso tenha sucesso, conseguirá recuperar o TXID dessa maneira
    $response->getTxid();

    #PIXCOPIA E COLA - Em caso de sucesso
    $response->getPixCopiaECola();

} catch(Exception $e){

}