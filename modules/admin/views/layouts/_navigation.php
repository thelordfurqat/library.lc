<div class="navigation navbar-inverse">
    <div class="title"><img class="logo-admin" src="/akt-logo.png" alt=""></div>
    <div class="collapse-block">
        <button id="collapse-btn" type="button" class="collapse-btn">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <ul id="w0" class="nav">
        <li class="<?= Yii::$app->controller->id=='default' ? 'active' : ''?>">
            <a href="<?= Yii::$app->urlManager->createUrl(['admin/default/index'])?>"><span class="glyphicon glyphicon-dashboard"></span><span class="name"> Uskunalar paneli</span></a>
        </li>
        <li class="<?= Yii::$app->controller->id=='user' ? 'active' : ''?>">
            <a href="<?= Yii::$app->urlManager->createUrl(['admin/user/index'])?>"><span class="glyphicon glyphicon-user"></span><span class="name"> Foydalanuvchilar</span></a>
        </li>
        <li  class="<?= Yii::$app->controller->id=='news' ? 'active' : ''?>">
            <a href="<?= Yii::$app->urlManager->createUrl(['admin/news/index'])?>"><span class="glyphicon glyphicon-duplicate"></span><span class="name"> Postlar</span></a>
        </li>
        <li class="<?= Yii::$app->controller->id=='category' ? 'active' : ''?>">
            <a href="<?= Yii::$app->urlManager->createUrl(['admin/category/index'])?>"><span class="glyphicon glyphicon-th-list"></span><span class="name"> Kategoriyalar</span></a>
        </li>


        <li class="<?= Yii::$app->controller->id=='category' ? 'active' : ''?>">
            <a href="<?= Yii::$app->urlManager->createUrl(['admin/vote/index'])?>"><span class="glyphicon glyphicon-question-sign"></span><span class="name"> So'rovnomalar</span></a>
        </li>
        <li class="<?= Yii::$app->controller->id=='appeals' ? 'active' : ''?>">
            <a href="<?= Yii::$app->urlManager->createUrl(['admin/appeals/index'])?>"><span class="glyphicon glyphicon-envelope"></span><span class="name"> Murojaatlar</span></a>
        </li>
    </ul>
</div>
