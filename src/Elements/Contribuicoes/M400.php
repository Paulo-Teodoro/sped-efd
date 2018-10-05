<?php

namespace NFePHP\EFD\Elements\Contribuicoes;

use NFePHP\EFD\Common\Element;
use NFePHP\EFD\Common\ElementInterface;
use \stdClass;

class M400 extends Element implements ElementInterface
{
    const REG = 'M400';
    const LEVEL = 2;
    const PARENT = 'M001';

    protected $parameters = [
        'CST_PIS' => [
            'type' => 'string',
            'regex' => '^((0[1-9])|49|99)$',
            'required' => false,
            'info' => 'Código de Situação Tributária – CST das demais receitas auferidas no período, sem ' .
                '4.3.3. ' .
                'incidência da contribuição, ou sem contribuição apurada a pagar, conforme a Tabela ',
            'format' => ''
        ],
        'VL_TOT_REC' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => false,
            'info' => 'Valor total da receita bruta no período. ',
            'format' => '15v2'
        ],
        'COD_CTA' => [
            'type' => 'string',
            'regex' => '^.{0,255}$',
            'required' => false,
            'info' => 'Código da conta analítica contábil debitada/creditada. ',
            'format' => ''
        ],
        'DESC_COMPL' => [
            'type' => 'string',
            'regex' => '^(.*)$',
            'required' => false,
            'info' => 'Descrição Complementar da Natureza da Receita. ',
            'format' => ''
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
