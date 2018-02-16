<?php

namespace modeles\dashboard;

class DestinationLangue extends \modeles\AbstractModeles
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
        $this->_map = require(__DIR__.'/columns/DestinationLangue.php');
    }
}
