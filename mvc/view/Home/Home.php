<?php
/**
 * Created by PhpStorm.
 * User: CEH4TOP
 * Date: 11.02.2018
 * Time: 20:45
 */
?>
<?include("template/Header.php");?>
<section>

</section>
<?if(!empty($user) && $user->isEmpty()):?>
    <form class="ModalObject" method="post" action="TASK/HOME/ENTRY">
        <div class="LineObject">
            <label for="login">Логин</label>
            <input id="login" name="login" class="login" title="Введите логин" placeholder="Логин:"
                   type="text" minlength="3" maxlength="15" required>
        </div>
        <div class="LineObject">
            <label for="code">Игра</label>
            <input id="code" name="code" class="code" title="Введите код игры" placeholder="Код"
                   type="number">
        </div>
        <div class="LineObject">
            <button type="submit">Войти</button>
        </div>
    </form>
<?elseif(!empty($user)):?>
    <form class="ModalObject" method="post" action="TASK/HOME/ENTRY">
        <div class="LineTitle">
            Войдите в игру "<?=$user->login;?>"
        </div>
        <div class="LineObject">
            <label for="code">Игра</label>
            <input id="code" name="code" class="code" title="Введите код игры" placeholder="Код"
                   type="number">
        </div>
        <div class="LineObject">
            <button type="submit">Войти</button>
        </div>
    </form>
<?endif;?>
<?include("template/Footer.php");?>