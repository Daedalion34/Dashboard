<?php
include $this->template('dashboard/dashboard.etab.modal.tpl');
include $this->template('dashboard/dashboard.hebergement.modal.tpl');
/*les modales sont dans le tpl principale en premier*/
?>
<div class="row" id="dashboard">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon icon-speedometer"></i>
                    <?php echo $this->i18n->ucfirst('dashboard'); ?>
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body">
                <div class="portlet light">
                    <ul class="nav nav-tabs" id="etabsContentNav">
                        <li class="active">
                            <a href="#moyenne" data-toggle="tab"><?php echo $this->i18n->ucfirst('####'); ?></a>
                        </li>
                        <li>
                            <a href="#medias" data-toggle="tab"><?php echo $this->i18n->ucfirst('####'); ?></a>
                        </li>
                        <li>
                            <a href="#hebergement" data-toggle="tab"><?php echo $this->i18n->ucfirst('####'); ?></a>
                        </li>
                        <li>
                            <a href="#destination" data-toggle="tab"><?php echo $this->i18n->ucfirst('####'); ?></a>
                        </li>
                    </ul>
                    <div class="tab-content no-space">
                        <?php
                            include_once $this->template('dashboard/dashboard.moyenne.tpl');
                            include_once $this->template('dashboard/dashboard.medias.tpl');
                            include_once $this->template('dashboard/dashboard.hebergement.tpl');
                            include_once $this->template('dashboard/dashboard.destination.tpl');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
