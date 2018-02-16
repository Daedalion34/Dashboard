<?php

namespace modeles\dashboard;

class TopBad extends \modeles\AbstractModeles
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

    public function getBadTwo()
    {
        $req = $this->select()
            ->from($this->_name, array('####','####','####', '####', '####', '####', '####', '####'))
            ->order('#### ASC')
            ->limit(6);
        return $this->verifReturn($req);
    }
}
