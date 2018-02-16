<?php

namespace modeles\dashboard;

class Etabs extends \modeles\AbstractModeles
{
    /**
     * {@inheritdoc}
     */
    protected $_name         = '####';

    /**
     * {@inheritdoc}
     */
    protected $_id           = '####';

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        parent::__construct();
        $this->_map = require(__DIR__.'/columns/Etabs.php');
    }

    public function getModal($idetab, $switchLangue)
    {
        $req = $this->select()
            ->from($this->_name, array('####','####','####'))
            ->joinLeft(
                '####',
                '####.#### = ####.#### AND ####.####= ' . $switchLangue . '',
                '####'
            )
            -> where ('####.####='.$idetab);


        return $this->verifReturn($req, 'fetchRow');

    }
}
