<?php
use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Breadcrumbs;
/* @var $this \yii\web\View */
/* @var $content string */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <!-- Bootstrap 5 CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
        rel="stylesheet"
    />

    <!-- Seu CSS customizado -->
    <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>/css/site.css">

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php
NavBar::begin([
    'brandLabel' => 'Controle de Estoque',
    'brandUrl'   => Yii::$app->homeUrl,
    'options'    => ['class' => 'navbar navbar-expand-lg navbar-dark bg-dark fixed-top'],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav me-auto mb-2 mb-lg-0'],
    'items'   => [
        ['label' => 'Home',    'url' => ['/site/index']],
        ['label' => 'About',   'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ],
]);
if (Yii::$app->user->isGuest) {
    echo Html::a('Login', ['/auth/login'], ['class' => 'btn btn-outline-light me-2']);
    echo Html::a('Register', ['/auth/register'], ['class' => 'btn btn-outline-light']);
} else {
    echo '<ul class="navbar-nav">';
    echo '<li class="nav-item">'
       . Html::beginForm(['/site/logout'], 'post', ['class'=>'d-inline'])
       . Html::submitButton(
           'Logout (' . Yii::$app->user->identity->username . ')',
           ['class' => 'btn btn-outline-light']
       )
       . Html::endForm()
       . '</li></ul>';
}
NavBar::end();
?>

<div class="container" style="padding-top: 80px;">
    <?= Breadcrumbs::widget([
        'links'   => $this->params['breadcrumbs'] ?? [],
        'options' => ['class' => 'breadcrumb mb-4'],
    ]) ?>
    <?= $content ?>
</div>

<footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
        <span class="text-muted">&copy; <?= date('Y') ?> - Meu Controle de Estoque</span>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
