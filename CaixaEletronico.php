<?php

class CaixaEletronico {

    private $notasDisponiveis = [ 100, 50, 20, 10 ];

    public function efetuarSaque($valor){

        if(!is_int($valor) || $valor <= 0){

            return $this->saqueImpossivel();

        }else{

            $arrayAux = $this->notasDisponiveis;
            $arraySaque = [];
            $valorInicial = $valor;

            foreach($arrayAux as $nota){

                array_shift($arrayAux);

                $maiorIgualProximo = false;
                if($arrayAux){
                    foreach($arrayAux as $proximoElemento){

                        if($valor >= $proximoElemento){
                            $maiorIgualProximo = true;
                        }

                    }
                }

                if($valor >= $nota){

                    $quantidadeNotas = (int) ($valor/$nota);
                
                    $obj = [
                        'nota' => $nota,
                        'qtd'  => $quantidadeNotas
                    ];

                    array_push($arraySaque, $obj);
                    
                    $valor = $valor % $nota;

                    if ($valor == 0){
                        return $this->mostraResultado($arraySaque, $valorInicial);
                        break;
                    }

                } else if ($valor > 0 && !$maiorIgualProximo) {

                    return $this->saqueImpossivel();
                    break;

                } else if (!$maiorIgualProximo) {
                    
                    return $this->mostraResultado($arraySaque, $valorInicial);
                    break;

                }

            }
        }

    }

    private function mostraResultado($arraySaque, $valorInicial){
        $resultado = 'Valor do Saque: R$ ' . $valorInicial . ' - Resultado: ';

        foreach ($arraySaque as $key => $saque){
            
            if($key == 0){
                $resultado .= 'Entregar ';
            }else{
                $resultado .= ' e ';
            }

            $resultado .= $saque['qtd'];
            $resultado .= $saque['qtd'] > 1 ? ' notas' : ' nota';
            $resultado .= ' de R$ ';
            $resultado .= $saque['nota'].',00';

        }

        return $resultado;
    }

    private function saqueImpossivel(){
        return 'Impossível realizar o saque.';
    }

}

?>