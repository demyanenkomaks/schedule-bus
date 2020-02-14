<aside class="main-sidebar">

    <section class="sidebar">
        <?php
        use mdm\admin\components\Helper;

        function thisPage($controller,$action="*"){
            if(!is_array($action)&&$action!='*')
            {
                $action = explode(",",$action);
            }
            $_this = \Yii::$app ;
            return ($_this->controller->id==$controller)&&($action=="*")?1:($_this->controller->id==$controller&&in_array($_this->controller->action->id,$action));
        }

//        debug(\Yii::$app->controller->id);
//        debug(\Yii::$app->controller->action->id);
//        die;

        $menuItems = [
            ['label' => 'Новости', 'icon' => 'newspaper-o', 'url' => ['/news/index'], 'active'=>thisPage('news')],
            ['label' => 'Контакты автостанций', 'icon' => 'bus', 'url' => ['/contacts-station/index'], 'active'=>thisPage('contacts-station')],
            ['label' => 'Расписание маршрутов', 'icon' => 'map', 'url' => ['/route-schedule/index'], 'active'=>thisPage('route-schedule')],
            ['label' => 'Станции', 'icon' => 'bank', 'url' => ['/station/index'], 'active'=>thisPage('station')],
            ['label' => 'Партнеры', 'icon' => 'handshake-o', 'url' => ['/partners/index'], 'active'=>thisPage('partners')],
            ['label' => 'Пользователи', 'icon' => 'user', 'url' => ['/user/index'], 'active'=>thisPage('user')],
            [
                'label' => 'Доступы',
                'icon' => 'group',
                'url' => '#',
                'items' => [
                    ['label' => 'Маршруты', 'icon' => 'exchange', 'url' => ['/admin/route/'], 'active' => thisPage( 'route')],
                    ['label' => 'Права доступа', 'icon' => 'bars', 'url' => ['/admin/permission/'], 'active' => thisPage('permission')],
//                    ['label' => 'Меню', 'icon' => 'map-signs', 'url' => ['/admin/menu/'], 'active' => thisPage('menu')],
                    ['label' => 'Роли', 'icon' => 'user-times', 'url' => ['/admin/role/'], 'active' => thisPage('role')],
                    ['label' => 'Назначения', 'icon' => 'money', 'url' => ['/admin/assignment/'], 'active'=>thisPage('assignment')],
                ],
            ],
        ];
        $menuItem = Helper::filter($menuItems);
        ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
//                'items' =>$menuItems,
                'items' =>$menuItem,
            ]
        ) ?>

    </section>

</aside>
