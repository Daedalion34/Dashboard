<!-- BEGIN PAGE CONTENT-->
<div class="tab-pane active" id="moyenne">
    <div>
        <!-- boucle sur les langues pour afficher les moyennes -->
        <?php foreach ($this->allLangue as $key => $value ){  ?>
            <div class="dashboard-stat2 dashboard-stat__padding col-md-4 col-sm-4 col-xs-6" data-langue ="<?php echo $value['####'] ?>" >
                <div class="display">
                    <div class="number">
                        <h3 class="font-green-sharp"><?php echo $value['taux'] ?><small class="font-green-sharp">%</small></h3>
                        <small><?php echo $value['####'] ?></small>
                    </div>
                    <div class="icon">
                        <img src="/assets/flags/<?= strtolower($value['####']); ?>.png" alt="" >
                    </div>
                    <div class="progress-info">
                        <div class="progress">
                            <span style="width: <?php echo $value['taux'] ?>%;" class="progress-bar progress-bar-success <?php echo $value['couleur'] ?>"></span>
                        </div>
                        <div class="status">
                            <div class="status-title">
                                progress
                            </div>
                            <div class="status-number">
                                <?php echo $value['taux'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php
    $this->ajaxUrl      = $this->tableAjaxUrl->etabs;
    $this->tableColumns = $this->tableEtabs;
    include($this->template('list/datatable.tpl'));
    ?>

</div>
