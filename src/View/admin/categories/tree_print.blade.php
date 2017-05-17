<ul>
    <?php for($i=0;$i<count($tree);$i++) { ?>
    <li>
        <?= $tree[$i]->name ?>
           {{-- <span class="put">Изменить</span>
            <span class="del">Удалить</span>--}}
        <?php
        if(!empty($tree[$i]->childs))
            \Mystore\Controller\CategoriesController::tree_print($tree[$i]->childs);
        ?>
    </li>
    <?php } ?>
</ul>