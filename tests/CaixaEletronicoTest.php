<?php

use PHPUnit\Framework\TestCase;
require 'CaixaEletronico.php';

class CaixaEletronicoTest extends TestCase {

    protected $caixaEletronico;
    
    protected function setUp(): void {
        $this->caixaEletronico = new CaixaEletronico();

    }
    public function testSaqueInvalido(): void
    {

        $valoresInvalidos = [
            100.20,
            121,
            0,
            8,
            21,
            'a'

        ];
        
        foreach($valoresInvalidos as $valor){

            $this->assertTrue($this->caixaEletronico->efetuarSaque($valor) == 'Impossível realizar o saque.');
            
        }

    }

    public function testSaqueValido(): void
    {

        $valoresValidos = [
            1290,
            110,
            80
        ];
        
        foreach($valoresValidos as $key => $valor){

            $resultadoEsperado = 'Valor do Saque: R$ ' . $valor . ' - Resultado: ';
            $resultadoEsperado .= 'Entregar';

            switch($key){
                case 0:
                    $resultadoEsperado .= ' 12 notas de R$ 100,00 e 1 nota de R$ 50,00 e 2 notas de R$ 20,00';
                    break;
                case 1:
                    $resultadoEsperado .= ' 1 nota de R$ 100,00 e 1 nota de R$ 10,00';
                    break;
                case 2:
                    $resultadoEsperado .= ' 1 nota de R$ 50,00 e 1 nota de R$ 20,00 e 1 nota de R$ 10,00';
                    break;
            }

            $this->assertTrue($this->caixaEletronico->efetuarSaque($valor) == $resultadoEsperado);
            
        }

    }

    

}