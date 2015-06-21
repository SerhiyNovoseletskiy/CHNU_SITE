<?

class AdminSideBar
{
    function __construct()
    {
        ?>
        <ul class="sidebar-menu">
            <li>
                <a href="/admin">
                    <i class="glyphicon glyphicon-dashboard"></i> <span><?= MAIN ?></span>
                </a>
            </li>
            <?
            global $model;
            LoadModel('admin', 'modules');
            $modules = $model->getAll(new modules());
            foreach ($modules as $module) {
                ?>
                <li>
                    <a href="/admin/module/<?= $module->alias ?>">
                        <i class="fa"><img src="/modules/<?= $module->alias ?>/icon.ico"></i>
                        <span><?= $module->name ?></span>
                    </a>
                </li>
            <?
            }
            ?>
        </ul>
    <?
    }
}

?>