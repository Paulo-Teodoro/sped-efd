<?php

namespace NFePHP\EFD\Elements\Contribuicoes;

use NFePHP\EFD\Common\Element;
use NFePHP\EFD\Common\ElementInterface;
use \stdClass;

class M211 extends Element implements ElementInterface
{
    const REG = 'M211';
    const LEVEL = 4;
    const PARENT = 'M210';

    protected $parameters = [
        'IND_TIP_COOP' => [
            'type' => 'numeric',
            'regex' => '^(1|2|3|4|5|6|9)$',
            'required' => false,
            'info' => 'Indicador do Tipo de Sociedade Cooperativa ' .
                ' 01 – Cooperativa de Produção Agropecuária ' .
                ' 02 – Cooperativa de Consumo ' .
                ' 03 – Cooperativa de Crédito ' .
                ' 04 – Cooperativa de Eletrificação Rural ' .
                ' 05 – Cooperativa de Transporte Rodoviário de Cargas ' .
                ' 06 – Cooperativa de Médicos ' .
                ' 99 – Outras. ',
            'format' => ''
        ],
        'VL_BC_CONT_ANT_EXC_COOP' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => false,
            'info' => 'Valor da Base de Cálculo da Contribuição, conforme Registros escriturados nos Blocos A, ' .
                'C, D e F, antes das Exclusões das Cooperativas. ',
            'format' => '15v2'
        ],
        'VL_EXC_COOP_GER' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => false,
            'info' => 'Valor de Exclusão Especifica das Cooperativas em Geral, decorrente das Sobras Apuradas na ' .
                'DRE, destinadas a constituição do Fundo de Reserva e do FATES. ',
            'format' => '15v2'
        ],
        'VL_EXC_ESP_COOP' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => false,
            'info' => 'Valor das Exclusões da Base de Cálculo Especifica do Tipo da Sociedade Cooperativa, ' .
                'conforme Campo 02 (IND_TIP_COOP). ',
            'format' => '15v2'
        ],
        'VL_BC_CONT' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => false,
            'info' => 'Valor da Base de Cálculo, Após as Exclusões Especificas da Sociedade Cooperativa (04 ' .
                '– 05 – 06) – Transportar para M210. ',
            'format' => '15v2'
        ],

    ];

    /**
     * Constructor
     * @param \stdClass $std
     */
    public function __construct(\stdClass $std)
    {
        parent::__construct(self::REG);
        $this->std = $this->standarize($std);
    }
}
